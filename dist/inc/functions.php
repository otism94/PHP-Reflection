<?php

/**
 * Take banner slide object and generate HTML
 * @param object Decoded JSON object of slide details
 * @return string Slide HTML to display
 */
function getSlideHtml(object $slide) {
    $output = <<<EOD
    <div class="banner-slide banner-{$slide->class}">
        <div class="banner-content">
            <div class="banner-caption">
                <h1>{$slide->title}</h1>
                <p>{$slide->description}</p>
                <a class="btn btn-banner" href="{$slide->link}">
                    <span>{$slide->button}</span><i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>\n
    EOD;

    return $output;
}

/**
 * Take card object and generate HTML
 * @param object Decoded JSON object of card details
 * @return string Card HTML to display
 */
function getCardHtml(object $card) {
    $output = <<<EOD
    <a class="card card-{$card->class}" href="{$card->link}">
        <div class="icon-card">
            <i class="{$card->icon}"></i>
        </div>
        <h3>{$card->title}</h3>
        <span class="line"></span>
        <p>{$card->description}</p>
        <div class="btn btn-card btn-{$card->class}">
            <span>Read More</span>
        </div>
    </a>\n
    EOD;

    return $output;
}

/**
 * Query `articles` table and retrieve the three most recent articles
 * @return array Associative array of 3 articles
 */
function getLatestArticles() {
    require __DIR__ . "/connection.php";

    try {
        $result = $db->query("SELECT * FROM articles ORDER BY article_id DESC LIMIT 3");
        $result->execute();
    } catch (Exception $e) {
        echo "Bad query";
        exit;
    }

    return $result->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * Take array of latest articles, determine CSS class, and generate HTML
 * @param array Associative array of articles
 * @return string Article HTML to display
 */
function getArticleHtml(array $article) {
    // Determine matching CSS theme from subcategory
    switch ($article["subcategory"]) {
        case "Bespoke Software":
            $article_class = "software";
            break;
        case "IT Support":
            $article_class = "it";
            break;
        case "Digital Marketing":
            $article_class = "marketing";
            break;
        case "Telecoms Services":
            $article_class = "telecoms";
            break;
        case "Web Design":
            $article_class = "design";
            break;
        case "Cyber Security":
            $article_class = "security";
            break;
    }

    // Create DateTime object
    $date_published = new DateTime($article["publish_date"]);
    // Prepare variables for use in heredoc
    $formatted_date = $date_published->format("jS F Y");
    $category_href = "https://www.netmatters.co.uk/" . strtolower($article["category"]) . "/" . strtolower(str_replace(" ", "-", $article["subcategory"]));
    
    // Article HTML
    $output = <<<EOD
    <div class="article article-{$article_class}">
        <div class="article-fig">
            <a href="{$article["link"]}">
                <img class="article-img" src="img/news/{$article["img"]}" alt="{$article["title"]}'"/>
            </a>
            <a href="{$category_href}" class="article-caption tooltip-article">
                <span>{$article["category"]}</span>
                <div class="tooltip-box">
                    View all: {$article["subcategory"]} / {$article["category"]}
                </div>
                <div class="tooltip-point"></div>
            </a>
        </div>
        <article>
            <h4><a href="{$article["link"]}">{$article["title"]}</a></h4>
            <p>{$article["snippet"]}</p>
            <a href="{$article["link"]}" class="read-more" tabindex="0">
                <div class="btn btn-news-{$article_class}">
                    <span>Read More</span>
                </div>
            </a>
            <footer class="article-ftr">
                <div class="author-img">
                    <img src="img/news/{$article["author_img"]}" alt="{$article["author_name"]}"/>
                </div>
                <div class="author-info">
                    <ul>
                        <li class="author">Posted by {$article["author_name"]}</li>
                        <li>{$formatted_date}</li>
                    </ul>
                </div>
            </footer>
        </article>
    </div>\n
    EOD;
    
    return $output;
}

/**
 * Take client object and generate HTML
 * @param object Decoded JSON object of client details
 * @return string ClientHTML to display
 */
function getClientHtml(object $client) {
    if (!empty($client->link)) {
        $output = <<<EOD
        <div class="tooltip-client"> 
            <a href="{$client->link}">
                <img src="img/clients/{$client->img_prefix}.jpeg" alt="{$client->name} logo"/>
                <img src="img/clients/{$client->img_prefix}-hover.png" alt="Northern Diver logo"/>
            </a>\n
        EOD;
    } else {
    $output = <<<EOD
    <div class="tooltip-client"> 
        <div>
            <img src="img/clients/{$client->img_prefix}.jpeg" alt="{$client->name} logo"/>
            <img src="img/clients/{$client->img_prefix}-hover.png" alt="{$client->name} logo"/>
        </div>\n
    EOD;
    }

    $output .= <<<EOD
        <div class="tooltip-box">
            <span>{$client->name}</span>
            <div class="tooltip-line"></div>
            <p>{$client->description}</p>
        </div>
        <div class="tooltip-point"></div>
    </div>\n
    EOD;

    return $output;
}

/**
 * Create enquiry object from post data, run validation, and try to send
 * @param array Post data array
 * @return array|bool Array of invalid fields or submission success/failure
 */
function createEnquiry(array $contactData) {

    // Instantiate new ContactSubmission object with form data array
    $enquiry = new ContactSubmission($contactData);

    // Declare empty array for invalid fields
    // If empty after checks, form is valid
    $invalidFields = [];

    // Check for empty fields with object method
    if ($enquiry->hasEmptyFields()) {
        $invalidFields = $enquiry->hasEmptyFields();
    }

    // Validate email address with object method
    if (!in_array("email", $invalidFields) && !$enquiry->isValidEmail()) {
        $invalidFields[] = "email";
    }

    // Validate phone number with object method
    if (!in_array("phone", $invalidFields) && !$enquiry->isValidPhone()) {
        $invalidFields[] = "phone";
    }

    // If any fields fail validation, return array of those fields
    if (!empty($invalidFields)) {
        return $invalidFields;
    // If no invalid fields, call submitForm method, and return true if successfully sent
    } elseif (empty($invalidFields) && $enquiry->submitForm()) {
        setReferralSession();
        return true;
    // Else return false for any other error
    } else {
        return false;
    }
}

/**
 * Create subscription object from post data, run validation, and try to send
 * @param array Post data array
 * @return array|string|bool Array of invalid fields, string if already subbed, or success/failure boolean
 */
function createSubscription(array $newsletterData) {

    // Instantiate new NewsletterSubmission object with form data array
    $subscription = new NewsletterSubmission($newsletterData);

    // Declare empty array for invalid fields
    // If empty after checks, form is valid
    $invalidFields = [];

    // Check for empty fields with object method
    if ($subscription->hasEmptyFields()) {
        $invalidFields = $subscription->hasEmptyFields();
    }

    // Validate email address with object method
    if (!in_array("email", $invalidFields) && !$subscription->isValidEmail()) {
        $invalidFields[] = "email";
    }

    // If any fields fail validation, return array of those fields
    if (!empty($invalidFields)) {
        return $invalidFields;
    // If supplied email is already subscribed, return string
    } elseif ($subscription->isAlreadySubscribed()) {
        return "Already subscribed";
    // If no invalid fields, call submitSubscription, and return true if successfully sent
    } elseif (empty($invalidFields) && $subscription->submitForm()) {
        setReferralSession();
        return true;
    // Else return false for any other error
    } else {
        return false;
    }
}

function setReferralSession() {
    session_start();
    $_SESSION["referral"] = $_SERVER["REQUEST_URI"];
}
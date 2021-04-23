<?php

/**
 * Query `articles` table and retrieve the three most recent articles
 * 
 * @return array Associative array of 3 articles
 */
function getLatestArticles() {
    include("connection.php");

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
 * 
 * @param array Associative array of articles
 * @return string Article HTML to display
 */
function getArticleHtml($article) {
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

    // Create DateTime object to be formatted
    $date_published = new DateTime($article["publish_date"]);

    $output = '<div class="article article-' . $article_class . '">'
    . '<div class="article-fig">'
    . '<a href="' . $article["link"] . '">'
    . '<img class="article-img" src="img/news/' . $article["img"] . '" alt="' . $article["title"] . '"/>'
    . '</a>'
    . '<a href="https://www.netmatters.co.uk/' . strtolower($article["category"]) . '/'. strtolower(str_replace(" ", "-", $article["subcategory"])) . '" class="article-caption tooltip-article">'
    . '<span>' . $article["category"] . '</span>'
    . '<div class="tooltip-box">'
    . 'View all: ' . $article["subcategory"] . ' / ' . $article["category"] . ''
    . '</div>'
    . '<div class="tooltip-point"></div>'
    . '</a>'
    . '</div>'
    . '<article>'
    . '<h4><a href="' . $article["link"] . '">' . $article["title"] . '</a></h4>'
    . '<p>' . $article["snippet"] . '</p>'
    . '<a href="' . $article["link"] . '" class="read-more" tabindex="0">'
    . '<div class="btn btn-news-' . $article_class . '">'
    . '<span>Read More</span>'
    . '</div>'
    . '</a>'
    . '<footer class="article-ftr">'
    . '<div class="author-img">'
    . '<img src="img/news/' . $article["author_img"] . '" alt="' . $article["author_name"] . '"/>'
    . '</div>'
    . '<div class="author-info">'
    . '<ul>'
    . '<li class="author">Posted by ' . $article["author_name"] . '</li>'
    . '<li>' . $date_published->format("jS F Y") . '</li>'
    . '</ul>'
    . '</div>'
    . '</footer>'
    . '</article>'
    . '</div>';

    return $output;
}

/**
 * @param object ContactSubmission object
 */
function submitEnquiry($enquiry) {
    include "connection.php";

    try {
        $stmt = $db->prepare('INSERT INTO contact(name, email, phone, subject, message, accept_marketing) VALUES(:name, :email, :phone, :subject, :message, :accept_marketing)');
        $stmt->bindValue(':name', $enquiry->getName(), PDO::PARAM_STR);
        $stmt->bindValue(':email', $enquiry->getEmail(), PDO::PARAM_STR);
        $stmt->bindValue(':phone', $enquiry->getPhone(), PDO::PARAM_STR);
        $stmt->bindValue(':subject', $enquiry->getSubject(), PDO::PARAM_STR);
        $stmt->bindValue(':message', $enquiry->getMessage(), PDO::PARAM_STR);
        $stmt->bindValue(':accept_marketing', $enquiry->getMarketing(), PDO::PARAM_INT);
        $stmt->execute();

    } catch (Exception $e) {
        echo "Failed to send: " . $e;
        return false;
    }

    return true;
}

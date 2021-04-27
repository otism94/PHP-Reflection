<?php
/**
 * PHP Reflection
 * Netmatters homepage built off past HTML/CSS/JS
 * 
 * @author Otis Moorman <otis.moorman@netmatters-scs.com>
 * @link https://github.com/otism94/PHP-Reflection
 */

$page_title = "Netmatters | Full Service Digital Agency | Norwich, Norfolk";
require_once __DIR__ . "/inc/bootstrap.php";
require_once __DIR__ . "/inc/head.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["action"] === "newsletter") {
    // Add each form field to associative array
    $newsletterData["name"] = trim(filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING));
    $newsletterData["email"] = trim(filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL));
    $newsletterData["accept_marketing"] = trim(filter_input(INPUT_POST, "accept_marketing", FILTER_SANITIZE_NUMBER_INT));

    // If no post data was received from checkbox, set its value to 0 (false)
    if (empty($newsletterData["accept_marketing"])) {
        $newsletterData["accept_marketing"] = 0;
    }

    // Create subscription and store return value
    $response = createSubscription($newsletterData);

    // If createSubscription returns an array, form is invalid
    if (is_array($response)) {
        $invalidNewsletterFields = $response;
    // If createSubscription returns a string, email is already subscribed
    } elseif (is_string($response)) {
        $newsletterStatusMessage = "This email is already subscribed to the newsletter.";
    // If createSubscription returns true, form was submitted
    } elseif ($response) {
        header("Location: thanks.php");
        $newsletterStatusMessage = "Thank you for subscribing!";
    // Form failed to submit for any reason
    } else {
        $newsletterStatusMessage = "Failed to register subscription. Please try again.";
    }
}
?>

<body>

    <?php 
    require_once __DIR__ . "/inc/cookies.php";
    require_once __DIR__ . "/inc/sidemenu.php";
    ?>

    <!-- Page container -->
    <div id="container">
        
        <?php require_once __DIR__ . "/inc/header.php"; ?>

        <!-- Banner -->
        <div id="banner-carousel">
            <?php
            $banner = json_decode(file_get_contents("data/banner.json"));
            if (is_object($banner->banner[0])) {
                foreach ($banner->banner as $slide) {
                    echo getSlideHtml($slide);
                }
            }
            ?>
        </div> <!-- /#banner-carousel -->

        <!-- Cards -->
        <div class="cards-section">
            <div class="cards-content">
                <?php
                $cards = json_decode(file_get_contents("data/cards.json"));
                if (is_object($cards->cards[0])) {
                    foreach ($cards->cards as $card) {
                        echo getCardHtml($card);
                    }
                }
                ?>
            </div> <!-- /.cards-content -->
        </div> <!-- /.cards-section -->

        <!-- About -->
        <div class="about-section">
            <div class="about-content">
                <h2>Netmatters</h2>
                <p><strong>Netmatters Ltd is a leading web design, IT support and digital marketing agency based in Wymondham, Norfolk.</strong></p>
                <p>Founded in 2008, we work with businesses from a variety of industries to gain new prospects, nurture existing leads and further grow their sales.</p>
                <p>We provide cost effective, reliable solutions to a range of services; from bespoke cloud-based management systems, workflow and IT solutions through to creative website development and integrated digital campaigning.</p>
                <a href="https://www.netmatters.co.uk/our-culture" class="btn btn-about">Our Culture<i class="fas fa-arrow-right"></i></a>
            </div> <!-- /.about-content -->
        </div> <!-- /.about-section -->

        <!-- News -->
        <div class="news-section">
            <div class="news-banner">
                <div class="news-banner-labels">
                    <span>Latest</span>
                </div>
            </div> <!-- /.news-banner -->
            <div class="latest-articles">
                <div class="articles-container">
                    <div class="articles-cutoff">
                        <?php
                        $articles = getLatestArticles();

                        foreach ($articles as $article) {
                            echo getArticleHtml($article);
                        }
                        ?>
                    </div> <!-- /.articles-cutoff -->
                </div> <!-- /.articles-container -->
            </div> <!-- /.latest-articles -->
        </div> <!-- /.news-section -->

        <!-- Clients -->
        <div class="clients-section">
            <div class="clients-list">
                <?php
                $clients = json_decode(file_get_contents("data/clients.json"));
                if (is_object($clients->clients[0])) {
                    foreach ($clients->clients as $client) {
                        echo getClientHtml($client);
                    }
                }
                ?>
            </div> <!-- /.clients-list -->
        </div> <!-- /.clients-section -->

        <?php
        require_once __DIR__ . "/inc/footer.php";
        ?>

    </div> <!-- /#container -->

    <?php require_once __DIR__ . "/inc/scripts.php"; ?>
</body>
</html>
<?php
/**
 * PHP Reflection
 * Netmatters homepage built off past HTML/CSS/JS
 * 
 * @author Otis Moorman <otis.moorman@netmatters-scs.com>
 * @link https://github.com/otism94/PHP-Reflection
 */

$page_title = "Netmatters | Full Service Digital Agency | Norwich, Norfolk";
require __DIR__ . "/inc/bootstrap.php";
include __DIR__ . "/inc/head.php";
include __DIR__ . "/inc/post_form.php";
?>

<body>

    <?php 
    include __DIR__ . "/inc/cookies.php";
    include __DIR__ . "/inc/sidemenu.php";
    ?>

    <!-- Page container -->
    <div id="container">
        
        <?php include __DIR__ . "/inc/header.php"; ?>

        <!-- Banner -->
        <div id="banner-carousel">
            <?php
            customErrorHandler();
            try {
                $banner = json_decode(file_get_contents("data/banner.json"));
                if (is_object($banner->banner[0])) {
                    foreach ($banner->banner as $slide) {
                        echo getSlideHtml($slide);
                    }
                }
            } catch (ErrorException $e) {
                echo <<<EOD
                <div class="banner-slide banner-design">
                    <div class="banner-content">
                        <div class="banner-caption">
                            <h1>Web Design</h1>
                            <p>For businesses looking to make a strong <br/>and effective first impression.</p>
                            <a class="btn btn-banner" href="https://www.netmatters.co.uk/web-design">
                                <span>Find Out More</span><i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                EOD;
            }
            restore_error_handler();
            ?>
        </div> <!-- /#banner-carousel -->

        <!-- Cards -->
        <div class="cards-section">
            <div class="cards-content">
                <?php
                customErrorHandler();
                try {
                    $cards = json_decode(file_get_contents("data/cards.json"));
                    if (is_object($cards->cards[0])) {
                        foreach ($cards->cards as $card) {
                            echo getCardHtml($card);
                        }
                    }
                } catch (ErrorException $e) {
                    // Show blank section
                }
                restore_error_handler();
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
                        customErrorHandler();
                        try {
                            $articles = getLatestArticles();
                            if ($articles) {
                                foreach ($articles as $article) {
                                    echo getArticleHtml($article);
                                }
                            } else {
                                throw new ErrorException;
                            }
                        } catch (ErrorException $e) {
                            echo '<p>Could not fetch latest articles.<br/><a href="https://www.netmatters.co.uk/articles" style="color: #4183d7;">Click here</a> to view all our articles.</p>';
                        }
                        restore_error_handler();
                        ?>
                    </div> <!-- /.articles-cutoff -->
                </div> <!-- /.articles-container -->
            </div> <!-- /.latest-articles -->
        </div> <!-- /.news-section -->

        <!-- Clients -->
        <div class="clients-section">
            <div class="clients-list">
                <?php
                customErrorHandler();
                try {
                    $clients = json_decode(file_get_contents("data/clients.json"));
                    if (is_object($clients->clients[0])) {
                        foreach ($clients->clients as $client) {
                            echo getClientHtml($client);
                        }
                    }
                } catch (ErrorException $e) {
                    // Show blank section
                }
                restore_error_handler();
                ?>
            </div> <!-- /.clients-list -->
        </div> <!-- /.clients-section -->

    <?php include __DIR__ . "/inc/footer.php"; ?>

    </div> <!-- /#container -->

    <?php include __DIR__ . "/inc/scripts.php"; ?>
</body>
</html>
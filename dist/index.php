<!-- ############################################
          PHP Reflection by Otis Moorman
        for Netmatters SCS training course
################################################# -->
<!DOCTYPE html>
<html lang="en-gb">

    <?php 
    $page_title = "Netmatters | Full Service Digital Agency | Norwich, Norfolk";
    require_once __DIR__ . "/inc/functions.php";
    require_once __DIR__ . "/inc/head.php";
    ?>

    <body>

        <?php 
        require_once __DIR__ . "/inc/cookies.php";
        require_once __DIR__ . "/inc/sidemenu.php";
        ?>

        <div id="container"> <!-- Page container -->
            
            <?php require_once __DIR__ . "/inc/header.php"; ?>

<!-- ############################################
    Banner
################################################# -->

            <div id="banner-carousel">

                <div class="banner-slide banner-design">
                    <div class="banner-content">
                        <div class="banner-caption">
                            <h1>Web Design</h1>
                            <p>For businesses looking to make a strong <br/>and effective first impression.</p>
                            <a class="btn btn-banner" href="https://www.netmatters.co.uk/web-design">
                                <span>Find Out More</span><i class="fas fa-arrow-right"></i>
                            </a>
                        </div> <!-- End of slide caption div -->
                    </div> <!-- End of slide content div -->
                </div> <!-- End of slide section div -->
                    
                <div class="banner-slide banner-it">
                    <div class="banner-content">
                        <div class="banner-caption">
                            <h1>IT Support</h1>
                            <p>Fast and cost-effective IT support <br/>services for your business</p>
                            <a class="btn btn-banner" href="https://www.netmatters.co.uk/web-design">
                                <span>Find Out More</span><i class="fas fa-arrow-right"></i>
                            </a>
                        </div> <!-- End of slide caption div -->
                    </div> <!-- End of slide content div -->
                </div> <!-- End of slide section div -->

                <div class="banner-slide banner-telecoms">
                    <div class="banner-content">
                        <div class="banner-caption">
                            <h1>Telecoms Services</h1>
                            <p>A new approach to connectivity, see how <br/>we can help your business.</p>
                            <a class="btn btn-banner" href="https://www.netmatters.co.uk/web-design">
                                <span>Find Out More</span><i class="fas fa-arrow-right"></i>
                            </a>
                        </div> <!-- End of slide caption div -->
                    </div> <!-- End of slide content div -->
                </div> <!-- End of slide section div -->

                <div class="banner-slide banner-software">
                    <div class="banner-content">
                        <div class="banner-caption">
                            <h1>Bespoke Software</h1>
                            <p>Bring your business together <br/>with solutions that grow with you.</p>
                            <a class="btn btn-banner" href="https://www.netmatters.co.uk/web-design">
                                <span>Find Out More</span><i class="fas fa-arrow-right"></i>
                            </a>
                        </div> <!-- End of slide caption div -->
                    </div> <!-- End of slide content div -->
                </div> <!-- End of slide section div -->

                <div class="banner-slide banner-marketing">
                    <div class="banner-content">
                        <div class="banner-caption">
                            <h1>Digital Marketing</h1>
                            <p>Generating you new business through <br/>results-driven marketing activities.</p>
                            <a class="btn btn-banner" href="https://www.netmatters.co.uk/web-design">
                                <span>See how we can help you</span><i class="fas fa-arrow-right"></i>
                            </a>
                        </div> <!-- End of slide caption div -->
                    </div> <!-- End of slide content div -->
                </div> <!-- End of slide section div -->

                <div class="banner-slide banner-security">
                    <div class="banner-content">
                        <div class="banner-caption">
                            <h1>Cyber Security</h1>
                            <p>Keeping businesses and their customers <br/>sensitive information protected.</p>
                            <a class="btn btn-banner" href="https://www.netmatters.co.uk/web-design">
                                <span>Find Out More</span><i class="fas fa-arrow-right"></i>
                            </a>
                        </div> <!-- End of slide caption div -->
                    </div> <!-- End of slide content div -->
                </div> <!-- End of slide section div -->

            </div> <!-- End of carousel div -->

<!-- ############################################
    Cards Section 
################################################# -->

            <div class="cards-section">
                <div class="cards-content">

                    <!-- Bespoke Software Card -->
                    <a class="card card-software" href="https://www.netmatters.co.uk/bespoke-software">
                        <div class="icon-card">
                            <i class="fas fa-th"></i>
                        </div>
                        <h3>Bespoke Software</h3>
                        <span class="line"></span>
                        <p>Tailored software solutions to improve business productivity and online profits. Our expert team will ensure a software solution.</p>
                        <div class="btn btn-card btn-software">
                            <span>Read More</span>
                        </div>
                    </a>

                    <!-- IT Support Card -->
                    <a class="card card-it" href="https://www.netmatters.co.uk/it-support">
                        <div class="icon-card">
                            <i class="fas fa-desktop"></i>
                        </div>
                        <h3>IT Support</h3>
                        <span class="line"></span>
                        <p>Remotely managed IT services that is catered to your businesses needs, adds value and reduces costs.</p>
                        <div class="btn btn-card btn-it">
                            <span>Read More</span>
                        </div>
                    </a>

                    <!-- Digital Marketing Card -->
                    <a class="card card-marketing" href="https://www.netmatters.co.uk/digital-marketing">
                        <div class="icon-card">
                            <i class="fas fa-chart-bar"></i>
                        </div>
                        <h3>Digital Marketing</h3>
                        <span class="line"></span>
                        <p>Driving brand awareness and ROI through creative digital marketing campaigns. We review and monitor online performances.</p>
                        <div class="btn btn-card btn-marketing">
                            <span>Read More</span>
                        </div>
                    </a>

                    <!-- Telecoms Services Card -->
                    <a class="card card-telecoms" href="https://www.netmatters.co.uk/telecoms-services">
                        <div class="icon-card">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <h3>Telecoms Services</h3>
                        <span class="line"></span>
                        <p>Stay connected with bespoke telecoms solutions when you need it most.</p>
                        <div class="btn btn-card btn-telecoms">
                            <span>Read More</span>
                        </div>
                    </a>

                    <!-- Web Design Card -->
                    <a class="card card-design" href="https://www.netmatters.co.uk/web-design">
                        <div class="icon-card">
                            <i class="fas fa-code"></i>
                        </div>
                        <h3>Web Design</h3>
                        <span class="line"></span>
                        <p>User-centric design for businesses looking to make a lasting first impression.</p>
                        <div class="btn btn-card btn-design">
                            <span>Read More</span>
                        </div>
                    </a>

                    <!-- Cyber Security Card -->
                    <a class="card card-security" href="https://www.netmatters.co.uk/cyber-security">
                        <div class="icon-card">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h3>Cyber Security</h3>
                        <span class="line"></span>
                        <p>Ensuring your online business stays secure 24/7, 365 days of the year.</p>
                        <div class="btn btn-card btn-security">
                            <span>Read More</span>
                        </div>
                    </a>

                    <!-- Developer Training Card -->
                    <a class="card card-design" href="https://www.netmatters.co.uk/scs-web-developer-course">
                        <div class="icon-card">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <h3>Developer Training</h3>
                        <span class="line"></span>
                        <p>Have you considered a career in web development but you aren’t sure where to start?</p>
                        <div class="btn btn-card btn-design">
                            <span>Read More</span>
                        </div>
                    </a>

                </div> <!-- End of cards content div -->
            </div> <!-- End of cards section div -->

<!-- ############################################
    About Section 
################################################# -->

            <div class="about-section">
                <div class="about-content">
                    <h2>Netmatters</h2>
                    <p><strong>Netmatters Ltd is a leading web design, IT support and digital marketing agency based in Wymondham, Norfolk.</strong></p>
                    <p>Founded in 2008, we work with businesses from a variety of industries to gain new prospects, nurture existing leads and further grow their sales.</p>
                    <p>We provide cost effective, reliable solutions to a range of services; from bespoke cloud-based management systems, workflow and IT solutions through to creative website development and integrated digital campaigning.</p>
                    <a href="https://www.netmatters.co.uk/our-culture" class="btn btn-about">Our Culture<i class="fas fa-arrow-right"></i></a>
                </div> <!-- End of about content div -->
            </div> <!-- End of about section div -->

<!-- ############################################
    News Section 
################################################# -->

            <div class="news-section">

                <!-- News banner -->
                <div class="news-banner">
                    <div class="news-banner-labels">
                        <span>Latest</span>
                    </div>
                </div>

                <!-- Latest news articles -->
                <div class="latest-articles">
                    <div class="articles-container">
                        <div class="articles-cutoff">

                            <?php
                            $articles = getLatestArticles();

                            foreach ($articles as $article) {
                                echo getArticleHtml($article);
                            }
                            ?>

                        </div> <!-- End of article shadow container -->
                    </div> <!-- End of articles content div-->
                </div> <!-- End of articles section div -->

            </div> <!-- End of news section div -->

<!-- ############################################
    Clients Section (min-width: 768px)
################################################# -->

            <div class="clients-section">
                <div class="clients-list">

                    <!-- Busseys -->
                    <div class="tooltip-client"> 
                        <div>
                            <img src="img/clients/busseys.jpeg" alt="Busseys logo"/>
                            <img src="img/clients/busseys-hover.png" alt="Busseys logo"/>
                        </div>
                        <div class="tooltip-box">
                            <span>Busseys</span>
                            <div class="tooltip-line"></div>
                            <p>One of the UK's leading Ford dealerships.</p>
                        </div>
                        <div class="tooltip-point"></div>
                    </div>

                    <!-- Crane -->
                    <div class="tooltip-client"> 
                        <a href="https://www.netmatters.co.uk/new-website-developed-for-crane-garden-buildings"> 
                            <img src="img/clients/crane.jpeg" alt="Crane Garden Buildings logo"/>
                            <img src="img/clients/crane-hover.png" alt="Crane Garden Buildings logo"/>
                        </a>
                        <div class="tooltip-box">
                            <span>Crane Garden Builders</span>
                            <div class="tooltip-line"></div>
                            <p>Leading manufacturer and supplier of high-end garden rooms, summerhouses, workshops and sheds in the UK.</p>
                        </div>
                        <div class="tooltip-point"></div>
                    </div>

                    <!-- Beat -->
                    <div class="tooltip-client"> 
                        <div>
                            <img src="img/clients/beat.jpeg" alt="Beat logo"/>
                            <img src="img/clients/beat-hover.png" alt="Beat Eating Disorders logo"/>
                        </div>
                        <div class="tooltip-box">
                            <span>Beat</span>
                            <div class="tooltip-line"></div>
                            <p>The UK's eating disorder charity founded in 1989.</p>
                        </div>
                        <div class="tooltip-point"></div>
                    </div>

                    <!-- Northern Diver -->
                    <div class="tooltip-client"> 
                        <a href="https://www.netmatters.co.uk/new-northern-diver-website-is-live">
                            <img src="img/clients/northern.jpeg" alt="Northern Diver logo"/>
                            <img src="img/clients/northern-hover.png" alt="Northern Diver logo"/>
                        </a>
                        <div class="tooltip-box">
                            <span>Northern Diver</span>
                            <div class="tooltip-line"></div>
                            <p>Global water based equipment manufacturers for sport, military, commercial and rescue businesses.</p>
                        </div>
                        <div class="tooltip-point"></div>
                    </div>

                </div> <!-- End of clients content div -->
            </div> <!-- End of clients section div -->

<!-- ############################################
    Newsletter Sign-Up
################################################# -->

            <div class="newsletter-section">
                <form class="form-newsletter" action="#" method="POST">
                    <h2>Email Newsletter Sign-Up</h2>
                    <fieldset class="fieldset-newsletter">

                        <!-- Name and email fields -->
                        <div class="newsletter-fields">
                            <div class="name-field">
                                <label class="signup-label" for="name">Your Name <span class="required">*</span></label><br/>
                                <input class="signup-field" type="text" id="name" name="user_name"/>
                            </div>

                            <div class="email-field">
                                <label class="signup-label" for="email">Your Email <span class="required">*</span></label><br/>
                                <input class="signup-field" type="email" id="email" name="user_email"/>
                            </div>
                        </div>

                        <!-- Marketing information opt-in -->
                        <div class="marketing-box">
                            <label class="marketing-label" for="marketing-optin">
                                <input type="checkbox" name="accept_marketing" id="marketing-optin" value=1 />
                                <span>
                                    Please tick this box if you wish to receive marketing information from us. Please see our <a href="https://www.netmatters.co.uk/privacy-policy" style="text-decoration: underline;" target="_blank">Privacy Policy</a> for more information on how we use your data.
                                </span>
                            </label>
                        </div>
                    </fieldset>

                    <button class="btn btn-subscribe" type="submit">Subscribe</button>

                </form> <!-- End of newsletter form/content container -->
            </div> <!-- End of newsletter section div -->

            <?php require_once __DIR__ . "/inc/footer.php"; ?>
        </div> <!-- End of page container -->

        <!-- JavaScript files -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> <!-- jQuery -->
        <script src="js/pushy/js/pushy.min.js"></script> <!-- Pushy side menu -->
        <script src="js/slick/slick.min.js"></script> <!-- Slick image carousel -->
        <script src="js/main.js"></script> <!-- Custom JS -->
    </body>
</html>
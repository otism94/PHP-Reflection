<div id="header-space"></div>

<div id="header-container">
    <header id="topbar">
        <!-- Top Nav (Logo, Main Nav) -->
        <div class="top-nav">

            <!-- Logo -->
            <a href="index.php" class="header-img">
                <img src="img/netmatters-header.png" alt="Netmatters logo">
            </a>

            <!-- Main Nav -->
            <nav class="main-nav">

                <!-- Phone button (xs only) -->
                <div class="nav-call">
                    <a href="tel:01603704020">
                        <i class="fas fa-phone-alt"></i>
                    </a>
                </div>

                <!-- Toggleable search bar (md only) -->
                <div class="nav-search-md">
                    <div class="buttons">
                        <a href="https://support.netmatters.com/" target="_blank" class="btn btn-support">
                            <div class="btn-header-content">
                                <i class="fas fa-mouse"></i>
                                <span>Support</span>
                            </div>
                        </a>
                        <a href="contact.php" class="btn btn-contact">
                            <div class="btn-header-content">
                                <i class="fas fa-paper-plane"></i>
                                <span>Contact</span>
                            </div>
                        </a>
                    </div>
                    <div class="search-bar">
                        <input type="search" class="site-search-md" placeholder="Search..."/>
                    </div>
                    <div class="btn btn-search btn-search-toggle">
                        <i class="fas fa-search"></i>
                    </div>
                </div>

                <!-- Support button (lg only) -->
                <a href="https://support.netmatters.com/" target="_blank" class="btn btn-support nav-support">
                    <div class="btn-header-content">
                        <i class="fas fa-mouse"></i>
                        <span>Support</span>
                    </div>
                </a>

                <!-- Contact button (lg only) -->
                <a href="contact.php" class="btn btn-contact nav-contact">
                    <div class="btn-header-content">
                        <i class="fas fa-paper-plane"></i>
                        <span>Contact</span>
                    </div>
                </a>

                <!-- Search bar (sm and lg only) -->
                <form class="nav-search">
                    <input type="search" class="site-search" placeholder="Search..."/>
                    <div class="btn btn-search">
                        <i class="fas fa-search"></i>
                    </div>
                </form>

                <!-- Hamburger -->
                <button class="btn btn-burger menu-btn hamburger hamburger-spin" tabindex="0" type="button">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                    <span class="burger-label">Menu</span>
                </button>

            </nav> <!-- /.main-nav -->
        </div> <!-- /.top-nav -->

        <!-- Search Bar (xs only) -->
        <form class="nav-search-xs">
            <input type="search" class="site-search-xs" placeholder="Search..."/>
            <div class="btn btn-search-xs">
                <i class="fas fa-search"></i>
            </div>
        </form>

        <!-- Nav Bar (md+) -->
        <nav class="nav-bar">
            <div class="nav-bar-content">
                <?php
                customErrorHandler();
                try {
                    $headerNav = json_decode(file_get_contents("data/nav.json"));
                    if (is_object($headerNav->sections[0])) {
                        foreach ($headerNav->sections as $section) {
                            echo getHeaderNavHtml($section);
                        }
                    }
                } catch (ErrorException $e) {
                    // Show blank section
                }
                restore_error_handler();
                ?>
            </div> <!-- /.nav-bar-content -->
        </nav> <!-- /.nav-bar -->
    </header> <!-- /header-->
</div> <!-- /#header-container -->

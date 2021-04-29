<nav class="pushy pushy-right">
    <div class="pushy-content">

        <!-- Mobile nav menu -->
        <div id="sidebar-nav">

            <!-- Contact Us button -->
            <div id="sidebar-contact" class="sidebar-nav-section">
                <a href="contact.php" class="sidebar-nav-heading">
                    Contact Us
                </a>
            </div>

            <?php
            customErrorHandler();
            try {
                $sideNav = json_decode(file_get_contents("data/nav.json"));
                if (is_object($sideNav->sections[0])) {
                    foreach ($sideNav->sections as $section) {
                        echo getSideNavHtml($section);
                    }
                }
            } catch (ErrorException $e) {
                // Show blank section
            }
            restore_error_handler();
            ?>
        </div> <!-- /#sidebar-nav -->

        <!-- Main sidebar content -->
        <div id="sidebar-content">

            <!-- Training section -->
            <div id="sidebar-training">
                <a href="https://www.netmatters.co.uk/scs-web-developer-course" class="sidebar-heading">
                    <h3>Training</h3>
                </a>
                <ul>
                    <li><a href="https://www.netmatters.co.uk/scs-web-developer-course">Web Developer Course</a></li>
                    <li><a href="https://www.netmatters.co.uk/scs-web-developer-course/become-a-sponsor-of-the-netmatters-scion-scheme">Become a Sponsor</a></li>
                    <li><a href="https://www.netmatters.co.uk/scs-web-developer-course/scion-scheme-frequently-asked-questions">SCS Frequently Asked Questions</a></li>
                </ul>
            </div>

            <!-- Events section -->
            <div id="sidebar-events">
                <a href="https://www.netmatters.co.uk/business-automation-seminar" class="sidebar-heading">
                    <h3>Events</h3>
                </a>
                <ul>
                    <li><a href="https://www.netmatters.co.uk/business-automation-seminar">Business Automation Seminar</a></li>
                </ul>
            </div>

            <!-- Our Company section -->
            <div id="sidebar-company">
                <a href="https://www.netmatters.co.uk/our-culture" class="sidebar-heading">
                    <h3>Our Company</h3>
                </a>
                <ul>
                    <li><a href="https://www.netmatters.co.uk/our-culture">Our Culture</a></li>
                    <li><a href="https://www.netmatters.co.uk/team">Our Team</a></li>
                    <li><a href="https://www.netmatters.co.uk/our-benefits">Our Benefits</a></li>
                    <li><a href="https://www.netmatters.co.uk/it-support-in-great-yarmouth">Our Great Yarmouth Office</a></li>
                </ul>
            </div>

            <!-- Our Work section -->
            <div id="sidebar-work">
                <a class="sidebar-heading" href="https://www.netmatters.co.uk/case-studies">
                    <h3>Our Work</h3>
                </a>
                <ul>
                    <li><a href="https://www.netmatters.co.uk/case-studies">Case Studies</a></li>
                </ul>
            </div>

            <!-- Our Knowledge section -->
            <div id="sidebar-knowledge">
                <a href="https://www.netmatters.co.uk/guides" class="sidebar-heading">
                    <h3>Our Knowledge</h3>
                </a>
                <ul>
                    <li><a href="https://www.netmatters.co.uk/guides">Guides</a></li>
                    <li><a href="https://www.netmatters.co.uk/articles">News</a></li>
                    <li><a href="https://www.netmatters.co.uk/insights">Insights</a></li>
                </ul>
            </div>

            <!-- COVID Risk Assessment section -->
            <div id="sidebar-covid">
                <a href="https://www.netmatters.co.uk/covid-risk-assessments" class="sidebar-heading">
                    <h3>COVID Risk Assessments</h3>
                </a>
            </div>

            <!-- Support section -->
            <div id="sidebar-support">
                <a href="https://support.netmatters.com/" class="sidebar-heading">
                    <h3>Support</h3>
                </a>
            </div>

        </div> <!-- /#sidebar-content -->
    </div> <!-- /.pushy-content -->
</nav> <!-- /nav -->

<div class="site-overlay"></div>

<!-- Newsletter Sign-Up -->
<div class="newsletter-section" id="newsletter">
    <form class="form-newsletter" action="<?php echo $_SERVER["REQUEST_URI"] . "#newsletter" ?>" method="POST" novalidate>
        <h2>Email Newsletter Sign-Up</h2>
        <fieldset class="fieldset-newsletter">

            <!-- Name and email fields -->
            <div class="newsletter-fields">
                <div class="name-field">
                    <label class="signup-label" for="form-newsletter--name">Your Name <span class="required">*</span></label><br/>
                    <input class="signup-field <?php if (isset($invalidNewsletterFields) && in_array("name", $invalidNewsletterFields)) { echo "form-newsletter--invalid"; } ?>" type="text" id="form-newsletter--name" name="name" value="<?php if (isset($newsletterData["name"])) { echo $newsletterData["name"]; } ?>"/>
                </div>

                <div class="email-field">
                    <label class="signup-label" for="form-newsletter--email">Your Email <span class="required">*</span></label><br/>
                    <input class="signup-field <?php if (isset($invalidNewsletterFields) && in_array("email", $invalidNewsletterFields)) { echo "form-newsletter--invalid"; } ?>" type="email" id="form-newsletter--email" name="email" value="<?php if (isset($newsletterData["email"])) { echo $newsletterData["email"]; } ?>"/>
                </div>
            </div>

            <!-- Marketing information opt-in -->
            <div class="marketing-box">
                <label class="marketing-label" for="form-newsletter--marketing-optin">
                    <input type="checkbox" name="accept_marketing" class="marketing-optin" id="form-newsletter--marketing-optin" value=1  <?php if (isset($newsletterData["accept_marketing"]) && $newsletterData["accept_marketing"] == 1) { echo 'checked="checked"'; } ?>/>
                    <span>
                        Please tick this box if you wish to receive marketing information from us. Please see our <a href="https://www.netmatters.co.uk/privacy-policy" style="text-decoration: underline;" target="_blank">Privacy Policy</a> for more information on how we use your data.
                    </span>
                </label>
            </div>
            <input type="hidden" name="action" value="newsletter"/>
            <input type="hidden" name="referrer" value="<?php echo $_SERVER["REQUEST_URI"] ?>#newsletter"/>
        </fieldset>
        <div class="form-newsletter--form-errors">
            <span>Please ensure the following fields are filled in correctly:</span>
            <ul></ul>
        </div>
        <div>
            <button class="btn btn-subscribe" type="submit">Subscribe</button>
            <?php 
            if (isset($newsletterStatusMessage)) {
                echo '<span style="padding-left: 10px; color: #d64541;">' . $newsletterStatusMessage . '</span>';
            }
            ?>
        </div>

    </form> <!-- End of newsletter form/content container -->
</div> <!-- End of newsletter section div -->

<!-- Main Footer -->
<footer>
    <div class="main-footer">

        <!-- Contact Us -->
        <div class="ftr-contact">
            <h4>Contact Us</h4>
            <ul>
                <li>11 Penfold Drive</li>
                <li>Wymondham</li>
                <li>Norfolk</li>
                <li>NR18 0WZ</li>
                <li>&nbsp;</li>
                <li>Tel: <a href="tel:01603704020">01603 70 40 20</a></li>
                <li>Email: <a href="mailto:support@netmatters.com">support@netmatters.com</a></li>
            </ul>
        </div>

        <!-- About -->
        <div class="ftr-about">
            <h4>About Netmatters</h4>
            <ul>
                <li><a href="https://www.netmatters.co.uk/news">News</a></li>
                <li><a href="https://www.netmatters.co.uk/our-careers">Our Careers</a></li>
                <li><a href="https://www.netmatters.co.uk/team">Our Team</a></li>
                <li><a href="https://www.netmatters.co.uk/office-tour">Our Office Tour</a></li>
                <li><a href="https://www.netmatters.co.uk/privacy-policy">Privacy Policy</a></li>
                <li><a href="https://www.netmatters.co.uk/cookie-policy">Cookie Policy</a></li>
                <li><a href="https://www.netmatters.co.uk/terms-and-conditions">Terms & Conditions</a></li>
                <li><a href="https://www.netmatters.co.uk/terms-and-conditions/uk-domains">UK Domains</a></li>
            </ul>
        </div>

        <!-- Website -->
        <div class="ftr-website">
            <h4>Website</h4>
            <ul>
                <li><a href="https://www.netmatters.co.uk/sitemap.xml">Sitemap</a></li>
                <li>&copy; Copyright Netmatters Ltd. 2021</li>
                <li>All rights reserved</li>
            </ul>
        </div>

        <!-- Social Media -->
        <div class="ftr-socmed">
            <h4>Social Media</h4>
            <div class="social-links">
                <a class="facebook" href="https://en-gb.facebook.com/netmatters/" target="_blank">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <div class="grid-gap"></div>
                <a class="twitter" href="https://twitter.com/netmattersltd" target="_blank">
                    <i class="fab fa-twitter"></i>
                </a>
                <a class="linkedin" href="https://www.linkedin.com/company/netmatters-ltd/" target="_blank">
                    <i class="fab fa-linkedin-in"></i>
                </a>
                <div class="grid-gap"></div>
                <div class="empty-social"></div>
            </div>
        </div>

    </div> <!-- End of main footer div -->

    <!-- Partners  -->
    <div class="partners-section">
        <div class="partners-list">

            <!-- Google -->
            <div class="partner-google">
                <a href="https://www.google.com/partners/agency?id=7604891478" target="_blank" style="cursor: initial;">
                    <img src="img/partners/google.png" alt="Google Partner certification"/>
                </a>
            </div>

            <!-- Microsoft -->
            <div class="partner-microsoft">
                <img src="img/partners/microsoft.jpeg" alt="Silver Microsoft Partner certification"/>
            </div>

            <!-- Future50 -->
            <div class="partner-future50">
                <img src="img/partners/future50.jpeg" alt="Future50 Member certification"/>
                <img src="img/partners/future50-hover.jpeg" alt="Future50 Member certification"/>
            </div>

            <!-- QMS -->
            <div class="partner-qms">
                <img src="img/partners/qms.jpeg" alt="QMS ISO 27001 Registered certification"/>
                <img src="img/partners/qms-hover.jpeg" alt="QMS ISO 27001 Registered certification"/>
            </div>

            <!-- Norfolk Carbon Charter -->
            <div class="partner-ncc">
                <img src="img/partners/carbon.jpeg" alt="Norfolk Carbon Charter Silver certification"/>
                <img src="img/partners/carbon-hover.jpeg" alt="Norfolk Carbon Charter Silver certification"/>
            </div>

        </div> <!-- /.partners-section -->
    </div> <!-- /.partners-list -->
</footer> <!-- /footer -->

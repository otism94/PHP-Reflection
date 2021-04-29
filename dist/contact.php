<?php
/**
 * PHP Reflection
 * Newly-created Netmatters contact page, based on the original site
 * 
 * @author Otis Moorman <otis.moorman@netmatters-scs.com>
 * @link https://github.com/otism94/PHP-Reflection
 */

$page_title = "Contact Us";
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
    <div id="container" class="contact-us">
        
        <?php include __DIR__ . "/inc/header.php"; ?>

        <div id="contact-us--banner">
            <div id="contact-us--banner-content">
                <a href="index.php">Home</a><span>How Can We Help You?</span>
            </div>
        </div>

        <div id="contact-us--heading">
            <h1>How Can We Help You?</h1>
        </div>

        <section id="contact-us--contact">
            <div id="contact-us--contact-content">
                <div id="contact-us--details">
                    <p><strong>Call us on:</strong><br/><a href="tel:01603704020" class="details-phone">01603 70 40 20</a></p>
                    <p><strong>Email us on:</strong><br/><a href="mailto:sales@netmatters.com" class="details-email">sales@netmatters.com</a></p>
                    <p><strong>Call us at our Gorleston branch on:</strong><br/><a href="tel:01493603204" class="details-phone">01493 603204</a></p>
                    <p class="details-hours"><strong>Business hours:</strong></p>
                    <p class="details-hours"><strong>Monday - Friday 07:00 - 18:00</strong></p>
                    <p id="details-oohq"><strong>Out of Hours IT Support <i class="fas fa-chevron-down"></i></strong></p>
                    <div id="details-ooha">
                        <p>Netmatters IT are offering an Out of Hours service for Emergency and Critical tasks.</p>
                        <p id="details-ooha--hours">
                            <strong>Monday - Friday 18:00 - 22:00 Saturday 08:00 - 16:00</strong><br/>
                            <strong>Sunday 10:00 - 18:00</strong>
                        </p>
                        <p>To log a critical task, you will need to call our main line number and select Option 2 to leave an Out of Hours voicemail. A technician will contact you on the number provided within 45 minutes of your call.</p>
                    </div>
                </div>
                
                <div id="contact-us--form">
                    <form class="contact-form" id="contact-form" method="POST" action="contact.php#contact-form" novalidate>
                        <div class="contact-form--group">
                            <label for="contact-form--name" class="contact-form--required">Your Name</label>
                            <input type="text" name="name" value="<?php if (isset($contactData["name"])) { echo $contactData["name"]; } ?>" id="contact-form--name" class="contact-form--input <?php if (isset($invalidContactFields) && in_array("name", $invalidContactFields)) { echo "contact-form--invalid"; } ?>"/>
                        </div>
                        <div class="contact-form--group">
                            <label for="contact-form--email" class="contact-form--required">Your Email</label>
                            <input type="email" name="email" value="<?php if (isset($contactData["email"])) { echo $contactData["email"]; } ?>" id="contact-form--email" class="contact-form--input <?php if (isset($invalidContactFields) && in_array("email", $invalidContactFields)) { echo "contact-form--invalid"; } ?>"/>
                        </div>
                        <div class="contact-form--group">
                            <label for="contact-form--phone" class="contact-form--required">Your Telephone Number</label>
                            <input type="text" name="phone" value="<?php if (isset($contactData["phone"])) { echo $contactData["phone"]; } ?>" id="contact-form--phone" class="contact-form--input <?php if (isset($invalidContactFields) && in_array("phone", $invalidContactFields)) { echo "contact-form--invalid"; } ?>"/>
                        </div>
                        <div class="contact-form--group">
                            <label for="contact-form--subject" class="contact-form--required">Subject</label>
                            <input type="text" name="subject" value="<?php if (isset($contactData["subject"])) { echo $contactData["subject"]; } ?>" id="contact-form--subject" class="contact-form--input <?php if (isset($invalidContactFields) && in_array("subject", $invalidContactFields)) { echo "contact-form--invalid"; } ?>"/>
                        </div>
                        <div class="contact-form--group">
                            <label for="contact-form--message" class="contact-form--required">Message</label>
                            <textarea name="message" id="contact-form--message" class="contact-form--textarea <?php if (isset($invalidContactFields) && in_array("message", $invalidContactFields)) { echo "contact-form--invalid"; } ?>"><?php if (isset($contactData["message"])) { echo $contactData["message"]; } ?></textarea>
                        </div>
                        <div class="marketing-box">
                            <label class="marketing-label" for="contact-form--marketing-optin">
                                <input type="checkbox" name="accept_marketing" class="marketing-optin" id="contact-form--marketing-optin" value=1 <?php if (isset($contactData["accept_marketing"]) && $contactData["accept_marketing"] == 1) { echo 'checked="checked"'; } ?>/>
                                <span>
                                    Please tick this box if you wish to receive marketing information from us. Please see our <a href="https://www.netmatters.co.uk/privacy-policy" style="text-decoration: underline;" target="_blank">Privacy Policy</a> for more information on how we use your data.
                                </span>
                            </label>
                        </div>
                        <input type="hidden" name="action" value="contact"/>
                        <input type="hidden" name="referrer" value="<?php echo $_SERVER["REQUEST_URI"] ?>#contact-form"/>
                        <div id="contact-us--form-errors">
                            <span>Please ensure the following fields are filled in correctly:</span>
                            <ul></ul>
                        </div>
                        <div>
                            <button class="btn btn-subscribe" type="submit" value="Send Enquiry">Send Enquiry</button>
                            <?php 
                            if (isset($contactStatusMessage)) {
                                echo '<span style="padding-left: 10px; color: #d64541;">' . $contactStatusMessage. '</span>';
                            }
                            ?>
                        </div>
                    </form>
                </div>
            </div>
        </section>
                
    <?php include __DIR__ . "/inc/footer.php"; ?>

    </div> <!-- End of page container -->

    <?php include __DIR__ . "/inc/scripts.php"; ?>
</body>
</html>
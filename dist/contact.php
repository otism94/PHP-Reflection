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
require_once __DIR__ . "/inc/head.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["action"] === "contact") {
    // Add each form field to associative array
    $contactData["name"] = trim(filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING));
    $contactData["email"] = trim(filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL));
    $contactData["phone"] = trim(filter_input(INPUT_POST, "phone", FILTER_SANITIZE_STRING));
    $contactData["subject"] = trim(filter_input(INPUT_POST, "subject", FILTER_SANITIZE_SPECIAL_CHARS));
    $contactData["message"] = trim(filter_input(INPUT_POST, "message", FILTER_SANITIZE_SPECIAL_CHARS));
    $contactData["accept_marketing"] = trim(filter_input(INPUT_POST, "accept_marketing", FILTER_SANITIZE_NUMBER_INT));

    // If no post data was received from checkbox, set its value to 0 (false)
    if (empty($contactData["accept_marketing"])) {
        $contactData["accept_marketing"] = 0;
    }

    // Create enquiry and store return value
    $response = createEnquiry($contactData);

    // If createEnquiry returns an array, form is invalid
    if (is_array($response)) {
        $invalidContactFields = $response;
    // If createEnquiry returns true, form was submitted
    } elseif ($response) {
        header("Location: thanks.php");
    // Form failed to submit for any reason
    } else {
        $contactStatusMessage = "Your enquiry failed to send. Please try again.";
    }

} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["action"] === "newsletter") {
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
    <div id="container" class="contact-us">
        
        <?php require_once __DIR__ . "/inc/header.php"; ?>

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
                        <input type="hidden" name="referrer" value="<?php $_SERVER["REQUEST_URI"] ?> . #contact-form"/>
                        <div id="contact-us--form-errors">
                            <span>Please ensure the following fields are filled in correctly:</span>
                            <ul></ul>
                        </div>
                        <button class="btn btn-subscribe" type="submit" value="Send Enquiry">Send Enquiry</button>
                        <?php 
                        if (isset($contactStatusMessage)) {
                            echo "<span>$contactStatusMessage</span>";
                        }
                        ?>
                    </form>
                </div>
            </div>
        </section>
                
        <?php 
        require_once __DIR__ . "/inc/footer.php"; 
        ?>

    </div> <!-- End of page container -->

    <?php require_once __DIR__ . "/inc/scripts.php"; ?>
</body>
</html>
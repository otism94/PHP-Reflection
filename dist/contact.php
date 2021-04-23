<?php
require_once __DIR__ . "/inc/functions.php";
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["action"] === "contact") {
    $name = trim(filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING));
    $email = trim(filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL));
    $phone = trim(filter_input(INPUT_POST, "phone", FILTER_SANITIZE_STRING));
    $subject = trim(filter_input(INPUT_POST, "subject", FILTER_SANITIZE_SPECIAL_CHARS));
    $message = trim(filter_input(INPUT_POST, "message", FILTER_SANITIZE_SPECIAL_CHARS));
    $accept_marketing = trim(filter_input(INPUT_POST, "accept_marketing", FILTER_SANITIZE_NUMBER_INT));

    require_once __DIR__ . "/inc/classes.php";

    $enquiry = new ContactSubmission($name, $email, $phone, $subject, $message, $accept_marketing);
    $invalidFields = [];

    if ($enquiry->hasEmptyFields()) {
        $invalidFields = $enquiry->hasEmptyFields();
    }

    if (!in_array("email", $invalidFields) && !$enquiry->isValidEmail()) {
        $invalidFields[] = "email";
    }

    if (!in_array("phone", $invalidFields) && !$enquiry->isValidPhone()) {
        $invalidFields[] = "phone";
    }

    if (empty($invalidFields) && submitEnquiry($enquiry)) {
        // Redirect to thanks page
    } elseif (!empty($invalidFields)) {
        // JS will display invalid field info
    } else {
        echo "Failed to send enquiry.";
    }

} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["action"] === "newsletter") {
    // Newsletter sign-up
}
?>

<!DOCTYPE html>
<html lang="en-gb">

    <?php 
    $page_title = "Contact Us";
    
    require_once __DIR__ . "/inc/head.php";
    ?>

    <body>

        <?php 
        require_once __DIR__ . "/inc/cookies.php";
        require_once __DIR__ . "/inc/sidemenu.php";
        ?>

        <div id="container" class="contact-us"> <!-- Page container -->
            
            <?php require_once __DIR__ . "/inc/header.php"; ?>

<!-- ############################################
    Banner (sm+ viewports only)
################################################# -->
            <div id="contact-us--banner">
                <span><a href="index.php">Home</a> / How Can We Help You?</span>
            </div>

<!-- ############################################
    Contact
################################################# -->
            <div id="contact-us--heading">
                <h1>How Can We Help You?</h1>
            </div>

            <section id="contact-us--contact">
                <div id="contact-us--contact-content">
                    <div id="contact-us--details">
                        <p>
                            <strong>Call us on:</strong><br/>
                            <a href="tel:01603704020" class="details-phone">01603 70 40 20</a>
                        </p>

                        <p>
                            <strong>Email us on:</strong><br/>
                            <a href="mailto:sales@netmatters.com" class="details-email">sales@netmatters.com</a>
                        </p>

                        <p>
                            <strong>Call us at our Gorleston branch on:</strong><br/>
                            <a href="tel:01493603204" class="details-phone">01493 603204</a>
                        </p>

                        <p class="details-hours">
                            <strong>Business hours:</strong>
                        </p>

                        <p class="details-hours">
                            <strong>Monday - Friday 07:00 - 18:00</strong>
                        </p>

                        <p id="details-oohq">
                            <strong>Out of Hours IT Support <i class="fas fa-chevron-down"></i></strong>
                        </p>

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
                        <form class="contact-form" id="contact-form" method="POST" action="contact.php#contact-form">
                            <div class="contact-form--group">
                                <label for="name" class="contact-form--required">Your Name</label>
                                <input type="text" name="name" value="<?php if (isset($name)) { echo $name; } ?>" id="contact-form--name" class="contact-form--input <?php if (isset($invalidFields) && in_array("name", $invalidFields)) { echo "contact-form--invalid"; } ?>"/>
                            </div>
                            <div class="contact-form--group">
                                <label for="email" class="contact-form--required">Your Email</label>
                                <input type="email" name="email" value="<?php if (isset($email)) { echo $email; } ?>" id="contact-form--email" class="contact-form--input <?php if (isset($invalidFields) && in_array("email", $invalidFields)) { echo "contact-form--invalid"; } ?>"/>
                            </div>
                            <div class="contact-form--group">
                                <label for="phone" class="contact-form--required">Your Telephone Number</label>
                                <input type="text" name="phone" value="<?php if (isset($phone)) { echo $phone; } ?>" id="contact-form--phone" class="contact-form--input <?php if (isset($invalidFields) && in_array("phone", $invalidFields)) { echo "contact-form--invalid"; } ?>"/>
                            </div>
                            <div class="contact-form--group">
                                <label for="subject" class="contact-form--required">Subject</label>
                                <input type="text" name="subject" value="<?php if (isset($subject)) { echo $subject; } ?>" id="contact-form--subject" class="contact-form--input <?php if (isset($invalidFields) && in_array("subject", $invalidFields)) { echo "contact-form--invalid"; } ?>"/>
                            </div>
                            <div class="contact-form--group">
                                <label for="message" class="contact-form--required">Message</label>
                                <textarea name="message" id="contact-form--message" class="contact-form--textarea <?php if (isset($invalidFields) && in_array("subject", $invalidFields)) { echo "contact-form--invalid"; } ?>"><?php if (isset($message)) { echo $message; } ?></textarea>
                            </div>
                            <div class="marketing-box">
                                <label class="marketing-label" for="marketing-optin">
                                    <input type="checkbox" name="accept_marketing" id="marketing-optin" value=1/>
                                    <span>
                                        Please tick this box if you wish to receive marketing information from us. Please see our <a href="https://www.netmatters.co.uk/privacy-policy" style="text-decoration: underline;" target="_blank">Privacy Policy</a> for more information on how we use your data.
                                    </span>
                                </label>
                            </div>
                            <input type="hidden" name="action" value="contact"/>
                            <div id="contact-us--form-errors">
                                <span>Please ensure the following fields are filled in correctly:</span>
                                <ul></ul>
                            </div>
                            <button class="btn btn-subscribe" type="submit" value="Send Enquiry">Send Enquiry</button>
                        </form>
                    </div>
                </div>
            </section>

            <?php require_once __DIR__ . "/inc/footer.php"; ?>
        </div> <!-- End of page container -->

        <!-- JavaScript files -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> <!-- jQuery -->
        <script src="js/pushy/js/pushy.min.js"></script> <!-- Pushy side menu -->
        <script src="js/slick/slick.min.js"></script> <!-- Slick image carousel -->
        <script src="js/main.js"></script> <!-- Custom JS -->
    </body>
</html>
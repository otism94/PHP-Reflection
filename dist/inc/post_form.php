<?php

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
        $newsletterStatusMessage = "You are already subscribed.";
    // If createSubscription returns true, form was submitted
    } elseif ($response) {
        header("Location: thanks.php");
    // Form failed to submit for any reason
    } else {
        $newsletterStatusMessage = "Failed to register subscription. Please try again.";
    }
}

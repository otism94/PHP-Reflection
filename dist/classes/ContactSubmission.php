<?php

/**
 * Contact form data class
 * @see FormSubmission.php
 * @property string|int
 */
class ContactSubmission extends FormSubmission
{
    protected $name, $email, $phone, $subject, $message, $accept_marketing;

    /**
     * Checks whether the supplied phone number is valid
     * Tested against a regular expression
     * @return bool Is (not) valid
     */
    public function isValidPhone()
    {
        $regEx = "/^(((\+44\s?\d{4}|\(?0\d{4}\)?)\s?\d{3}\s?\d{3})|((\+44\s?\d{3}|\(?0\d{3}\)?)\s?\d{3}\s?\d{4})|((\+44\s?\d{2}|\(?0\d{2}\)?)\s?\d{4}\s?\d{4}))(\s?\#(\d{4}|\d{3}))?$/";

        if (!preg_match($regEx, $this->phone) || strlen($this->phone) < 11) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Insert contact form data into database via prepared statement
     * Implementation of abstract method from FormSubmission
     * @return bool Success/failure
     */
    public function submitForm()
    {
        require __DIR__ . "/../inc/connection.php";

        try {
            $stmt = $db->prepare("INSERT INTO contact(name, email, phone, subject, message, accept_marketing) VALUES(:name, :email, :phone, :subject, :message, :accept_marketing)");
            $stmt->bindValue(":name", $this->getValue("name"), PDO::PARAM_STR);
            $stmt->bindValue(":email", $this->getValue("email"), PDO::PARAM_STR);
            $stmt->bindValue(":phone", $this->getValue("phone"), PDO::PARAM_STR);
            $stmt->bindValue(":subject", $this->getValue("subject"), PDO::PARAM_STR);
            $stmt->bindValue(":message", $this->getValue("message"), PDO::PARAM_STR);
            $stmt->bindValue(":accept_marketing", $this->getValue("accept_marketing"), PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            return false;
        }

        return true;
    }
}

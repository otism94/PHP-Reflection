<?php

/**
 * Newsletter subscription data class
 * @see FormSubmission
 * @property string|int
 */
class NewsletterSubmission extends FormSubmission
{
    protected $name, $email, $accept_marketing;

    /**
     * Checks whether the supplied email is already subscribed
     * @return object|bool Error object, or subscription status
     */
    public function isAlreadySubscribed()
    {
        require __DIR__ . "/../inc/connection.php";

        try {
            $stmt = $db->prepare("SELECT email FROM newsletter WHERE email = :email");
            $stmt->bindValue(":email", $this->getValue("email"), PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            return $e;
        }

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if (isset($result["email"]) && $result["email"] === $this->getValue("email")) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Insert newsletter sign-up data into database via prepared statement
     * Implementation of abstract method from FormSubmission
     * @return bool Success/failure
     */
    function submitForm() {
        require __DIR__ . "/../inc/connection.php";

        try {
            $stmt = $db->prepare("INSERT INTO newsletter(name, email, accept_marketing) VALUES(:name, :email, :accept_marketing)");
            $stmt->bindValue(":name", $this->getValue("name"), PDO::PARAM_STR);
            $stmt->bindValue(":email", $this->getValue("email"), PDO::PARAM_STR);
            $stmt->bindValue(":accept_marketing", $this->getValue("accept_marketing"), PDO::PARAM_INT);
            $stmt->execute();

        } catch (Exception $e) {
            return false;
        }

        return true;
    }
}

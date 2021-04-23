<?php

class ContactSubmission
{
    private $name, $email, $phone, $subject, $message;

    /**
     * Create new ContactSubmission object
     * @param string Form POST data
     */
    public function __construct($name, $email, $phone, $subject, $message, $accept_marketing)
    {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->subject = $subject;
        $this->message = $message;
        $this->accept_marketing = $accept_marketing;
    }

    /**
     * Checks if each field is empty, if so adds it to an array
     * @return array Array of empty fields, or an empty array
     */
    public function hasEmptyFields()
    {
        $emptyFields = [];

        if (empty($this->name)) {
            $emptyFields[] = "name";
        }

        if (empty($this->email)) {
            $emptyFields[] = "email";
        }

        if (empty($this->phone)) {
            $emptyFields[] = "phone";
        }

        if (empty($this->subject)) {
            $emptyFields[] = "subject";
        }

        if (empty($this->message)) {
            $emptyFields[] = "message";
        }

        return $emptyFields;
    }

    /**
     * Checks whether the supplied email is valid
     * @return bool Is (not) valid
     */
    public function isValidEmail()
    {
        return filter_var($this->email, FILTER_VALIDATE_EMAIL);
    }


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
     * Check whether POST data was received for the marketing checkbox
     * If so, it was checked. If not, it was not checked.
     * @return int True/false (as integers for SQL purposes)
     */
    public function acceptMarketing()
    {
        if (isset($this->accept_marketing)) {
            return 1;
        } else {
            return 0;
        }
    }

    /**
     * @return string Name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string Email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return string Phone number
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @return string Subject
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @return string Message
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @return int Marketing preference
     */
    public function getMarketing()
    {
        return $this->accept_marketing;
    }
}
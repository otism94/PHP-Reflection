<?php

/**
 * Form data abstract class
 * @abstract
 */
abstract class FormSubmission
{
    abstract protected function submitForm();

    /**
     * Instantiate object from form field data
     * @param array Form POST data
     */
    public function __construct($data)
    {
        foreach ($data as $field => $input) {
            $this->{$field} = $input;
        }
    }

    /**
     * Checks if each field is empty, if so adds it to an array
     * @return array Array of empty fields (true), or an empty array (false)
     */
    public function hasEmptyFields()
    {
        $emptyFields = [];

        foreach ($this as $field => $value) {
            if (empty($value) && $value !== 0) {
                $emptyFields[] = $field;
            }
        }

        return $emptyFields;
    }

    /**
     * Checks whether the supplied email is valid
     * @return bool Email is (not) valid
     */
    public function isValidEmail()
    {
        return filter_var($this->email, FILTER_VALIDATE_EMAIL);
    }

    /**
     * Returns value of given property
     * @param string Name of property
     * @return string|int Value of property
     */
    public function getValue($prop)
    {
        return $this->{$prop};
    }
}

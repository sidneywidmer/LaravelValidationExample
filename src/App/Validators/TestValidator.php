<?php namespace App\Validators;

class TestValidator extends AbstractLaravelValidator {

    /**
     * Validation rules
     *
     * @var Array
     */
    protected $rules = array(
        'name' => 'max:10',
        'email' => 'required|email'
    );

    /**
     * Custom Validation Messages
     *
     * @var Array
     */
    protected $messages = array(
        'name.max' => 'Whoa there, a name longer than 10 characters is little bit weird :)',
    );
}
<?php

class ValidationTest extends \PHPUnit_Framework_TestCase
{
    public function testValidatorPasses()
    {
        $validator = $this->getValidator();

        $passes = $validator->with(array('email' => 'valid@email.com'))->passes();

        $this->assertTrue($passes);
    }

    public function testValidatorFails()
    {
        $validator = $this->getValidator();

        $passes = $validator->with(array('email' => 'inval@id'))->passes();

        $this->assertFalse($passes);
    }

    public function testValidatorErrorsFromLangFile()
    {
        $validator = $this->getValidator();

        $passes = $validator->with(array('email' => 'inval@id'))->passes();
        $message = $validator->errors()->first();
        $expected = 'The email must be a valid email address.';

        $this->assertEquals($expected, $message);
    }

    public function testValidatorCustomErrors()
    {
        $validator = $this->getValidator();

        $passes = $validator->with(array('email' => 'inval@id', 'name' => 'AreaaaaaalllyylongName'))->passes();
        $message = $validator->errors()->first('name');
        $expected = 'Whoa there, a name longer than 10 characters is little bit weird :)';

        $this->assertEquals($expected, $message);
    }

    protected function getValidator()
    {
        global $app;

        return $app->make('App\Validators\TestValidator');
    }
}
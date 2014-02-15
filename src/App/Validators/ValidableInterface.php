<?php namespace App\Validators;

interface ValidableInterface {

    /**
     * Add data to validate against
     *
     * @param  array  $input
     * @return App\Validators\ValidableInterface   $this
     */
    public function with(array $input);

    /**
     * Test if validation passes
     *
     * @return boolean
     */
    public function passes();

    /**
     * Retreive validation errors
     *
     * @return array
     */
    public function errors();

}
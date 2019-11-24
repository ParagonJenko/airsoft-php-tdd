<?php
require("vendor/autoload.php");

use PHPUnit\Framework\TestCase;

class UserTest extends PHPUnit\Framework\TestCase
{
    protected $user;

    public function setUp() : void
    {
        $this->user = new \App\Models\User;
    }

    /** @test */
    public function can_set_email()
    {
        $email_to_set = "test@test.com";
        $this->user->setEmail($email_to_set);
        $this->assertEquals($this->user->getEmail(), $email_to_set);
    }

    /** @test */
    public function can_get_email()
    {
        $email_to_set = "test@test.com";
        $this->user->setEmail($email_to_set);
        $this->assertEquals($this->user->getEmail(), $email_to_set);
    }

    /** @test */
    public function email_is_trimmed()
    {
        $email_to_set = "           test@test.com          ";
        $this->user->setEmail($email_to_set);
        $this->assertEquals($this->user->getEmail(), "test@test.com");
    }

    /** @test */
    public function email_is_valid()
    {
        $email_to_set = "test@test.com";
        $this->user->setEmail($email_to_set);
        $this->assertSame($this->user->getEmail(), filter_var($this->user->getEmail(), FILTER_VALIDATE_EMAIL));
    }
}

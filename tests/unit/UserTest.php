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

    /**
    *
    *
    *
    */
    /** @test */
    public function can_set_and_get_email()
    {
        $email_to_set = "test@test.com";
        $this->user->setEmail($email_to_set);
        $this->assertEquals($this->user->getEmail(), "test@test.com");
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

    /**
    *
    *
    *
    */
    /** @test */
    public function can_set_and_get_forename()
    {
        $forename_to_set = "Test";
        $this->user->setForename($forename_to_set);
        $this->assertEquals($this->user->getForename(), "Test");
    }

    /** @test */
    public function forename_is_trimmed()
    {
        $forename_to_set = "           Tes   t          ";
        $this->user->setForename($forename_to_set);
        $this->assertEquals($this->user->getForename(), "Test");
    }

    /** @test */
    public function forename_is_a_string()
    {
        $forename_to_set = "Test";
        $this->user->setForename($forename_to_set);
        $this->assertIsNotNumeric($this->user->getForename());
        $this->assertIsString($this->user->getForename());
    }

    /**
    *
    *
    *
    */
    /** @test */
    public function can_set_and_get_surname()
    {
        $surname_to_set = "Example";
        $this->user->setSurname($surname_to_set);
        $this->assertEquals($this->user->getSurname(), "Example");
    }

    /** @test */
    public function surname_is_trimmed()
    {
        $surname_to_set = "           Exam   ple          ";
        $this->user->setSurname($surname_to_set);
        $this->assertEquals($this->user->getSurname(), "Example");
    }

    /** @test */
    public function surname_is_a_string()
    {
        $surname_to_set = "Example";
        $this->user->setSurname($surname_to_set);
        $this->assertIsNotNumeric($this->user->getSurname());
        $this->assertIsString($this->user->getSurname());
    }

    /**
    *
    *
    *
    */
    /** @test */
    public function can_get_full_name()
    {
        $forename_to_set = "       Test";
        $surname_to_set = "Example          ";

        $this->user->setForename($forename_to_set);
        $this->user->setSurname($surname_to_set);

        $this->assertEquals($this->user->getFullName(), "Test Example");
    }

    /**
    *
    *
    *
    */
    /** @test */
    public function can_set_password()
    {
        $password_to_set = "12345";

        $this->user->setHashedPassword($password_to_set);

        $this->assertTrue(password_verify("12345", $this->user->getHashedPassword()));
    }

    /**
    * @test
    */
    public function password_must_be_over_four_characters()
    {
        $this->expectException(App\Exceptions\NotEnoughCharactersException::class);
        $password_to_set = "123";

        $this->user->checkPasswordLength($password_to_set);
    }
}

<?php
use \AcceptanceTester;

use \Illuminate\Support\Facades;

class RegisterCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }

    public function testRegisterValid(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->amOnPage('/auth/register');

        $I->fillField(['name' => 'username'], 'testingUser');
        $I->fillField(['name' => 'email'], 'testingUser@gmail.com');
        $I->fillField(['name' => 'password'], 'testingUserPass');
        $I->fillField(['name' => 'password_confirmation'], 'testingUserPass');
        $I->fillField(['name' => 'publisher_id'], 'pub-1234567891234567');
        $I->click(['id' => 'submit-register']);

        $I->seeInTitle('Thanks for Registering');
        $I->see('testingUser', ['class'=>'btn-default']); //the user has been logged in
        $I->seeInDatabase('users', array('username' => 'testingUser', 'email' => 'testingUser@gmail.com', 'publisher_id' => 'pub-1234567891234567'));

    }

    public function testRegisterInvalidUsername(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->amOnPage('/auth/register');

        $I->fillField(['name' => 'username'], 'user1');
        $I->fillField(['name' => 'email'], 'garbage100@gmail.com');
        $I->fillField(['name' => 'password'], 'testingUserPass');
        $I->fillField(['name' => 'password_confirmation'], 'testingUserPass');
        $I->fillField(['name' => 'publisher_id'], 'pub-1234567891234567');
        $I->click(['id' => 'submit-register']);

        $I->seeElement(['class'=>'alert-danger']); //see warning message

        $I->fillField(['name' => 'username'], 'thisIsAVeryLongUserNameThatIsNotAllowedInTheDatabaseItIsAllowedToBeVeryLong');
        $I->fillField(['name' => 'email'], 'garbage100@gmail.com');
        $I->fillField(['name' => 'password'], 'testingUserPass');
        $I->fillField(['name' => 'password_confirmation'], 'testingUserPass');
        $I->fillField(['name' => 'publisher_id'], 'pub-1234567891234567');
        $I->click(['id' => 'submit-register']);

        $I->seeElement(['class'=>'alert-danger']); //see warning message

        $I->fillField(['name' => 'username'], '');
        $I->fillField(['name' => 'email'], 'garbage100@gmail.com');
        $I->fillField(['name' => 'password'], 'testingUserPass');
        $I->fillField(['name' => 'password_confirmation'], 'testingUserPass');
        $I->fillField(['name' => 'publisher_id'], 'pub-1234567891234567');
        $I->click(['id' => 'submit-register']);

        $I->seeElement(['class'=>'alert-danger']); //see warning message
    }

    public function testRegisterInvalidEmail(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->amOnPage('/auth/register');

        $I->fillField(['name' => 'username'], 'user1');
        $I->fillField(['name' => 'email'], 'email1@gmail.com'); //already taken
        $I->fillField(['name' => 'password'], 'testingUserPass');
        $I->fillField(['name' => 'password_confirmation'], 'testingUserPass');
        $I->fillField(['name' => 'publisher_id'], 'pub-1234567891234567');
        $I->click(['id' => 'submit-register']);

        $I->seeElement(['class'=>'alert-danger']); //see warning message

        $I->fillField(['name' => 'username'], 'user1');
        $I->fillField(['name' => 'email'], 'thisIsAVeryLongEmailThatIsNotAllowedInTheDatabase'); //too long
        $I->fillField(['name' => 'password'], 'testingUserPass');
        $I->fillField(['name' => 'password_confirmation'], 'testingUserPass');
        $I->fillField(['name' => 'publisher_id'], 'pub-1234567891234567');
        $I->click(['id' => 'submit-register']);

        $I->seeElement(['class'=>'alert-danger']); //see warning message

        $I->fillField(['name' => 'username'], 'user1');
        $I->fillField(['name' => 'email'], ''); //too short
        $I->fillField(['name' => 'password'], 'testingUserPass');
        $I->fillField(['name' => 'password_confirmation'], 'testingUserPass');
        $I->fillField(['name' => 'publisher_id'], 'pub-1234567891234567');
        $I->click(['id' => 'submit-register']);

        $I->seeElement(['class'=>'alert-danger']); //see warning message
    }

    public function testRegisterInvalidPassword(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->amOnPage('/auth/register');

        $I->fillField(['name' => 'username'], 'user1');
        $I->fillField(['name' => 'email'], 'testyemail@gmail.com');
        $I->fillField(['name' => 'password'], ''); //too short
        $I->fillField(['name' => 'password_confirmation'], '');
        $I->fillField(['name' => 'publisher_id'], 'pub-1234567891234567');
        $I->click(['id' => 'submit-register']);

        $I->seeElement(['class'=>'alert-danger']); //see warning message

        $I->fillField(['name' => 'username'], 'user1');
        $I->fillField(['name' => 'email'], 'testyemail@gmail.com');
        $I->fillField(['name' => 'password'], 'thisIsAVeryLongPasswordThatIsNotAllowedInTheDatabase'); //too long
        $I->fillField(['name' => 'password_confirmation'], 'thisIsAVeryLongPasswordThatIsNotAllowedInTheDatabase');
        $I->fillField(['name' => 'publisher_id'], 'pub-1234567891234567');
        $I->click(['id' => 'submit-register']);

        $I->seeElement(['class'=>'alert-danger']); //see warning message

        $I->fillField(['name' => 'username'], 'user1');
        $I->fillField(['name' => 'email'], 'testyemail@gmail.com');
        $I->fillField(['name' => 'password'], '123456'); //not matching
        $I->fillField(['name' => 'password_confirmation'], '654321');
        $I->fillField(['name' => 'publisher_id'], 'pub-1234567891234567');
        $I->click(['id' => 'submit-register']);

        $I->seeElement(['class'=>'alert-danger']); //see warning message
    }

    public function testRegisterInvalidPublisherId(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->amOnPage('/auth/register');

        $I->fillField(['name' => 'username'], 'user1');
        $I->fillField(['name' => 'email'], 'testyemail@gmail.com');
        $I->fillField(['name' => 'password'], '123456'); //too short
        $I->fillField(['name' => 'password_confirmation'], '123456');
        $I->fillField(['name' => 'publisher_id'], 'pub-12345678912345678'); //too long
        $I->click(['id' => 'submit-register']);

        $I->seeElement(['class'=>'alert-danger']); //see warning message

        $I->fillField(['name' => 'username'], 'user1');
        $I->fillField(['name' => 'email'], 'testyemail@gmail.com');
        $I->fillField(['name' => 'password'], 'thisIsAVeryLongPasswordThatIsNotAllowedInTheDatabase'); //too long
        $I->fillField(['name' => 'password_confirmation'], 'thisIsAVeryLongPasswordThatIsNotAllowedInTheDatabase');
        $I->fillField(['name' => 'publisher_id'], 'pub-123456789123456'); //too short
        $I->click(['id' => 'submit-register']);

        $I->seeElement(['class'=>'alert-danger']); //see warning message
    }

    //TODO: test email registration

}

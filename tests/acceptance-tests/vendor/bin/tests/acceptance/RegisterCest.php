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
        $I->seeInDatabase('users', array('username' => 'testingUser', 'email' => 'testingUser@gmail.com', 'publisher_id' => 'pub-1234567891234567', 'status' => 'unconfirmed'));
        $confirmationCode = $I->grabFromDatabase('users', 'confirmation_code', array('username' => 'testingUser'));

        //confirm the user
        $I->amOnPage('/verify/'.$confirmationCode);
        $I->seeInTitle('Account Verified');
        $I->see('You\'re all set!');
        $I->seeInDatabase('users', array('username' => 'testingUser', 'email' => 'testingUser@gmail.com', 'publisher_id' => 'pub-1234567891234567', 'status' => 'good'));
    }

    public function testRegisterInvalidUsername(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->amOnPage('/auth/register');

        //already taken
        $I->fillField(['name' => 'username'], 'MudMatter1');
        $I->fillField(['name' => 'email'], 'garbage100@gmail.com');
        $I->fillField(['name' => 'password'], 'testingUserPass');
        $I->fillField(['name' => 'password_confirmation'], 'testingUserPass');
        $I->fillField(['name' => 'publisher_id'], 'pub-1234567891234567');
        $I->click(['id' => 'submit-register']);

        $I->seeInPageSource('The username has already been taken.'); //see warning message

        //too long
        $I->fillField(['name' => 'username'], 'thisIsAVeryLongUserNameThatIsNotAllowedInTheDatabaseItIsAllowedToBeVeryLong');
        $I->fillField(['name' => 'email'], 'garbage100@gmail.com');
        $I->fillField(['name' => 'password'], 'testingUserPass');
        $I->fillField(['name' => 'password_confirmation'], 'testingUserPass');
        $I->fillField(['name' => 'publisher_id'], 'pub-1234567891234567');
        $I->click(['id' => 'submit-register']);

        $I->seeInPageSource('The username may not be greater than 60 characters.'); //see warning message

        //empty
        $I->fillField(['name' => 'username'], '');
        $I->fillField(['name' => 'email'], 'garbage100@gmail.com');
        $I->fillField(['name' => 'password'], 'testingUserPass');
        $I->fillField(['name' => 'password_confirmation'], 'testingUserPass');
        $I->fillField(['name' => 'publisher_id'], 'pub-1234567891234567');
        $I->click(['id' => 'submit-register']);

        $I->seeInPageSource('The username field is required.'); //see warning message
    }

    public function testRegisterInvalidEmail(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->amOnPage('/auth/register');

        //already taken
        $I->fillField(['name' => 'username'], 'newUser1');
        $I->fillField(['name' => 'email'], 'email1@gmail.com');
        $I->fillField(['name' => 'password'], 'testingUserPass');
        $I->fillField(['name' => 'password_confirmation'], 'testingUserPass');
        $I->fillField(['name' => 'publisher_id'], 'pub-1234567891234567');
        $I->click(['id' => 'submit-register']);

        $I->seeInPageSource('The email has already been taken.'); //see warning message

        //too long
        $I->fillField(['name' => 'username'], 'user1');
        $I->fillField(['name' => 'email'], 'thisIsAVeryLongEmailThatIsNotAllowedInTheDatabasethisIsAVeryLongEmailThatIsNotAllowedInTheDatabasethisIsAVeryLongEmailThatIsNotAllowedInTheDatabasethisIsAVeryLongEmailThatIsNotAllowedInTheDatabasethisIsAVeryLongEmailThatIsNotAllowedInTheDatabasethisIsAVeryLongEmailThatIsNotAllowedInTheDatabase@gmail.com');
        $I->fillField(['name' => 'password'], 'testingUserPass');
        $I->fillField(['name' => 'password_confirmation'], 'testingUserPass');
        $I->fillField(['name' => 'publisher_id'], 'pub-1234567891234567');
        $I->click(['id' => 'submit-register']);

        $I->seeInPageSource('The email may not be greater than 255 characters.'); //see warning message

        //too short
        $I->fillField(['name' => 'username'], 'user1');
        $I->fillField(['name' => 'email'], '');
        $I->fillField(['name' => 'password'], 'testingUserPass');
        $I->fillField(['name' => 'password_confirmation'], 'testingUserPass');
        $I->fillField(['name' => 'publisher_id'], 'pub-1234567891234567');
        $I->click(['id' => 'submit-register']);

        $I->seeInPageSource('The email field is required.'); //see warning message
    }

    public function testRegisterInvalidPassword(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->amOnPage('/auth/register');

        //empty
        $I->fillField(['name' => 'username'], 'user1');
        $I->fillField(['name' => 'email'], 'testyemail@gmail.com');
        $I->fillField(['name' => 'password'], '');
        $I->fillField(['name' => 'password_confirmation'], '');
        $I->fillField(['name' => 'publisher_id'], 'pub-1234567891234567');
        $I->click(['id' => 'submit-register']);

        $I->seeInPageSource('The password field is required.'); //see warning message

        //too short
        $I->fillField(['name' => 'username'], 'user1');
        $I->fillField(['name' => 'email'], 'testyemail@gmail.com');
        $I->fillField(['name' => 'password'], '1');
        $I->fillField(['name' => 'password_confirmation'], '1');
        $I->fillField(['name' => 'publisher_id'], 'pub-1234567891234567');
        $I->click(['id' => 'submit-register']);

        $I->seeInPageSource('The password must be at least 6 characters.'); //see warning message

        //not matching
        $I->fillField(['name' => 'username'], 'user1');
        $I->fillField(['name' => 'email'], 'testyemail@gmail.com');
        $I->fillField(['name' => 'password'], '123456');
        $I->fillField(['name' => 'password_confirmation'], '654321');
        $I->fillField(['name' => 'publisher_id'], 'pub-1234567891234567');
        $I->click(['id' => 'submit-register']);

        $I->seeInPageSource('The password confirmation does not match.'); //see warning message
    }

    public function testRegisterInvalidPublisherId(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->amOnPage('/auth/register');

        $I->fillField(['name' => 'username'], 'user1');
        $I->fillField(['name' => 'email'], 'testyemail@gmail.com');
        $I->fillField(['name' => 'password'], '123456');
        $I->fillField(['name' => 'password_confirmation'], '123456');
        $I->fillField(['name' => 'publisher_id'], 'pub-12345678912345678'); //too long
        $I->click(['id' => 'submit-register']);

        $I->seeInPageSource('The publisher id may not be greater than 20 characters.'); //see warning message

        $I->fillField(['name' => 'username'], 'user1');
        $I->fillField(['name' => 'email'], 'testyemail@gmail.com');
        $I->fillField(['name' => 'password'], '123456');
        $I->fillField(['name' => 'password_confirmation'], '123456');
        $I->fillField(['name' => 'publisher_id'], 'pub-123456789123456'); //too short
        $I->click(['id' => 'submit-register']);

        $I->seeInPageSource('The publisher id must be at least 20 characters.'); //see warning message
    }

    public function testVisitRegisterAlreadyLoggedIn(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->amOnPage('/auth/login');

        $I->fillField(['name' => 'email'], 'email1@gmail.com');
        $I->fillField(['name' => 'password'], 'password1');
        $I->click(['id' => 'submit-login']);

        $I->see('MudMatter1', ['class'=>'btn-default']); //the user has been logged in
        $I->seeInTitle('Home');

        $I->amOnPage('/auth/register');
        $I->seeInTitle('Home');
    }

}

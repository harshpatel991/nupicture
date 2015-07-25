<?php
use \AcceptanceTester;

class LoginCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }

    public function testLoginValid(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->amOnPage('/auth/login');

        $I->fillField(['name' => 'email'], 'email1@gmail.com');
        $I->fillField(['name' => 'password'], 'password1');
        $I->click(['id' => 'submit-login']);

        $I->seeInTitle('Home');
        $I->see('user1', ['class'=>'btn-default']); //the user has been logged in
    }

    public function testLoginInvalid(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->amOnPage('/auth/login');

        $I->fillField(['name' => 'email'], 'email1@gmail.com');
        $I->fillField(['name' => 'password'], 'password2'); //wrong password
        $I->click(['id' => 'submit-login']);

        $I->seeElement(['class'=>'alert-danger']); //see warning message

        $I->amOnPage('/');
        $I->amOnPage('/auth/login');

        $I->fillField(['name' => 'email'], 'garbage2@gmail.com'); //email does not exist
        $I->fillField(['name' => 'password'], 'password1');
        $I->click(['id' => 'submit-login']);

        $I->seeElement(['class'=>'alert-danger']); //see warning message
    }

    public function testLogout(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->amOnPage('/auth/login');

        $I->fillField(['name' => 'email'], 'email1@gmail.com');
        $I->fillField(['name' => 'password'], 'password1');
        $I->click(['id' => 'submit-login']);

        $I->seeInTitle('Home');
        $I->see('user1', ['class'=>'btn-default']); //the user has been logged in

        $I->click(['id' => 'profile-dropdown']);
        $I->click(['id' => 'logout-button']);
        $I->dontSee('user1', ['class'=>'btn-default']); //the user has been logged out
    }

    public function testVisitLoginAlreadyLoggedIn(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->amOnPage('/auth/login');

        $I->fillField(['name' => 'email'], 'email1@gmail.com');
        $I->fillField(['name' => 'password'], 'password1');
        $I->click(['id' => 'submit-login']);

        $I->see('user1', ['class'=>'btn-default']); //the user has been logged in
        $I->seeInTitle('Home');

        $I->amOnPage('/auth/login');
        $I->seeInTitle('Home');
    }

}

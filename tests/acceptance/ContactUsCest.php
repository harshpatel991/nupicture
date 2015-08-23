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

    public function testContactUsValid(AcceptanceTester $I)
    {
        $I->amOnPage('/contact-us');

        $I->fillField(['name' => 'email'], 'testingUser@gmail.com');
        $I->fillField(['name' => 'message'], 'This is a test message');
        $I->click(['id' => 'submit-contact-us']);

        $I->seeInPageSource('You\'re all set! We\'ll get back to you as soon as we can.'); //message has been sent
        $I->dontSeeInPageSource("alert-danger");
    }

    public function testContactUsInValidNoEmail(AcceptanceTester $I)
    {
        $I->amOnPage('/contact-us');

        $I->fillField(['name' => 'message'], 'This is a test message');
        $I->click(['id' => 'submit-contact-us']);

        $I->seeInPageSource("The email field is required.");
    }

    public function testContactUsInValidNoMessage(AcceptanceTester $I)
    {
        $I->amOnPage('/contact-us');

        $I->fillField(['name' => 'email'], 'testingUser@gmail.com');
        $I->click(['id' => 'submit-contact-us']);

        $I->seeInPageSource("The message field is required.");
    }
}

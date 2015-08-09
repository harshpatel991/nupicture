<?php
use \AcceptanceTester;

class SanityCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }

    private function ensureFooterAppears(AcceptanceTester $I)
    {
        $I->see('TERMS OF USE');
        $I->see('PRIVACY POLICY');
    }

    public function testSanityHome(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->dontSee('Exception');
        $this->ensureFooterAppears($I);
        $I->see('POPULAR POSTS');
    }

    public function testSanityBetaSignUp(AcceptanceTester $I)
    {
        $I->amOnPage('/sign-up-beta');
        $I->dontSee('Exception');
        $this->ensureFooterAppears($I);
        $I->see('Ready To Get Started?');
    }

    public function testBetaSignUpValid(AcceptanceTester $I)
    {
        $I->amOnPage('/sign-up-beta');
        $I->dontSee('Exception');
        $this->ensureFooterAppears($I);
        $I->fillField(['name' => 'email'], 'testing@gmail.com');
        $I->click(['id' => 'submit-beta-email-form']);
        $I->seeInDatabase('notifications', array('email' => 'testing@gmail.com'));
        $I->see('You\'re all set! We\'ll send you an email when you can register.');
    }

    public function testBetaSignUpInvalid(AcceptanceTester $I)
    {
        $I->amOnPage('/sign-up-beta');
        $I->dontSee('Exception');
        $this->ensureFooterAppears($I);
        $I->fillField(['name' => 'email'], 'blah');
        $I->click(['id' => 'submit-beta-email-form']);
        $I->dontSeeInDatabase('notifications', array('email' => 'blah'));
        $I->dontSeeInPageSource('alert-danger'); //will get caught by bootstrap js form validation
    }

    public function testSanityViewPost(AcceptanceTester $I)
    {
        $I->amOnPage('/post/10-awesome-cinemagraphs');
        $I->dontSee('Exception');
        $this->ensureFooterAppears($I);
        $I->see('10 Awesome Cinemagraphs');
        $I->see('RELATED POSTS');
        $I->see('POPULAR POSTS');
    }

    public function testSanityIncreaseViews(AcceptanceTester $I)
    {
        $I->amOnPage('/increase-views');
        $I->dontSee('Exception');
        $this->ensureFooterAppears($I);
        $I->see('Here are some tips');
    }

    public function testSanityLogin(AcceptanceTester $I)
    {
        $I->amOnPage('/auth/login');
        $I->dontSee('Exception');
        $this->ensureFooterAppears($I);
        $I->see('Login');
        $I->see('Don\'t have an account?');
    }

    public function testSanityRegister(AcceptanceTester $I)
    {
        $I->amOnPage('/auth/register');
        $I->dontSee('Exception');
        $this->ensureFooterAppears($I);
        $I->see('Already have an account?');
    }

    public function testSanityPostCreate(AcceptanceTester $I)
    {
        $I->amOnPage('/auth/login');
        $I->fillField(['name' => 'email'], 'email1@gmail.com');
        $I->fillField(['name' => 'password'], 'password1');
        $I->click(['id' => 'submit-login']);

        $I->amOnPage('/post/create');

        $I->dontSee('Exception');
        $this->ensureFooterAppears($I);
        $I->see('Submit a Post');
    }

    public function testSanityProfile(AcceptanceTester $I)
    {
        $I->amOnPage('/auth/login');
        $I->fillField(['name' => 'email'], 'email1@gmail.com');
        $I->fillField(['name' => 'password'], 'password1');
        $I->click(['id' => 'submit-login']);

        $I->amOnPage('/profile');
        $I->see('MudMatter1\'s Profile');
        $I->see('Adsense Publisher ID: pub-1111111111111111');
        $I->see('A Pending Post');
        $I->see('A Rejected Post Short Text');
        $I->see('The most powerful supercomputer in Spain, the MareNostrum');
        $I->see('Street Art in Busan, South Korea');
    }

    public function testSanitySignUpSuccess(AcceptanceTester $I)
    {
        $I->amOnPage('/sign-up-success');
        $I->dontSee('Exception');
        $this->ensureFooterAppears($I);

        $I->see('You\'re almost there! Check your inbox');
        $I->see('A verification link has been sent to your email.');
    }
}

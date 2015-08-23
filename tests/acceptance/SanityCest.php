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

    public function testSanityViewPost(AcceptanceTester $I)
    {
        $I->amOnPage('/post/7-awesome-cinemagraphs');
        $I->dontSee('Exception');
        $this->ensureFooterAppears($I);
        $I->see('5 Awesome Cinemagraphs');
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
        $I->see('Adsense Publisher ID: pub-6621729644063575');
        $I->see('A Pending Post');
        $I->see('A Rejected Post Short Text');
        $I->see('The most powerful supercomputer in Spain, the MareNostrum');
        $I->see('Dad Creates Adorable Star Wars Speeder');
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

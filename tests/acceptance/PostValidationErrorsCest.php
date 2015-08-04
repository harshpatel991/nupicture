<?php
use \AcceptanceTester;

class PostValidationErrorsCest
{
    public function _before(AcceptanceTester $I){}

    public function _after(AcceptanceTester $I){}

    private function loginAs(AcceptanceTester $I, $email, $password)
    {
        $I->amOnPage('/auth/login');
        $I->fillField(['name' => 'email'], $email);
        $I->fillField(['name' => 'password'], $password);
        $I->click(['id' =>'submit-login']);
    }

    private function getStringLength($length)
    {
        $output = '';
        for ($i = 0; $i < $length; $i++) {
            $output .= 'a';
        }
        return $output;
    }

    private function fillOutValidIntroSections(AcceptanceTester $I)
    {
        $I->amOnPage('/post/create');
        $I->fillField(['name' => 'title'], 'Valid Title');
        $I->selectOption(['name' => 'category'], 'news');
        $I->fillField(['name' => 'summary'], 'Valid summary');
        $I->attachFile(['name' => 'thumbnail'], 'test-image.jpg');
    }

    public function testFailInvalidTitle(AcceptanceTester $I)
    {
        $this->loginAs($I, 'email1@gmail.com', 'password1'); //confirmed user

        //empty title
        $I->amOnPage('/post/create');
        $I->selectOption(['name' => 'category'], 'news');
        $I->fillField(['name' => 'summary'], 'This is text posting summary');
        $I->attachFile(['name' => 'thumbnail'], 'test-image.jpg');
        $I->click(['id' =>'submit-form']);
        $I->seeInPageSource('Title is required');

        //title too long
        $I->amOnPage('/post/create');
        $I->fillField(['name' => 'title'], $this->getStringLength(201));
        $I->selectOption(['name' => 'category'], 'news');
        $I->fillField(['name' => 'summary'], 'This is text posting summary');
        $I->attachFile(['name' => 'thumbnail'], 'test-image.jpg');
        $I->click(['id' =>'submit-form']);
        $I->seeInPageSource('Title must be less than 200 characters');
    }

    public function testFailInvalidCategory(AcceptanceTester $I)
    {
        $this->loginAs($I, 'email1@gmail.com', 'password1'); //confirmed user

        //no category selected
        $I->amOnPage('/post/create');
        $I->fillField(['name' => 'title'], 'Valid Title');
        $I->fillField(['name' => 'summary'], 'This is text posting summary');
        $I->attachFile(['name' => 'thumbnail'], 'test-image.jpg');
        $I->click(['id' =>'submit-form']);
        $I->seeInPageSource('Category is required');
    }

    public function testFailInvalidSummary(AcceptanceTester $I)
    {
        $this->loginAs($I, 'email1@gmail.com', 'password1'); //confirmed user

        //no summary filled in
        $I->amOnPage('/post/create');
        $I->fillField(['name' => 'title'], 'Valid Title');
        $I->selectOption(['name' => 'category'], 'news');
        $I->attachFile(['name' => 'thumbnail'], 'test-image.jpg');
        $I->click(['id' =>'submit-form']);
        $I->seeInPageSource('Summary is required');

        //too long summary
        $I->amOnPage('/post/create');
        $I->fillField(['name' => 'title'], 'Valid Title');
        $I->selectOption(['name' => 'category'], 'news');
        $I->fillField(['name' => 'summary'], $this->getStringLength(1001));
        $I->attachFile(['name' => 'thumbnail'], 'test-image.jpg');
        $I->click(['id' =>'submit-form']);
        $I->seeInPageSource('Summary must be less than 1000 characters');
    }

    public function testFailInvalidThumbnail(AcceptanceTester $I)
    {
        $this->loginAs($I, 'email1@gmail.com', 'password1'); //confirmed user

        //no thumbnail selected
        $I->amOnPage('/post/create');
        $I->fillField(['name' => 'title'], 'Valid Title');
        $I->selectOption(['name' => 'category'], 'news');
        $I->fillField(['name' => 'summary'], 'Valid summary');
        $I->click(['id' =>'submit-form']);
        $I->seeInPageSource('Thumbnail is required');

        //thumbnail size too large
        $I->amOnPage('/post/create');
        $I->fillField(['name' => 'title'], 'Valid Title');
        $I->selectOption(['name' => 'category'], 'news');
        $I->fillField(['name' => 'summary'], 'Valid summary');
        $I->attachFile(['name' => 'thumbnail'], 'test-image-too-large.png');
        $I->click(['id' =>'submit-form']);
        $I->seeInPageSource('Thumbnail must be smaller than 2000');

        //thumbnail image PSD, too large, not image
        $I->amOnPage('/post/create');
        $I->fillField(['name' => 'title'], 'Valid Title');
        $I->selectOption(['name' => 'category'], 'news');
        $I->fillField(['name' => 'summary'], 'Valid summary');
        $I->attachFile(['name' => 'thumbnail'], 'test-image-large-invalid.psd');
        $I->click(['id' =>'submit-form']);
        $I->seeInPageSource('Thumbnail must be smaller than 2000');
        $I->seeInPageSource('Thumbnail must be an image');
        $I->seeInPageSource('Thumbnail must be PNG, JPG, JPEG, or GIF');
    }

    public function testFailInvalidTextSection(AcceptanceTester $I)
    {
        $this->loginAs($I, 'email1@gmail.com', 'password1'); //confirmed user

        //no content text
        $this->fillOutValidIntroSections($I);
        $I->click(['id' =>'add-text-section']);
        $I->wait(1);
        $I->click(['id' => 'submit-form']);
        $I->seeInPageSource('Section #1: Text content is required');

        //too long content text
        $this->fillOutValidIntroSections($I);
        $I->click(['id' =>'add-text-section']);
        $I->fillField(['id' => '1-content'], $this->getStringLength(2001));
        $I->wait(1);
        $I->click(['id' => 'submit-form']);
        $I->seeInPageSource('Section #1: Text content must be less than 2000 characters');

        //too long optional text
        $this->fillOutValidIntroSections($I);
        $I->click(['id' =>'add-text-section']);
        $I->fillField(['id' => '1-optional'], $this->getStringLength(201));
        $I->wait(1);
        $I->click(['id' => 'submit-form']);
        $I->seeInPageSource('Section #1: Heading must be less than 200 characters');
    }

    public function testFailInvalidImageSection(AcceptanceTester $I)
    {
        $this->loginAs($I, 'email1@gmail.com', 'password1'); //confirmed user

        //no image
        $this->fillOutValidIntroSections($I);
        $I->click(['id' =>'add-image-section']);
        $I->wait(1);
        $I->click(['id' => 'submit-form']);
        $I->seeInPageSource('Section #1: Image is required');

        //too large image
        $this->fillOutValidIntroSections($I);
        $I->click(['id' =>'add-image-section']);
        $I->wait(1);
        $I->attachFile(['id' => '1-content'], 'test-image-too-large.png');
        $I->click(['id' => 'submit-form']);
        $I->seeInPageSource('Section #1: Image must be smaller than 2000 KB');
        $I->wait(5);

        //invalid image file, PSD
        $this->fillOutValidIntroSections($I);
        $I->click(['id' =>'add-image-section']);
        $I->wait(1);
        $I->attachFile(['id' => '1-content'], 'test-image-large-invalid.psd');
        $I->click(['id' => 'submit-form']);
        $I->seeInPageSource('Section #1: Image must be smaller than 2000 KB');
        $I->seeInPageSource('Section #1: File must be an image');
        $I->seeInPageSource('Section #1: Image must be PNG, JPG, JPEG, or GIF');

        //too long optional content
        $this->fillOutValidIntroSections($I);
        $I->click(['id' =>'add-image-section']);
        $I->wait(1);
        $I->attachFile(['id' => '1-content'], 'test-image.jpg');
        $I->fillField(['id' => '1-optional'], $this->getStringLength(201));
        $I->click(['id' => 'submit-form']);
        $I->seeInPageSource('Section #1: Heading must be less than 200 characters');
    }

    public function testFailInvalidYoutubeSection(AcceptanceTester $I)
    {
        $this->loginAs($I, 'email1@gmail.com', 'password1'); //confirmed user

        //no youtube link
        $this->fillOutValidIntroSections($I);
        $I->click(['id' => 'add-youtube-section']);
        $I->wait(1);
        $I->click(['id' => 'submit-form']);
        $I->seeInPageSource('Section #1: YouTube URL is required');

        //invalid youtube link
        $this->fillOutValidIntroSections($I);
        $I->click(['id' => 'add-youtube-section']);
        $I->wait(1);
        $I->fillField(['id' => '1-content'], "Thisisinvalidyoutubelink");
        $I->click(['id' => 'submit-form']);
        $I->seeInPageSource('Section #1: YouTube URL does not match correct video format');

        //too long youtube link
        $this->fillOutValidIntroSections($I);
        $I->click(['id' => 'add-youtube-section']);
        $I->wait(1);
        $I->fillField(['id' => '1-content'], $this->getStringLength(201));
        $I->click(['id' => 'submit-form']);
        $I->seeInPageSource('Section #1: YouTube URL must be less than 200 characters');
    }

    public function testFailInvalidListNumberSection(AcceptanceTester $I)
    {
        $this->loginAs($I, 'email1@gmail.com', 'password1'); //confirmed user

        //too long optional content
        $this->fillOutValidIntroSections($I);
        $I->click(['id' => 'add-list-number-section']);
        $I->wait(1);
        $I->fillField(['id' => '1-optional'], $this->getStringLength(201));
        $I->click(['id' => 'submit-form']);
        $I->seeInPageSource('Section #1: List number heading must be less than 200 characters');
    }

    public function testFailInvalidSourceSection(AcceptanceTester $I)
    {
        $this->loginAs($I, 'email1@gmail.com', 'password1'); //confirmed user

        //empty source
        $this->fillOutValidIntroSections($I);
        $I->click(['id' => 'add-source-section']);
        $I->wait(1);
        $I->click(['id' => 'submit-form']);
        $I->seeInPageSource('Section #1: Source is required');

        //too long source
        $this->fillOutValidIntroSections($I);
        $I->click(['id' => 'add-source-section']);
        $I->wait(1);
        $I->fillField(['id' => '1-content'], $this->getStringLength(201));
        $I->click(['id' => 'submit-form']);
        $I->seeInPageSource('Section #1: Source must be must be less than 200 characters');
    }

    //fail on error conditions with a mix of different sections
    public function testFailMixedSectionsAllEmpty(AcceptanceTester $I)
    {
        $this->loginAs($I, 'email1@gmail.com', 'password1'); //confirmed user

        $this->fillOutValidIntroSections($I);
        $I->click(['id' => 'add-text-section']); //id 1
        $I->click(['id' => 'add-image-section']); //id 2
        $I->click(['id' => 'add-youtube-section']); //id 3
        $I->click(['id' => 'add-list-number-section']); //id 4
        $I->click(['id' => 'add-source-section']); //id 5

        $I->click(['id' => 'add-text-section']); // id 6
        $I->click(['id' => 'add-image-section']); //id 7
        $I->click(['id' => 'add-youtube-section']); //id 8
        $I->click(['id' => 'add-list-number-section']); //id 9
        $I->click(['id' => 'add-source-section']); //id 10
        $I->wait(1);

        $I->click(['id' => 'submit-form']);

        $I->seeInPageSource('Section #1: Text content is required');
        $I->seeInPageSource('Section #2: Image is required');
        $I->seeInPageSource('Section #3: YouTube URL is required');
        //no error on #4
        $I->seeInPageSource('Source Section #1: Source is required');

        $I->seeInPageSource('Section #5: Text content is required');
        $I->seeInPageSource('Section #6: Image is required');
        $I->seeInPageSource('Section #7: YouTube URL is required');
        //no error on #8
        $I->seeInPageSource('Source Section #2: Source is required');
    }

    public function testFailMixedSectionsAllTooLong(AcceptanceTester $I)
    {
        $this->loginAs($I, 'email1@gmail.com', 'password1'); //confirmed user

        $this->fillOutValidIntroSections($I);
        $I->click(['id' => 'add-text-section']); //id 1
        $I->wait(1);
        $I->fillField(['id' => '1-optional'], $this->getStringLength(201));
        $I->fillField(['id' => '1-content'], $this->getStringLength(2001));

        $I->click(['id' => 'add-image-section']); //id 2
        $I->wait(1);
        $I->fillField(['id' => '2-optional'], $this->getStringLength(201));
        $I->attachFile(['id' => '2-content'], 'test-image-large-invalid.psd');

        $I->click(['id' => 'add-youtube-section']); //id 3
        $I->wait(1);
        $I->fillField(['id' => '3-content'], $this->getStringLength(201));

        $I->click(['id' => 'add-list-number-section']); //id 4
        $I->wait(1);
        $I->fillField(['id' => '4-optional'], $this->getStringLength(201));

        $I->click(['id' => 'add-source-section']); //id 5
        $I->wait(1);
        $I->fillField(['id' => '5-content'], $this->getStringLength(201));

        $I->click(['id' => 'add-text-section']); // id 6
        $I->wait(1);
        $I->fillField(['id' => '6-optional'], $this->getStringLength(252));
        $I->fillField(['id' => '6-content'], $this->getStringLength(2058));

        $I->click(['id' => 'add-image-section']); //id 7
        $I->wait(1);
        $I->attachFile(['id' => '7-content'], 'test-image-too-large.png');

        $I->click(['id' => 'add-youtube-section']); //id 8
        $I->wait(1);
        $I->fillField(['id' => '8-content'], "blahblahblabhnotvalidyoutubeurl");

        $I->click(['id' => 'add-list-number-section']); //id 9
        $I->wait(1);
        $I->fillField(['id' => '9-optional'], $this->getStringLength(432));

        $I->click(['id' => 'add-source-section']); //id 10
        $I->wait(1);
        $I->fillField(['id' => '10-content'], $this->getStringLength(324));
        $I->wait(1);

        $I->click(['id' => 'submit-form']);

        $I->seeInPageSource('Section #1: Heading must be less than 200 characters');
        $I->seeInPageSource('Section #1: Text content must be less than 2000 characters');
        $I->seeInPageSource('Section #2: Image must be smaller than 2000 KB');
        $I->seeInPageSource('Section #2: File must be an image');
        $I->seeInPageSource('Section #2: Image must be PNG, JPG, JPEG, or GIF');
        $I->seeInPageSource('Section #3: YouTube URL must be less than 200 characters');
        $I->seeInPageSource('Section #4: List number heading must be less than 200 characters');
        $I->seeInPageSource('Source Section #1: Source must be must be less than 200 characters');

        $I->seeInPageSource('Section #5: Heading must be less than 200 characters');
        $I->seeInPageSource('Section #5: Text content must be less than 2000 characters');
        $I->seeInPageSource('Section #6: Image must be smaller than 2000 KB');
        $I->seeInPageSource('Section #7: YouTube URL does not match correct video format');
        $I->seeInPageSource('Section #8: List number heading must be less than 200 characters');
        $I->seeInPageSource('Source Section #2: Source must be must be less than 200 characters');
    }

}

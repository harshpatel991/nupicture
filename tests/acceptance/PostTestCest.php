<?php
use \AcceptanceTester;

class PostTestCest
{
    private function loginAs(AcceptanceTester $I, $email, $password)
    {
        $I->amOnPage('/auth/login');
        $I->fillField(['name' => 'email'], $email);
        $I->fillField(['name' => 'password'], $password);
        $I->click(['id' =>'submit-login']);
    }

    private function approvePost(AcceptanceTester $I, $title)
    {
        $postId = $I->grabFromDatabase('posts', 'id', array('title' => $title));
        $I->amOnPage('/post/approve/' . $postId);
    }

    private function getSectionID(AcceptanceTester $I, $content, $optionalContent)
    {
        $sectionID = $I->grabFromDatabase('sections', 'id', array('content' => $content, 'optional_content' => $optionalContent));
        return $sectionID;
    }

    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }

    public function testPostNotLoggedIn(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->amOnPage('/post/create');
        $I->seeInTitle('Login');
    }

    public function testPostNotConfirmed(AcceptanceTester $I)
    {
        $this->loginAs($I, 'email3@gmail.com', 'password3'); //unconfirmed user
        $I->amOnPage('/');
        $I->amOnPage('/post/create');
        $I->seeInTitle('Thanks for Registering');
    }

    public function testViewPendingPost(AcceptanceTester $I)
    {
        $I->amOnPage('/post/post-10');
        $I->seeInTitle('Home');
    }

    public function testViewRejectedPost(AcceptanceTester $I)
    {
        $I->amOnPage('/post/post-11');
        $I->seeInTitle('Home');
    }

    public function testVerifyPost(AcceptanceTester $I)
    {
        $I->seeInDatabase('posts', array('id' => '10', 'status' => 'pending_post'));
        $I->amOnPage('/post/approve/10');
        $I->seeInDatabase('posts', array('id' => '10', 'status' => 'posted'));
    }

    public function testCreatePostWithText(AcceptanceTester $I)
    {
        $this->loginAs($I, 'email1@gmail.com', 'password1'); //confirmed user

        //with optional
        $I->amOnPage('/');
        $I->amOnPage('/post/create');

        $I->fillField(['name' => 'title'], 'Creating A Test Text Posting');
        $I->selectOption(['name' => 'category'], 'news');
        $I->fillField(['name' => 'summary'], 'This is text posting summary');
        $I->attachFile(['name' => 'thumbnail'], 'test-image.jpg');
        $I->click(['id' =>'add-text-section']);
        $I->wait(1);
        $I->fillField(['id' => '1-optional'], "Test Heading 1"); //with optional
        $I->fillField(['id' => '1-content'], "Test Content 1");
        $I->click(['id' =>'submit-form']);

        $I->seeInDatabase('posts', array('title' => 'Creating A Test Text Posting', 'category' => 'news', 'summary' => 'This is text posting summary', 'status' => 'pending_post'));
        $I->seeInDatabase('sections', array('type' => 'section-text', 'optional_content' => 'Test Heading 1', 'content' => 'Test Content 1'));

        $I->seeInPageSource('Creating A Test Text Posting'); //see on profile page
        $this->approvePost($I, 'Creating A Test Text Posting');

        $I->seeInPageSource('Test Heading 1');
        $I->seeInPageSource('Test Content 1');
        $I->seeInTitle('Creating A Test Text Posting');

        //without optional
        $I->amOnPage('/post/create');

        $I->fillField(['name' => 'title'], 'Creating A Test Text Posting 2');
        $I->selectOption(['name' => 'category'], 'tv');
        $I->fillField(['name' => 'summary'], 'This is text posting summary 2');
        $I->attachFile(['name' => 'thumbnail'], 'test-image.jpg');
        $I->click(['id' =>'add-text-section']);
        $I->wait(1);
        $I->fillField(['id' => '1-content'], "Test Content 2");
        $I->click(['id' =>'submit-form']);

        $I->seeInDatabase('posts', array('title' => 'Creating A Test Text Posting 2', 'category' => 'tv', 'summary' => 'This is text posting summary 2', 'status' => 'pending_post'));
        $I->seeInDatabase('sections', array('type' => 'section-text', 'optional_content' => '', 'content' => 'Test Content 2'));

        $I->seeInPageSource('Creating A Test Text Posting 2'); //see on profile page
        $this->approvePost($I, 'Creating A Test Text Posting 2');

        $I->seeInPageSource('Test Content 2');
        $I->seeInTitle('Creating A Test Text Posting 2');
    }

    public function testCreateTextPostWithHTMLElements(AcceptanceTester $I)
    {
        $this->loginAs($I, 'email1@gmail.com', 'password1'); //confirmed user

        $I->amOnPage('/post/create');
        $I->fillField(['name' => 'title'], 'Creating A Test HTML Elements Posting');
        $I->selectOption(['name' => 'category'], 'tv');
        $I->fillField(['name' => 'summary'], 'This is HTML Elements posting summary');
        $I->attachFile(['name' => 'thumbnail'], 'test-image.jpg');
        $I->click(['id' =>'add-text-section']);
        $I->wait(1);

        $I->fillField(['id' => '1-content'],
            "<script>alert(\"hi\");</script> \n<a href=\"http://cnn.com\">Test Link</a> \n<b>Test Bolded Text</b> \n<i>Test Italics Test</i> \n<ul><li>Test List Item 1</li><li>Test List Item 2</li></ul>");

        $I->click(['id' =>'submit-form']);
        $this->approvePost($I, 'Creating A Test HTML Elements Posting');

        $I->dontSeeInPageSource('<script>alert("hi");</script>');
        $I->seeInPageSource('<a href="http://cnn.com">Test Link</a>');
        $I->seeInPageSource('<b>Test Bolded Text</b>');
        $I->seeInPageSource('<i>Test Italics Test</i>');
        $I->seeInPageSource('<ul>');
        $I->seeInPageSource('<li>Test List Item 1</li>');

    }

    public function testCreatePostWithImage(AcceptanceTester $I)
    {
        $this->loginAs($I, 'email1@gmail.com', 'password1'); //confirmed user

        //with optional
        $I->amOnPage('/post/create');

        $I->fillField(['name' => 'title'], 'Creating A Test Image Posting');
        $I->selectOption(['name' => 'category'], 'tv');
        $I->fillField(['name' => 'summary'], 'This is image posting summary');
        $I->attachFile(['name' => 'thumbnail'], 'test-image.jpg');
        $I->click(['id' =>'add-image-section']);
        $I->wait(1);
        $I->attachFile(['id' => '1-content'], 'test-image.jpg');
        $I->fillField(['id' => '1-optional'], "www.optional-image-source.com");
        $I->click(['id' =>'submit-form']);

        $I->seeInDatabase('posts', array('title' => 'Creating A Test Image Posting', 'category' => 'tv', 'summary' => 'This is image posting summary', 'status' => 'pending_post'));
        $I->seeInDatabase('sections', array('type' => 'section-image', 'optional_content' => 'www.optional-image-source.com'));

        $I->seeInPageSource('Creating A Test Image Posting'); //see on profile page
        $this->approvePost($I, 'Creating A Test Image Posting');

        $I->seeInTitle('Creating A Test Image Posting');
        $I->seeInPageSource('<img class="post-image" src="/upload/creating-a-test-image-posting');
        $I->seeInPageSource('<a href="www.optional-image-source.com">Image Source</a>');

        //without optional
        $I->amOnPage('/post/create');

        $I->fillField(['name' => 'title'], 'Creating A Test Image Posting Without Optional');
        $I->selectOption(['name' => 'category'], 'tv');
        $I->fillField(['name' => 'summary'], 'This is image posting summary 2');
        $I->attachFile(['name' => 'thumbnail'], 'test-image.jpg');
        $I->click(['id' =>'add-image-section']);
        $I->wait(1);
        $I->attachFile(['id' => '1-content'], 'test-image.jpg');
        $I->click(['id' =>'submit-form']);

        $I->seeInDatabase('posts', array('title' => 'Creating A Test Image Posting Without Optional', 'category' => 'tv', 'summary' => 'This is image posting summary 2', 'status' => 'pending_post'));
        $I->seeInDatabase('sections', array('type' => 'section-image', 'optional_content' => ''));

        $I->seeInPageSource('Creating A Test Image Posting Without Optional'); //see on profile page
        $this->approvePost($I, 'Creating A Test Image Posting Without Optional');

        $I->seeInTitle('Creating A Test Image Posting Without Optional');
        $I->seeInPageSource('<img class="post-image" src="/upload/creating-a-test-image-posting');

    }

    public function testCreatePostWithYouTube(AcceptanceTester $I)
    {
        $this->loginAs($I, 'email1@gmail.com', 'password1'); //confirmed user

        //with optional
        $I->amOnPage('/post/create');

        $I->fillField(['name' => 'title'], 'Creating A Test YouTube Posting');
        $I->selectOption(['name' => 'category'], 'interesting');
        $I->fillField(['name' => 'summary'], 'This is youtube posting summary');
        $I->attachFile(['name' => 'thumbnail'], 'test-image.jpg');
        $I->click(['id' =>'add-youtube-section']);
        $I->wait(1);
        $I->fillField(['id' => '1-content'], "https://www.youtube.com/watch?v=-CmadmM5cOk");
        $I->click(['id' =>'submit-form']);

        $I->seeInDatabase('posts', array('title' => 'Creating A Test YouTube Posting', 'category' => 'interesting', 'summary' => 'This is youtube posting summary', 'status' => 'pending_post'));
        $I->seeInDatabase('sections', array('type' => 'section-youtube', 'content' => '-CmadmM5cOk'));

        $I->seeInPageSource('Creating A Test YouTube Posting'); //see on profile page
        $this->approvePost($I, 'Creating A Test YouTube Posting');

        $I->seeInTitle('Creating A Test YouTube Posting');
        $I->seeInPageSource('https://www.youtube.com/embed/-CmadmM5cOk');

    }

    public function testCreatePostWithListNumber(AcceptanceTester $I)
    {
        $this->loginAs($I, 'email1@gmail.com', 'password1'); //confirmed user

        //with optional
        $I->amOnPage('/post/create');

        $I->fillField(['name' => 'title'], 'Creating A Test List Number Posting');
        $I->selectOption(['name' => 'category'], 'tv');
        $I->fillField(['name' => 'summary'], 'This is list number posting summary');
        $I->attachFile(['name' => 'thumbnail'], 'test-image.jpg');
        $I->click(['id' =>'add-list-number-section']);
        $I->wait(1);
        $I->fillField(['id' => '1-optional'], 'List Number Heading');
        $I->click(['id' =>'submit-form']);

        $I->seeInDatabase('posts', array('title' => 'Creating A Test List Number Posting', 'category' => 'tv', 'summary' => 'This is list number posting summary', 'status' => 'pending_post'));
        $I->seeInDatabase('sections', array('type' => 'section-listnumber', 'optional_content' => 'List Number Heading'));

        $I->seeInPageSource('Creating A Test List Number Posting'); //see on profile page
        $this->approvePost($I, 'Creating A Test List Number Posting');

        $I->seeInTitle('Creating A Test List Number Posting');
        $I->seeInPageSource('1. List Number Heading');

        //without optional
        $I->amOnPage('/post/create');

        $I->fillField(['name' => 'title'], 'Creating A Test List Number Posting 2');
        $I->selectOption(['name' => 'category'], 'tv');
        $I->fillField(['name' => 'summary'], 'This is list number posting summary 2');
        $I->attachFile(['name' => 'thumbnail'], 'test-image.jpg');
        $I->click(['id' =>'add-list-number-section']);
        $I->wait(1);
        $I->click(['id' =>'submit-form']);

        $I->seeInDatabase('posts', array('title' => 'Creating A Test List Number Posting 2', 'category' => 'tv', 'summary' => 'This is list number posting summary 2', 'status' => 'pending_post'));
        $I->seeInDatabase('sections', array('type' => 'section-listnumber', 'optional_content' => ''));

        $I->seeInPageSource('Creating A Test List Number Posting 2'); //see on profile page
        $this->approvePost($I, 'Creating A Test List Number Posting 2');

        $I->seeInTitle('Creating A Test List Number Posting 2');
        $I->seeInPageSource('<h3>1. </h3>');
    }

    public function testCreatePostWithSource(AcceptanceTester $I)
    {
        $this->loginAs($I, 'email1@gmail.com', 'password1'); //confirmed user
        $I->amOnPage('/post/create');

        $I->fillField(['name' => 'title'], 'Creating A Source Posting');
        $I->selectOption(['name' => 'category'], 'woah');
        $I->fillField(['name' => 'summary'], 'This is source posting summary');
        $I->attachFile(['name' => 'thumbnail'], 'test-image.jpg');
        $I->click(['id' =>'add-source-section']);
        $I->wait(1);
        $I->fillField(['id' => '1-content'], 'http://cnn.com');
        $I->click(['id' =>'submit-form']);

        $I->seeInDatabase('posts', array('title' => 'Creating A Source Posting', 'category' => 'woah', 'summary' => 'This is source posting summary', 'status' => 'pending_post'));
        $I->seeInDatabase('sections', array('type' => 'section-source', 'optional_content' => '', 'content' => 'http://cnn.com'));

        $I->seeInPageSource('Creating A Source Posting'); //see on profile page
        $this->approvePost($I, 'Creating A Source Posting');

        $I->seeInTitle('Creating A Source Posting');
        $I->seeInPageSource('http://cnn.com');
    }

    public function testRemovingItems(AcceptanceTester $I)
    {
        $this->loginAs($I, 'email1@gmail.com', 'password1'); //confirmed user
        $I->amOnPage('/post/create');

        $I->fillField(['name' => 'title'], 'Creating A Removing Items');
        $I->selectOption(['name' => 'category'], 'woah');
        $I->fillField(['name' => 'summary'], 'This is removing items summary');
        $I->attachFile(['name' => 'thumbnail'], 'test-image.jpg');

        $I->click(['id' =>'add-text-section']); //id 1
        $I->click(['id' =>'add-list-number-section']); //id 2
        $I->click(['id' =>'add-text-section']); //id 3
        $I->click(['id' =>'add-image-section']); //id 4
        $I->click(['id' =>'add-list-number-section']); //id 5
        $I->click(['id' =>'add-image-section']); //id 6
        $I->click(['id' =>'add-text-section']); //id 7
        $I->click(['id' =>'add-source-section']); //id 8
        $I->click(['id' =>'add-source-section']); //id 9
        $I->click(['id' =>'add-text-section']); //id 10
        $I->click(['id' =>'add-youtube-section']); //id 11
        $I->click(['id' =>'add-youtube-section']); //id 12

        $I->wait(1);

        $I->fillField(['id' => '1-optional'], 'Text 1 Optional - Removed');
        $I->fillField(['id' => '1-content'], 'Text 1 Content - Removed');
        $I->fillField(['id' => '2-optional'], 'List 2 Optional');
        $I->fillField(['id' => '3-optional'], 'Text 3 Optional');
        $I->fillField(['id' => '3-content'], 'Text 3 Content');
        $I->attachFile(['id' => '4-content'], 'test-image.jpg');
        $I->fillField(['id' => '5-optional'], 'List 5 Optional - Removed');
        $I->attachFile(['id' => '6-content'], 'test-image.jpg');
        $I->fillField(['id' => '7-optional'], 'Text 7 Optional');
        $I->fillField(['id' => '7-content'], 'Text 7 Content');
        $I->fillField(['id' => '8-content'], 'http://cnn.com');
        $I->fillField(['id' => '9-content'], 'http://reddit.com - Removed');
        $I->fillField(['id' => '10-optional'], 'Text 10 Optional');
        $I->fillField(['id' => '10-content'], 'Text 10 Content');
        $I->fillField(['id' => '11-content'], 'https://www.youtube.com/watch?v=e-ORhEE9VVg');
        $I->fillField(['id' => '12-content'], 'https://www.youtube.com/watch?v=VuNIsY6JdUw');

        //delete id 1, 5, 6, 9, 11
        $I->click(['id' =>'1-remove']);
        $I->click(['id' =>'5-remove']);
        $I->click(['id' =>'6-remove']);
        $I->click(['id' =>'9-remove']);
        $I->click(['id' =>'11-remove']);

        $I->wait(1);

        $I->click(['id' =>'submit-form']);

        $I->seeInDatabase('posts', array('title' => 'Creating A Removing Items', 'category' => 'woah', 'summary' => 'This is removing items summary', 'status' => 'pending_post'));
        $I->dontSeeInDatabase('sections', array('type' => 'section-text', 'optional_content' => 'Text 1 Optional - Removed', 'content' => 'Text 1 Content - Removed'));
        $I->seeInDatabase('sections', array('type' => 'section-listnumber', 'optional_content' => 'List 2 Optional', 'content' => ''));
        $firstSectionID = $this->getSectionID($I, '', 'List 2 Optional');

        $I->seeInDatabase('sections', array('type' => 'section-text', 'optional_content' => 'Text 3 Optional', 'content' => 'Text 3 Content', 'id' => $firstSectionID+1));
        $I->seeInDatabase('sections', array('type' => 'section-image', 'id' => $firstSectionID+2));
        $I->dontSeeInDatabase('sections', array('type' => 'section-listnumber', 'optional_content' => 'List 5 Optional - Removed'));
        $I->seeInDatabase('sections', array('type' => 'section-text', 'optional_content' => 'Text 7 Optional', 'content' => 'Text 7 Content', 'id' => $firstSectionID+3));
        $I->dontSeeInDatabase('sections', array('type' => 'section-source', 'content' => 'http://reddit.com - Removed'));
        $I->seeInDatabase('sections', array('type' => 'section-text', 'optional_content' => 'Text 10 Optional', 'content' => 'Text 10 Content', 'id' => $firstSectionID+4));
        $I->dontSeeInDatabase('sections', array('type' => 'section-youtube', 'content' => 'e-ORhEE9VVg'));
        $I->seeInDatabase('sections', array('type' => 'section-youtube', 'optional_content' => '', 'content' => 'VuNIsY6JdUw', 'id' => $firstSectionID+5));
        $I->seeInDatabase('sections', array('type' => 'section-source', 'optional_content' => '', 'content' => 'http://cnn.com', 'id' => $firstSectionID+6));

        $I->seeInPageSource('Creating A Removing Items'); //see on profile page
        $this->approvePost($I, 'Creating A Removing Items');

        $I->seeInTitle('Creating A Removing Items');
        $I->seeInPageSource('List 2 Optional');
        $I->seeInPageSource('Text 3 Optional');
        $I->seeInPageSource('Text 3 Content');
        $I->seeInPageSource('<img class="post-image" src="/upload/creating-a-removing-items');
        $I->seeInPageSource('Text 7 Optional');
        $I->seeInPageSource('Text 7 Content');
        $I->seeInPageSource('Text 10 Optional');
        $I->seeInPageSource('Text 10 Content');
        $I->seeInPageSource('http://cnn.com');
        $I->seeInPageSource('https://www.youtube.com/embed/VuNIsY6JdUw');
    }

    public function testAddItemsAndRemoveAll(AcceptanceTester $I)
    {
        $this->loginAs($I, 'email1@gmail.com', 'password1'); //confirmed user
        $I->amOnPage('/post/create');

        $I->fillField(['name' => 'title'], 'Creating A Removing All Items');
        $I->selectOption(['name' => 'category'], 'woah');
        $I->fillField(['name' => 'summary'], 'This is add items and remove all summary');
        $I->attachFile(['name' => 'thumbnail'], 'test-image.jpg');

        $I->click(['id' =>'add-text-section']); //id 1
        $I->click(['id' =>'add-list-number-section']); //id 2
        $I->click(['id' =>'add-image-section']); //id 3
        $I->click(['id' =>'add-source-section']); //id 4
        $I->click(['id' =>'add-youtube-section']); //id 5

        $I->fillField(['id' => '1-content'], 'Remove All Test 1 Content');
        $I->fillField(['id' => '1-optional'], 'Remove All Test 1 Optional');
        $I->fillField(['id' => '2-optional'], 'Remove All Test 2 Optional');
        $I->attachFile(['id' => '3-content'], 'test-image.jpg');
        $I->fillField(['id' => '3-optional'], 'Remove All Test 3 Image Optional Content');
        $I->fillField(['id' => '4-content'], 'Remove All Test 4 Content');
        $I->fillField(['id' => '5-content'], 'https://www.youtube.com/watch?v=e-ORhEE9VVg');

        //delete all
        $I->click(['id' =>'1-remove']);
        $I->click(['id' =>'2-remove']);
        $I->click(['id' =>'3-remove']);
        $I->click(['id' =>'4-remove']);
        $I->click(['id' =>'5-remove']);

        $I->wait(1);

        $I->click(['id' =>'submit-form']);

        $I->seeInDatabase('posts', array('title' => 'Creating A Removing All Items', 'category' => 'woah', 'summary' => 'This is add items and remove all summary', 'status' => 'pending_post'));
        $I->dontSeeInDatabase('sections', array('post_id' => '20'));
        $I->dontSeeInDatabase('sections', array('type' => 'section-text', 'content' => 'Remove All Test 1 Content', 'optional_content' => 'Remove All Test 1 Optional'));
        $I->dontSeeInDatabase('sections', array('type' => 'section-listnumber', 'optional_content' => 'Remove All Test 2 Optional'));
        $I->dontSeeInDatabase('sections', array('type' => 'section-image', 'optional_content' => 'Remove All Test 3 Image Optional Content')); //can't test for the image's content since it's random...
        $I->dontSeeInDatabase('sections', array('type' => 'section-youtube', 'content' => 'e-ORhEE9VVg'));
        $I->dontSeeInDatabase('sections', array('type' => 'section-source', 'content' => 'Remove All Test 4 Content'));

        $I->seeInPageSource('Creating A Removing All Items'); //see on profile page
        $this->approvePost($I, 'Creating A Removing All Items');

        $I->seeInTitle('Creating A Removing All Items');
    }

    public function testNewLineTextPostFailure(AcceptanceTester $I)
    {
        $this->loginAs($I, 'email1@gmail.com', 'password1'); //confirmed user

        //with optional
        $I->amOnPage('/');
        $I->amOnPage('/post/create');

        $I->fillField(['name' => 'title'], 'Creating A Test New Line Text Posting Failure');
        //don't select a category
        $I->fillField(['name' => 'summary'], 'This is new line text post failure summary');
        $I->attachFile(['name' => 'thumbnail'], 'test-image.jpg');

        $I->click(['id' => 'add-text-section']);
        $I->wait(1);
        $I->fillField(['id' => '1-content'], "Test Content Line 1\nTest Content Line 2\n\nTest Content Line 3");
        $I->wait(1);
        $enteredValue = $I->grabValueFrom(['id' => '1-content']);
        $I->click(['id' => 'submit-form']);

        $I->seeInPageSource('alert alert-danger'); //posting failed, make sure new lines show up in text area
        $I->seeInPageSource('addTextSection("", "Test Content Line 1\r\nTest Content Line 2\r\n\r\nTest Content Line 3")();');

        $I->seeInField(['id' => '1-content'], $enteredValue);
    }

    public function testNewLineTextPostSuccess(AcceptanceTester $I)
    {
        $this->loginAs($I, 'email1@gmail.com', 'password1'); //confirmed user

        //with optional
        $I->amOnPage('/');
        $I->amOnPage('/post/create');

        $I->fillField(['name' => 'title'], 'Creating A Test New Line Text Posting Success');
        $I->selectOption(['name' => 'category'], 'woah');
        $I->fillField(['name' => 'summary'], 'This is new line text post success summary');
        $I->attachFile(['name' => 'thumbnail'], 'test-image.jpg');

        $I->click(['id' => 'add-text-section']);
        $I->wait(1);
        $I->fillField(['id' => '1-content'], "Success Test Content Line 1\nTest Content Line 2\n\nTest Content Line 3");
        $I->click(['id' => 'submit-form']);

        $I->seeInPageSource('Creating A Test New Line Text Posting Success'); //see on profile page
        $this->approvePost($I, 'Creating A Test New Line Text Posting Success');

        $I->seeInPageSource('Success Test Content Line 1<br />Test Content Line 2<br /><br />Test Content Line 3');

        $I->seeInTitle('Creating A Test New Line Text Posting Success');
    }
}

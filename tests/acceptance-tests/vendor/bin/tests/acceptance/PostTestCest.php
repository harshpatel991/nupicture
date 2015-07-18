<?php
use \AcceptanceTester;

class PostTestCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }

    public function testPostNotLoggedIn(AcceptanceTester $I) {

    }

    public function testCreatePostWithText(AcceptanceTester $I)
    {
        //with optional
        $I->amOnPage('/');
        $I->amOnPage('/post/create');

        $I->fillField(['name' => 'title'], 'Creating A Test Text Posting');
        $I->selectOption(['name' => 'category'], 'news');
        $I->click(['id' =>'add-text-section']);
        $I->wait(1);
        $I->fillField(['id' => '1-optional'], "Test Heading 1"); //with optional
        $I->fillField(['id' => '1-content'], "Test Content 1");
        $I->click(['id' =>'submit-form']);

        $I->seeInDatabase('posts', array('title' => 'Creating A Test Text Posting', 'category' => 'news'));
        $I->seeInDatabase('sections', array('optional_content' => 'Test Heading 1', 'content' => 'Test Content 1', 'position' => '4'));
        $I->seeInPageSource('Test Heading 1');
        $I->seeInPageSource('Test Content 1');

        $I->seeInTitle('Creating A Test Text Posting');

        //without optional
        $I->amOnPage('/post/create');

        $I->fillField(['name' => 'title'], 'Creating A Test Text Posting 2');
        $I->selectOption(['name' => 'category'], 'tv');
        $I->click(['id' =>'add-text-section']);
        $I->wait(1);
        $I->fillField(['id' => '1-content'], "Test Content 2");
        $I->click(['id' =>'submit-form']);

        $I->seeInDatabase('posts', array('title' => 'Creating A Test Text Posting 2', 'category' => 'tv'));
        $I->seeInDatabase('sections', array('optional_content' => '', 'content' => 'Test Content 2', 'position' => '4'));
        $I->seeInPageSource('Test Content 2');

        $I->seeInTitle('Creating A Test Text Posting 2');
    }

    public function testCreatePostWithImage(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->amOnPage('/post/create');

        $I->fillField(['name' => 'title'], 'Creating A Test Image Posting');
        $I->selectOption(['name' => 'category'], 'tv');
        $I->click(['id' =>'add-image-section']);
        $I->wait(1);
        $I->attachFile(['id' => '1-content'], 'test-image.jpg');
        $I->click(['id' =>'submit-form']);

        $I->seeInDatabase('posts', array('title' => 'Creating A Test Image Posting', 'category' => 'tv'));

        $I->seeInTitle('Creating A Test Image Posting');
        $I->seeInPageSource('<img class="post-image" src="/upload/creating-a-test-image-posting');
    }

    public function testCreatePostWithListNumber(AcceptanceTester $I)
    {
        //with optional
        $I->amOnPage('/post/create');

        $I->fillField(['name' => 'title'], 'Creating A Test List Number Posting');
        $I->selectOption(['name' => 'category'], 'tv');
        $I->click(['id' =>'add-list-number-section']);
        $I->wait(1);
        $I->fillField(['id' => '1-optional'], 'List Number Heading');
        $I->click(['id' =>'submit-form']);

        $I->seeInDatabase('posts', array('title' => 'Creating A Test List Number Posting', 'category' => 'tv'));
        $I->seeInDatabase('sections', array('type' => 'section-listnumber', 'optional_content' => 'List Number Heading', 'position' => '4'));

        $I->seeInTitle('Creating A Test List Number Posting');
        $I->seeInPageSource('1. List Number Heading');

        //without optional
        $I->amOnPage('/post/create');

        $I->fillField(['name' => 'title'], 'Creating A Test List Number Posting 2');
        $I->selectOption(['name' => 'category'], 'tv');
        $I->click(['id' =>'add-list-number-section']);
        $I->wait(1);
        $I->click(['id' =>'submit-form']);

        $I->seeInDatabase('posts', array('title' => 'Creating A Test List Number Posting 2', 'category' => 'tv'));
        $I->seeInDatabase('sections', array('type' => 'section-listnumber', 'optional_content' => '', 'position' => '4'));

        $I->seeInTitle('Creating A Test List Number Posting 2');
        $I->seeInPageSource('<h3>1. </h3>');
    }

    public function testCreatePostWithSource(AcceptanceTester $I)
    {
        $I->amOnPage('/post/create');

        $I->fillField(['name' => 'title'], 'Creating A Source Posting');
        $I->selectOption(['name' => 'category'], 'woah');
        $I->click(['id' =>'add-source-section']);
        $I->wait(1);
        $I->fillField(['id' => '1-content'], 'http://cnn.com');
        $I->click(['id' =>'submit-form']);

        $I->seeInDatabase('posts', array('title' => 'Creating A Source Posting', 'category' => 'woah'));
        $I->seeInDatabase('sections', array('type' => 'section-source', 'optional_content' => '', 'content' => 'http://cnn.com', 'position' => '4'));

        $I->seeInTitle('Creating A Source Posting');
        $I->seeInPageSource('http://cnn.com');
    }

    public function testRemovingItems(AcceptanceTester $I)
    {
        $I->amOnPage('/post/create');

        $I->fillField(['name' => 'title'], 'Creating A Removing Items');
        $I->selectOption(['name' => 'category'], 'woah');
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

        //delete id 1, 5, 6, 9
        $I->click(['id' =>'1-remove']);
        $I->click(['id' =>'5-remove']);
        $I->click(['id' =>'6-remove']);
        $I->click(['id' =>'9-remove']);

        $I->wait(1);

        $I->click(['id' =>'submit-form']);

        $I->seeInDatabase('posts', array('title' => 'Creating A Removing Items', 'category' => 'woah'));
        $I->dontSeeInDatabase('sections', array('type' => 'section-text', 'optional_content' => 'Text 1 Optional - Removed', 'content' => 'Text 1 Content - Removed'));
        $I->seeInDatabase('sections', array('type' => 'section-listnumber', 'optional_content' => 'List 2 Optional', 'content' => '', 'position' => '4'));
        $I->seeInDatabase('sections', array('type' => 'section-text', 'optional_content' => 'Text 3 Optional', 'content' => 'Text 3 Content', 'position' => '5'));
        $I->seeInDatabase('sections', array('type' => 'section-image', 'position' => '6'));
        $I->dontSeeInDatabase('sections', array('type' => 'section-listnumber', 'optional_content' => 'List 5 Optional - Removed'));
        $I->seeInDatabase('sections', array('type' => 'section-text', 'optional_content' => 'Text 7 Optional', 'content' => 'Text 7 Content', 'position' => '7'));
        $I->dontSeeInDatabase('sections', array('type' => 'section-source', 'content' => 'http://reddit.com - Removed'));
        $I->seeInDatabase('sections', array('type' => 'section-text', 'optional_content' => 'Text 10 Optional', 'content' => 'Text 10 Content', 'position' => '8'));
        $I->seeInDatabase('sections', array('type' => 'section-source', 'optional_content' => '', 'content' => 'http://cnn.com', 'position' => '9'));

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
    }

    public function testAddItemsAndRemoveAll(AcceptanceTester $I)
    {
        $I->amOnPage('/post/create');

        $I->fillField(['name' => 'title'], 'Creating A Removing All Items');
        $I->selectOption(['name' => 'category'], 'woah');
        $I->click(['id' =>'add-text-section']); //id 1
        $I->click(['id' =>'add-list-number-section']); //id 2
        $I->click(['id' =>'add-image-section']); //id 3
        $I->click(['id' =>'add-source-section']); //id 4

        $I->fillField(['id' => '1-content'], 'Remove All Test 1 Content');
        $I->fillField(['id' => '1-optional'], 'Remove All Test 1 Optional');
        $I->fillField(['id' => '2-optional'], 'Remove All Test 2 Optional');
        $I->attachFile(['id' => '3-content'], 'test-image.jpg');
        $I->fillField(['id' => '4-content'], 'Remove All Test 4 Content');

        //delete all
        $I->click(['id' =>'1-remove']);
        $I->click(['id' =>'2-remove']);
        $I->click(['id' =>'3-remove']);
        $I->click(['id' =>'4-remove']);

        $I->dontSeeInDatabase('sections', array('type' => 'section-text', 'optional_content' => 'Remove All Test 1 Optional', 'content' => 'Remove All Test 1 Content', 'position' => '4'));
        $I->dontSeeInDatabase('sections', array('type' => 'section-listnumber', 'position' => '5'));
        $I->dontSeeInDatabase('sections', array('type' => 'section-image', 'position' => '6'));
        $I->dontSeeInDatabase('sections', array('type' => 'section-source', 'content' => 'Remove All Test 4 Content', 'position' => '7'));

        $I->seeInTitle('Creating A Removing All Items');
    }

    //TODO: test that users cannot create pages with script tags but can add anchor tags


}

<?php

class PostTest extends TestCase {


    /**
     * Test get a post by user1
     */
    public function testGetPost1()
    {
        $response = $this->call('GET', 'post/post-4');
        $this->assertContains('Street Art in Busan, South Korea', $response->getContent());
        $this->assertContains('user1', $response->getContent());
        $this->assertContains('May 20, 2015', $response->getContent());
    }

    /**
     * Test get a post by user2
     */
    public function testGetPost2()
    {
        $response = $this->call('GET', 'post/post-5');
        $this->assertContains('3D Metal Printed Faucets', $response->getContent());
        $this->assertContains('user2', $response->getContent());
        $this->assertContains('May 18, 2015', $response->getContent());
    }

    /**
     * Test create a post
     */

    /**
     * Test post contains ad code
     */
    public function testGetPostAds()
    {
        $response = $this->call('GET', 'post/post-5');
        $this->assertContains('pub-', $response->getContent());
    }

}

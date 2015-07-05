<?php

class UserTest extends TestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function testBasicExample()
	{
		$response = $this->call('GET', '/');

		$this->assertEquals(200, $response->getStatusCode());
	}

    /**
     * Test user login
     */

    public function testUserLogin()
    {
        $parameters = [
            'email' => 'email1@gmail.com',
            'password' => 'password1'
        ];
        //TODO
    }

    public function testUserBadLogin()
    {
        //TODO
    }

    /**
     * Test user register
     */
    public function testUserRegister()
    {

    }

    public function testUserProfile()
    {

    }



}

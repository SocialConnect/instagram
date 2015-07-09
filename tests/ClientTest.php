<?php
/**
 * @author Patsura Dmitry <talk@dmtry.me>
 */

namespace TestInstagram;

class ClientTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @return \SocialConnect\Instagram\Client
     */
    protected function getClient()
    {
        $client = new \SocialConnect\Instagram\Client(getenv('applicationId'), getenv('applicationSecret'));
        $client->setHttpClient(new \SocialConnect\Common\Http\Client\Curl());

        return $client;
    }

    /**
     * @return mixed
     */
    protected function getAccessToken()
    {
        return getenv('testUserAccessToken');
    }


    /**
     * @return mixed
     */
    protected function getDemoUserId()
    {
        return getenv('testUserId');
    }

    protected function assertUser($user)
    {
        $this->assertInternalType('object', $user);
        $this->assertInternalType('string', $user->username);
        $this->assertInternalType('string', $user->bio);
        $this->assertInternalType('string', $user->website);
        $this->assertInternalType('string', $user->profile_picture);
        $this->assertInternalType('string', $user->full_name);
        $this->assertInternalType('object', $user->counts);
    }

    public function testRequestMethod()
    {
        $client = $this->getClient();
        $client->setAccessToken($this->getAccessToken());

        $user = $client->request('users/' . $this->getDemoUserId());
        $this->assertUser($user);
    }

    public function testGetUser()
    {
        $client = $this->getClient();
        $client->setAccessToken($this->getAccessToken());

        $user = $client->getUser($this->getDemoUserId());
        $this->assertUser($user);
    }

    public function testGetUserSelf()
    {
        $client = $this->getClient();
        $client->setAccessToken($this->getAccessToken());

        $user = $client->getUser('self');
        $this->assertUser($user);
    }

    public function testGetUserWithoutParameters()
    {
        $client = $this->getClient();
        $client->setAccessToken($this->getAccessToken());

        $user = $client->getUser();
        $this->assertUser($user);
    }
}

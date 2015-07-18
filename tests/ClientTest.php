<?php
/**
 * @author Patsura Dmitry <talk@dmtry.me>
 */

namespace TestInstagram;

use SocialConnect\Instagram\Client;

class ClientTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var string
     */
    const USER_ENTITY_CLASS = 'SocialConnect\Instagram\Entity\User';

    /**
     * @return Client
     */
    protected function getClient()
    {
        $client = new Client(getenv('applicationId'), getenv('applicationSecret'));
        $client->setHttpClient(new \SocialConnect\Common\Http\Client\Curl());

        return $client;
    }

    /**
     * @return string
     */
    protected function getAccessToken()
    {
        return getenv('testUserAccessToken');
    }


    /**
     * @return integer
     */
    protected function getDemoUserId()
    {
        return (int) getenv('testUserId');
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

        $this->assertInstanceOf(self::USER_ENTITY_CLASS, $client->getUser($this->getDemoUserId()));
    }

    public function testGetUserWithSelfParameter()
    {
        $client = $this->getClient();
        $client->setAccessToken($this->getAccessToken());

        $this->assertInstanceOf(self::USER_ENTITY_CLASS, $client->getUser('self'));
    }

    public function testGetUserWithoutParameters()
    {
        $client = $this->getClient();
        $client->setAccessToken($this->getAccessToken());

        $this->assertInstanceOf(self::USER_ENTITY_CLASS, $client->getUser());
    }

    public function testGetUserMediaRecent()
    {
        $client = $this->getClient();
        $client->setAccessToken($this->getAccessToken());

        $result = $client->getUserMediaRecent($this->getDemoUserId());
        $this->assertInternalType('array', $result);
        $this->assertTrue(count($result) > 10);

        foreach ($result as $row) {
            $this->assertInternalType('object', $row);
        }
    }

    /**
     * Get my own user media by $token
     */
    public function testGetUserMediaLiked()
    {
        $client = $this->getClient();
        $client->setAccessToken($this->getAccessToken());

        $result = $client->getUserMediaLiked();
        $this->assertInternalType('array', $result);
        $this->assertTrue(count($result) > 10);

        foreach ($result as $row) {
            $this->assertInternalType('object', $row);
        }
    }

    public function testGetMediaSuccess()
    {
        $client = $this->getClient();
        $client->setAccessToken($this->getAccessToken());

        $result = $client->getMedia('1031840824432438724_5120682');
        $this->assertInstanceOf('SocialConnect\Instagram\Entity\Media', $result);
    }

    public function testGetMediasWrong()
    {
        $this->setExpectedException('\Exception', 'invalid media id', 400);

        $client = $this->getClient();
        $client->setAccessToken($this->getAccessToken());

        $result = $client->getMedia('111111111111111111_1111111');
        $this->assertFalse($result);
    }

    /**
     * Get my own user media by $token
     */
    public function testGetMediaPopular()
    {
        $client = $this->getClient();
        $client->setAccessToken($this->getAccessToken());

        $result = $client->getMediaPopular();
        $this->assertInternalType('array', $result);
        $this->assertTrue(count($result) > 10);

        foreach ($result as $row) {
            $this->assertInstanceOf('SocialConnect\Instagram\Entity\Media', $row);
        }
    }
}

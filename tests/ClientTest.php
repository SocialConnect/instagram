<?php
/**
 * @author Patsura Dmitry <talk@dmtry.me>
 */

class ClientTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @return \SocialConnect\Instagram\Client
     */
    protected function getClient()
    {
        $client = new \SocialConnect\Instagram\Client($GLOBALS['applicationId'], $GLOBALS['applicationSecret']);
        $client->setHttpClient(new SocialConnect\Common\Http\Client\Curl());

        return $client;
    }

    /**
     * @return mixed
     */
    protected function getAccessToken()
    {
        return $GLOBALS['testUserAccessToken'];
    }


    /**
     * @return mixed
     */
    protected function getDemoUserId()
    {
        return $GLOBALS['testUserId'];
    }

    public function testGetUser()
    {
        $client = $this->getClient();
        $client->setAccessToken($this->getAccessToken());

        $user = $client->request('users/' . $this->getDemoUserId());
        $this->assertTrue($user);
        $this->assertInternalType('string', $user->username);
        $this->assertInternalType('string', $user->bio);
        $this->assertInternalType('string', $user->website);
        $this->assertInternalType('string', $user->profile_picture);
        $this->assertInternalType('string', $user->full_name);
        $this->assertInternalType('array', $user->counts);
    }
}
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

        $user = $client->getUser($this->getDemoUserId());
        var_dump($user);
        die();
    }
}
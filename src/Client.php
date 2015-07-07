<?php
/**
 * SocialConnect project
 * @author: Patsura Dmitry https://github.com/ovr <talk@dmtry.me>
 */

namespace SocialConnect\Instagram;

use SocialConnect\Common\HttpClient;

class Client extends \SocialConnect\Common\ClientAbstract
{
    use HttpClient;

    /**
     * @param string $accessToken
     */
    public function setAccessToken($accessToken)
    {
        $this->accessToken = $accessToken;
    }

    protected function checkLimit($limit)
    {
        if (!is_int($limit) || $limit <= 0) {
            throw new \InvalidArgumentException('$limit must be > 0, actual: ' . $limit);
        }
    }

    public function searchUser($name, $limit = null)
    {
        if (!is_null($limit)) {
            $this->checkLimit($limit);
        }
    }

    public function getUser($id = 0)
    {

    }

    public function getUserFeed($limit = null)
    {
        if (!is_null($limit)) {
            $this->checkLimit($limit);
        }
    }

    public function getUserMedia($id = 'self', $limit = null)
    {
        if (!is_null($limit)) {
            $this->checkLimit($limit);
        }
    }

    public function getUserLikes($limit = 0)
    {
        if (!is_null($limit)) {
            $this->checkLimit($limit);
        }
    }

    public function getUserFollows($id = 'self', $limit = null)
    {
        if (!is_null($limit)) {
            $this->checkLimit($limit);
        }
    }

    public function getUserFollower($id = 'self', $limit = null)
    {
        if (!is_null($limit)) {
            $this->checkLimit($limit);
        }
    }
}

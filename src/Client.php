<?php
/**
 * SocialConnect project
 * @author: Patsura Dmitry https://github.com/ovr <talk@dmtry.me>
 */

namespace SocialConnect\Instagram;

use InvalidArgumentException;
use SocialConnect\Common\HttpClient;

class Client extends \SocialConnect\Common\ClientAbstract
{
    use HttpClient;

    /**
     * @var string
     */
    protected $apiUrl = 'https://api.instagram.com/v1/';

    /**
     * @param string $accessToken
     */
    public function setAccessToken($accessToken)
    {
        $this->accessToken = $accessToken;
    }

    /**
     * @param $uri
     * @param array $parameters
     * @param bool|false $accessToken
     * @return bool|mixed
     * @throws \Exception
     */
    public function request($uri, array $parameters = array(), $accessToken = false)
    {
        $parameters['client_id'] = $this->appId;
        $parameters['access_token'] = $this->accessToken;

        foreach ($parameters as $key => $parameter) {
            if (is_array($parameter)) {
                $parameters[$key] = implode(',', $parameter);
            }
        }

        $response = $this->httpClient->request($this->apiUrl . $uri . '?' . http_build_query($parameters), []);
        if ($response) {
            if ($response->isServerError()) {
                throw new \Exception($response);
            }
            $body = $response->getBody();
            if ($body) {
                $json = json_decode($body);
                if ($json->data) {
                    return $json->data;
                }
                
                throw new \Exception($response);
            } else {
                throw new \Exception($response);
            }
        }
        return false;
    }

    protected function checkLimit($limit)
    {
        if (!is_int($limit) || $limit <= 0) {
            throw new InvalidArgumentException('$limit must be > 0, actual: ' . $limit);
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

<?php
/**
 * SocialConnect project
 * @author: Patsura Dmitry https://github.com/ovr <talk@dmtry.me>
 */

namespace SocialConnect\Instagram\Entity;

class User extends \stdClass
{
    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $bio;

    /**
     * @var string
     */
    public $website;

    /**
     * @var string
     */
    public $profile_picture;

    /**
     * @var string
     */
    public $full_name;

    /**
     * @var \stdClass
     */
    public $counts;
}

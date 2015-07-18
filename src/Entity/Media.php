<?php
/**
 * SocialConnect project
 * @author: Patsura Dmitry https://github.com/ovr <talk@dmtry.me>
 */

namespace SocialConnect\Instagram\Entity;

class Media extends \stdClass
{
    /**
     * @var string
     */
    public $id;

    /**
     * @var array|null
     */
    public $attribution;

    /**
     * @var array
     */
    public $tags;

    /**
     * @var string
     */
    public $type;

    /**
     * @var string
     */
    public $location;

    /**
     * @var array
     */
    public $comments;

    public $caption;

    /**
     * What's filter was used
     * @var string
     */
    public $filter;

    /**
     * Unixtime
     * @var string
     */
    public $created_time;

    /**
     * @var string
     */
    public $link;

    /**
     * @var \stdClass
     */
    public $likes;

    public $image;

    public $users_in_photo;

    public $user_has_liked;

    public $user;
}

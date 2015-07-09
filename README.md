# <img src="https://socialconnect.github.io/assets/icons/Instagram.png" width="27"> Instagram SDK
[![Build Status](https://scrutinizer-ci.com/g/SocialConnect/instagram/badges/build.png?b=master)](https://scrutinizer-ci.com/g/SocialConnect/instagram/build-status/master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/SocialConnect/instagram/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/SocialConnect/instagram/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/SocialConnect/instagram/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/SocialConnect/instagram/?branch=master)
[![Latest Stable Version](https://poser.pugx.org/socialconnect/instagram/v/stable.svg)](https://packagist.org/packages/socialconnect/instagram)
[![License](https://poser.pugx.org/SocialConnect/instagram/license.svg)](https://packagist.org/packages/socialconnect/instagram)

Awesome SDK to work with Instagram social network.

Installation
------------

Add a requirement to your `composer.json`:

```json
{
    "require": {
        "socialconnect/instagram": "~0.1"
    }
}
```

Run the composer installer:

```bash
php composer.phar install
```

How to use
----------

First you need to create service:

```php
// Your Instagram Application's settings
$appId = 'appId';
$appSecret = 'secret';

$instagramClient = new \SocialConnect\Instagram\Client($appId, $appSecret);
$instagramClient->setHttpClient(new \SocialConnect\Common\Http\Client\Curl());
```

## Get user with specified $id:

```php
$instagramClient = $instagramClient->getUser(715473058);
var_dump($user);
```

## Get self information:

```php
$instagramClient = $instagramClient->getUser();
var_dump($user);
```


## Customs methods

```php
$parameters = [];
$result = $instagramClient->request('method/CustomMethod', $parameters);
if ($result) {
    var_dump($result);
}
```

## Custom entities

```php
class MyUserEntitiy extends \SocialConnect\Instagram\Entity\User {
    public function myOwnMethod()
    {
        //do something
    }
}

$instagramClient->getEntityUser(new MyUserEntitiy());
$user = $instagramClient->getUser(1);

if ($user) {
    $instagramClient->myOwnMethod();
}
```

License
-------

This project is open-sourced software licensed under the MIT License. See the LICENSE file for more information.

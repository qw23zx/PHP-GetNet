# PHP-GetNet

## Description
A PHP function to get client network information such as ASN, ISP, city, region, country, IP address, and user agent using the ip-api.com API.

## Installation
1. Copy `php-getnet.php` to your PHP project directory.
2. Include `php-getnet.php` in your PHP script:
```include_once "php-getnet.php";```

## Usage
Call the `getClientNetInfo()` function to get the client network information:

```
$clientNetInfo = getClientNetInfo();
if (isset($clientNetInfo["error"])) {
echo $clientNetInfo["error"];
} else {
var_dump($clientNetInfo);
}
```

The function will return an array with the following keys:
* `asn` - the client's ASN
* `isp` - the client's ISP
* `city` - the client's city
* `region` - the client's region
* `country` - the client's country
* `ip` - the client's IP address
* `user_agent` - the client's user agent

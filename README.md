# PHP-GetNet

## Description
A PHP function to get client network information such as ASN, ISP, city, region, country, IP address, and user agent using the ipinfo.io API.

## Installation
1. Copy `php-getnet.php` to your PHP project directory.
2. Include `php-getnet.php` in your PHP script:
```include_once "php-getnet.php";```

## Usage
Call the `getClientNetInfo()` function to get the client network information:
```$clientNetInfo = getClientNetInfo();
if (isset($clientNetInfo["error"])) {
echo $clientNetInfo["error"];
} else {
var_dump($clientNetInfo);
}```


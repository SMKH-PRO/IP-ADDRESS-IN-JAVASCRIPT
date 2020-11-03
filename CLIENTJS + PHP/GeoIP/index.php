<?php

  header("Access-Control-Allow-Origin: *");//Allow request from all domains.

//* Grab the latest geoip2.phar: https://github.com/maxmind/GeoIP2-php/releases
require_once("geoip2.phar");
use GeoIp2\Database\Reader;

if (!empty($_SERVER['HTTP_CLIENT_IP']))   
  {
    $ip_address = $_SERVER['HTTP_CLIENT_IP'];
  }
//whether ip is from proxy
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  
  {
    $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
  }
//whether ip is from remote address
else
  {
    $ip_address = $_SERVER['REMOTE_ADDR'];
  }

// * Grab the latest GeoIP2 Lite Database(s): https://dev.maxmind.com/geoip/geoip2/geolite2/
// City DB
$readCity = new Reader('GeoLite2-City.mmdb');  
$record = $readCity->city($ip_address);
$myObj->ip =$ip_address;
$myObj->country =$record->country->name ;
$myObj->countryCode = $record->country->isoCode;
$myObj->city =$record->city->name;
$myObj->region =$record->mostSpecificSubdivision->name;
$myObj->regionCode =$record->mostSpecificSubdivision->isoCode;
$myObj->loc->lat =$record->location->latitude;
$myObj->loc->lng =$record->location->longitude;


echo json_encode($myObj);
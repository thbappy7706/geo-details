<?php

use GeoDetails\GeoLocationService;

if (!function_exists('getLatitude')) {
    function getLatitude($ip)
    {
        $geoLocationService = new GeoLocationService();
        return $geoLocationService->getLatitude($ip);
    }
}

if (!function_exists('getLongitude')) {
    function getLongitude($ip)
    {
        $geoLocationService = new GeoLocationService();
        return $geoLocationService->getLongitude($ip);
    }
}

if (!function_exists('getTimezone')) {
    function getTimezone($ip)
    {
        $geoLocationService = new GeoLocationService();
        return $geoLocationService->getTimezone($ip);
    }
}

if (!function_exists('getCurrency')) {
    function getCurrency($ip)
    {
        $geoLocationService = new GeoLocationService();
        return $geoLocationService->getCurrency($ip);
    }
}

if (!function_exists('getCountryName')) {
    function getCountryName($ip)
    {
        $geoLocationService = new GeoLocationService();
        return $geoLocationService->getCountryName($ip);
    }
}


if (!function_exists('getCountryCapital')) {
    function getCountryCapital($ip)
    {
        $geoLocationService = new GeoLocationService();
        return $geoLocationService->getCountryCapital($ip);
    }
}

if (!function_exists('getIspName')) {
    function getIspName($ip)
    {
        $geoLocationService = new GeoLocationService();
        return $geoLocationService->getIspName($ip);
    }
}
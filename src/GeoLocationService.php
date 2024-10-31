<?php

namespace GeoDetails;

use GuzzleHttp\Client;
use Exception;

class GeoLocationService
{
    private $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function getDetails($ip)
    {
        try {
            $response = $this->client->get("https://ipapi.co/{$ip}/json/");
            $data = json_decode($response->getBody(), true);

            // Check if there's an error in the response
            if (isset($data['error']) && $data['error']) {
                throw new Exception($data['reason']);
            }

            return $data;
        } catch (Exception $e) {
            // Handle the exception, you can log it or return a specific error message
            return [
                'error' => true,
                'message' => $e->getMessage(),
            ];
        }
    }

    public function getLatitude($ip)
    {
        $details = $this->getDetails($ip);
        return $details['error'] ?? null ? null : $details['latitude'];
    }

    public function getLongitude($ip)
    {
        $details = $this->getDetails($ip);
        return $details['error'] ?? null ? null : $details['longitude'];
    }

    public function getTimezone($ip)
    {
        $details = $this->getDetails($ip);
        return $details['error'] ?? null ? null : $details['timezone'];
    }

    public function getCurrency($ip)
    {
        $details = $this->getDetails($ip);
        return $details['error'] ?? null ? null : $details['currency'];
    }


    public function getCountryName($ip)
    {
        $details = $this->getDetails($ip);
        return $details['error'] ?? null ? null : $details['country_name'];
    }




    public function getCountryCapital($ip)
    {
        $details = $this->getDetails($ip);
        return $details['error'] ?? null ? null : $details['country_capital'];
    }


    public function getIspName($ip)
    {
        $details = $this->getDetails($ip);
        return $details['error'] ?? null ? null : $details['org'];
    }
}

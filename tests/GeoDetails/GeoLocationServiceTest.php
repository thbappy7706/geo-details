<?php

namespace GeoDetails;

use GeoDetails\GeoLocationService;
use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;

class GeoLocationServiceTest extends TestCase
{
    protected function createServiceWithMockedClient($responseBody)
    {
        // Create a mock handler with the provided response
        $mock = new MockHandler([new Response(200, [], json_encode($responseBody))]);
        $handlerStack = HandlerStack::create($mock);

        // Pass the mock handler to the Guzzle client
        $client = new Client(['handler' => $handlerStack]);

        // Instantiate GeoLocationService with the mocked client
        return new GeoLocationService($client);
    }

    public function testGetLatitude()
    {
        $service = $this->createServiceWithMockedClient(['latitude' => 23.73625]);
        $latitude = $service->getLatitude('103.92.216.226');
        $this->assertEquals(23.73625, $latitude);
    }

    public function testGetLongitude()
    {
        $service = $this->createServiceWithMockedClient(['longitude' => 90.41426]);
        $longitude = $service->getLongitude('103.92.216.226');
        $this->assertEquals(90.41426, $longitude);
    }

    public function testGetTimezone()
    {
        $service = $this->createServiceWithMockedClient(['timezone' => 'Asia/Dhaka']);
        $timezone = $service->getTimezone('103.92.216.226');
        $this->assertEquals('Asia/Dhaka', $timezone);
    }

    public function testGetCurrency()
    {
        $service = $this->createServiceWithMockedClient(['currency' => 'BDT']);
        $currency = $service->getCurrency('103.92.216.226');
        $this->assertEquals('BDT', $currency);
    }

    public function testErrorHandling()
    {
        $service = $this->createServiceWithMockedClient([
            'error' => true,
            'reason' => 'Invalid IP Address'
        ]);

        $latitude = $service->getLatitude('127.0.0.1:8000');
        $this->assertNull($latitude, 'Expected null when there is an error in the response');

        $longitude = $service->getLongitude('127.0.0.1:8000');
        $this->assertNull($longitude, 'Expected null when there is an error in the response');

        $timezone = $service->getTimezone('127.0.0.1:8000');
        $this->assertNull($timezone, 'Expected null when there is an error in the response');

        $currency = $service->getCurrency('127.0.0.1:8000');
        $this->assertNull($currency, 'Expected null when there is an error in the response');
    }

    public function testGetDetailsReturnsError()
    {
        $service = $this->createServiceWithMockedClient([
            'error' => true,
            'reason' => 'Invalid IP Address'
        ]);

        $details = $service->getDetails('127.0.0.1:8000');
        $this->assertTrue($details['error'], 'Expected error to be true');
        $this->assertEquals('Invalid IP Address', $details['message']);
    }
}

# GeoDetails

GeoDetails is a PHP package designed to retrieve geolocation information based on a given IP address. This package can fetch details like latitude, longitude, timezone, and currency, making it ideal for integration into PHP or Laravel projects.

## Table of Contents
- [Installation](#installation)
- [Configuration](#configuration)
- [Usage](#usage)
- [Available Methods](#available-methods)
- [Error Handling](#error-handling)
- [Helper Functions](#helper-functions)
- [License](#license)
- [Contributing](#contributing)
- [Author](#author)

---

## Installation

Install the `geo-details` package using Composer:

```bash
composer require thbappy7706/geo-details
```
This will add the package to your project’s dependencies.

 ## Configuration
This package uses GuzzleHttp for making HTTP requests. Ensure that Guzzle is included in your project (it should be installed automatically as a dependency).

## Usage
After installing, you can use the package by creating an instance of the GeoLocationService class or by using helper functions.

Example: Using GeoLocationService Class

```bash
require 'vendor/autoload.php';

use GeoDetails\GeoLocationService;

// Instantiate the GeoLocationService class
$geoService = new GeoLocationService();

// Specify the IP address you want to retrieve details for
$ip = '8.8.8.8';

// Fetch and display geolocation details
$latitude = $geoService->getLatitude($ip);
$longitude = $geoService->getLongitude($ip);

if ($latitude !== null && $longitude !== null) {
    echo "Latitude: " . $latitude . ", Longitude: " . $longitude;
} else {
    echo "Error: Unable to retrieve location details.";
}

```

## Available Methods
The GeoLocationService class provides methods to retrieve specific details for a given IP address.

## Method List
getLatitude($ip): Returns the latitude of the specified IP address.
getLongitude($ip): Returns the longitude of the specified IP address.
getTimezone($ip): Returns the timezone of the specified IP address.
getCurrency($ip): Returns the currency of the specified IP address.
getDetails($ip): Returns the full API response, including all available details.
Method Parameters
$ip: The IP address to retrieve geolocation details for (e.g., '8.8.8.8').
Example of Each Method


```bash
$geoService = new GeoLocationService();
$ip = '8.8.8.8';

echo "Latitude: " . $geoService->getLatitude($ip) . PHP_EOL;
echo "Longitude: " . $geoService->getLongitude($ip) . PHP_EOL;
echo "Timezone: " . $geoService->getTimezone($ip) . PHP_EOL;
echo "Currency: " . $geoService->getCurrency($ip) . PHP_EOL;

```


## Error Handling
If the IP address is invalid or if there’s an issue with the request, the methods return null.

Error Example
If the API response contains an error, such as:
```bash
$latitude = $geoService->getLatitude('127.0.0.1:8000');

if ($latitude === null) {
    echo "Error: Unable to retrieve latitude.";
} else {
    echo "Latitude: " . $latitude;
}

```
Or, when using getDetails:

```bash
$details = $geoService->getDetails('127.0.0.1:8000');

if (isset($details['error']) && $details['error']) {
    echo "Error: " . $details['reason'];
} else {
    echo "Details retrieved successfully.";
}

``` 

## Helper Functions
The package provides helper functions for convenience, so you don’t have to instantiate GeoLocationService directly.

## Available Helper Functions

```bash
$ip = '8.8.8.8';

echo "Latitude: " . getLatitude($ip) . PHP_EOL;
echo "Longitude: " . getLongitude($ip) . PHP_EOL;
echo "Timezone: " . getTimezone($ip) . PHP_EOL;
echo "Currency: " . getCurrency($ip) . PHP_EOL;

```
 

## License
This package is licensed under the MIT License. See the LICENSE file for details.

## Contributing
Contributions are welcome! Please open issues or submit pull requests with improvements or bug fixes. For significant changes, open an issue first to discuss your proposed changes.

# Author
### Created by Tanvir Hossen Bappy
<?php

namespace Likemusic\YandexFleetTaxiClientSimplified\Real;

use Http\Client\Curl\Client as CurlClient;
use Http\Discovery\Psr17FactoryDiscovery;
use Likemusic\YandexFleetTaxiClient\Client as BaseNativeClient;
use Likemusic\YandexFleetTaxiClient\PageParser\FleetTaxiYandexRu\Index as DashboardPageParser;
use Likemusic\YandexFleetTaxiClient\PageParser\PassportYandexRu\Auth\Welcome as WelcomePageParser;

class NativeClient extends BaseNativeClient
{
    public function __construct()
    {
        $curlOptions = [
            CURLOPT_PROXY => 'host.docker.internal:8888',
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_SSL_VERIFYPEER => false,
        ];

        $httpClient = new CurlClient(null, null, $curlOptions);

        $requestFactory = Psr17FactoryDiscovery::findRequestFactory();
        $streamFactory = Psr17FactoryDiscovery::findStreamFactory();
        $welcomePageParser = new WelcomePageParser();
        $dashboardPageParser = new DashboardPageParser();


        parent::__construct($httpClient, $requestFactory, $streamFactory, $welcomePageParser, $dashboardPageParser);
    }
}

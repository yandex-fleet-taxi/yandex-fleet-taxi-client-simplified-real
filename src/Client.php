<?php

namespace Likemusic\YandexFleetTaxiClientSimplified\Real;

use Likemusic\YandexFleetTaxiClientSimplified\Client as BaseClient;
use Likemusic\YandexFleetTaxiClientSimplified\Real\Car\ToPostDataConverter as CarToPostDataConverter;
use Likemusic\YandexFleetTaxiClientSimplified\Real\Driver\ToPostDataConverter as DriverToPostDataConverter;

class Client extends BaseClient
{
    public function __construct(
        string $login,
        string $password,
        string $parkId,
        string $workRuleId
    )
    {
        $client = new NativeClient();
        $driverToPostDataConverter = new DriverToPostDataConverter($workRuleId);
        $carToPostDataConverter = new CarToPostDataConverter();

        parent::__construct($client, $login, $password, $parkId, $driverToPostDataConverter, $carToPostDataConverter);
    }
}

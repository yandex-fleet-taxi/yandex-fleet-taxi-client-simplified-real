<?php

namespace Likemusic\YandexFleetTaxiClientSimplified\Real\Car;

use Likemusic\YandexFleetTaxiClientSimplified\Entities\Car\ToPostDataConverter as BaseToPostDataConverter;

class ToPostDataConverter extends BaseToPostDataConverter
{
    public function __construct()
    {
        $defaultPostData = DefaultPostDataInterface::VALUE;

        parent::__construct($defaultPostData);
    }
}

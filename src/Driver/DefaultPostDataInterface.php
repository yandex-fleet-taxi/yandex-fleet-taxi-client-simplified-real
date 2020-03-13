<?php

namespace Likemusic\YandexFleetTaxiClientSimplified\Real\Driver;

interface DefaultPostDataInterface
{
    const VALUE = [
        'accounts' => [
            'balance_limit' => "5",
        ],

        'driver_profile' => [
            'providers' => [
                'yandex'
            ],

            'balance_deny_onlycard' => false,
        ]
    ];
}

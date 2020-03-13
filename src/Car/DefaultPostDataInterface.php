<?php

namespace Likemusic\YandexFleetTaxiClientSimplified\Real\Car;

interface DefaultPostDataInterface
{
    const VALUE = [
        'status' => 'working',
        'booster_count' => 0,
        'categories' => [],
        'carrier_permit_owner_id' => NULL,
        'transmission' => 'unknown',
        'rental' => null,
        'chairs' => [],
        'tariffs' => [],
        'body_number' => null,
        'service_check_expiration_date' => null,
        'car_insurance_expiration_date' => null,
        'car_authorization_expiration_date' => null,
        'insurance_for_goods_and_passengers_expiration_date' => null,
        'badge_for_alternative_transport_expiration_date' => null,
        'amenities' => [],
        'permit_num' => null,
    ];
}

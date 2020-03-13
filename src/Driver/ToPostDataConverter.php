<?php

namespace Likemusic\YandexFleetTaxiClientSimplified\Real\Driver;

use Likemusic\YandexFleetTaxiClientSimplified\Entities\Driver\ToPostDataConverter as BaseToPostDataConverter;
use Likemusic\YandexFleetTaxiClient\Contracts\PostDataKey\CreateDriverInterface as DriverPostDataKeyEnum;
use Likemusic\YandexFleetTaxiClient\Contracts\PostDataKey\CreateDriver\DriverProfileInterface as DriverProfileDataKeyEnum;

class ToPostDataConverter extends BaseToPostDataConverter
{
    public function __construct(string $workRuleId)
    {
        $defaultPostData = DefaultPostDataInterface::VALUE;
        $defaultPostData[DriverPostDataKeyEnum::DRIVER_PROFILE][DriverProfileDataKeyEnum::WORK_RULE_ID] = $workRuleId;

        parent::__construct($defaultPostData);
    }
}

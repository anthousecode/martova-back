<?php


namespace App\Services\Factories;


class OAuthFactory
{
    public static function create (string $thirdPartyServiceName)
    {
        $thirdPartyServiceName = sprintf("\App\Services\ThirdParties\%s", ucfirst($thirdPartyServiceName));
        return new $thirdPartyServiceName();
    }
}

<?php


namespace App\Services\ThirdParties;

class Foursquare
{
    public function redirect()
    {
        $link = sprintf(
            "https://foursquare.com/oauth2/authenticate?client_id=%s&response_type=code&redirect_uri=%s",
            config('services.foursquare.client_id'),
            config('services.foursquare.redirect')
        );
        return redirect()->away($link);
    }
}

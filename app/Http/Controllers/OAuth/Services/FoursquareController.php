<?php

namespace App\Http\Controllers\OAuth\Services;

use GuzzleHttp\Client;
use Carbon\Carbon;
use Illuminate\Support\Facades\Request as RequestFacade;
use Illuminate\Http\Request;

class FoursquareController
{
    public function redirect()
    {
	$defaultFromLink = 'http://martovariverside.com/News/';    
	$fromLink = RequestFacade::get('link') ?? $defaultFromLink;
        session(['from_link' => $fromLink]);
	$link = sprintf(
            "https://foursquare.com/oauth2/authenticate?client_id=%s&response_type=code&redirect_uri=%s",
            config('services.foursquare.client_id'),
            config('services.foursquare.redirect')
        );
        return redirect()->away($link);
    }

    public function authenticatedCallbackHandler()
    {
            $link = sprintf(
		    "https://foursquare.com/oauth2/access_token?client_id=%s&client_secret=%s&grant_type=authorization_code&redirect_uri=%s&code=%s",
		    config('services.foursquare.client_id'),
		    config('services.foursquare.client_secret'),
		    config('services.foursquare.redirect'),
		    RequestFacade::get('code')
	    );

	    $accessTokenJson = (string) (new Client)
		    ->request('GET', $link)
		    ->getBody();

	    return redirect()->away(session('from_link') . '?foursquare_key=' . json_decode($accessTokenJson, true)['access_token']);
    }

    public function checkin()
    {
	    $accessToken = RequestFacade::get('accessToken');
	    if (!$accessToken) {
                return response()->json(['message' => 'Token not found'], 404);
	    }
	    // GET /v2/venues/search, response.venues[0].id (using appropriate ll of place)
	    $venueId = config('services.foursquare.default_venue_id');
	    $link = sprintf(
		    "https://api.foursquare.com/v2/checkins/add?oauth_token=%s&venueId=%s&v=%s",
		    $accessToken,
		    $venueId,
		    Carbon::now()->format("Ymd")
	    );
            return $link;
    }
}


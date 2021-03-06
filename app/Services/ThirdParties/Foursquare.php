<?php


namespace App\Services\ThirdParties;

use GuzzleHttp\Client;

// TODO: it must be controller for foursqure operations
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

    public function authenticatedCallbackHandler()
    {
	    $link = sprintf(
		    "https://foursquare.com/oauth2/access_token?client_id=%s&client_secret=%s&grant_type=authorization_code&redirect_uri=%s&code=%s",
		    config('services.foursquare.client_id'),
		    config('services.foursquare.client_secret'),
		    config('services.foursquare.redirect'),
		    \Illuminate\Support\Facades\Request::get('code')
	    );

	    // json "access_token"
	    return (string) (new Client)
		    ->request('GET', $link)
		    ->getBody();
    }

    public function checkIn(\Illuminate\Http\Request $request)
    {
	    $accessToken = $request->access_token;
	    if (!$accessToken) {
                return response()->json(['message' => 'Token not found'], 404);
	    }
	    // GET /v2/venues/search, response.venues[0].id (using appropriate ll of place)
	    $venueId = config('services.foursquare.default_venue_id');
            $link = sprintf(
		    "https://api.foursquare.com/v2/checkins/add?oauth_token=%s&venueId=%s&v=%s",
		    $accessToken,
		    $venueId,
		    \Carbon\Carbon::now()->format("Ymd")
	    );
            return (string) (new Client)
                    ->request('POST', $link)
		    ->getBody();
    }
}

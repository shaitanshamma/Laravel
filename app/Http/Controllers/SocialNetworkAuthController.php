<?php

namespace App\Http\Controllers;


use App\Contracts\Social;
use Laravel\Socialite\Facades\Socialite;


class SocialNetworkAuthController extends Controller
{
    public function redirect(string $network)
    {
        return Socialite::driver($network)->redirect();
    }

    public function callback(string $network, Social $service)
    {
        return redirect( $service->setUser(
            Socialite::driver($network)->user(),
            $network
        ));
    }
}

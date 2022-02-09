<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\Social;
use App\Models\User as Model;
use Laravel\Socialite\Contracts\User;

class SocialService implements Social
{
	/**
	 * @param User $socialUser
	 * @param string $network
	 * @return string
	 * @throws \Exception
	 */
	public function setUser(User $socialUser, string $network): string
	{
        $user = Model::query()->where('email', $socialUser->getEmail())->first();
		if($user) {
			$user->name = $socialUser->getName();
			$user->avatar = $socialUser->getAvatar();

			if($user->save()) {
				\Auth::loginUsingId($user->id);
				return route('account');
			}
		}else {
            session()->put(['userName'=>$socialUser->getName()]);
            session()->put(['userEmail'=>$socialUser->getEmail()]);
            session()->put(['userAvatar'=>$socialUser->getAvatar()]);

			return route('register');
		}

		throw new \Exception("We get error via social network: " . $network);
	}
}

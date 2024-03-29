<?php 
	
	namespace App\Services;
	
	use App\Modules\Users\Models\SocialFacebookAccount;
	use App\Modules\Users\Models\User;
	
	use Laravel\Socialite\Contracts\User as ProviderUser;

	use Hash;

	class SocialFacebookAccountService
	{
	    public function createOrGetUser(ProviderUser $providerUser)
	    {
	        $account = SocialFacebookAccount::whereProvider('facebook')
	            ->whereProviderUserId($providerUser->getId())
	            ->first();
	            
	        if ($account) {
	            return $account->user;
	        } else {

	            $account = new SocialFacebookAccount([
	                'provider_user_id' => $providerUser->getId(),
	                'provider' => 'facebook'
	            ]);

	            $user = User::whereEmail($providerUser->getEmail())->first();

	            if (!$user) {

	                $user = User::create([
	                    'email' => $providerUser->getEmail(),
	                    'name' => explode(' ', $providerUser->getName())[0],
	                    'lastname' => explode(' ', $providerUser->getName())[1],
	                    'password' => Hash::make(rand(1,10000)) ,
	                ]);
	            }

	            $account->user()->associate($user);
	            $account->save();

	            return $user;
	        }
	    }
	}
<?php 
	
	namespace App\Services;
	
	use App\Modules\Users\Models\SocialFacebookAccount;
	use App\Modules\Users\Models\User;

	use Hash;
	
	use Laravel\Socialite\Contracts\User as ProviderUser;

	class SocialGoogleAccountService
	{
	    public function createOrGetUser(ProviderUser $providerUser)
	    {
	        try {
	            $user = $providerUser;
	        } catch (\Exception $e) {
	            return redirect()->route('actionMainIndex');
	        }

	        $CheckUser = User::whereEmail($user->email)->first();

	        if($CheckUser){
	            return $CheckUser;
	        } else {
	        	if(empty($user->name)) {
	        		$user_name = '';
	        		$user_lastname = '';
	        	} else {
	        		$user_name = explode(' ', $user->name)[0];
	        		$user_lastname = explode(' ', $user->name)[1];
	        	}

	        	$UserData = User::create([
                    'email' => $user->email,
                    'name' => $user_name,
                    'lastname' => $user_lastname,
                    'password' => Hash::make(rand(1,10000)) ,
                    'google_id' => $user->id,
                ]);
                return $UserData;
	        }
	    }
	}
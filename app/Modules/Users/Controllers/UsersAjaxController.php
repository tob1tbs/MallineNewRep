<?php

namespace App\Modules\Users\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Modules\Users\Models\User;
use App\Modules\Users\Models\UserRestore;
use App\Modules\Users\Models\UserVerifyMail;

use Mail;
use App\Mail\SetupMail;
use App\Mail\RestoreMail;

use Response;
use Validator;
use Hash;
use Auth;

class UsersAjaxController extends Controller
{

    public function __construct() {
       
    }

    public function ajaxUserSignUp(Request $Request) {
        if($Request->isMethod('POST')) {
            $messages = array(
                'required' => trans('site.place_enter_all_required_fields'),
                'modal_user_email.unique' => trans('site.current_email_is_busy'),
                'modal_user_email.email' => trans('site.email_format_incorect'),
                'modal_user_phone.unique' => trans('site.current_phone_is_busy'),
                'modal_user_phone.digits' => trans('site.incorect_phone_format'),
                'modal_user_personal_id.unique' => trans('site.current_personal_id_is_busy'),
                'modal_user_password.min' => trans('site.password_lengh_min_6'),
                'modal_user_conf_password.same' => trans('site.password_dont_mach'),
                'modal_user_personal_id.numeric' => trans('site.incorect_personal_id'),
                'modal_user_personal_id.digits' => trans('site.incorect_personal_id'),
            );
            $validator = Validator::make($Request->all(), [
                'modal_user_email' => 'required|max:255|unique:new_customers,email|email',
                'modal_user_name' => 'required|max:255',
                'modal_user_lastname' => 'required|max:255',
                // 'modal_user_personal_id' => 'required|digits:11|unique:new_customers,personal_number|numeric',
                // 'modal_user_bday' => 'required|max:255',
                'modal_user_phone' => 'required|digits:9|unique:new_customers,phone',
                'modal_user_password' => 'min:6|same:modal_user_conf_password|required_with:modal_user_password',
                'modal_user_conf_password' => 'required',
            ], $messages)->stopOnFirstFailure(false);

            if ($validator->fails()) {
                return Response::json(['status' => true, 'errors' => true, 'message' => $validator->getMessageBag()->toArray(), 'required_message' => trans('site.place_enter_all_required_fields')], 200);
            } else {

                $User = new User();
                $User->name = $Request->modal_user_name;
                $User->lastname = $Request->modal_user_lastname;
                $User->personal_number = $Request->modal_user_personal_id;
                $User->bdate = $Request->modal_user_bday;
                $User->phone = $Request->modal_user_phone;
                $User->email = $Request->modal_user_email;
                $User->password = Hash::make($Request->modal_user_password);
                $User->save();

                $hash = md5(time());

                $UserVerifyMail = new UserVerifyMail();
                $UserVerifyMail->user_id = $User->id;
                $UserVerifyMail->hash = $hash;
                $UserVerifyMail->save();

                $testMailData = [
                    'title' => 'Registration success',
                    'body' => 'This is the body of test email.'
                ];

                Mail::to($Request->modal_user_email)->send(new SetupMail($testMailData));

                return Response::json([
                    'status' => true, 
                    'errors' => false,
                    'message' => [0 => 'თქვენ წარმატებით გაიარეთ რეგისტრაცია !!!'],
                    'redirect_url' => route('actionMainIndex'),
                ]);
            }
        } else {
            return Response::json(['status' => false, 'errors' => true, 'message' => [0 => 'დაფიქსირდა შეცდომა, გთხოვთ სცადოთ თავიდან.']], 200);
        }
    }

    public function ajaxUserSignIn(Request $Request) {
        if($Request->isMethod('POST')) {
            $messages = array(
                'required' => 'გთხოვთ შეავსოთ ყველა აუცილებელი ველი!',
            );
            $validator = Validator::make($Request->all(), [
                'user_email' => 'required',
                'user_password' => 'required',
            ], $messages)->stopOnFirstFailure(false);

            if ($validator->fails()) {
                return Response::json(['status' => true, 'errors' => true, 'message' => $validator->getMessageBag()->toArray()], 200);
            } else {
                if(Auth::attempt(['email' => $Request->user_email, 'password' => $Request->user_password, 'deleted_at_int' => 1, 'active' => 1], $Request->user_remember_me)) {
                    return Response::json(['status' => true, 'errors' => false]);
                } else {
                    return Response::json(['status' => true, 'errors' => true, 'message' => [0 =>  trans('site.incorect_email_or_password')]]);
                }
            }
        } else {
            return Response::json(['status' => false, 'message' => [0 => 'დაფიქსირდა შეცდომა, გთხოვთ სცადოთ თავიდან.']], 200);
        }
    }

    public function ajaxUserUpdate(Request $Request) {
        if($Request->isMethod('POST')) {
            $messages = array(
                'required' => 'გთხოვთ შეავსოთ ყველა აუცილებელი ველი',
                'user_email.unique' => 'აღნიშნული ელ-ფოსტა დაკავებულია!',
                'user_phone.unique' => 'აღნიშნული ტელეფონის ნომერი დაკავებულია!',
                'user_personal_number.unique' => 'აღნიშნული პირადი ნომერი დაკავებულია!',
                'user_personal_number.numeric' => 'პირადი ნომერის ფორმატი არასწორია!',
            );
            $validator = Validator::make($Request->all(), [
                'user_name' => 'required|max:255',
                'user_lastname' => 'required|max:255',
                'user_personal_number' => 'numeric|required|unique:new_customers,personal_number,'.Auth::user()->id,
                'user_bdate' => 'required|max:255',
                'user_email' => 'required|max:255|unique:new_customers,email,'.Auth::user()->id,
                'user_phone' => 'required|max:255|unique:new_customers,phone,'.Auth::user()->id,
            ], $messages);

            if ($validator->fails()) {
                return Response::json(['status' => false, 'message' => $validator->getMessageBag()->toArray()], 200);
            } else {
                $User = new User();
                $User::find(Auth::user()->id)->update([
                    'name' => $Request->user_name,
                    'lastname' => $Request->user_lastname,
                    'personal_number' => $Request->user_personal_number,
                    'bdate' => $Request->user_bdate,
                    'phone' => $Request->user_phone,
                    'email' => $Request->user_email,
                ]);

                return Response::json(['status' => true, 'message' => [0 =>' პროფილი წარმატებით დარედაქტირდა']]);
            }
        } else {
            return Response::json(['status' => false, 'message' => [0 => 'დაფიქსირდა შეცდომა, გთხოვთ სცადოთ თავიდან.']], 200);
        }
    }

    public function ajaxUserUpdatePassword(Request $Request) {
        if($Request->isMethod('POST')) {
            $messages = array(
                'required' => 'გთხოვთ შეავსოთ ყველა აუცილებელი ველი',
            );
            $validator = Validator::make($Request->all(), [
                'npassword' => 'required|max:255|same:cpassword|required_with:npassword',
                'cpassword' => 'required|max:255',
            ], $messages);

            if ($validator->fails()) {
                return Response::json(['status' => false, 'message' => $validator->getMessageBag()->toArray()], 200);
            } else {
                $User = new User();
                $User::find(Auth::user()->id)->update([
                    'password' => Hash::make($Request->npassword),
                ]);

                return Response::json(['status' => true, 'message' => [0 =>' პროფილი წარმატებით დარედაქტირდა']]);
            }
        } else {
            return Response::json(['status' => false, 'message' => [0 => 'დაფიქსირდა შეცდომა, გთხოვთ სცადოთ თავიდან.']], 200);
        }
    }

    public function ajaxUserRestore(Request $Request) {
        if($Request->isMethod('POST')) {
            $messages = array(
                'required' => 'გთხოვთ შეავსოთ ყველა აუცილებელი ველი',
            );
            $validator = Validator::make($Request->all(), [
                'user_phone' => 'required|max:255',
            ], $messages);

            if ($validator->fails()) {
                return Response::json(['status' => false, 'message' => $validator->getMessageBag()->toArray()], 200);
            } else {
                $User = new User();
                $UserData = $User::where('phone', $Request->user_phone)->orWhere('email', $Request->user_phone)->first();
				$code = rand(111111, 999999);
                $hash = md5(time());
				
                if($UserData) {

                    if(filter_var($Request->user_phone, FILTER_VALIDATE_EMAIL)) {
                        $testMailData = [
                            'title' => 'პაროლის აღდგენა',
                            'body' => 'პაროლის აღდგენის ბმული: '.route('actionUsersRestoreHash', ['hash_id' => $hash]),
                        ];

                        $RestoreMeth = $UserData->email;

                        Mail::to($UserData->email)->send(new RestoreMail($testMailData));
                    } else {
                        return Response::json(['status' => false, 'message' => [0 =>'მომხმარებელი აღნიშნული ელ-ფოსტით ვერ მოიძებნა!']]);
                    }

					$UserRestore = new UserRestore();
					$UserRestore->code = $hash;
					$UserRestore->user_id = $UserData->id;
					$UserRestore->phone = $Request->user_phone;
					$UserRestore->save();
				
                    return Response::json(['status' => true, 'phone' => $RestoreMeth, 'redirect_url' => route('actionUsersRestoreSuccess')]);
                } else {
                    return Response::json(['status' => false, 'message' => [0 =>'მომხმარებელი აღნიშნული ელ-ფოსტით ვერ მოიძებნა!']]);
                }
            }
        } else {
            return Response::json(['status' => false, 'message' => [0 => 'დაფიქსირდა შეცდომა, გთხოვთ სცადოთ თავიდან.']], 200);
        }
    }

    public function ajaxUserRestoreSubmit(Request $Request) {
        if($Request->isMethod('POST')) {
            $messages = array(
                'required' => trans('site.place_enter_all_required_fields'),
                'required_with' => trans('site.place_enter_all_required_fields'),
                'reset_password.min' => trans('site.password_lengh_min_6'),
                'reset_repeat_password.min' => trans('site.password_lengh_min_6'),
                'reset_repeat_password.same' => trans('site.password_dont_mach'),
            );
            $validator = Validator::make($Request->all(), [
                'reset_password' => 'min:6|same:reset_repeat_password',
                'reset_repeat_password' => 'required_with:reset_password|min:6|',
            ], $messages);

            if ($validator->fails()) {
                return Response::json(['status' => false, 'message' => $validator->getMessageBag()->toArray()], 200);
            } else {

                $UserRestore = new UserRestore();
                $UserRestoreData = $UserRestore::where('code', $Request->hash_id)->where('status', 0)->first();

                if(!empty($UserRestoreData)) {
                    $User = new User();
                    $User::find($UserRestoreData->user_id)->update(['password' => Hash::make($Request->reset_password)]);
                }

                $UserRestoreData = $UserRestore::where('code', $Request->hash_id)->update(['status' => 1]);

				return Response::json(['status' => true, 'redirect_url' => 'https://mallline.io']);
            }
        }
    }
}

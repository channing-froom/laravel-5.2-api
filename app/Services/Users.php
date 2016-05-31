<?php

namespace App\Services;


use App\Http\Requests;
use App\Models\ApplicationTypes;
use App\Models\Oauth;
use App\Models\User;
use App\Models\UserTypes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class Users
{

    public function __construct()
    {
        // ..
    }


    public function ApiCreateOrUpdate(Request $request, $id = null)
    {

        if ($id) {
            $user = User::find($id);
        }else {
            $user = new User();
        }

        $userType = UserTypes::where('slug', $request->get('user_type'))->first();

        $user->setEmail($request->get('email'));
        $user->setFirstName($request->get('first_name'));
        $user->setLastName($request->get('last_name'));
        $user->setPassword($request->get('password'));
        $user->setUserType($userType);
        $user->save();

        return $user;
    }

    public function oAuth(Request $request, $guid = null)
    {

        if (Auth::attempt([
            'email' => $request->get('email'),
            'password' => $request->get('password')
        ])) {

            /** @var User $user */
            $user = Auth::user();

            if (!$user) {
                return;
            }

            // temp for show and tell
            $application = ApplicationTypes::where('slug', 'android')->first();

            $oAuth = new Oauth();
            $oAuth->user_id = $user->getid();
            $oAuth->application_type_id = $application->id;
            $oAuth->token = $guid;
            $oAuth->save();

            return $oAuth;

        }

    }
}

<?php

namespace App\ApplicationTraits;
use App\Models\Oauth;
use App\Models\User;
use App\Models\UserTypes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

/**
 * Class ApiTraits
 *
 * Traits used for API controllers and requests
 */
trait ApiTraits {

    /**
     * Api response formats and structures
     *
     *
     * @author Channing Froom
     * @param array $data
     * @param string $message
     * @param int $responseCode
     * @param array $errors
     * @return \Illuminate\Http\JsonResponse
     */
    public static function json($data = [], $message = '', $responseCode = 200, $errors = [])
    {
        $response = [
            'respose_code' => $responseCode,
            'message' => $message,
            'error_code' => (count($errors) > 0 ? 1 : 0),
            'errors' => $errors,
            'data' => $data
        ];

        return response()->json($response);
    }

    /**
     * Checks the access token and login a user
     * If no token is found it will attempt to logout any users.
     *
     * @param null $token
     * @return bool
     * @throws \Exception
     */
    public static function validateApiToken($token = null)
    {
        if(!$token)
        {
            throw new \Exception('NO API TOKEN GIVEN');
        }

        $checkToken = Oauth::where('token', $token)
                            ->active()
                            ->first();

        if(!$checkToken) {
            Auth::logout();
            throw new \Exception('COULD NOT FIND TOKEN');
        }

        Auth::loginUsingId($checkToken->user_id);
        return true;

    }

    /**
     * Generates a first user to be used. Not a production method !!
     *
     * @author Channing Froom
     */
    public static function initUserByPass()
    {

        $adminCheck = User::where('email', 'channing@froomiethought.co.za')
                            ->first();

        if ($adminCheck) {
            return;
        }

        $user = new User();
        $user->setUserType(UserTypes::where('slug', 'administrator')->first());
        $user->setEmail('channing@froomiethought.co.za');
        $user->setFirstName('Channing');
        $user->setLastName('Froom');
        $user->setPassword('p');
        $user->save();

        Log::info('Default user created', [
            'Email' => $user->getEmail()
        ]);
    }


    /**
     * Generate a random string to use as a API token
     *
     * @return string
     */
    public static function GUID()
    {
        mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
        $charid = strtoupper(md5(uniqid(rand(), true)));
        $hyphen = chr(45);
        $uuid = substr($charid, 0, 8).$hyphen
            .substr($charid, 8, 4).$hyphen
            .substr($charid,12, 4).$hyphen
            .substr($charid,16, 4).$hyphen
            .substr($charid,20,12);

        return $uuid;
    }
}
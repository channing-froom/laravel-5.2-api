<?php

namespace App\ApplicationTraits;
use App\Models\User;
use App\Models\UserTypes;
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

        return response()->json([
            'respose_code' => $responseCode,
            'message' => $message,
            'error_code' => (count($errors) > 0 ? 1 : 0),
            'errors' => $errors,
            'data' => $data
        ]);
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

}
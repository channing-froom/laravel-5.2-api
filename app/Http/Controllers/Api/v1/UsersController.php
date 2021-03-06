<?php

namespace App\Http\Controllers\Api\v1;

use App\ApplicationTraits\ApiTraits;
use App\ApplicationTraits\RoleTraits;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class UsersController extends ApiController
{
    use ApiTraits, RoleTraits;

    /**
     * Users constructor.
     */
    public function __construct()
    {
        parent::__construct();

        ApiTraits::initUserByPass();
    }

    /**
     * List users
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return ApiTraits::json(User::all(), 'USER LIST');
    }

    /**
     * Return a single user result
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        return ApiTraits::json(User::find($id), 'SINGLE USER');
    }

    /**
     * Create a new User
     *
     * @param Requests\UserRequest $request
     * @param \App\Services\Users $userService
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request, \App\Services\Users $userService)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|max:120',
            'user_type' => 'required|max:120',
            'last_name' => 'required|max:120',
            'password' => 'required|max:150',
            'email' => 'required|max:255|unique:users,email'
        ]);

        if ($validator->fails()) {
            return ApiTraits::json([], 'COULD NOT CREATE USER', 503, $validator->errors()->getMessages());
        }

        try {

            $user = $userService->ApiCreateOrUpdate($request);
            return ApiTraits::json($user, 'USER CREATED');

        }catch (\Exception $e) {

            return ApiTraits::json([], 'COULD NOT CREATE USER', 503, [$e->getMessage()]);
        }
    }

    /**
     * @param Request $request
     * @param null $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id = null)
    {

        return ApiTraits::json([], 'UNDER CONSTRUCTION');

    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request, $id)
    {
        return ApiTraits::json([], 'UNDER CONSTRUCTION');
    }


    /**
     * Generate a API token used for calls
     *
     * @param Request $request
     * @param \App\Services\Users $userService
     * @return \Illuminate\Http\JsonResponse
     */
    public function oAuth(Request $request, \App\Services\Users $userService)
    {
        try {
            $oAuthRecord = $userService->oAuth($request, ApiTraits::GUID());

            return ApiTraits::json([
                'token' => $oAuthRecord->token
            ], 'TOKEN GENERATED');

        } catch (\Exception $e) {
            return ApiTraits::json([], 'COULD NOT AUTHENTICATE', 503, [
                $e->getMessage()
            ]);
        }

    }
}

<?php

namespace App\Http\Controllers\Api\v1;

use App\ApplicationTraits\ApiTraits;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Mockery\CountValidator\Exception;

class Users extends ApiController
{
    use ApiTraits;

    public function __construct()
    {
        parent::__construct();

        ApiTraits::initUserByPass();
    }

    public function index(Request $request)
    {
        return ApiTraits::json([], 'Route not in use');
    }

    public function show(Request $request, $id)
    {
        return ApiTraits::json([], 'Route not in use');
    }

    public function store(Request $request)
    {
        return ApiTraits::json([], 'Route not in use');
    }

    public function update(Request $request, $id)
    {
        return ApiTraits::json([], 'Route not in use');
    }

    public function destroy(Request $request, $id)
    {
        return ApiTraits::json([], 'Route not in use');
    }

    public function oAuth(Request $request, \App\Services\Users $userService)
    {
        try {
            $oAuthRecord = $userService->oAuth($request);

            return ApiTraits::json([
                'token' => $oAuthRecord->token
            ], 'TOKEN GENERATED');

        } catch (\Exception $e) {
            return ApiTraits::json([], 'Could Not Authenticate', 503, [
                $e->getMessage()
            ]);
        }

    }
}

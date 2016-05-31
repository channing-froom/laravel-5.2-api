<?php

namespace App\Http\Controllers\Api\v1;

use App\ApplicationTraits\ApiTraits;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class Locations extends ApiController
{
    use ApiTraits;

    public function __construct()
    {
        parent::__construct();
    }

    public function index(Request $request)
    {
        return ApiTraits::json(\App\Models\Locations::all(), 'LOCATION LIST');
    }

    public function show(Request $request, $id)
    {
        return ApiTraits::json(\App\Models\Locations::find($id), 'SINGLE LOCATION');
    }

    public function store(Requests\LocationsRequest $request, \App\Services\Locations $locationService)
    {
        try {

            $location = $locationService->ApiCreateOrUpdateLocation($request);
            return ApiTraits::json($location, 'LOCATION CREATED');

        }catch (\Exception $e) {

            return ApiTraits::json([], 'COULD NOT CREATE LOCATION', 503, [$e->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        return ApiTraits::json([], 'UNDER CONSTRUCTION');
    }

    public function destroy(Request $request, $id)
    {
        return ApiTraits::json([], 'UNDER CONSTRUCTION');
    }
}

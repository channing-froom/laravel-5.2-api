<?php

namespace App\Http\Controllers\Api\v1;

use App\ApplicationTraits\ApiTraits;
use App\Services\Locations;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class LocationsController extends ApiController
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

    public function store(Request $request, \App\Services\Locations $locationService)
    {
        $validator = Validator::make($request->all(), [
            'location_type' => 'required|max:120',
            'name' => 'required|max:120',
            'address' => 'required|max:120',
            'description' => 'max:255',
            'latitude' => 'required|max:255',
            'longitude' => 'required|max:255'
        ]);

        if ($validator->fails()) {
            return ApiTraits::json([], 'COULD NOT CREATE LOCATION', 503, $validator->errors()->getMessages());
        }

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

    public function findByIp(Request $request)
    {
        try {

            $locationService = new Locations();

            $data = $locationService->IpLocation(
                $request->get('ip', null)
            );

        } catch (\Exception $e) {
            return ApiTraits::json([], 'UNDER CONSTRUCTION !', $e->getCode(), [$e->getMessage()]);
        }

        return ApiTraits::json($data, 'LOCATION FOUND');

    }
}

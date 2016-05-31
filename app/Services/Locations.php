<?php

namespace App\Services;


use App\Http\Requests;
use App\Models\LocationTypes;
use Illuminate\Http\Request;

class Locations
{

    public function __construct()
    {
        // ..
    }

    public function ApiCreateOrUpdateLocation(Request $request, $id = null)
    {

        if ($id) {
            $location = \App\Models\Locations::find($id);
        }else {
            $location = new \App\Models\Locations();
        }

        $locationType = LocationTypes::where('slug', $request->get('location_type'))->first();

        $location->location_type_id = $locationType->id;
        $location->name = $request->get('name');
        $location->address = $request->get('address');
        $location->description = $request->get('description');
        $location->latitude = $request->get('latitude');
        $location->longitude = $request->get('longitude');

        $location->save();

        return $location;
    }
}

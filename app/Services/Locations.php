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

    public function IpLocation($ip = null)
    {
        $ip = $ip ? $ip : $this->resolveUserIp();

        if(!$ip) {
            throw new \Exception("Could not resolve IP address");
        }

        return $this->connectToIpServer($ip);
    }

    private function connectToIpServer($ip)
    {
        $data = null;
        $apiUrl = "http://www.geoplugin.net/php.gp?ip=$ip";

        $data = unserialize(
            file_get_contents($apiUrl)
        );

        return $data;
    }

    /**
     * Try and collect the correct IP address for a user
     *
     * @author Channing Froom
     * @return mixed|null
     */
    private function resolveUserIp()
    {
        $ip = null;
        $headers = $_SERVER;

        if (
            array_key_exists( 'X-Forwarded-For', $headers ) &&
            filter_var( $headers['X-Forwarded-For'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 )
        ) {

            $ip = $headers['X-Forwarded-For'];

        } elseif (
            array_key_exists( 'HTTP_X_FORWARDED_FOR', $headers ) &&
            filter_var( $headers['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 )
        ) {

            $ip = $headers['HTTP_X_FORWARDED_FOR'];

        } elseif (
            array_key_exists( 'REMOTE_ADDR', $headers ) &&
            filter_var( $headers['REMOTE_ADDR'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 )
        ) {

            $ip = filter_var( $_SERVER['REMOTE_ADDR'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 );

        }

        return $ip;
    }
}

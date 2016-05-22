<?php

namespace App\ApplicationTraits;

/**
 * Class ApiTraits
 *
 * Traits used for API controllers and requests
 */
trait ApiTraits {

    /**
     * Json response for all API calls
     *
     * @param array $data
     * @param int $status
     * @param array $headers
     * @param int $options
     * @return \Illuminate\Http\JsonResponse
     */
    public static function json($data = array(), $status = 200, $headers = array(), $options = 0){

        return \Illuminate\Routing\ResponseFactory::json($data, $status, $headers, $options);
    }

}
<?php

namespace App\Http\Controllers\Api\v1;

use App\ApplicationTraits\ApiTraits;
use App\ApplicationTraits\RoleTraits;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Routing\Route;


/**
 * Class ApiController
 *
 * Note
 * Abstract methods are used as a guide line for this instance
 * They work for this instance to force standards, Depending on what application
 * You are trying to create and what technoligies you use this will differ !
 *
 * @package App\Http\Controllers\Api\v1
 */
abstract class ApiController extends BaseController
{

    use ApiTraits, RoleTraits;

    protected function __construct()
    {

        // run middleware on all API requests
        $this->middleware(\App\Http\Middleware\ApiMiddleware::class, ['except' => ['oAuth']]);
    }
}

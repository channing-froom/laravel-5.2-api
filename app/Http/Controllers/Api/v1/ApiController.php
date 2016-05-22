<?php

namespace App\Http\Controllers\Api\v1;

use App\ApplicationTraits\ApiTraits;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


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
abstract class ApiController extends Controller
{

    use ApiTraits;

    protected function __construct()
    {
        // ..
    }


    /**
     * List
     *
     * /{controller}
     *
     * @API GET
     * @param Request $request
     * @return mixed
     */
    public abstract function index(Request $request);

    /**
     * Show Item
     *
     * /{controller}/{id}
     *
     * @API GET
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public abstract function show(Request $request, $id);

    /**
     * Create new item
     *
     * /{controller}
     *
     * @API POST
     * @param Request $request
     * @return mixed
     */
    public abstract function store(Request $request);

    /**
     * Update item
     *
     * /{controller}/{id}
     *
     * @API PUT
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public abstract function update(Request $request, $id);

    /**
     * Delete item
     *
     * /{controller}/{id}
     *
     * @API DELETE
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public abstract function destroy(Request $request, $id);
}

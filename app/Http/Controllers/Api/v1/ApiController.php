<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BaseApi extends Controller
{
    protected function __construct()
    {

    }

    public abstract function getIndex();
    public abstract function getIndex();
    public abstract function getIndex();
    public abstract function getIndex();
}

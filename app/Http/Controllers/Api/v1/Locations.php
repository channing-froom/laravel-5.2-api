<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class Locations extends ApiController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(Request $request)
    {
        return 'Location types';
        // TODO: Implement index() method.
    }

    public function show(Request $request, $id)
    {
        // TODO: Implement show() method.
    }

    public function store(Request $request)
    {
        // TODO: Implement store() method.
    }

    public function update(Request $request, $id)
    {
        // TODO: Implement update() method.
    }

    public function destroy(Request $request, $id)
    {
        // TODO: Implement destroy() method.
    }
}

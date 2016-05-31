<?php

namespace App\Models;

use App\ApplicationTraits\ModelTraits;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed id
 * @property mixed slug
 * @property mixed label
 * @property mixed description
 */
class LocationTypes extends Model
{
    use ModelTraits;
    //
}

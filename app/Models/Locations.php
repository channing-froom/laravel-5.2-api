<?php

namespace App\Models;

use App\ApplicationTraits\ModelTraits;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed id
 * @property mixed location_type_id
 * @property mixed name
 * @property mixed address
 * @property mixed description
 * @property mixed latitude
 * @property mixed longitude
 */
class Locations extends Model
{
    use ModelTraits;
    //
}

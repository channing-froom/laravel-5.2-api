<?php

namespace App\Models;

use App\ApplicationTraits\ModelTraits;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property string label
 * @property string slug
 * @property string description
 */
class ApplicationTypes extends Model
{
    use ModelTraits;

    //
}

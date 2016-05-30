<?php

namespace App\Models;

use App\ApplicationTraits\ModelTraits;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Oauth
 *
 * @property int id
 * @property int user_id
 * @property int application_type_id
 * @property string token
 * @property mixed created_at
 * @package App\Models
 */
class Oauth extends Model
{
    use ModelTraits;

    protected $table = 'oauth';
    public $timestamps = false;
    //
}

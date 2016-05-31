<?php

namespace App\Models;

use App\ApplicationTraits\ModelTraits;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 * @property mixed id
 * @property string first_name
 * @property string last_name
 * @property string email
 * @property string password
 * @property int user_type_id
 * @package App\Models
 */
class User extends Authenticatable
{
    use ModelTraits;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     * Relationship
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function userType()
    {
        return $this->hasOne('App\Models\UserTypes');
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->first_name = $firstName;
    }

    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->last_name = $lastName;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    public function setPassword($password)
    {
        $this->password = bcrypt($password);
    }

    /**
     * @param UserTypes $userType
     */
    public function setUserType(UserTypes $userType)
    {
        $this->user_type_id = $userType->getId();
    }

    public function getUserType()
    {
        return UserTypes::find($this->user_type_id);
    }
}

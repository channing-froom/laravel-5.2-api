<?php

namespace App\Models;

use App\ApplicationTraits\ModelTraits;
use Illuminate\Database\Eloquent\Model;


/**
 * Class UserTypes
 * @property int id
 * @property string label
 * @property string slug
 * @property string description
 * @package App\Models
 */
class UserTypes extends Model
{
    use ModelTraits;

    public $timestamps = false;


    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param string $label
     */
    public function setLabel($label)
    {
        $this->label = $label;
    }

    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param string $label
     */
    public function setSlug($label)
    {
        $this->slug = str_slug($label);
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bear extends Model
{
   // MASS ASSIGNMENT -------------------------------------------------------
    // define which attributes are mass assignable (for security)
    // we only want these 3 attributes able to be filled
    protected $fillable = array('name', 'type', 'danger_level');

    // DEFINE RELATIONSHIPS --------------------------------------------------
    // each bear HAS one fish to eat
    public function fish() {
        return $this->hasMany('App\Fish'); // this matches the Eloquent model
    }

    // each bear climbs many trees
//    public function trees() {
//        return $this->hasMany('Tree');
//    }

    // each bear BELONGS to many picnic
    // define our pivot table also
    public function picnic() {
        return $this->belongsToMany('App\Picnic', 'bears_picnics', 'bear_id', 'picnic_id');
    }
}

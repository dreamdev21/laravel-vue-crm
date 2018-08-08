<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function account(){
        return $this->belongsTo(Account::class);
    }    
    public function user()
    {
        return $this->hasMany(User::class);
    }
    public function location()
    {
        return $this->hasMany(Location::class);
    }
}

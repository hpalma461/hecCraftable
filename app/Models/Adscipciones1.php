<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Adscipciones1 extends Model
{
    protected $table = 'adscipciones1';

    protected $fillable = [
    
    ];
    
    
    protected $dates = [
    
    ];
    public $timestamps = false;
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/adscipciones1s/'.$this->getKey());
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Adscripciones1 extends Model
{
    protected $table = 'adscripciones1';

    protected $fillable = [
        'Nombre',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/adscripciones1s/'.$this->getKey());
    }
}

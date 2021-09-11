<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Adscripciones2 extends Model
{
    protected $table = 'adscripciones2';

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
        return url('/admin/adscripciones2s/'.$this->getKey());
    }
}

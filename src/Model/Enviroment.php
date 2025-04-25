<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enviroment extends Model
{
    use HasFactory;
    protected $fillable = ['key', 'type', 'pattern', 'value', 'multiple','enviroment_id'];

    public function categoryparent()
    {
        return $this->belongsTo(Enviroment::class, 'enviroment_id');
    }    
    public function categorychildern()
    {
        return $this->hasMany(Enviroment::class, 'enviroment_id');
    }
    public function categorychildernbykey()
    {
        return $this->hasMany(Enviroment::class, 'enviroment_id')->groupBy('key');
    }
}


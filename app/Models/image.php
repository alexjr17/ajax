<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class image extends Model
{
    protected $table = 'images';
    protected $guarded = [];
    use HasFactory;

    static $rules = [
        'url' => 'required'
    ];

    public function imageable(){
        return $this->morphTo();
    }
}

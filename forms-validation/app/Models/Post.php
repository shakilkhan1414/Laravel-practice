<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public $pathBefore="/images/";

    protected $fillable=['title','body','path'];

    public function scopeLatest($query){
        return $query->orderBy('id','asc')->get();
    }

    public function getPathAttribute($value){
        return $this->pathBefore . $value;
    }
}

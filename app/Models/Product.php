<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
 use SoftDeletes;
 use HasFactory;
    protected $fillable=["name","price","category_id","quantity","path"];
    protected $dates="deleted_at";

    public function category(){

        return $this->belongsTo("App\Models\Category");
    }


}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table='mc-catrgory';
    protected $primaryKey='id';
    protected $fillable=['name'];

}

<?php namespace Modules\Admin\Entities;
   
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model {

    protected $fillable = [
        'name',
        'body'
    ];

    protected $table = "gallery";

}
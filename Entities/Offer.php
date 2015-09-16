<?php namespace Modules\Admin\Entities;
   
use Illuminate\Database\Eloquent\Model;

class Offer extends Model {

    protected $fillable = [
        'name',
        'body',
        'base_value',
        'promo_value'
    ];

}
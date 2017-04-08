<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Detail extends Eloquent
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'details';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [ ];

    protected $fillable = [ 'purchase_id', 'product_id', 'price', 'quantity' ];


    public function purchase()
    {
        return $this->hasMany('Purchase');
    }


    /*public function products()
    {
        return $this->hasMany('Product');//, 'detail_product');
    } */

}

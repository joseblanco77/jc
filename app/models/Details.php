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

    protected $fillable = [ 'purchase_id', 'product_id', 'price', 'quantity', 'user_id' ];


    public function purchase()
    {
        return $this->belongsTo('Purchase');
    }


    public function customer()
    {
        return $this->belongsTo('Customer');
    }

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function product()
    {
        return $this->belongsTo('Product');
    }

}

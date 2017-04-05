<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Purchase extends Eloquent {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'purchases';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = [];

	protected $fillable = ['customer_id', 'user_id', 'status'];


	public function customer()
	{
		return $this->belongsTo('Customer');
	}

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function datails()
    {
        return $this->belongsTo('Detail');
    }

}

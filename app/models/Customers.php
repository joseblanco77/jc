<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Customer extends Eloquent {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'customers';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = [];

	protected $fillable = ['customername','phone','address','email','nit','comments'];

	public function purchases()
	{
		return $this->hasMany('Purchase');
	}

	public static function setEmailsCache()
	{
		$emails = Customer::lists('email','id');
		Cache::forever('customersEmail', $emails);
	}

}

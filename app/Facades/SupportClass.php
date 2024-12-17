<?php

namespace App\Facades;
use Illuminate\Support\Facades\Facade;

/**
 * 
 */
class SupportClass extends Facade
{
	
	protected static function getFacadeAccessor(){
		return 'Support';
	}
}
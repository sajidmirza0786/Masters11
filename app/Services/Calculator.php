<?php

namespace App\Services;
use App\Models\User;

/**
 * 
 */
class Calculator
{
	
	function __construct(User $user)
	{
		// code...
	}

	public function add($a, $b){
		return $a+$b;
	}
}
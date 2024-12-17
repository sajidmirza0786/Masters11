<?php

namespace App\Facades;

/**
 * 
 */
class Support
{
	
	public function getDate(){
		return now()->format('d M Y');
	}
	
}
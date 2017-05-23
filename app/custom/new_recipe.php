<?php
namespace App\custom;

class new_recipe {
	
	public $name;
	public $description;
	public $flavours=[];

	public function setName($new){
		$name=$new;
	}

}
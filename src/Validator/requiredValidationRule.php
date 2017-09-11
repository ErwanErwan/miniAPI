<?php

Namespace MiniMVC\Validator;

class requiredValidationRule extends ValidationRule
{

	static function getErrorMessage(){
		return 'the field is required';
	}

	static function run($fieldname, $dataset){

		if(!isset($dataset[$fieldname]) || empty($dataset[$fieldname]))
			return false;
		return true;
	}


}
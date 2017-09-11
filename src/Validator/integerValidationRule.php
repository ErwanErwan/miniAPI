<?php

Namespace MiniMVC\Validator;

class integerValidationRule extends ValidationRule
{

	static function getErrorMessage(){
		return 'the field must be an integer';
	}

	static function run($fieldname, $dataset){

		if(filter_var($dataset[$fieldname], FILTER_VALIDATE_INT) === false)
			return false;
		return true;
	}

}
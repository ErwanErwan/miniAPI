<?php

Namespace MiniMVC\Validator;


abstract class ValidationRule
{


	abstract static function getErrorMessage();
	abstract static function run($fieldname, $dataset);

}
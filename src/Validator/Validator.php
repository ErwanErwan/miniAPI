<?php

Namespace MiniMVC\Validator;


class Validator
{

	private $rules;
	private $errors;

	function __construct(array $rules = []){
		$this->rules = $rules;
		$this->errors = [];
	} 
	function getErrors(){
		return $this->errors;
	}

	function validate($dataset, $rules = null){
		$this->errors = [];

		if($rules === null && empty($this->rules))
			throw new Exception("Validation Exception: can't validate without rules", 1);

		$rules = ($rules === null ? $this->rules : $rules);
		foreach ($rules as $fieldname => $validation_rules) {

			$vrules = explode('|', $validation_rules);
			foreach($vrules as $rule){

				$ruleClassName = __NAMESPACE__ . '\\' . $rule . 'ValidationRule';
				if(class_exists($ruleClassName))
				{
					$bool = $ruleClassName::run($fieldname, $dataset);
					if(!$bool)
						$this->errors[$fieldname][] = $ruleClassName::getErrorMessage();
				}
			}
		}
		if(!empty($this->errors))
			return false;
		return true;
	}

}

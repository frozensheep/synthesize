<?php
/**
*	File Containing the Number Object class.
*
*	@package	Frozensheep\Synthesize
*	@author		Jacob Wyke <jacob@frozensheep.com>
*	@license	MIT
*
*/

namespace Frozensheep\Synthesize\Type;

use Frozensheep\Synthesize\Type\Type;
use Frozensheep\Synthesize\Exception\RangeException;

/**
*	Number Object Class
*
*	A number data class.
*
*	@package	Frozensheep\Synthesize
*
*/
class NumberObject extends Type {

	/**
	*	Is Valid Method
	*
	*	Checks to see if the value is valud for the given data type.
	*	@param mixed $mixValue The value to check.
	*	@return bool
	*/
	public function isValid($mixValue){
		if(is_numeric($mixValue)){
			if($this->options()){
				if(!is_null($this->options()->min)){
					if($mixValue<$this->options()->min){
						throw new RangeException($mixValue, $this->options()->min, $this->options()->max);
						return false;
					}
				}
				if(!is_null($this->options()->max)){
					if($mixValue>$this->options()->max){
						throw new RangeException($mixValue, $this->options()->min, $this->options()->max);
						return false;
					}
				}
			}
			return true;
		}
		return false;
	}
}
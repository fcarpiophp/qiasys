<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

//http://stackoverflow.com/questions/1418964/generating-luhn-checksums
	function generate_luhn($number)
	{

		$stack = 0;
		$number = str_split(strrev($number));

		foreach ($number as $key => $value) {
			if ($key % 2 == 0) {
				$value = array_sum(str_split($value * 2));
			}
			$stack += $value;
		}
		$stack %= 10;

		if ($stack != 0) {
			$stack -= 10;
			$stack = abs($stack);
		}

		$number = implode('', array_reverse($number));
		$number = $number . strval($stack);

        return $number;
    }
    
    function check_luhn($number)
    {
        $sum = 0;
		$alt = false;

		for($i = strlen($number) - 1; $i >= 0; $i--){
			$n = substr($number, $i, 1);
			if($alt){
				//double n
				$n *= 2;
				if($n > 9) {
					//calculate remainder
					$n = ($n % 10) +1;
				}
			}
			$sum += $n;
			$alt = !$alt;
		}

		//if $sum divides by 10 with no remainder then it's valid
		return ($sum % 10 == 0);
    }
    
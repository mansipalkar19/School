<?php 	function price_format($price)
	{
		if($price != ''){
			return $formated_price =  number_format($price,2);
		}else{
			return '0.00';
		}
	}
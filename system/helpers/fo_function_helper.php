<?php 	function price_format($price)
	{
		if($price != ''){
			$formated_price =  number_format($price,2);
                        
			$search1 = array(".");
			$replace1 = array("*");
                        $step1 = str_replace($search1,$replace1,$formated_price);
                        
                        $search2 = array(",");
			$replace2 = array(".");
                        $step2 = str_replace($search2,$replace2,$step1);
                        
                        $search3 = array("*");
			$replace3 = array(",");
                      return $step3 = str_replace($search3,$replace3,$step2);
		}else{
			return '0,00';
		}
	}
<?php
/**
*	Class implémentant un méthode static pour formater la date
*
*/
class DateFormat{
	/**
	*	Méthode static qui renvoie la date formaté FR
	*	@return String date
	*/
	public static function format($date){
		/*
		[year] => 2006
	    [month] => 12
	    [day] => 12
	    [hour] => 10
	    [minute] => 0
	    [second] => 0
		*/
			$tabDate = date_parse($date);
		if($date){
			// rajoute un 0 devant les jours pour jour < 10
			if(strlen($tabDate['day'])==1) $tabDate['day'] = '0'.$tabDate['day'];
			// rajoute un 0 devant les mois pour mois < 10
			if(strlen($tabDate['month'])==1) $tabDate['month'] = '0'.$tabDate['month'];
			// rajoute un 0 devant les minutes pour minute < 10
			if(strlen($tabDate['minute'])==1) $tabDate['minute'] = '0'.$tabDate['minute'];
			return $tabDate['day'].'/'.$tabDate['month'].'/'.$tabDate['year'].' à '.$tabDate['hour'].':'.$tabDate['minute'];
		}else{
			return false;
		}
	}

}
?>
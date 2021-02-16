<?php
	function textShorten($text, $limit=300){
		  $text = $text."";
		  $text = substr($text, 0, $limit);
		  $text = substr($text, 0, strrpos($text, ' '));
		  $text = $text.".....";
		  return $text;
	}

    function DateFormat($date){
      return date('M j, Y', strtotime($date));
    }

	function DateFormatDay($date){
	  return date('l jS F Y', strtotime($date));
	}

	function DateFormatTime($date){
	  return date('M j, Y, g:i a', strtotime($date));
	}

    //add to helper.php
    function get_percentage($total, $number){
      if ( $total > 0 ) {
       return round($number / ($total / 100),2);
      } else {
        return 0;
      }
    } 

?>
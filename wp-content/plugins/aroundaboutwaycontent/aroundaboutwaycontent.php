<?php

/*

Plugin Name: aroundaboutwaycontent

Plugin URI: http://aroundaboutway.com/

Description: Custom parses content for aroundaboutway.

Version: 1.0

Author: Pete Chappell

Author URI: http://ap3x.com/

*/



add_filter('the_content','aroundaboutway_content');



function aroundaboutway_content($content){

	$returncontent = "";

	$introText = get_string_between($content, "<p>***START INTRO***</p>", "<p>***END INTRO***</p>");

	$generalText = get_string_between($content, "<p>***START GENERAL***</p>", "<p>***END GENERAL***</p>");

	$susanText = get_string_between($content, "<p>***START SUSAN***</p>", "<p>***END SUSAN***</p>");

	$peteText = get_string_between($content, "<p>***START PETE***</p>", "<p>***END PETE***</p>");



	if (!empty($introText)) {

		$returncontent .= '<aside class="intro">';

		$returncontent .= $introText;

		$returncontent .= '</aside>';

	}

	if (!empty($generalText)) {

		$generalTitle = get_string_between($susanText, "<h1>", "</h1>");

		$returncontent .= '<section class="blogEntry">';

		if(!empty($susanTitle)){

			$generalText = str_replace('<h3>'.$generalTitle.'</h3>',"",$generalText);

			$returncontent .= '<h1>'.$generalTitle.'</h1>';

		}

		$returncontent .= $generalText;

		$returncontent .= '</section>';

	}

	if (!empty($susanText)) {

		$susanTitle = get_string_between($susanText, "<h3>", "</h3>");

		$returncontent .= '<section class="blogEntry susan">';

		if(!empty($susanTitle)){

			$susanText = str_replace('<h3>'.$susanTitle.'</h3>',"",$susanText);

			$returncontent .= '<header><h1 class="h2">'.$susanTitle.'</h1><p class="author">By Susan</p></header>';

		}

		$returncontent .= $susanText;

		$returncontent .= '</section>';

	}

	if (!empty($peteText)) {

		$peteTitle = get_string_between($peteText, "<h3>", "</h3>");

		$returncontent .= '<section class="blogEntry pete">';

		if(!empty($peteTitle)){

			$peteText = str_replace('<h3>'.$peteTitle.'</h3>',"",$peteText);

			$returncontent .= '<header><h1 class="h2">'.$peteTitle.'</h1><p class="author">By Pete</p></header>';

		}

		$returncontent .= $peteText;

		$returncontent .= '</section>';

	}



	if (!empty($returncontent)){

		return str_replace('<p></p>','',$returncontent);

	} else {

		$returncontent .= '<section class="intro">';

		$returncontent .= $content;

		$returncontent .= '</section>';

		return $returncontent;

	}

}





function get_string_between($string, $start, $end){

        $string = " ".$string;

        $ini = strpos($string,$start);

        if ($ini == 0) return "";

        $ini += strlen($start);   

        $len = strpos($string,$end,$ini) - $ini;

        return substr($string,$ini,$len);

}





?>
<?php
/**
 * Template tag to display bible verse
 */
function mp_sermons_html5_mp3($post_id){
	
	$sermon_mp3 = get_post_meta($post_id, 'sermon_mp3', true);
	
	if (!empty($sermon_mp3)){
		$mp3_html = '<div class="sermon_mp3_container">';
			$mp3_html .= '<audio class="sermon_mp3" >';
				$mp3_html .= '<source src="' . $sermon_mp3 . '" type="audio/mpeg">';
				$mp3_html .= 'Your browser does not support the audio element.';
			$mp3_html .= '</audio>';
		$mp3_html .= '</div>';
		
		//Controls
		$mp3_html .= '<p class="player">';
		$mp3_html .= '<span id="playtoggle" />';
		$mp3_html .= '<span id="gutter">';
			$mp3_html .= '<span id="loading" />';
			$mp3_html .= '<span id="handle" class="ui-slider-handle" />';
		$mp3_html .= '</span>';
		$mp3_html .= '<span id="timeleft" />';
		$mp3_html .= '</p>';
		
		
		return $mp3_html;
	}
}
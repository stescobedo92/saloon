<?php

function r_generate_daily_salones(){
	global $wpdb;
	$salones_id = $wpdb->get_var("SELECT `ID` FROM `" . $wpdb->posts . "` WHERE post_status='publish' AND post_type='salones'  ORDER BY rand() LIMIT 1" );

	set_transient('r_daily_salones',	$salones_id,DAY_IN_SECONDS);
}
<?php

function r_admin_enqueue(){

	global $typenow;

	if( $typenow != "salones" ){ return; }

	wp_register_style('jadima_bootstrap', plugins_url( '/assets/styles/bootstrap.css', SALONES_PLUGIN_URL )	);

	wp_enqueue_style( 'jadima_bootstrap' );
}
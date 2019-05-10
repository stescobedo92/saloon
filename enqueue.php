<?php

function r_enqueue_scripts(){

	wp_register_style(
		'r_rateit',
		plugins_url( '/assets/rateit/rateit.css', SALONES_PLUGIN_URL )
	);

	wp_enqueue_style( 'r_rateit' );

	wp_enqueue_style( 'dashicons' );

	wp_register_script(
		'r_rateit',
		plugins_url( '/assets/rateit/jquery.rateit.min.js', SALONES_PLUGIN_URL ),
		array('jquery'),
		'1.0.0',
		true
	);
	wp_register_script(
		'r_main',
		plugins_url( '/assets/scripts/main.js', SALONES_PLUGIN_URL ),
		array('jquery'),
		'1.0.0',
		true
	);

	wp_localize_script( 'r_main', 'salones_obj', array(
		'ajax_url' =>  admin_url( 'admin-ajax.php' ),
		'home_url' =>  home_url( '/' )
	));

	wp_enqueue_script( 'r_rateit' );
	wp_enqueue_script( 'r_main' );
}
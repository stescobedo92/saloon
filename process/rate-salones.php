<?php

function r_rate_salones(){
	global $wpdb;

	$output                 =   array( 'status' => 1 );
	$post_id                =   absint( $_POST['rid'] );
	$rating                 =   round( $_POST['rating'], 1 );
	$user_IP                =   $_SERVER['REMOTE_ADDR'];

	$rating_count  = $wpdb->get_var("SELECT COUNT(*) FROM `" . $wpdb->prefix . "salones_ratings`	WHERE salones_id='" . $post_id . "' AND user_ip='" . $user_IP . "'"	);

	if( $rating_count > 0 ){
		wp_send_json( $output );
	}

	// Insert into database
	$wpdb->insert($wpdb->prefix . 'salones_ratings',
		array(
			'salones_id'     =>  $post_id,
			'rating'        =>  $rating,
			'user_ip'       =>  $user_IP
		),
		array( '%d', '%f', '%s' )
	);

	// update meta data
	$salones_data  = get_post_meta( $post_id, 'salones_data', true );
	$salones_data['rating_count']++;
	$salones_data['rating']  =   round($wpdb->get_var("SELECT AVG(`rating`) FROM `" . $wpdb->prefix . "salones_ratings`	WHERE salones_id='" . $post_id . "'"), 1 );

	update_post_meta( $post_id, 'salones_data', $salones_data );

	do_action( 'salones_rated', ['post_id' =>  $post_id,'rating' =>  $rating,'user_ip' =>  $user_IP ]);

	$output['status']  =  2;
	wp_send_json( $output );
}
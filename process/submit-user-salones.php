<?php

function r_submit_user_salones(){

	$output =  [ 'status' => 1 ];

	if(empty( $_POST['precio'] ) || empty( $_POST['capacidad'] ) || empty( $_POST['servicios'] ) || empty( $_POST['localizacion'] )){
		wp_send_json($output);
	}

	$title                          =   sanitize_text_field( $_POST['title'] );
	$content                        =   wp_kses_post( $_POST['content'] );
	$salones_data                    =   [];
	$salones_data['precio']     =   sanitize_text_field( $_POST['precio'] );
	$salones_data['capacidad']        =   sanitize_text_field( $_POST['capacidad'] );
	$salones_data['servicios']           =   sanitize_text_field( $_POST['servicios'] );
	$salones_data['localizacion']       =   sanitize_text_field( $_POST['localizacion'] );
	$salones_data['rating']          =   0;
	$salones_data['rating_count']    =   0;

	$post_id                        =   wp_insert_post([
		'post_content'              =>  $content,
		'post_name'                 =>  $title,
		'post_title'                =>  $title,
		'post_status'               =>  'pending',
		'post_type'                 =>  'salones'
	]);

	update_post_meta( $post_id, 'salones_data', $salones_data );

	$output['status']               =   2;
	wp_send_json( $output );
}
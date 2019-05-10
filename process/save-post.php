<?php

function r_save_post_admin( $post_id, $post, $update ){
	if( !$update ){
		return;
	}

	$salones_data                   =   array();
	$salones_data['precio']         =   sanitize_text_field( $_POST['r_inputPrecio'] );
	$salones_data['capacidad']      =   sanitize_text_field( $_POST['r_inputCapacidad'] );
	$salones_data['servicios']      =   sanitize_text_field( $_POST['r_inputServicios'] );
	$salones_data['localizacion']   =   sanitize_text_field( $_POST['r_inputLocalizacion'] );
	$salones_data['rating']         =   0;
	$salones_data['rating_count']   =   0;

	update_post_meta( $post_id, 'salones_data', $salones_data );
}
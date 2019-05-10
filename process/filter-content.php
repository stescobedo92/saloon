<?php

function r_filter_salones_content( $content ){
	if( !is_singular( 'salones' ) ){
		return $content;
	}

	global $post, $wpdb;
	$salones_tpl_res = wp_remote_get(plugins_url( 'process/salones-template.php', SALONES_PLUGIN_URL )	);

	$salones_html                =   wp_remote_retrieve_body( $salones_tpl_res );
	$salones_data                =   get_post_meta( $post->ID, 'salones_data', true );
	$salones_html                =   str_replace( 'PRECIO_PH', $salones_data['precio'], $salones_html );
	$salones_html                =   str_replace( 'CAPACIDAD_PH', $salones_data['capacidad'], $salones_html );
	$salones_html                =   str_replace( 'SERVICIOS_PH', $salones_data['servicios'], $salones_html );
	$salones_html                =   str_replace( 'LOCALIZACION_PH', $salones_data['localizacion'], $salones_html );
	$salones_html                =   str_replace( "PRECIO_I18N", __("Precio", "salones"), $salones_html );
	$salones_html                =   str_replace( "CAPACIDAD_I18N", __("Capacidad", "salones"), $salones_html );
	$salones_html                =   str_replace( "SERVICIOS_I18N", __("Servicios", "salones"), $salones_html );
	$salones_html                =   str_replace( "LOCALIZACION_I18N", __("Localizacion", "salones"), $salones_html );
	$salones_html                =   str_replace( "RATE_I18N", __("Rating", "salones"), $salones_html );
	$salones_html                =   str_replace( "SALONES_ID", $post->ID, $salones_html );
	$salones_html                =   str_replace( "SALONES_RATING", $salones_data['rating'], $salones_html );

	$user_IP                    =   $_SERVER['REMOTE_ADDR'];



	$rating_count =   $wpdb->get_var($wpdb->prepare(
		"SELECT COUNT(*) FROM `" . $wpdb->prefix . "salones_ratings`	WHERE salones_id=%d AND user_ip=%s",$post->ID, $user_IP
	));



	if( $rating_count > 0 ){
		$salones_html =   str_replace("READONLY_PLACEHOLDER", 'data-rateit-readonly="true"', $salones_html	);
	}else{
		$salones_html =   str_replace( "READONLY_PLACEHOLDER", '', $salones_html );
	}

	return $salones_html . $content;
}
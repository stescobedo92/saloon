<?php

function r_add_new_salones_columns( $columns ){
	$new_columns                            =   array();
	$new_columns['cb']                      =   '<input type="checkbox" />';
	$new_columns['title']                   =   __( 'Title', 'salones' );
	$new_columns['author']                  =   __( 'Author', 'salones' );
	$new_columns['categories']              =   __( 'Categories', 'salones' );
	$new_columns['count']                   =   __( 'Ratings count', 'salones' );
	$new_columns['rating']                  =   __( 'Average Rating', 'salones' );
	$new_columns['date']                    =   __( 'Date', 'salones' );

	return $new_columns;
}

function r_manage_salones_columns( $column, $post_id ){
	switch( $column ){
		case 'count':
			$salones_data  =   get_post_meta( $post_id, 'salones_data', true );
			echo $salones_data['rating_count'];
			break;
		case 'rating':
			$salones_data                    =   get_post_meta( $post_id, 'salones_data', true );
			echo $salones_data['rating'];
			break;
		default:
			break;
	}
}
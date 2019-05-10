<?php

function salones_admin_init(){

	include( 'create-metaboxes.php' );
	include( 'salones-options.php' );
	include( 'enqueue.php' );
	include( 'columns.php' );

	add_action( 'add_meta_boxes_salones', 'r_create_metaboxes' );
	add_action( 'admin_enqueue_scripts', 'r_admin_enqueue' );
	add_filter( 'manage_salones_posts_columns', 'r_add_new_salones_columns' );
	add_action( 'manage_salones_posts_custom_column', 'r_manage_salones_columns', 10, 2 );
}
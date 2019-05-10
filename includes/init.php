<?php

function salones_init(){
	$labels                     = array(
		'name'                  =>  __( 'Salones', 'salones' ),
		'singular_name'         =>  __( 'Salon', 'salones' ),
		'menu_name'             =>  __( 'Salones', 'salones' ),
		'name_admin_bar'        =>  __( 'Salon', 'salones' ),
		'add_new'               =>  __( 'Adicionar un Salon', 'salones' ),
		'add_new_item'          =>  __( 'Adicionar un Nuevo Salon', 'salones' ),
		'new_item'              =>  __( 'Nuevo Salon', 'salones' ),
		'edit_item'             =>  __( 'Editar Salon', 'salones' ),
		'view_item'             =>  __( 'Ver Salon', 'salones' ),
		'all_items'             =>  __( 'Todos los Salones', 'salones' ),
		'search_items'          =>  __( 'Buscar Salones', 'salones' ),
		'parent_item_colon'     =>  __( 'Parent Salones:', 'salones' ),
		'not_found'             =>  __( 'No se ha encontrado ningun tipo de contenido.', 'salones' ),
		'not_found_in_trash'    =>  __( 'No se ha encontrado ningun tipo de contenido.', 'salones' )

	);

	$args                       =   array(
		'labels'                =>  $labels,
		'description'           =>  __( 'Un nuevo tipo de contenido para crear saloness.', 'salones' ),
		'public'                =>  true,
		'publicly_queryable'    =>  true,
		'show_ui'               =>  true,
		'show_in_menu'          =>  true,
		'query_var'             =>  true,
		'rewrite'               =>  array( 'slug' => 'salones' ),
		'capability_type'       =>  'post',
		'has_archive'           =>  true,
		'hierarchical'          =>  false,
		'menu_position'         =>  20,
		'supports'              =>  array( 'title', 'editor', 'author', 'thumbnail','excerpt','slug' ),
		'taxonomies'            =>  array( 'category', 'post_tag' ),
		'menu_icon'             => 'dashicons-arrow-right-alt', // image icon
	);

	register_post_type( 'salones', $args );
}
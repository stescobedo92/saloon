<?php

function r_create_metaboxes(){

	add_meta_box('r_salones_options_mb',__( 'Salones Options', 'salones' ),'r_salones_options_mb','salones','normal','high' );
}
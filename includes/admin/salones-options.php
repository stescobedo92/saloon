<?php

function r_salones_options_mb( $post ){

    $salones_data = get_post_meta( $post->ID, 'salones_data', true );

    if( empty($salones_data) ){
        $salones_data  = array(
            'precio'   =>  '',
            'capacidad' =>  '',
            'servicios'  =>  'Musica en Vivo',
            'localizacion' =>  ''
        );
    }

	?>
    <div class="form-group">
        <label>Precio</label>
        <input type="text" class="form-control" name="r_inputPrecio" value="<?php echo $salones_data['precio']; ?>">
    </div>
    <div class="form-group">
        <label>Capacidad</label>
        <input type="text" class="form-control" name="r_inputCapacidad" value="<?php echo $salones_data['capacidad']; ?>">
    </div>
    <div class="form-group">
        <label>Servicios Incluidos</label>
        <select class="form-control" name="r_inputServicios">
            <option value="Musica en Vivo" <?php echo $salones_data['servicios'] == "Intermediate" ? "SELECTED" : ""; ?>>Música en Vivo</option>
            <option value="Buffet" <?php echo $salones_data['servicios'] == "Intermediate" ? "SELECTED" : ""; ?>>Buffet</option>
            <option value="Otras Cosas" <?php echo $salones_data['servicios'] == "Expert" ? "SELECTED" : ""; ?>>Otras Cosas</option>
        </select>
    </div>
    <div class="form-group">
        <label>Locaclización</label>
        <input type="text" class="form-control" name="r_inputLocalizacion" value="<?php echo $salones_data['localizacion']; ?>">
    </div>
    <?php
}
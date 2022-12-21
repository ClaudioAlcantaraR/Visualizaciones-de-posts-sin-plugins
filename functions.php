<?php
/**
 * Función para contar visualizaciones de un post
*/ 
function setPostViews() {
    // Comprobamos: Que sea un post, que el usuario NO sea administrador y que NO este logueado.
    if (is_single() && !current_user_can('manage_options') && !is_user_logged_in()) {
        $post_ID = get_the_ID();
        // Nombre del custom field
        $count_key = 'num_views';
        $count = get_post_meta($post_ID, $count_key, true);

        if ($count == '') {
            delete_post_meta($post_ID, $count_key);
            add_post_meta($post_ID, $count_key, 1);
        } else {
            update_post_meta($post_ID, $count_key, ++$count);
        }
    }
}

// Añadimos la función al hook wp
add_action( 'wp', 'setPostViews' );

/* 
* Función para obtener el número de visualizaciones de un post
*/
function getPostViews($post_ID) {
    // Nombre del custom field
    $count_key = 'num_views';
    $count = get_post_meta($post_ID, $count_key, true);

    if ($count == ''){
        delete_post_meta($post_ID, $count_key);
        add_post_meta($post_ID, $count_key, 0);
        return 0;
    }
    return $count;
}

/**
 * Función deshabilita el custom field num_views para que no se aditable
 */
function disableAcfLoadField($field) {
    $field['disabled'] = 1;
    return $field;
}
add_filter('acf/load_field/name=num_views', 'disableAcfLoadField');
?>

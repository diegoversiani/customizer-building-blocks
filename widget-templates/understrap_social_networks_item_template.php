<?php 
/*
 * Template for the output of the Social Networks Widget Item
 * Override by placing a file called `understrap_social_networks_item_template.php`
 * the folder `widget-templates` in your active theme
 */
?>

<li class="list-inline-item"><a href="<?php echo esc_url( $instance[ $social_network_url ] ); ?>" target="_blank"><i class="fa <?php esc_attr_e( $social_network_classes ) ?>"></i></a></li>

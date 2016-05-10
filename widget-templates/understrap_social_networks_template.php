<?php 
/*
 * Template for the output of the Social Networks Widget
 * Override by placing a file called `understrap_social_networks_template.php`
 * the folder `widget-templates` in your active theme
 */
?>

<div class="social-networks <?php esc_attr_e( $instance['css_class'] ); ?>">
  <?php 
  if ( ! empty( $instance['title'] ) ) {
    echo $args['before_title'] . esc_html( $instance['title'] ) . $args['after_title'];
  }
  ?>
  <ul class="list-inline">

  <?php

  foreach ($social_networks as $key => $social_network_name) {
    
    $social_network_url = $key . '_url';

    if ( isset( $instance[ $social_network_url ] ) ) {
      $social_network_classes = $instance['icon_size'] . ' ' . $social_networks_icons[ $key ];
      
      $item_template = locate_template( UNDERSTRAP_WIDGET_TEMPLATES_FOLDER . '/understrap_social_networks_item_template.php' );
      if ( $item_template == '' ) $item_template = UNDERSTRAP_WIDGETS_DIR . UNDERSTRAP_WIDGET_TEMPLATES_FOLDER . '/understrap_social_networks_item_template.php';
      include ( $item_template );

    }
  }
  ?>
    
  </ul>
</div>

<?php 
/*
 * Template for the output of the Social Networks Widget
 * Override by placing a file called `cbb_social_networks_template.php`
 * in the folder `plugins/customizer-building-blocks/widget-templates` in your active theme
 */

// == You can change the social network icon by changing its icon class.
// create a copy of this template in the folder
// `plugins/customizer-building-blocks/widget-templates` in your
// active theme and uncomment the lines bellow.
// $social_networks_icons['facebook'] = 'fa-facebook-square';
// $social_networks_icons['github'] = 'fa-github-alt';

$css_class = 'cbb-social-networks ' . $css_class;

?>

<div class="<?php esc_attr_e( $css_class ); ?>">
  <?php 
  if ( ! empty( $instance['title'] ) ) {
    echo $args['before_title'] . esc_html( $instance['title'] ) . $args['after_title'];
  }
  ?>
  <ul class="cbb-social-networks__list">

  <?php

  foreach ($social_networks as $key => $social_network_name) {
    
    $social_network_url = $key . '_url';

    if ( !empty( $instance[ $social_network_url ] ) ) {
      $social_network_classes = $instance['icon_size'] . ' ' . $social_networks_icons[ $key ];
      
      $item_template = locate_template( CBB_THEME_TEMPLATES_FOLDER . '/cbb_social_networks_item_template.php' );
      if ( $item_template == '' ) $item_template =  CBB_DEFAULT_TEMPLATES_FOLDER . '/cbb_social_networks_item_template.php';
      include ( $item_template );

    }
  }
  ?>
    
  </ul>
</div>

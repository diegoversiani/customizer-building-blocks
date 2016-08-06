<?php 
/*
 * Template for the output of the Social Networks Widget
 * Override by placing a file called `cbb_social_networks_template.php`
 * in the folder `plugins/customizer-building-blocks/widget-templates` in your active theme
 */



// == You can change the social network icon size class.
// create a copy of this template in the folder
// `plugins/customizer-building-blocks/widget-templates` in your
// active theme and uncomment the lines bellow.
// 
// /* FONTAWESOME ICON SIZE*/
// $social_networks_icons_size['normal'] = '';
// $social_networks_icons_size['x2'] = 'fa-2x';
// $social_networks_icons_size['x3'] = 'fa-3x';
// $social_networks_icons_size['x4'] = 'fa-4x';
// $social_networks_icons_size['x5'] = 'fa-5x';



// == You can change the social network icon by changing its icon class.
// create a copy of this template in the folder
// `plugins/customizer-building-blocks/widget-templates` in your
// active theme and uncomment the lines bellow.
// 
// /* FONTAWESOME ICONS*/
// $social_networks_icons['behance'] = 'fa-behance';
// $social_networks_icons['bitcoin'] = 'fa-bitcoin';
// $social_networks_icons['delicious'] = 'fa-delicious';
// $social_networks_icons['deviantart'] = 'fa-deviantart';
// $social_networks_icons['digg'] = 'fa-digg';
// $social_networks_icons['dribbble'] = 'fa-dribbble';
// $social_networks_icons['facebook'] = 'fa-facebook';
// $social_networks_icons['flickr'] = 'fa-flickr';
// $social_networks_icons['foursquare'] = 'fa-foursquare';
// $social_networks_icons['github'] = 'fa-github';
// $social_networks_icons['google-plus'] = 'fa-google-plus';
// $social_networks_icons['instagram'] = 'fa-instagram';
// $social_networks_icons['lastfm'] = 'fa-lastfm';
// $social_networks_icons['linkedin'] = 'fa-linkedin';
// $social_networks_icons['medium'] = 'fa-medium';
// $social_networks_icons['pinterest'] = 'fa-pinterest';
// $social_networks_icons['skype'] = 'fa-skype';
// $social_networks_icons['soundcloud'] = 'fa-soundcloud';
// $social_networks_icons['spotify'] = 'fa-spotify';
// $social_networks_icons['tumblr'] = 'fa-tumblr';
// $social_networks_icons['twitter'] = 'fa-twitter';
// $social_networks_icons['vine'] = 'fa-vine';
// $social_networks_icons['wechat'] = 'fa-wechat';
// $social_networks_icons['whatsapp'] = 'fa-whatsapp';
// $social_networks_icons['wordpress'] = 'fa-wordpress';
// $social_networks_icons['youtube'] = 'fa-youtube';
// $social_networks_icons['phone'] = 'fa-mobile';
// $social_networks_icons['email'] = 'fa-envelope';





$css_class = 'cbb-social-networks ' . $css_class;
$icon_size_class = $social_networks_icons_size[ $instance['icon_size'] ];

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
    $social_network_text = $key . '_text';

    if ( !empty( $instance[ $social_network_url ] ) ) {
      $social_network_classes = $icon_size_class . ' ' . $social_networks_icons[ $key ];
      
      $item_template = locate_template( CBB_THEME_TEMPLATES_FOLDER . '/cbb_social_networks_item_template.php' );
      if ( $item_template == '' ) $item_template =  CBB_DEFAULT_TEMPLATES_FOLDER . '/cbb_social_networks_item_template.php';
      include ( $item_template );

    }
  }
  ?>
    
  </ul>
</div>

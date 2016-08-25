<?php
/**
 * Plugin Name: Customizer Building Blocks
 * Plugin URI: http://github.com/diegoversiani/customizer-building-blocks
 * Description: Common website blocks as customizable widgets you can add to any widget area of your website.
 * Text Domain: customizer-building-blocks
 * Domain Path: /languages
 * Version: 0.0.1
 * Author: Diego Versiani
 * Author URI: http://diegoversiani.me/
 * License: GPL2
 */


/*------------------------------------*\
  #CONSTANTS
\*------------------------------------*/

if (!defined('CBB_PLUGIN_DIR')) define('CBB_PLUGIN_DIR', plugin_dir_path( __FILE__ ));
if (!defined('CBB_PLUGIN_URL')) define('CBB_PLUGIN_URL', plugin_dir_url( __FILE__ ));
if (!defined('CBB_THEME_TEMPLATES_FOLDER')) define('CBB_THEME_TEMPLATES_FOLDER', 'plugins/customizer-building-blocks/widget-templates' );
if (!defined('CBB_DEFAULT_TEMPLATES_FOLDER')) define('CBB_DEFAULT_TEMPLATES_FOLDER',  CBB_PLUGIN_DIR . 'widget-templates/default' );





/*------------------------------------*\
  #SETUP WIDGETS
\*------------------------------------*/

add_action( 'widgets_init', 'cbb_widgets_plugin_init');
function cbb_widgets_plugin_init () {
  require_once( CBB_PLUGIN_DIR . 'widgets/cbb_about_widget.php' );
  require_once( CBB_PLUGIN_DIR . 'widgets/cbb_button_widget.php' );
  require_once( CBB_PLUGIN_DIR . 'widgets/cbb_cta_widget.php' );
  require_once( CBB_PLUGIN_DIR . 'widgets/cbb_featured_widget.php' );
  require_once( CBB_PLUGIN_DIR . 'widgets/cbb_section_begin_widget.php' );
  require_once( CBB_PLUGIN_DIR . 'widgets/cbb_section_end_widget.php' );
  require_once( CBB_PLUGIN_DIR . 'widgets/cbb_section_featured_widget.php' );
  require_once( CBB_PLUGIN_DIR . 'widgets/cbb_social_networks_widget.php' );
  require_once( CBB_PLUGIN_DIR . 'widgets/cbb_text_widget.php' );
  
  register_widget( 'CBB_About_Widget' );
  register_widget( 'CBB_Button_Widget' );
  register_widget( 'CBB_CTA_Widget' );
  register_widget( 'CBB_Featured_Widget' );
  register_widget( 'CBB_SectionBegin_Widget' );
  register_widget( 'CBB_SectionEnd_Widget' );
  register_widget( 'CBB_SectionFeatured_Widget' );
  register_widget( 'CBB_SocialNetworks_Widget' );
  register_widget( 'CBB_Text_Widget' );

}






/*------------------------------------*\
  #FUNCTIONS
\*------------------------------------*/

if (! function_exists( 'cbb_widget_admin_setup' )) {
  function cbb_widget_admin_setup(){

    wp_enqueue_media();
    wp_register_script('cbb-admin-js', CBB_PLUGIN_URL . '/js/cbb-admin.js' , array( 'jquery', 'media-upload', 'media-views' ) );
    wp_enqueue_script('cbb-admin-js', '');

  }
}



if (! function_exists( 'is_customizer_building_blocks_widgets_ativated' )) {
  function is_customizer_building_blocks_widgets_ativated () {
    return true;
  }
}



if (! function_exists( 'customizer_building_blocks_widgets_sanitize_css_classes' )) {
  function customizer_building_blocks_widgets_sanitize_css_classes ( $classes ) {
    $individual_classes = explode(' ', $classes);

    foreach ($individual_classes as $class) {
      $sanitized_classes .= sanitize_html_class( $class ) . ' ';
    }

    return trim( $sanitized_classes );
  }
}


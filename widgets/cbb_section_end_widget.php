<?php 
class CBB_SectionEnd_Widget extends WP_Widget {

  public function __construct() {
    $widget_ops = array( 
      'classname' => 'cbb_section_end_widget',
      'description' => __( 'A Section End widget for CBB Theme. Should always be used after a Section Begin widget.', 'customizer-building-blocks' ),
    );
    parent::__construct( 'cbb_section_end_widget', __( 'CBB Section End', 'customizer-building-blocks' ), $widget_ops );
  }





  public function widget( $args, $instance ) {

    $template = locate_template( CBB_THEME_TEMPLATES_FOLDER . '/cbb_section_end_template.php' );
    if ( $template == '' ) $template = CBB_DEFAULT_TEMPLATES_FOLDER . '/cbb_section_end_template.php';
    include ( $template );

  }





  public function form( $instance ) {
    ?>
    <p>
      <?php _e( 'Nothing to be changed here. This widget just adds the closing tags for a previously added Section Begin widget.', 'customizer-building-blocks' ); ?>
    </p>
    <?php 
  }





  public function update( $new_instance, $old_instance ) {
    return $instance;
  }
}

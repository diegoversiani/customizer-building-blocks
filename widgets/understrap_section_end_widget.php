<?php 
class UnderstrapSectionEnd_Widget extends WP_Widget {

  public function __construct() {
    $widget_ops = array( 
      'classname' => 'understrap_section_end_widget',
      'description' => __( 'A Section End widget for Understrap Theme. Should always be used after a Section Begin widget.', 'understrap_widgets' ),
    );
    parent::__construct( 'understrap_section_end_widget', __( 'Understrap Section End', 'understrap_widgets' ), $widget_ops );
  }

  public function widget( $args, $instance ) {
    echo '</div></div></div></div>';
    echo $args['after_widget'];
  }

  public function form( $instance ) {
    ?>
    <p>
      <?php _e( 'Nothing to be changed here. This widget just adds the closing tags for a previously added Section Begin widget.', 'understrap_widgets' ); ?>
    </p>
    <?php 
  }

  public function update( $new_instance, $old_instance ) {
    return $instance;
  }
}

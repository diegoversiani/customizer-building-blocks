<?php 
/**
* Adds UnderstrapSectionEnd_Widget widget.
*/
class UnderstrapSectionEnd_Widget extends WP_Widget {

  /**
   * Sets up the widgets name
   */
  public function __construct() {
    $widget_ops = array( 
      'classname' => 'understrap_section_end_widget',
      'description' => __( 'A Section End widget for Understrap Theme. Should always be used after a Section Begin widget.', 'understrap_widgets' ),
    );
    parent::__construct( 'understrap_section_end_widget', __( 'Understrap Section End', 'understrap_widgets' ), $widget_ops );
  }

  /**
   * Front-end display of widget.
   *
   * @see UnderstrapSectionEnd_Widget::widget()
   *
   * @param array $args     Widget arguments.
   * @param array $instance Saved values from database.
   */
  public function widget( $args, $instance ) {
    echo '</div></div></div></div>';
    echo $args['after_widget'];
  }

  /**
   * Back-end widget form.
   *
   * @see WP_Widget::form()
   *
   * @param array $instance Previously saved values from database.
   */
  public function form( $instance ) {
    ?>
    <p>
      <?php _e( 'Nothing to be changed here. This widget just adds the closing tags for a previously added Section Begin widget.', 'understrap_widgets' ); ?>
    </p>
    <?php 
  }

  /**
   * Sanitize widget form values as they are saved.
   *
   * @see WP_Widget::update()
   *
   * @param array $new_instance Values just sent to be saved.
   * @param array $old_instance Previously saved values from database.
   *
   * @return array Updated safe values to be saved.
   */
  public function update( $new_instance, $old_instance ) {
    return $instance;
  }
}

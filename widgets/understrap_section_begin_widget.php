<?php 
/**
* Adds UnderstrapSectionBegin_Widget widget.
*/
class UnderstrapSectionBegin_Widget extends WP_Widget {

  /**
   * Sets up the widgets name
   */
  public function __construct() {
    $widget_ops = array( 
      'classname' => 'understrap_section_begin_widget',
      'description' => __( 'A Section Begin widget for Understrap Theme. Should always be used before a Section End widget.', 'understrap_widgets' ),
    );
    parent::__construct( 'understrap_section_begin_widget', __( 'Understrap Section Begin', 'understrap_widgets' ), $widget_ops );
  }

  /**
   * Front-end display of widget.
   *
   * @see UnderstrapSectionBegin_Widget::widget()
   *
   * @param array $args     Widget arguments.
   * @param array $instance Saved values from database.
   */
  public function widget( $args, $instance ) {
    echo $args['before_widget'];

    $container_class = ( $instance['container_fluid'] ? 'container-fluid' : 'container' );

    ?> 
    <div class="wrapper wrapper-<?php esc_attr_e( $instance['section_name'] ); ?> <?php esc_attr_e( $instance['css_class'] ); ?>">
        <div class="<?php esc_attr_e( $container_class ); ?>">
          <div class="row">
            <div class="col-xs-12 <?php esc_attr_e( $instance['section_name'] ); ?>-content">
              <?php 
              if ( ! empty( $instance['title'] ) ) {
                echo $args['before_title'] . esc_html( $instance['title'] ) . $args['after_title'];
              }
              ?>

    <?php
  }

  /**
   * Back-end widget form.
   *
   * @see WP_Widget::form()
   *
   * @param array $instance Previously saved values from database.
   */
  public function form( $instance ) {
    $section_name = ! empty( $instance['section_name'] ) ? $instance['section_name'] : '';
    $title = ! empty( $instance['title'] ) ? $instance['title'] : '';
    $container_fluid = $instance[ 'container_fluid' ] ? 'true' : 'false';
    $css_class = ! empty( $instance['css_class'] ) ? $instance['css_class'] : '';
    ?>
    <p>
    <label for="<?php echo $this->get_field_id( 'section_name' ); ?>"><?php _e( 'Section Name:', 'understrap_widgets' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'section_name' ); ?>" name="<?php echo $this->get_field_name( 'section_name' ); ?>" type="text" value="<?php esc_attr_e( $section_name ); ?>">
    </p>

    <p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'understrap_widgets' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php esc_attr_e( $title ); ?>">
    </p>

    <p>
    <input class="checkbox" type="checkbox" <?php checked( $instance[ 'container_fluid' ], 'on' ); ?> id="<?php echo $this->get_field_id( 'container_fluid' ); ?>" name="<?php echo $this->get_field_name( 'container_fluid' ); ?>" />
    <label for="<?php echo $this->get_field_id( 'container_fluid' ); ?>"><?php _e( 'Is container-fluid?', 'understrap_widgets' ); ?></label><br>
    <small><?php _e( 'Check to apply boostrap <code>container-fluid</code> class to this widget.', 'understrap_widgets' ); ?></small>
    </p>

    <p>
    <label for="<?php echo $this->get_field_id( 'css_class' ); ?>"><?php _e( 'Custom CSS Classes:', 'understrap_widgets' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'css_class' ); ?>" name="<?php echo $this->get_field_name( 'css_class' ); ?>" type="text" value="<?php esc_attr_e( $css_class ); ?>">
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
    $instance = array();
    $instance['section_name'] = ( ! empty( $new_instance['section_name'] ) ) ? sanitize_html_class( $new_instance['section_name'] ) : '';
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
    $instance['container_fluid'] = $new_instance['container_fluid'];
    // TODO: Sanitize css classes for allowed characters
    $instance['css_class'] = ( ! empty( $new_instance['css_class'] ) ) ? sanitize_text_field( $new_instance['css_class'] ) : '';

    return $instance;
  }
}

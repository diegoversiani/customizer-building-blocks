<?php 

class UnderstrapSectionBegin_Widget extends WP_Widget {

  public function __construct() {
    $widget_ops = array(
      'classname' => 'understrap_section_begin_widget',
      'description' => __( 'A Section Begin widget for Understrap Theme. Should always be used before a Section End widget.', 'understrap_widgets' ),
    );
    parent::__construct( 'understrap_section_begin_widget', __( 'Understrap Section Begin', 'understrap_widgets' ), $widget_ops );
  }

  public function widget( $args, $instance ) {

    $container_class = ( $instance['container_fluid'] ? 'container-fluid' : 'container' );

    if ( ! empty( $instance['title_tag'] ) ) {
      $args['before_title'] = '<' . esc_attr( $instance['title_tag'] ) . '>';
      $args['after_title'] = '</' . esc_attr( $instance['title_tag'] ) . '>';
    }

    echo $args['before_widget'];

    ?> 
    <div class="wrapper <?php esc_attr_e( $instance['css_class'] ); ?>">
        <div class="<?php esc_attr_e( $container_class ); ?>">
          <div class="row">

            <?php if ( ! empty( $instance['title'] ) ) : ?>
              <div class="section-title">
              <?php echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title']; ?>
              </div>
            <?php endif; ?>

            <div class="section-content">

    <?php
  }

  public function form( $instance ) {
    $title = ! empty( $instance['title'] ) ? $instance['title'] : '';
    $title_tag = ! empty( $instance['title_tag'] ) ? $instance['title_tag'] : '';
    $container_fluid = $instance[ 'container_fluid' ] ? 'true' : 'false';
    $css_class = ! empty( $instance['css_class'] ) ? $instance['css_class'] : '';
    ?>
    
    <p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'understrap_widgets' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php esc_attr_e( $title ); ?>">
    </p>

    <p>
    <label><?php _e( 'Title Tags:', 'understrap_widgets' ); ?></label>
    <br>
    <select class="widefat" id="<?php echo $this->get_field_id( 'title_tag' ); ?>" name="<?php echo $this->get_field_name( 'title_tag' ); ?>">
      <option value="" <?php esc_attr_e( $title_tag == '' ? 'selected' : '' ); ?>><?php _e( '-- None --', 'understrap_widgets' ); ?></option>
      <option value="h1" <?php esc_attr_e( $title_tag == 'h1' ? 'selected' : '' ); ?>><?php _e( 'h1', 'understrap_widgets' ); ?></option>
      <option value="h2" <?php esc_attr_e( $title_tag == 'h2' ? 'selected' : '' ); ?>><?php _e( 'h2', 'understrap_widgets' ); ?></option>
      <option value="h3" <?php esc_attr_e( $title_tag == 'h3' ? 'selected' : '' ); ?>><?php _e( 'h3', 'understrap_widgets' ); ?></option>
      <option value="h4" <?php esc_attr_e( $title_tag == 'h4' ? 'selected' : '' ); ?>><?php _e( 'h4', 'understrap_widgets' ); ?></option>
      <option value="h5" <?php esc_attr_e( $title_tag == 'h5' ? 'selected' : '' ); ?>><?php _e( 'h5', 'understrap_widgets' ); ?></option>
      <option value="h6" <?php esc_attr_e( $title_tag == 'h6' ? 'selected' : '' ); ?>><?php _e( 'h6', 'understrap_widgets' ); ?></option>
      <option value="span" <?php esc_attr_e( $title_tag == 'span' ? 'selected' : '' ); ?>><?php _e( 'span', 'understrap_widgets' ); ?></option>
    </select>
    <small><?php _e( 'Apply only for the section title, not the widgets inside it.', 'understrap_widgets' ); ?></small>

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

  public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
    
    $title_tag_allowed = array('h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'span');
    $instance['title_tag'] = ( in_array($new_instance['title_tag'], $title_tag_allowed) ) ? $new_instance['title_tag'] : '';
    
    $instance['container_fluid'] = $new_instance['container_fluid'];
    // TODO: Sanitize css classes for allowed characters
    $instance['css_class'] = ( ! empty( $new_instance['css_class'] ) ) ? sanitize_text_field( $new_instance['css_class'] ) : '';

    return $instance;
  }
}

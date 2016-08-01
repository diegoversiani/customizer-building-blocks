<?php 

class CBB_SectionBegin_Widget extends WP_Widget {

  public function __construct() {
    $widget_ops = array(
      'classname' => 'cbb_section_begin_widget',
      'description' => __( 'A Section Begin widget for CBB Theme. Should always be used before a Section End widget.', 'customizer-building-blocks' ),
    );
    parent::__construct( 'cbb_section_begin_widget', __( 'CBB Section Begin', 'customizer-building-blocks' ), $widget_ops );
  }

  public function widget( $args, $instance ) {

    if ( ! empty( $instance['title_tag'] ) ) {
      $args['before_title'] = '<' . esc_attr( $instance['title_tag'] ) . '>';
      $args['after_title'] = '</' . esc_attr( $instance['title_tag'] ) . '>';
    }

    $container_class = ( $instance['container_fluid'] ? 'container-fluid' : 'container' );

    echo $args['before_widget'];

    $template = locate_template( CBB_THEME_TEMPLATES_FOLDER . '/cbb_section_begin_template.php' );
    if ( $template == '' ) $template = CBB_DEFAULT_TEMPLATES_FOLDER . '/cbb_section_begin_template.php';
    include ( $template );

  }

  public function form( $instance ) {
    $title = ! empty( $instance['title'] ) ? $instance['title'] : '';
    $title_tag = ! empty( $instance['title_tag'] ) ? $instance['title_tag'] : '';
    $container_fluid = $instance[ 'container_fluid' ] ? 'true' : 'false';
    $css_class = ! empty( $instance['css_class'] ) ? $instance['css_class'] : '';
    ?>
    
    <p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'customizer-building-blocks' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php esc_attr_e( $title ); ?>">
    </p>

    <p>
    <label><?php _e( 'Title Tags:', 'customizer-building-blocks' ); ?></label>
    <br>
    <select class="widefat" id="<?php echo $this->get_field_id( 'title_tag' ); ?>" name="<?php echo $this->get_field_name( 'title_tag' ); ?>">
      <option value="" <?php esc_attr_e( $title_tag == '' ? 'selected' : '' ); ?>><?php _e( '-- None --', 'customizer-building-blocks' ); ?></option>
      <option value="h1" <?php esc_attr_e( $title_tag == 'h1' ? 'selected' : '' ); ?>><?php _e( 'h1', 'customizer-building-blocks' ); ?></option>
      <option value="h2" <?php esc_attr_e( $title_tag == 'h2' ? 'selected' : '' ); ?>><?php _e( 'h2', 'customizer-building-blocks' ); ?></option>
      <option value="h3" <?php esc_attr_e( $title_tag == 'h3' ? 'selected' : '' ); ?>><?php _e( 'h3', 'customizer-building-blocks' ); ?></option>
      <option value="h4" <?php esc_attr_e( $title_tag == 'h4' ? 'selected' : '' ); ?>><?php _e( 'h4', 'customizer-building-blocks' ); ?></option>
      <option value="h5" <?php esc_attr_e( $title_tag == 'h5' ? 'selected' : '' ); ?>><?php _e( 'h5', 'customizer-building-blocks' ); ?></option>
      <option value="h6" <?php esc_attr_e( $title_tag == 'h6' ? 'selected' : '' ); ?>><?php _e( 'h6', 'customizer-building-blocks' ); ?></option>
      <option value="span" <?php esc_attr_e( $title_tag == 'span' ? 'selected' : '' ); ?>><?php _e( 'span', 'customizer-building-blocks' ); ?></option>
    </select>
    <small><?php _e( 'Apply only for the section title, not the widgets inside it.', 'customizer-building-blocks' ); ?></small>

    <p>
    <input class="checkbox" type="checkbox" <?php checked( $instance[ 'container_fluid' ], 'on' ); ?> id="<?php echo $this->get_field_id( 'container_fluid' ); ?>" name="<?php echo $this->get_field_name( 'container_fluid' ); ?>" />
    <label for="<?php echo $this->get_field_id( 'container_fluid' ); ?>"><?php _e( 'Is container-fluid?', 'customizer-building-blocks' ); ?></label><br>
    <small><?php _e( 'Check to apply boostrap <code>container-fluid</code> class to this widget.', 'customizer-building-blocks' ); ?></small>
    </p>

    <p>
    <label for="<?php echo $this->get_field_id( 'css_class' ); ?>"><?php _e( 'Custom CSS Classes:', 'customizer-building-blocks' ); ?></label> 
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
    $instance['css_class'] = ( ! empty( $new_instance['css_class'] ) ) ? customizer_building_blocks_widgets_sanitize_css_classes( $new_instance['css_class'] ) : '';

    return $instance;
  }
}

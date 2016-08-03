<?php 

class CBB_CTA_Widget extends WP_Widget {

  public function __construct() {
    $widget_ops = array( 
      'classname' => 'cbb_cta_widget',
      'description' => __( 'A Call To Action widget for CBB Theme. Can also be used as a Call Out text.', 'customizer-building-blocks'),
      'customize_selective_refresh' => true
    );
    parent::__construct( 'cbb_cta_widget', __( 'CBB CTA/Call Out', 'customizer-building-blocks'), $widget_ops );
 


    add_action( 'sidebar_admin_setup', 'cbb_widget_admin_setup' );
  }





  public function widget( $args, $instance ) {

    if ( ! empty( $instance['title_tag'] ) ) {
      $args['before_title'] = '<' . esc_attr( $instance['title_tag'] ) . ' class="widget-title cbb-cta-title">';
      $args['after_title'] = '</' . esc_attr( $instance['title_tag'] ) . '>';
    }

    $css_class = ( ! empty( $instance['css_class'] ) ) ? $instance['css_class'] : '';
    $button_css_class = ( ! empty( $instance['button_css_class'] ) ) ? $instance['button_css_class'] : '';

    echo $args['before_widget'];

    $template = locate_template( CBB_THEME_TEMPLATES_FOLDER . '/cbb_cta_template.php' );
    if ( $template == '' ) $template = CBB_DEFAULT_TEMPLATES_FOLDER . '/cbb_cta_template.php';
    include ( $template );

    echo $args['after_widget'];
  }





  public function form( $instance ) {
    $title = ! empty( $instance['title'] ) ? $instance['title'] : '';
    $title_tag = ! empty( $instance['title_tag'] ) ? $instance['title_tag'] : '';
    $image_url = ( isset( $instance['image_url'] ) ) ? $instance['image_url'] : '';
    $icon_class = ! empty( $instance['icon_class'] ) ? $instance['icon_class'] : '';
    $text = ! empty( $instance['text'] ) ? $instance['text'] : '';
    $button_text = ! empty( $instance['button_text'] ) ? $instance['button_text'] : '';
    $button_href = ! empty( $instance['button_href'] ) ? $instance['button_href'] : '';
    $css_class = ! empty( $instance['css_class'] ) ? $instance['css_class'] : '';
    $button_css_class = ! empty( $instance['button_css_class'] ) ? $instance['button_css_class'] : '';
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

    <p>
    <label for="<?php echo $this->get_field_id( 'image_url' ); ?>"><?php _e( 'Image URL:', 'customizer-building-blocks' ); ?></label>
    <input class="widefat image_url" id="<?php echo $this->get_field_id( 'image_url' ); ?>" name="<?php echo $this->get_field_name( 'image_url' ); ?>" value="<?php echo $image_url ?>" type="text">
    <button id="<?php echo $this->get_field_id( 'image_url' ) . '_select_button'; ?>" class="button" onclick="select_image_button_click('Select Image','Select Image','image','<?php echo $this->get_field_id( 'image_url' ) . '_preview'; ?>','<?php echo $this->get_field_id( 'image_url' );  ?>');"><?php _e( 'Select or upload image', 'customizer-building-blocks' ); ?></button>
    <button id="<?php echo $this->get_field_id( 'image_url' ) . '_clear_button'; ?>" class="button" onclick="clear_image_button_click('<?php echo $this->get_field_id( 'image_url' ) . '_preview'; ?>','<?php echo $this->get_field_id( 'image_url' );  ?>');"><?php _e( 'Clear selection', 'Clear image selection on widget admin form.', 'customizer-building-blocks' ); ?></button>
    <div id="<?php echo $this->get_field_id( 'image_url' ) . '_preview'; ?>" class="preview_placholder">
    <?php 
      if ($image_url!='') echo '<img style="max-width: 100%;" src="' . $image_url . '">';
    ?>
    </div>
    </p>

    <p>
    <label for="<?php echo $this->get_field_id( 'icon_class' ); ?>"><?php _e( 'Icon Class:', 'customizer-building-blocks' ); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id( 'icon_class' ); ?>" name="<?php echo $this->get_field_name( 'icon_class' ); ?>" type="text" value="<?php esc_attr_e( $icon_class ); ?>">
    </p>

    <p>
    <label for="<?php echo $this->get_field_id( 'text' ); ?>"><?php _e( 'Text:', 'customizer-building-blocks' ); ?></label> 
    <textarea class="widefat" id="<?php echo $this->get_field_id( 'text' ); ?>" name="<?php echo $this->get_field_name( 'text' ); ?>" rows="4" cols="20"><?php esc_attr_e( $text ); ?></textarea>
    </p>

    <p>
    <label for="<?php echo $this->get_field_id( 'button_text' ); ?>"><?php _e( 'Button Text:', 'customizer-building-blocks' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'button_text' ); ?>" name="<?php echo $this->get_field_name( 'button_text' ); ?>" type="text" value="<?php esc_attr_e( $button_text ); ?>">
    </p>

    <p>
    <label for="<?php echo $this->get_field_id( 'button_href' ); ?>"><?php _e( 'Button Action:', 'customizer-building-blocks' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'button_href' ); ?>" name="<?php echo $this->get_field_name( 'button_href' ); ?>" type="text" value="<?php esc_attr_e( $button_href ); ?>">
    </p>

    <p>
    <label for="<?php echo $this->get_field_id( 'css_class' ); ?>"><?php _e( 'Custom CSS Classes:', 'customizer-building-blocks' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'css_class' ); ?>" name="<?php echo $this->get_field_name( 'css_class' ); ?>" type="text" value="<?php esc_attr_e( $css_class ); ?>">
    </p>

    <p>
    <label for="<?php echo $this->get_field_id( 'button_css_class' ); ?>"><?php _e( 'Button CSS Classes:', 'customizer-building-blocks' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'button_css_class' ); ?>" name="<?php echo $this->get_field_name( 'button_css_class' ); ?>" type="text" value="<?php esc_attr_e( $button_css_class ); ?>">
    </p>
    <?php 
  }





  public function update( $new_instance, $old_instance ) {
    $instance = array();




    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
    $title_tag_allowed = array('h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'span');
    $instance['title_tag'] = ( in_array($new_instance['title_tag'], $title_tag_allowed) ) ? $new_instance['title_tag'] : '';



    $instance['image_url'] = ( ! empty( $new_instance['image_url'] ) ) ? esc_url_raw( $new_instance['image_url'] ) : '';
    $instance['icon_class'] = ( ! empty( $new_instance['icon_class'] ) ) ? customizer_building_blocks_widgets_sanitize_css_classes( $new_instance['icon_class'] ) : '';



    $instance['text'] = ( ! empty( $new_instance['text'] ) ) ? wp_kses_post( $new_instance['text'] ) : '';



    $instance['button_text'] = ( ! empty( $new_instance['button_text'] ) ) ? sanitize_text_field( $new_instance['button_text'] ) : '';
    $instance['button_href'] = ( ! empty( $new_instance['button_href'] ) ) ? esc_url_raw( $new_instance['button_href'] ) : '';


    
    $instance['css_class'] = ( ! empty( $new_instance['css_class'] ) ) ? customizer_building_blocks_widgets_sanitize_css_classes( $new_instance['css_class'] ) : '';
    $instance['button_css_class'] = ( ! empty( $new_instance['button_css_class'] ) ) ? customizer_building_blocks_widgets_sanitize_css_classes( $new_instance['button_css_class'] ) : '';

    return $instance;
  }
}
<?php 
/**
* Adds UnderstrapImagesList_Widget widget.
*/
class UnderstrapImagesList_Widget extends WP_Widget {

  /**
   * Sets up the widgets name
   */
  public function __construct() {
    $widget_ops = array( 
      'classname' => 'understrap_images_list_widget',
      'description' => __( 'A list of images to show anywhere.', 'understrap_widgets' ),
    );
    parent::__construct( 'understrap_images_list_widget', __( 'Understrap Images List (DEPRECATED)', 'understrap_widgets' ), $widget_ops );
  }

  /**
   * Front-end display of widget.
   *
   * @see UnderstrapImagesList_Widget::widget()
   *
   * @param array $args     Widget arguments.
   * @param array $instance Saved values from database.
   */
  public function widget( $args, $instance ) {
    echo $args['before_widget'];
    
    $container_class = ( $instance['container_fluid'] ? 'container-fluid' : 'container' );
    $image_url_array = explode("\r\n", $instance['image_url_list']);
    $css_classes = $instance['css_class'] . ' ' . $instance['effects_classes'];

    $image_size_classes = array(
      '1' => '12',
      '2' => '6',
      '3' => '4',
      '4' => '3',
      '6' => '2',
      '12' => '1'
      );

    $images_per_row_xs = ! empty( $instance['images_per_row_xs'] ) ? $instance['images_per_row_xs'] : '2';
    $images_per_row_sm = ! empty( $instance['images_per_row_sm'] ) ? $instance['images_per_row_sm'] : '4';
    $images_per_row_md = ! empty( $instance['images_per_row_md'] ) ? $instance['images_per_row_md'] : '4';
    $images_per_row_lg = ! empty( $instance['images_per_row_lg'] ) ? $instance['images_per_row_lg'] : '4';
    
    $image_size_class .= ' col-xs-' . $image_size_classes[$images_per_row_xs];
    if ( $images_per_row_sm != $images_per_row_xs ) { $image_size_class .= ' col-sm-' . $image_size_classes[$images_per_row_sm]; }
    if ( $images_per_row_md != $images_per_row_sm ) { $image_size_class .= ' col-md-' . $image_size_classes[$images_per_row_md]; }
    if ( $images_per_row_lg != $images_per_row_md ) { $image_size_class .= ' col-lg-' . $image_size_classes[$images_per_row_lg]; }

    ?> 
    <div class="wrapper wrapper-images-list <?php esc_attr_e( $css_classes ); ?>">
      <div class="<?php esc_attr_e( $container_class ); ?>">
        <div class="row">
          <div class="col-xs-12 images-list-content">
            <?php 
            if ( ! empty( $instance['title'] ) ) {
              echo $args['before_title'] . esc_html( $instance['title'] ) . $args['after_title'];
            }
            ?>
            
            <?php
            foreach ($image_url_array as $url) {
              echo sprintf('<img src="%1$s" class="img-responsive center-block image-list-item %2$s">', $url, $image_size_class );
            }
            ?>

          </div>
        </div>
      </div>
    </div>
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
    $title = ! empty( $instance['title'] ) ? $instance['title'] : '';
    $image_url_list = ! empty( $instance['image_url_list'] ) ? $instance['image_url_list'] : '';
    $container_fluid = $instance[ 'container_fluid' ] ? 'true' : 'false';
    $css_class = ! empty( $instance['css_class'] ) ? $instance['css_class'] : '';
    $effects_classes = ! empty( $instance['effects_classes'] ) ? $instance['effects_classes'] : '';

    $images_per_row_lg = ! empty( $instance['images_per_row_lg'] ) ? $instance['images_per_row_lg'] : '4';
    $images_per_row_md = ! empty( $instance['images_per_row_md'] ) ? $instance['images_per_row_md'] : '4';
    $images_per_row_sm = ! empty( $instance['images_per_row_sm'] ) ? $instance['images_per_row_sm'] : '4';
    $images_per_row_xs = ! empty( $instance['images_per_row_xs'] ) ? $instance['images_per_row_xs'] : '2';

    ?>
    <p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'understrap_widgets' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php esc_attr_e( $title ); ?>">
    </p>

    <p>
    <label for="<?php echo $this->get_field_id( 'image_url_list' ); ?>"><?php _e( 'Image URLs <small>(one per line)</small>:', 'understrap_widgets' ); ?></label>
    <textarea class="widefat" id="<?php echo $this->get_field_id( 'image_url_list' ); ?>" name="<?php echo $this->get_field_name( 'image_url_list' ); ?>" rows="4" cols="20"><?php esc_attr_e( $image_url_list ); ?></textarea>
    </p>

    <p>
    <label><?php _e( 'Number of images per row:', 'understrap_widgets' ); ?></label>
    <br>
    <select id="<?php echo $this->get_field_id( 'images_per_row_lg' ); ?>" name="<?php echo $this->get_field_name( 'images_per_row_lg' ); ?>">
      <option value="1" <?php esc_attr_e( $images_per_row_lg == '1' ? 'selected' : '' ); ?>>1</option>
      <option value="2" <?php esc_attr_e( $images_per_row_lg == '2' ? 'selected' : '' ); ?>>2</option>
      <option value="3" <?php esc_attr_e( $images_per_row_lg == '3' ? 'selected' : '' ); ?>>3</option>
      <option value="4" <?php esc_attr_e( $images_per_row_lg == '4' ? 'selected' : '' ); ?>>4</option>
      <option value="6" <?php esc_attr_e( $images_per_row_lg == '6' ? 'selected' : '' ); ?>>6</option>
      <option value="12" <?php esc_attr_e( $images_per_row_lg == '12' ? 'selected' : '' ); ?>>12</option>
    </select>
    <small><?php _e( 'on <code>screen-lg</code>', 'understrap_widgets' ); ?></small> 
    <br>
    <select id="<?php echo $this->get_field_id( 'images_per_row_md' ); ?>" name="<?php echo $this->get_field_name( 'images_per_row_md' ); ?>">
      <option value="1" <?php esc_attr_e( $images_per_row_md == '1' ? 'selected' : '' ); ?>>1</option>
      <option value="2" <?php esc_attr_e( $images_per_row_md == '2' ? 'selected' : '' ); ?>>2</option>
      <option value="3" <?php esc_attr_e( $images_per_row_md == '3' ? 'selected' : '' ); ?>>3</option>
      <option value="4" <?php esc_attr_e( $images_per_row_md == '4' ? 'selected' : '' ); ?>>4</option>
      <option value="6" <?php esc_attr_e( $images_per_row_md == '6' ? 'selected' : '' ); ?>>6</option>
      <option value="12" <?php esc_attr_e( $images_per_row_md == '12' ? 'selected' : '' ); ?>>12</option>
    </select>
    <small><?php _e( 'on <code>screen-md</code>', 'understrap_widgets' ); ?></small>
    <br>
    <select id="<?php echo $this->get_field_id( 'images_per_row_sm' ); ?>" name="<?php echo $this->get_field_name( 'images_per_row_sm' ); ?>">
      <option value="1" <?php esc_attr_e( $images_per_row_sm == '1' ? 'selected' : '' ); ?>>1</option>
      <option value="2" <?php esc_attr_e( $images_per_row_sm == '2' ? 'selected' : '' ); ?>>2</option>
      <option value="3" <?php esc_attr_e( $images_per_row_sm == '3' ? 'selected' : '' ); ?>>3</option>
      <option value="4" <?php esc_attr_e( $images_per_row_sm == '4' ? 'selected' : '' ); ?>>4</option>
      <option value="6" <?php esc_attr_e( $images_per_row_sm == '6' ? 'selected' : '' ); ?>>6</option>
      <option value="12" <?php esc_attr_e( $images_per_row_sm == '12' ? 'selected' : '' ); ?>>12</option>
    </select>
    <small><?php _e( 'on <code>screen-sm</code>', 'understrap_widgets' ); ?></small>
    <br>
    <select id="<?php echo $this->get_field_id( 'images_per_row_xs' ); ?>" name="<?php echo $this->get_field_name( 'images_per_row_xs' ); ?>">
      <option value="1" <?php esc_attr_e( $images_per_row_xs == '1' ? 'selected' : '' ); ?>>1</option>
      <option value="2" <?php esc_attr_e( $images_per_row_xs == '2' ? 'selected' : '' ); ?>>2</option>
      <option value="3" <?php esc_attr_e( $images_per_row_xs == '3' ? 'selected' : '' ); ?>>3</option>
      <option value="4" <?php esc_attr_e( $images_per_row_xs == '4' ? 'selected' : '' ); ?>>4</option>
      <option value="6" <?php esc_attr_e( $images_per_row_xs == '6' ? 'selected' : '' ); ?>>6</option>
      <option value="12" <?php esc_attr_e( $images_per_row_xs == '12' ? 'selected' : '' ); ?>>12</option>
    </select>
    <small><?php _e( 'on <code>screen-xs</code>', 'understrap_widgets' ); ?></small>
    </p>

    <p>
    <label for="<?php echo $this->get_field_id( 'effects_classes' ); ?>"><?php _e( 'Apply effects:', 'understrap_widgets' ); ?></label>
    <select class="widefat" id="<?php echo $this->get_field_id( 'effects_classes' ); ?>" name="<?php echo $this->get_field_name( 'effects_classes' ); ?>">
      <option value=""><?php _e( '-- None --', 'understrap_widgets' ); ?></option>
      <option value="grayscale" <?php esc_attr_e( $instance[ 'effects_classes' ] == 'grayscale' ? 'selected' : '' ); ?> ><?php _e( 'Grayscale', 'understrap_widgets' ); ?></option>
      <option value="grayscale color-onhover" <?php esc_attr_e( $instance[ 'effects_classes' ] == 'grayscale color-onhover' ? 'selected' : '' ); ?> ><?php _e( 'Grayscale + Color on Hover', 'understrap_widgets' ); ?></option>
    </select>
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
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
    $instance['image_url_list'] = ( ! empty( $new_instance['image_url_list'] ) ) ? $new_instance['image_url_list'] : '';
    $instance['container_fluid'] = $new_instance['container_fluid'];
    // TODO: Sanitize css class names accordingly to w3c specifications
    $instance['css_class'] = ( ! empty( $new_instance['css_class'] ) ) ? sanitize_text_field( $new_instance['css_class'] ) : '';

    // Sanitize Effects
    $effects_classes_allowed = array('grayscale', 'grayscale color-onhover');
    $instance['effects_classes'] = ( ! empty( $new_instance['effects_classes'] ) && in_array($new_instance['effects_classes'], $effects_classes_allowed) ) ? $new_instance['effects_classes'] : ''; // '' == no effects

    // Sanitize Images Per Row
    $images_per_row_allowed = array('1', '2', '3', '4', '6', '12');
    $instance['images_per_row_lg'] = ( ! empty( $new_instance['images_per_row_lg'] ) && in_array($new_instance['images_per_row_lg'], $images_per_row_allowed) ) ? $new_instance['images_per_row_lg'] : '4';
    $instance['images_per_row_md'] = ( ! empty( $new_instance['images_per_row_md'] ) && in_array($new_instance['images_per_row_md'], $images_per_row_allowed) ) ? $new_instance['images_per_row_md'] : '4';
    $instance['images_per_row_sm'] = ( ! empty( $new_instance['images_per_row_sm'] ) && in_array($new_instance['images_per_row_sm'], $images_per_row_allowed) ) ? $new_instance['images_per_row_sm'] : '4';
    $instance['images_per_row_xs'] = ( ! empty( $new_instance['images_per_row_xs'] ) && in_array($new_instance['images_per_row_xs'], $images_per_row_allowed) ) ? $new_instance['images_per_row_xs'] : '2';

    return $instance;
  }
}

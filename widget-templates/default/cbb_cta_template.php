<?php 
/*
 * Template for the output of the CallToAction/Callout Widget
 * Override by placing a file called `cbb_cta_template.php`
 * in the folder `plugins/customizer-building-blocks/widget-templates` in your active theme
 */

$css_class = 'cbb-cta ' . $css_class;
$button_css_class = 'button ' . $button_css_class;

?>
  <div class="<?php esc_attr_e( $css_class ); ?>" <?php if ( isset( $instance['background_image_url'] ) ) echo 'style="background-image: url(' . $instance['background_image_url'] . '");'; ?> >
    <?php 
    if ( ! empty( $instance['title'] ) ) {
      echo $args['before_title'] . esc_html( $instance['title'] ) . $args['after_title'];
    }
    ?>

    <p><?php echo wp_kses_post( $instance['text'] ); ?></p>

    <?php if ( ! empty( $instance['button_text'] ) ) : ?>
      <a href="<?php echo esc_url( $instance['button_href'] ); ?>" class="<?php esc_attr_e( $button_css_class ); ?>"><?php esc_html_e( $instance['button_text'] ); ?></a>
    <?php endif; ?>

  </div>

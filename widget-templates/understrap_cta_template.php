<?php 
/*
 * Template for the output of the CallToAction/Callout Widget
 * Override by placing a file called `understrap_cta_template.php`
 * the folder `widget-templates` in your active theme
 */

?>
  <div class="cta <?php esc_attr_e( $instance['css_class'] ); ?>">
    <?php 
    if ( ! empty( $instance['title'] ) ) {
      echo $args['before_title'] . esc_html( $instance['title'] ) . $args['after_title'];
    }
    ?>

    <p><?php echo wp_kses_post( $instance['text'] ); ?></p>

    <?php if ( ! empty( $instance['button_text'] ) ) : ?>
      <a href="<?php echo esc_url( $instance['button_href'] ); ?>" class="btn <?php esc_attr_e( $button_css_class ); ?>"><?php esc_html_e( $instance['button_text'] ); ?></a>
    <?php endif; ?>

  </div>

<?php

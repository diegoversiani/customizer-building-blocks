<?php 
/*
 * Template for the output of the About Widget
 * Override by placing a file called `understrap_about_template.php`
 * the folder `widget-templates` in your active theme
 */

?>
<div class="about <?php esc_attr_e( $instance['css_class'] ); ?>">

  <?php 
  if ( ! empty( $instance['title'] ) ) {
    echo $args['before_title'] . esc_html( $instance['title'] ) . $args['after_title'];
  }
  ?>

  <div class="about-text">
    <?php echo $text_escaped; ?>
  </div>

  <?php if ( ! empty( $instance['cta_text'] ) || ! empty( $instance['button_text'] ) ) : ?>
  <div class="about-cta">
    <?php if ( ! empty( $instance['cta_text'] ) ) : ?>
    <p><?php esc_html_e( $instance['cta_text'] ); ?></p>
    <?php endif; ?>

    <?php if ( ! empty( $instance['button_text'] ) ) : ?>
    <a href="<?php echo esc_url( $instance['button_href'] ); ?>" class="btn <?php esc_attr_e( $button_css_class ); ?>"><?php esc_html_e( $instance['button_text'] ); ?></a>
    <?php endif; ?>
  </div>
  <?php endif; ?>

</div>

<?php

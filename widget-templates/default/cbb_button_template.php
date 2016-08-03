<?php 
/*
 * Template for the output of the Button Widget
 * Override by placing a file called `cbb_button_template.php`
 * in the folder `plugins/customizer-building-blocks/widget-templates` in your active theme
 */

$button_css_class = 'button ' . $button_css_class;
$icon_class = $instance['icon_class'];

?>

    <?php if ( ! empty( $instance['button_text'] ) ) : ?>
      <a href="<?php echo esc_url( $instance['button_href'] ); ?>" class="<?php esc_attr_e( $button_css_class ); ?>"><?php if ( ! empty( $icon_class ) ) echo '<i class="' . $icon_class . '"></i>'; ?><?php esc_html_e( $instance['button_text'] ); ?></a>
    <?php endif; ?>

  </div>

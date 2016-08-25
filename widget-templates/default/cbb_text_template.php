<?php 
/*
 * Template for the output of the Text Widget
 * Override by placing a file called `cbb_text_template.php`
 * in the folder `plugins/customizer-building-blocks/widget-templates` in your active theme
 */

$css_class = 'cbb-text ' . $css_class;

?>
<div class="<?php echo esc_attr( $css_class ); ?>">
  <?php

  if ( ! empty( $instance['title'] ) ) {
    echo $args['before_title'] . esc_html( $instance['title'] ) . $args['after_title'];
  }

  echo $text_escaped;

  ?>
</div>

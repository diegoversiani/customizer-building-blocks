<?php 
/*
 * Template for the output of the Text Widget
 * Override by placing a file called `understrap_text_template.php`
 * the folder `widget-templates` in your active theme
 */

?>
<div class="text <?php esc_attr_e( $instance['css_class'] ); ?>">
  <?php

  if ( ! empty( $instance['title'] ) ) {
    echo $args['before_title'] . esc_html( $instance['title'] ) . $args['after_title'];
  }

  echo $text_escaped;

  ?>
</div>

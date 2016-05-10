<?php 
/*
 * Template for the output of the Social Networks Widget
 * Override by placing a file called `understrap_social_networks_template.php`
 * the folder `widget-templates` in your active theme
 */
?>

<div class="social-networks <?php esc_attr_e( $instance['css_class'] ); ?>">
  <?php 
  if ( ! empty( $instance['title'] ) ) {
    echo $args['before_title'] . esc_html( $instance['title'] ) . $args['after_title'];
  }
  ?>

  <ul class="list-inline">

    <?php if ( ! empty( $instance['facebook_url'] ) ) : ?>
    <li class="list-inline-item"><a href="<?php echo esc_url( $instance['facebook_url'] ); ?>" target="_blank"><i class="fa fa-facebook-square <?php esc_attr_e( $instance['icon_size'] ) ?>"></i></a></li>
    <?php endif; ?>

    <?php if ( ! empty( $instance['instagram_url'] ) ) : ?>
    <li class="list-inline-item"><a href="<?php echo esc_url( $instance['instagram_url'] ); ?>" target="_blank"><i class="fa fa-instagram <?php esc_attr_e( $instance['icon_size'] ) ?>"></i></a></li>
    <?php endif; ?>

    <?php if ( ! empty( $instance['twitter_url'] ) ) : ?>
    <li class="list-inline-item"><a href="<?php echo esc_url( $instance['twitter_url'] ); ?>" target="_blank"><i class="fa fa-twitter <?php esc_attr_e( $instance['icon_size'] ) ?>"></i></a></li>
    <?php endif; ?>

    <?php if ( ! empty( $instance['youtube_url'] ) ) : ?>
    <li class="list-inline-item"><a href="<?php echo esc_url( $instance['youtube_url'] ); ?>" target="_blank"><i class="fa fa-youtube-square <?php esc_attr_e( $instance['icon_size'] ) ?>"></i></a></li>
    <?php endif; ?>
    
  </ul>

</div>

<?php
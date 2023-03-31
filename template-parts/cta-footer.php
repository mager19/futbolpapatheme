<?php
$args = array(
  'post_type' => 'cta',
  'posts_per_page' => -1,
  'meta_query' => array(
    array(
      'key'    => 'cta_relationship',
      'compare'  => 'LIKE',
      'value'    => get_the_ID(),
    ),
  ),
);
$loop = new WP_Query($args);

if ($loop->have_posts()) :
  while ($loop->have_posts()) : $loop->the_post(); ?>
  <?php $background = get_the_post_thumbnail_url(); ?>
    <div class="cta" style='background-image: url(<?php echo $background; ?>);'>
      <div class="container mx-auto">
        <div class="flex px-4">
          <div class="about-cta">
              <h4 class="title-entry"><?php the_title(); ?></h4>
              <?php the_content(); ?>
              <a href="<?php echo esc_url(get_bloginfo('url')); ?>/join/" class="btn btn__primary">JOIN NOW</a>
          </div>
        </div>
      </div>
    </div>
<?php endwhile;
  wp_reset_postdata();
endif; ?>
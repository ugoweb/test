<?php get_header(); ?>
<div class="p-page-works">
  <div class="p-page-works__header">
    <?php get_template_part('template/mv'); ?>
  </div><!-- /.p-page-works__header -->

  <div class="p-page-works__body">
    <div class="p-page-works__inner l-inner">
      <?php get_template_part('template/tab', 'works'); ?>

      <!-- all -->
      <?php
      $paged = get_query_var('paged') ? get_query_var('paged') : 1;
      $args = array(
        'post_type' => 'works',
        'posts_per_page' => 6,
        'paged' => $paged,
      );
      $the_query = new WP_Query($args);
      if ($the_query->have_posts()) :
      ?>
        <div class="p-page-works__content js-tab-content js-all is-active">
          <div class="p-page-works__cards p-works-cards">
            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
              <?php $my_genre = get_the_terms($post->ID, 'genre_works'); ?>
              <a href="<?php esc_url(the_permalink()); ?>" class="p-works-cards__item p-works-card">
                <figure class="p-works-card__img">
                  <?php
                  if (has_post_thumbnail()) {
                    the_post_thumbnail('large');
                  } else {
                    echo '<img src="' . esc_url(get_template_directory_uri()) . '/assets/img/noimg.png" alt="no-image">';
                  }
                  ?>
                </figure><!-- /.p-works-card__img -->
                <h2 class="p-works-card__title"><?php the_title(); ?></h2><!-- /.p-works-card__title -->
                <span class="p-works-card__label"><?php echo $my_genre[0]->name; ?></span><!-- /.p-works-card__label -->
              </a><!-- /.p-works-cards__item p-works-card -->
            <?php endwhile; ?>
          </div><!-- /.p-page-works__cards p-works-cards-->
          <div class="p-page-works__pagination p-archive-pagination">
            <?php
            if (function_exists('wp_pagenavi')) {
              wp_pagenavi(array('query' => $the_query));
            }
            ?>
          </div><!-- /.p-page-works__pagination p-archive-pagination -->
        </div><!-- /.p-page-works__content js-tab-content js-all is-active  -->
      <?php endif;
      wp_reset_postdata(); ?>

      <!-- genre -->
      <?php $genres = get_terms('genre_works') ?>
      <?php foreach ($genres as $genre) : ?>
        <?php
        $paged = get_query_var('paged') ? get_query_var('paged') : 1;
        $args = array(
          'post_type' => 'works',
          'posts_per_page' => 6,
          'paged' => $paged,
          'tax_query' => array(
            array(
              'taxonomy' => 'genre_works',
              'field' => 'slug',
              'terms' => array($genre->slug)
            )
          )
        );
        $the_query = new WP_Query($args);
        if ($the_query->have_posts()) :
        ?>
          <div class="p-page-works__content js-tab-content js-<?php echo $genre->slug; ?>">
            <div class="p-page-works__cards p-works-cards">
              <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                <?php $my_genre = get_the_terms($post->ID, 'genre_works'); ?>
                <a href="<?php esc_url(the_permalink()); ?>" class="p-works-cards__item p-works-card">
                  <figure class="p-works-card__img">
                    <?php
                    if (has_post_thumbnail()) {
                      the_post_thumbnail('large');
                    } else {
                      echo '<img src="' . esc_url(get_template_directory_uri()) . '/assets/img/noimg.png" alt="no-image">';
                    }
                    ?>
                  </figure><!-- /.p-works-card__img -->
                  <h2 class="p-works-card__title"><?php the_title(); ?></h2><!-- /.p-works-card__title -->
                  <span class="p-works-card__label"><?php echo $my_genre[0]->name; ?></span><!-- /.p-works-card__label -->
                </a><!-- /.p-works-cards__item p-works-card -->
              <?php endwhile; ?>
            </div><!-- /.p-page-works__cards p-works-cards -->

            <div class="p-page-works__pagination p-archive-pagination">
              <?php
              if (function_exists('wp_pagenavi')) {
                wp_pagenavi(array('query' => $the_query));
              }
              ?>
            </div><!-- /.p-page-works__pagination p-archive-pagination -->
          </div><!-- /.p-page-works__content js-tab-content  -->
        <?php endif; wp_reset_postdata();?>
      <?php endforeach; ?>

    </div><!-- /.p-page-works__inner l-inner -->
  </div><!-- /.p-page-works__body -->
</div><!-- /.page-works -->

<?php get_template_part('template/contact'); ?>
<?php get_footer(); ?>
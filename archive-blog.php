<?php get_header(); ?>
<div class="p-page-blog">
  <div class="p-page-blog__header">
    <?php get_template_part('template/mv'); ?>
  </div><!-- /.p-page-blog__header -->

  <div class="p-page-blog__body">
    <div class="p-page-blog__inner l-inner">
      <?php get_template_part('template/tab', 'blog'); ?>

      <!-- all -->
      <?php
      $paged = get_query_var('paged') ? get_query_var('paged') : 1;
      $args = array(
        'post_type' => 'blog',
        'posts_per_page' => 9,
        'paged' => $paged,
      );
      $the_query = new WP_Query($args);
      if ($the_query->have_posts()) :
      ?>
        <div class="p-page-blog__content js-tab-content js-all is-active">
          <div class="p-page-blog__cards p-cards">
            <?php $counter = 0; ?>
            <?php while ($the_query->have_posts()) : $the_query->the_post();
              $counter++; ?>
              <?php $my_genre = get_the_terms($post->ID, 'genre_blog'); ?>
              <a class="p-cards__item p-card" href="<?php esc_url(the_permalink()); ?>">
                <?php if ($counter == 1) : ?>
                  <span class="p-card__new u-mobile">New</span><!-- /.p-card__new -->
                <?php endif ?>
                <div class="p-card__header">
                  <figure class="p-card__figure">
                    <?php
                    if (has_post_thumbnail()) {
                      the_post_thumbnail('large');
                    } else {
                      echo '<img src="' . esc_url(get_template_directory_uri()) . '/assets/img/noimg.png" alt="no-image">';
                    }
                    ?>
                  </figure><!-- /.p-card__figure -->
                </div><!-- /.p-card__header -->
                <div class="p-card__body">
                  <h3 class="p-card__title"><?php the_title(); ?></h3><!-- /.p-card__title -->
                  <p class="p-card__lead"><?php echo get_the_excerpt(); ?></p><!-- /.p-card__lead -->
                  <div class="p-card__data">
                    <span class="p-card__label"><?php echo $my_genre[0]->name ?></span><!-- /.p-card__label -->
                    <time class="p-card__time" datetime="<?php the_time('Y-m-d') ?>"><?php the_time('Y.m.d') ?></time><!-- /.p-card__time -->
                  </div><!-- /.p-card__data -->
                </div><!-- /.p-card__body -->
              </a><!-- /.p-cards__item p-card -->
            <?php endwhile; ?>
          </div><!-- /.p-page-blog__cards p-blog-cards-->
        <?php endif;
      wp_reset_postdata(); ?>
        <div class="p-page-blog__pagination p-archive-pagination">
          <?php
          if (function_exists('wp_pagenavi')) {
            wp_pagenavi(array('query' => $the_query));
          }
          ?>
        </div><!-- /.p-page-blog__pagination p-archive-pagination -->
        </div><!-- /.p-page-blog__content js-tab-content js-all is-active  -->

        <!-- genre -->
        <?php $genres = get_terms('genre_blog') ?>
        <?php foreach ($genres as $genre) : ?>
          <?php
          $paged = get_query_var('paged') ? get_query_var('paged') : 1;
          $args = array(
            'post_type' => 'blog',
            'posts_per_page' => 9,
            'paged' => $paged,
            'tax_query' => array(
              array(
                'taxonomy' => 'genre_blog',
                'field' => 'slug',
                'terms' => array($genre->slug)
              )
            )
          );
          $the_query = new WP_Query($args);
          if ($the_query->have_posts()) :
          ?>
            <div class="p-page-blog__content js-tab-content js-<?php echo $genre->slug; ?>">
              <div class="p-page-blog__cards p-cards">
                <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                  <?php $my_genre = get_the_terms($post->ID, 'genre_blog'); ?>
                  <a class="p-cards__item p-card" href="<?php esc_url(the_permalink()); ?>">
                    <div class="p-card__header">
                      <figure class="p-card__figure">
                        <?php
                        if (has_post_thumbnail()) {
                          the_post_thumbnail('large');
                        } else {
                          echo '<img src="' . esc_url(get_template_directory_uri()) . '/assets/img/noimg.png" alt="no-image">';
                        }
                        ?>
                      </figure><!-- /.p-card__figure -->
                    </div><!-- /.p-card__header -->
                    <div class="p-card__body">
                      <h3 class="p-card__title"><?php the_title(); ?></h3><!-- /.p-card__title -->
                      <p class="p-card__lead"><?php echo get_the_excerpt(); ?></p><!-- /.p-card__lead -->
                      <div class="p-card__data">
                        <span class="p-card__label"><?php echo $my_genre[0]->name ?></span><!-- /.p-card__label -->
                        <time class="p-card__time" datetime="<?php the_time('Y-m-d') ?>"><?php the_time('Y.m.d') ?></time><!-- /.p-card__time -->
                      </div><!-- /.p-card__data -->
                    </div><!-- /.p-card__body -->
                  </a><!-- /.p-cards__item p-card -->
                <?php endwhile; ?>
              </div><!-- /.p-page-blog__cards p-cards js-tab-content js-tab-content -->
            <?php endif; ?>

            <div class="p-page-blog__pagination p-archive-pagination">
              <?php
              if (function_exists('wp_pagenavi')) {
                wp_pagenavi(array('query' => $the_query));
              }
              ?>
            </div><!-- /.p-page-blog__pagination p-archive-pagination -->
            </div><!-- /.p-page-blog__content -->
          <?php endforeach; ?>
    </div><!-- /.p-page-blog__inner l-inner -->
  </div><!-- /.p-page-blog__body -->
</div><!-- /.p-page-blog -->

<?php get_template_part('template/contact'); ?>
<?php get_footer(); ?>
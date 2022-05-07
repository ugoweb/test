          <!-- ループ内に記述 -->
          <?php
          if (is_singular('post')) {
            $cats = get_categories(get_the_ID());
            $cat_id = array();
            foreach($cats as $cat){
              $cat_id = $cat->cat_ID;
            }
            $args = array(
              'post_type' => 'post',
              'posts_per_page' => 4,
              'post__not_in' => array(get_the_ID()),
              'orderby' => 'rand',
              'category__in' => $cat_id
            );
          } elseif (is_singular('blog')) {
            $genre = get_the_terms(get_the_ID(), 'genre_blog');
            $args = array(
              'post_type' => 'blog',
              'posts_per_page' => 4,
              'post__not_in' => array(get_the_ID()),
              'orderby' => 'rand',
              'tax_query' => array(
                array(
                  'taxonomy' => 'genre_blog',
                  'field' => 'slug',
                  'terms' => array($genre[0]->slug)
                )
              )
            );
          } elseif (is_singular('works')) {
            $genre = get_the_terms(get_the_ID(), 'genre_works');
            $args = array(
              'post_type' => 'works',
              'posts_per_page' => 4,
              'post__not_in' => array(get_the_ID()),
              'orderby' => 'rand',
              'tax_query' => array(
                array(
                  'taxonomy' => 'genre_works',
                  'field' => 'slug',
                  'terms' => array($genre[0]->slug)
                )
              )
            );
          }
          $the_query = new WP_Query($args);
          if ($the_query->have_posts()) : ?>
            <div class="p-related">
              <div class="p-related__inner l-inner">

                <p class="p-related__header">関連記事</p><!-- /.p-related__header -->
                <div class="p-related__body p-cards-col-4">
                  <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                    <?php if (is_singular('blog')) {
                      $my_genre = get_the_terms(get_the_ID(), 'genre_blog');
                    } elseif (is_singular('works')) {
                      $my_genre = get_the_terms(get_the_ID(), 'genre_works');
                    } ?>
                    <a href="<?php esc_url(the_permalink()); ?>" class="p-cards-col-4__item p-card p-card--col4">
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
                        <div class="p-card__data">
                          <span class="p-card__label">
                            <?php if (is_singular('post')) {
                              my_the_post_category(false);
                            } elseif (is_singular('blog')) {
                              echo $my_genre[0]->name;
                            } elseif (is_singular('works')) {
                              echo $my_genre[0]->name;
                            } ?>
                          </span><!-- /.p-card__label -->
                          <time class="p-card__time" datetime="<?php the_time('Y-m-d') ?>"><?php the_time('Y.m.d') ?></time><!-- /.p-card__time -->
                        </div><!-- /.p-card__data -->
                      </div><!-- /.p-card__body -->
                    </a><!-- /.p-cards-col-4__item p-card p-card--col4 -->
                  <?php endwhile; ?>
                </div><!-- /.p-related__body p-cards-col-4 -->
              </div><!-- /.p-related__inner l-inner -->
            </div><!-- /.p-related -->
          <?php endif;
          wp_reset_postdata(); ?>
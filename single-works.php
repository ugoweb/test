<?php get_header(); ?>

<div class="p-single-works">
  <div class="p-single-works__breadcrumbs p-breadcrumbs">
    <div class="p-breadcrumbs__inner l-inner">
      <?php if (function_exists('bcn_display')) {
        bcn_display();
      } ?>
    </div><!-- /.p-breadcrumbs__inner l-inner -->
  </div><!-- /.p-single-works__breadcrumbs p-breadcrumbs -->

  <div class="p-single-works__body">
    <div class="p-single-works__inner l-inner">
      <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
          <?php $genre = get_terms('genre_works'); ?>
          <h1 class="p-single-works__title"><?php the_title(); ?>様 制作実績</h1><!-- /.p-single-works__title -->
          <div class="p-single-works__info">
            <time class="p-single-works__date" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y/m/d'); ?></time><!-- /.p-single-works__date -->
            <span class="p-single-works__genre"><?php echo $genre[0]->name; ?></span><!-- /.p-single-works__genre -->
          </div><!-- /.p-single-works__info -->
          <div class="p-single-works__gallery">
            <div class="p-gallery">
              <div class="p-gallery__slider swiper-container">
                <!-- メイン -->
                <div class="swiper-wrapper js-count">
                  <?php
                  $repeat_item = SCF::get('gallery');
                  foreach ($repeat_item as $fields) :
                    $image_url = wp_get_attachment_image_src($fields['gallery-img'], 'full');
                  ?>
                    <div class="swiper-slide">
                      <img src="<?php echo $image_url[0]; ?>" alt="<?php echo $fields['alt']; ?>">
                    </div>
                  <?php endforeach; ?>
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
              </div>
              <!-- サムネイル -->
              <div class="p-gallery__thumbs swiper-container">
                <div class="swiper-wrapper">
                  <?php
                  $repeat_item = SCF::get('gallery');
                  foreach ($repeat_item as $fields) :
                    $image_url = wp_get_attachment_image_src($fields['gallery-img'], 'full');
                  ?>
                    <div class="swiper-slide">
                      <img src="<?php echo $image_url[0]; ?>" width="<?php echo $image_url[1]; ?>" height="<?php echo $image_url[2]; ?>" alt="<?php echo $fields["alt"]; ?>">
                    </div>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
          </div><!-- /.p-single-works__gallery -->
          <div class="p-single-works__boxes">
            <div class="p-single-works__box p-desc-box">
              <h2 class="p-desc-box__title">制作のポイント</h2><!-- /.p-desc-box__title -->
              <p class="p-desc-box__text">
                <?php
                $field = SCF::get('description');
                echo nl2br($field);
                ?>
              </p><!-- /.p-desc-box__text -->
            </div><!-- /.p-single-works__box p-desc-box -->
            <div class="p-single-works__box p-desc-box">
              <h2 class="p-desc-box__title">デザインのポイント</h2><!-- /.p-desc-box__title -->
              <p class="p-desc-box__text">
                <?php
                $field = SCF::get('design');
                echo nl2br($field);
                ?>
              </p><!-- /.p-desc-box__text -->
            </div><!-- /.p-single-works__box p-desc-box -->
            <div class="p-single-works__box p-desc-box">
              <h2 class="p-desc-box__title">その他</h2><!-- /.p-desc-box__title -->
              <p class="p-desc-box__text">
                <?php
                $field = SCF::get('etc');
                echo nl2br($field);
                ?>
              </p><!-- /.p-desc-box__text -->
            </div><!-- /.p-single-works__box p-desc-box -->
          </div><!-- /.p-single-works__boxes -->
          <div class="p-single-works__pagination p-single-pagination">
            <div class="p-single-pagination__prev">
              <?php if (get_next_post()) :
                next_post_link('%link', 'PREV');
              else : ?>
                <span> </span>
              <?php endif; ?>
            </div><!-- /.p-single-works__prev -->
            <div class="p-single-pagination__archive">
              <a href="<?php echo esc_url(home_url('/works')); ?>" class="button-fill">一覧</a>
            </div><!-- /.p-single-works__archive -->
            <div class="p-single-pagination__next">
              <?php if (get_previous_post()) :
                previous_post_link('%link', 'NEXT');
              else : ?>
                <span> </span>
              <?php endif; ?>
            </div><!-- /.p-single-works__next -->
          </div><!-- /.p-single-works__pagination p-single-pagination -->

    </div><!-- /.p-single-works__inner l-inner -->
  </div><!-- /.p-single-works__body -->
  <div class="p-single-works__related">
    <?php get_template_part('template/related'); ?>
  </div><!-- /.p-single-works__related -->
<?php endwhile;
      endif; ?>

</div><!-- /.p-single-works -->



<?php get_template_part('template/contact'); ?>
<?php get_footer(); ?>
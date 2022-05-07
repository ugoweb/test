<?php get_header(); ?>
<div class="p-page-news">
  <?php get_template_part('template/mv'); ?>
  <div class="p-page-news__body">
    <div class="p-page-news__inner l-inner">
      <div class="p-page-news__contents p-articles">
        <?php if (have_posts()) : ?>
          <?php while (have_posts()) : the_post(); ?>
            <div class="p-articles__item p-article">
              <div class="p-article__header">
                <p class="p-article__time"><time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y.m.d'); ?></time></p><!-- /.p-article__time -->
                <p class="p-article__label"><?php my_the_post_category(false); ?></p><!-- /.p-article__label -->
              </div><!-- /.p-article__header -->
              <a class="p-article__content" href="<?php esc_url(the_permalink()); ?>"><?php the_title(); ?></a><!-- /.p-article__content -->
            </div><!-- /.p-articles__item p-article -->
        <?php endwhile;
        endif; ?>
      </div><!-- /.p-page-news__contents p-articles -->

      <div class="p-page-news__pagination p-archive-pagination">
        <?php
      if (function_exists('wp_pagenavi')) {
        wp_pagenavi();
      }
      ?>
      </div><!-- /.p-page-news__pagination p-archive-pagination -->

    </div><!-- /.p-page-news__inner l-inner -->
  </div><!-- /.p-page-news__body -->

</div><!-- /.p-page-news -->


<?php get_template_part('template/contact'); ?>
<?php get_footer(); ?>
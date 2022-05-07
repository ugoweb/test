<?php get_header(); ?>
<div class="p-single-blog">
  <div class="p-single-blog__breadcrumbs p-breadcrumbs">
    <div class="p-breadcrumbs__inner l-inner">
      <?php if (function_exists('bcn_display')) {
        bcn_display();
      } ?>
    </div><!-- /.p-breadcrumbs__inner l-inner -->
  </div><!-- /.p-single-blog__breadcrumbs p-breadcrumbs -->

  <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
      <div class="p-single-blog__body">
        <div class="p-single-blog__inner l-inner">
          <h1 class="p-single-blog__title"><?php the_title(); ?></h1><!-- /.p-single-blog__title -->
          <div class="p-single-blog__info">
            <time class="p-single-blog__date" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y/m/d'); ?></time><!-- /.p-single-blog__date -->
            <?php if (is_singular('post')) : ?>
              <span class="p-single-blog__genre"><?php my_the_post_category(false); ?></span><!-- /.p-single-blog__genre -->
            <?php elseif (is_singular('blog')) : ?>
              <span class="p-single-blog__genre"><?php my_the_terms(false, 0, 'genre_blog') ?></span><!-- /.p-single-blog__genre -->
            <?php endif; ?>
          </div><!-- /.p-single-blog__info -->
          <?php
          if (has_post_thumbnail()) : ?>
            <div class="p-single-blog__thumb">
              <?php the_post_thumbnail('large'); ?>
            </div><!-- /.p-single-blog__thumb -->
          <?php endif; ?>
          <div class="p-single-blog__content p-post-content">
            <?php esc_html(the_content()); ?>
          </div><!-- /.p-single-blog__content p-post-content -->
          <div class="p-single-blog__pagination p-single-pagination">
            <div class="p-single-pagination__prev">
              <?php if (get_next_post()) :
                next_post_link('%link', 'PREV');
              else : ?>
                <span> </span>
              <?php endif; ?>
            </div><!-- /.p-single-pagination__prev -->
            <div class="p-single-pagination__archive">
              <a href="<?php echo esc_url(home_url('/blog')) ?>" class="button-fill">一覧</a>
            </div><!-- /.p-single-pagination__archive -->
            <div class="p-single-pagination__next">
              <?php if (get_previous_post()) :
                previous_post_link('%link', 'NEXT');
              else : ?>
                <span> </span>
              <?php endif; ?>
            </div><!-- /.p-single-pagination__next -->
          </div><!-- /.p-single-blog__pagination p-single-pagination -->
        </div><!-- /.p-single-blog__inner l-inner -->
      </div><!-- /.p-single-blog__body -->

      <div class="p-single-blog__related">
        <?php get_template_part('template/related'); ?>
      </div><!-- /.p-single-blog__related -->

  <?php endwhile;
  endif; ?>
</div><!-- /.p-single-blog -->
<?php get_template_part('template/contact'); ?>
<?php get_footer(); ?>
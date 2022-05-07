<?php get_header(); ?>
<div class="p-404">
  <div class="p-404__inner l-inner">
    <h1 class="p-404__title">404 Not Found</h1><!-- /.p-404__title -->
    <p class="p-404__text">お探しのページは<br class="u-mobile">見つかりませんでした。</p><!-- /.p-404__text -->
    <div class="p-404__footer">
      <a href="<?php esc_url(home_url('/')) ?>" class="c-button">TOPへ</a><!-- /.c-button -->
    </div><!-- /.p-404__footer -->
  </div><!-- /.p-404__inner l-inner -->
</div><!-- /.p-404 -->
<?php get_footer(); ?>
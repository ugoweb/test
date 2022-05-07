<footer class="footer">
    <div class="footer__inner">
      <div class="footer__logo">
        <a href="index.html" class="footer__logo__link">CodeUps</a><!-- /.footer__logo__link -->
      </div><!-- /.footer__logo -->
      <ul class="footer__list">
        <li class="footer__item"><a href="<?php echo esc_url(home_url('/')) ?>" class="footer__link">トップ</a><!-- /.footer__link -->
        </li><!-- /.footer__item -->
        <li class="footer__item"><a href="<?php echo esc_url(home_url('/news')) ?>" class="footer__link">お知らせ</a><!-- /.footer__link -->
        </li><!-- /.footer__item -->
        <li class="footer__item"><a href="<?php echo esc_url(home_url('/content')) ?>" class="footer__link">事業内容</a><!-- /.footer__link -->
        </li><!-- /.footer__item -->
        <li class="footer__item"><a href="<?php echo esc_url(home_url('/works')) ?>" class="footer__link">制作実績</a><!--/.footer__link -->
        </li><!-- /.footer__item -->
        <li class="footer__item"><a href="<?php echo esc_url(home_url('/overview')) ?>" class="footer__link">企業概要</a><!-- /.footer__link -->
        </li><!-- /.footer__item -->
        <li class="footer__item"><a href="<?php echo esc_url(home_url('/blog')) ?>" class="footer__link">ブログ</a><!-- /.footer__link -->
        </li><!-- /.footer__item -->
        <li class="footer__item"><a href="<?php echo esc_url(home_url('/contact')) ?>" class="footer__link">お問い合わせ</a><!-- /.footer__link -->
        </li><!-- /.footer__item -->
      </ul><!-- /.footer__list -->
    </div><!-- /.inner footer__inner -->
      <p class="footer__copyright"> &copy; 2021 CodeUps Inc.</p><!-- /.footer__copyright -->
  </footer><!-- /.footer -->

  <div id="js-pagetop" class="pagetop">
    <span class="pagetop__icon"></span><!-- /.pagetop__icon -->
  </div><!-- /.pagetop -->

<?php wp_footer(); ?>
</body>

</html>
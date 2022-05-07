<?php get_header(); ?>
<div class="p-main-visual">
  <div class="p-mv-swiper">
    <div class="swiper-wrapper">
      <div class="swiper-slide">
        <div class="slide-img">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/mv1.jpg" alt="下からみたビル群">
        </div>
      </div>
      <div class="swiper-slide">
        <div class="slide-img">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/mv2.jpg" alt="真下からみたビル群">
        </div>
      </div>
      <div class="swiper-slide">
        <div class="slide-img">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/mv3.jpg" alt="俯瞰から見たビル群">
        </div>
      </div>
    </div>
  </div>
  <div class="p-main-visual__content">
    <p class="p-main-visual__title">メインタイトルが入ります</p><!-- /.p-main-visual__title -->
    <p class="p-main-visual__subtitle">サブタイトルが入ります</p><!-- /.p-main-visual__subtitle -->
  </div><!-- /.p-main-visual__content -->
</div><!-- /.p-main-visual -->

<?php $args = array(
  'posts_per_page' => 1,
  'post_type' => 'post'
);
$the_query = new WP_Query($args) ?>
<?php if ($the_query->have_posts()) : ?>
  <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
    <div class="p-sec-news l-sec-news">
      <div class="p-sec-news__inner l-inner">
        <div class="p-sec-news__body p-article p-article--top">
          <div class="p-article__header">
            <p class="p-article__time"><time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y.m.d'); ?></time></p><!-- /.p-article__time -->
            <p class="p-article__label"><?php my_the_post_category(false); ?></p><!-- /.p-article__label -->
          </div><!-- /.p-article__header -->
          <a class="p-article__content"><?php the_title(); ?></a><!-- /.p-article__content -->
          <div class="p-article__footer">
            <a href="<?php esc_url(the_permalink()); ?>" class="c-button c-button--pc-fill">すべて見る</a><!-- /.c-button c-button--pc-fill -->
          </div><!-- /.p-article__footer -->
        </div><!-- /.p-sec-news__body p-article p-article--top -->
      </div><!-- /.p-sec-news__inner l-inner -->
    </div><!-- /.p-sec-news l-sec-news -->
<?php endwhile;
endif;
wp_reset_postdata(); ?>
<main class="p-main">

  <section class="p-sec-content l-sec-content">
    <div class="p-sec-content__inner l-inner">
      <div class="p-section-header">
        <h2 class="p-section-header__title">事業内容</h2>
        <!-- /.p-section-header p-section-header-p-sec-content -->
        <p class="p-section-header__subtitle">Content</p><!-- /.p-section-header__subtitle -->
      </div><!-- /.p-section-header -->
      <div class="p-sec-content__body p-square-imgs">
        <a href="<?php echo esc_url(home_url('/content')); ?>" class="p-square-imgs__item p-square-img">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/content1.jpg" alt="両手に包まれた電球">
          <p class="p-square-img__title">経営理念ページへ</p><!-- /.p-square-img__title -->
        </a><!-- /.p-square-imgs__item p-square-img -->
        <a href="<?php echo esc_url(home_url('/content')); ?>#content1" class="p-square-imgs__item p-square-img">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/content2.jpg" alt="和気あいあいとミーティングする様子">
          <p class="p-square-img__title">理念1へ</p><!-- /.p-square-img__title -->
        </a><!-- /.p-square-imgs__item p-square-img -->
        <a href="<?php echo esc_url(home_url('/content')); ?>#content2" class="p-square-imgs__item p-square-img">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/content3.jpg" alt="時間経過による折れ線グラフ">
          <p class="p-square-img__title">理念2へ</p><!-- /.p-square-img__title -->
        </a><!-- /.p-square-imgs__item p-square-img -->
        <a href="<?php echo esc_url(home_url('/content')); ?>#content3" class="p-square-imgs__item p-square-img">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/content4.jpg" alt="株価を表示しているiPhone">
          <p class="p-square-img__title">理念3へ</p><!-- /.p-square-img__title -->
        </a><!-- /.p-square-imgs__item p-square-img -->
      </div><!-- /.p-sec-content__body p-square-imgs -->
    </div><!-- /.p-sec-content__inner l-inner -->
  </section><!-- /.p-sec-content l-sec-content -->

  <section class="p-sec-works l-sec-works">
    <div class="p-sec-works__inner l-inner">
      <div class="p-section-header p-section-header--rev">
        <h2 class="p-section-header__title">制作実績</h2><!-- /.p-section-header__title -->
        <p class="p-section-header__subtitle">Works</p><!-- /.p-section-header__subtitle -->
      </div><!-- /.p-section-header -->
      <div class="p-sec-works__body p-media">
        <figure class="p-media__img">
          <div class="p-media-swiper">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <div class="slide-img">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/works1.jpg" alt="facebookサイト" class="swiper-slide">
                </div><!-- /.slide-img -->
              </div><!-- /.swiper-slide -->
              <div class="swiper-slide">
                <div class="slide-img">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/works2.jpg" alt="facebookサイト" class="swiper-slide">
                </div><!-- /.slide-img -->
              </div><!-- /.swiper-slide -->
              <div class="swiper-slide">
                <div class="slide-img">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/works3.jpg" alt="facebookサイト" class="swiper-slide">
                </div><!-- /.slide-img -->
              </div><!-- /.swiper-slide -->
            </div>
          </div>
          <div class="swiper-pagination"></div>
        </figure><!-- /.p-media__img -->
        <div class="p-media__content">
          <h3 class="p-media__title"> メインタイトルが入ります。</h3><!-- /.p-media__title -->
          <p class="p-media__text">
            テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。
          </p><!-- /.p-media__text -->
          <div class="p-media__footer">
            <a href="<?php echo esc_url(home_url('/works')); ?>" class="c-button">詳しく見る</a><!-- /.c-button -->
          </div><!-- /.p-media__footer -->
        </div><!-- /.p-media__content -->
      </div><!-- /.p-media -->
    </div><!-- /.p-sec-works__inner l-inner -->
  </section><!-- /.p-sec-works l-sec-works -->

  <section class="p-sec-overview l-sec-overview">
    <div class="p-sec-overview__inner l-inner">
      <div class="p-section-header">
        <h2 class="p-section-header__title">企業概要</h2><!-- /.p-section-header__title -->
        <p class="p-section-header__subtitle">Overview</p><!-- /.p-section-header__subtitle -->
      </div><!-- /.p-section-header -->
      <div class="p-sec-overview__body p-media p-media--pc-rev">
        <figure class="p-media__img">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/overview.jpg" alt="オフィス内の通路"><!-- /.p-media__img -->
        </figure><!-- /.p-media__img -->
        <div class="p-media__content">
          <h3 class="p-media__title">メインタイトルが入ります。</h3><!-- /.p-media__title -->
          <p class="p-media__text">
            テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。
          </p><!-- /.p-media__text -->
          <div class="p-media__footer">
            <a href="<?php echo esc_url(home_url('/overview')); ?>" class="c-button">詳しく見る</a><!-- /.c-button -->
          </div><!-- /.p-media__footer -->
        </div><!-- /.p-media__content -->
      </div><!-- /.p-media -->
    </div><!-- /.overview__inner l-inner -->
  </section><!-- /.p-sec-overview l-sec-overview-->

  <section class="p-sec-blog l-sec-blog">
    <div class="p-sec-blog__inner l-inner">
      <div class="p-sec-blog__header p-section-header p-section-header--rev">
        <h2 class="p-section-header__title">ブログ</h2><!-- /.p-section-header__title -->
        <p class="p-section-header__subtitle">Blog</p><!-- /.p-section-header__subtitle -->
      </div><!-- /.p-sec-blog__header p-section-header -->
      <?php $args = array(
        'posts_per_page' => 3,
        'post_type' => 'blog'
      );
      $the_query = new WP_Query($args) ?>
      <?php if ($the_query->have_posts()) : ?>
        <ul class="p-sec-blog__body p-cards">
          <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
            <li class="p-cards__item">
              <a class="p-card p-card--new" href="<?php esc_url(the_permalink()); ?>">
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
                    <span class="p-card__label"><?php my_the_terms(false, 0, 'genre_blog'); ?></span><!-- /.p-card__label -->
                    <time class="p-card__time" datetime="<?php the_time('Y-m-d') ?>"><?php the_time('Y.m.d') ?></time><!-- /.p-card__time -->
                  </div><!-- /.p-card__data -->
                </div><!-- /.p-card__body -->
              </a><!-- /.p-card p-card-news -->
            </li><!-- /.p-cards__item -->
          <?php endwhile; ?>
        </ul><!-- /.p-sec-blog__body p-cards -->
      <?php endif;
      wp_reset_postdata(); ?>
      <div class="p-sec-blog__footer"><a href="<?php echo esc_url(home_url('/blog')); ?>" class="c-button">詳しく見る</a><!-- /.c-button -->
      </div><!-- /.p-sec-blog__footer -->
    </div><!-- /.p-sec-blog__inner l-inner -->
  </section><!-- /.p-sec-blog  l-sec-blog-->

</main><!-- /.p-main -->

<?php get_template_part('template/contact'); ?>
<?php get_footer(); ?>
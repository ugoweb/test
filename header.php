<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/website#">
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width,initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="format-detection" content="telephone=no">
  <!-- SEO系 -->
  <meta name="description" content="デスクリプションです">
  <meta name="keywords" content="キーワードです" />
  <!-- OGP -->
  <meta property="og:title" content="sample / <?php the_title(); ?>">
  <meta property="og:site_name" content="sample">
  <meta property="og:description" content="デスクリプションです">
  <meta property="og:type" content="website">
  <meta property="og:url" content="<?php echo get_the_permalink(); ?>">
  <meta property="og:image" content="">
  <meta name="twitter:card" content="summary">
  <meta name="twitter:site" content="">
  <meta name="format-detection" content="telephone=no">
  <!-- タッチアイコン -->
  <link rel="apple-touch-icon" sizes="192x192" href="<?php echo get_template_directory_uri() ?>/assets/img/favicon/apple-touch-icon.png">
 <!-- ファビコン -->
 <link rel="icon" href="<?php echo get_template_directory_uri() ?>/assets/img/favicon/favicon.ico" />  
 <!-- クローラー -->
  <meta name="robots" content="noindex">

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <header id="js-header" class="p-header">
    <div class="p-header__inner">
      <h1 class="p-header__logo">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="p-header__logo__link">CodeUps</a><!-- /.p-header__logo__link -->
      </h1><!-- /.p-header__logo -->
      <button class="p-header__icon u-mobile">
        <span id="js-modal-open" class="c-hamburger-icon"></span><!-- /.icon__bar -->
      </button><!-- /.p-header__nav__icon -->
      <ul class="p-header__list u-desktop">
        <li class="p-header__item"><a href="<?php echo esc_url(home_url('/news')) ?>" class="p-header__link">お知らせ</a><!-- /.p-header__link -->
        </li><!-- /.p-header__item -->
        <li class="p-header__item"><a href="<?php echo esc_url(home_url('/content')) ?>" class="p-header__link">事業内容</a><!-- /.p-header__link -->
        </li><!-- /.p-header__item -->
        <li class="p-header__item"><a href="<?php echo esc_url(home_url('/works')) ?>" class="p-header__link">制作実績</a><!-- /.p-header__link -->
        </li><!-- /.p-header__item -->
        <li class="p-header__item"><a href="<?php echo esc_url(home_url('/overview')) ?>" class="p-header__link">企業概要</a><!-- /.p-header__link -->
        </li><!-- /.p-header__item -->
        <li class="p-header__item"><a href="<?php echo esc_url(home_url('/blog')) ?>" class="p-header__link">ブログ</a><!-- /.p-header__link -->
        </li><!-- /.p-header__item -->
        <li class="p-header__item"><a href="<?php echo esc_url(home_url('/contact')) ?>" class="p-header__link p-header__link--contact">お問い合わせ</a><!-- /.p-header__link -->
        </li><!-- /.p-header__item -->
      </ul><!-- /.p-header__list -->
    </div><!-- /.p-header__inner -->
  </header><!-- /.p-header -->

  <div class="p-modal">
    <div class="p-modal__bg"></div><!-- /.p-modal__bg -->
    <ul class="p-modal__list">
      <li class="p-modal__item"><a href="<?php echo esc_url(home_url('/')) ?>" class="p-modal__link">トップ</a><!-- /.p-modal__link -->
      </li><!-- /.p-modal__item -->
      <li class="p-modal__item"><a href="<?php echo esc_url(home_url('/news')) ?>" class="p-modal__link">お知らせ</a><!-- /.p-modal__link -->
      </li><!-- /.p-modal__item -->
      <li class="p-modal__item"><a href="<?php echo esc_url(home_url('/content')) ?>" class="p-modal__link">事業内容</a><!-- /.p-modal__link -->
      </li><!-- /.p-modal__item -->
      <li class="p-modal__item"><a href="<?php echo esc_url(home_url('/works')) ?>" class="p-modal__link">制作実績</a><!-- /.p-modal__link -->
      </li><!-- /.p-modal__item -->
      <li class="p-modal__item"><a href="<?php echo esc_url(home_url('/overview')) ?>" class="p-modal__link">企業概要</a><!-- /.p-modal__link -->
      </li><!-- /.p-modal__item -->
      <li class="p-modal__item"><a href="<?php echo esc_url(home_url('/blog')) ?>" class="p-modal__link">ブログ</a><!-- /.p-modal__link -->
      </li><!-- /.p-modal__item -->
      <li class="p-modal__item"><a href="<?php echo esc_url(home_url('/contact')) ?>" class="p-modal__link">お問い合わせ</a><!-- /.p-modal__link -->
      </li><!-- /.p-modal__item -->
    </ul><!-- /.p-modal__list -->
  </div><!-- /.p-modal -->
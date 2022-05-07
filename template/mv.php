<div class="p-page-mv">
  <h1 class="p-page-mv__title">
    <?php if (is_page()) {
      the_title();
    } elseif (is_archive()) {
      the_archive_title();
    } else {
      the_archive_title();
    } ?>
  </h1><!-- /.p-page-mv__title -->
</div><!-- /.p-page-mv -->

<div class="p-breadcrumbs">
  <div class="p-breadcrumbs__inner l-inner">
    <?php if (function_exists('bcn_display')) {
      bcn_display();
    } ?>
  </div><!-- /.p-breadcrumbs__inner l-inner -->
</div><!-- /.p-breadcrumbs -->
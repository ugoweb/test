<?php $genres = get_terms('genre_blog') ?>

<ul class="p-tabs">
  <li class="p-tabs__item"><a class="js-tab is-active" data-target=".js-all">ALL</a></li><!-- /.p-tabs__item js-tab -->
  <?php foreach ($genres as $genre) : ?>
    <li class="p-tabs__item"><a class="js-tab" data-target=".js-<?php echo $genre->slug; ?>"><?php echo $genre->name; ?></a></li>
  <?php endforeach; ?>
</ul>

<?php

/**
 * Functions
 */
/**
 * WordPress標準機能
 *
 * @codex https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/add_theme_support
 */
function my_setup()
{
	add_theme_support('post-thumbnails'); /* アイキャッチ */
	add_theme_support('automatic-feed-links'); /* RSSフィード */
	add_theme_support('title-tag'); /* タイトルタグ自動生成 */
	add_theme_support(
		'html5',
		array( /* HTML5のタグで出力 */
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);
}
add_action('after_setup_theme', 'my_setup');



/**
 * CSSとJavaScriptの読み込み
 *
 */
function my_script_init()
{
	wp_enqueue_style('my-s', 'https://unpkg.com/swiper/swiper-bundle.min.css', [], 'all');
	wp_enqueue_style('my', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0.1', 'all');
	wp_enqueue_script('my-swiper', 'https://unpkg.com/swiper/swiper-bundle.min.js', [], true);
	wp_enqueue_script('my', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), '1.0.1', true);
}
add_action('wp_enqueue_scripts', 'my_script_init');

// // それぞれのページ ファイル追加
// function file_load_scripts_styles()
// {
// 	if (is_front_page()) {
// 		// １つ目（js）
// 		wp_enqueue_script('my-1', get_template_directory_uri() . '/assets/js/script1.js', array('jquery'), '1.0.1', true);
// 	}
// }
// // wp_footerに処理を登録
// add_action('wp_footer', 'file_load_scripts_styles');



/**
 * メニューの登録
 *
 * @codex https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/register_nav_menus
 */
// function my_menu_init() {
// 	register_nav_menus(
// 		array(
// 			'global'  => 'ヘッダーメニュー',
// 			'utility' => 'ユーティリティメニュー',
// 			'drawer'  => 'ドロワーメニュー',
// 		)
// 	);
// }
// add_action( 'init', 'my_menu_init' );
/**
 * メニューの登録
 *
 * 参考：https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/register_nav_menus
 */


/**
 * ウィジェットの登録
 *
 * @codex http://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/register_sidebar
 */
// function my_widget_init() {
// 	register_sidebar(
// 		array(
// 			'name'          => 'サイドバー',
// 			'id'            => 'sidebar',
// 			'before_widget' => '<div id="%1$s" class="p-widget %2$s">',
// 			'after_widget'  => '</div>',
// 			'before_title'  => '<div class="p-widget__title">',
// 			'after_title'   => '</div>',
// 		)
// 	);
// }
// add_action( 'widgets_init', 'my_widget_init' );


/**
 * アーカイブタイトル書き換え
 *
 * @param string $title 書き換え前のタイトル.
 * @return string $title 書き換え後のタイトル.
 */
function my_archive_title($title)
{

	if (is_home()) { /* ホームの場合 */
		$title = 'お知らせ';
	} elseif (is_category()) { /* カテゴリーアーカイブの場合 */
		$title = 'お知らせ' . single_cat_title('', false) . '';
	} elseif (is_tag()) { /* タグアーカイブの場合 */
		$title = 'お知らせ' . single_tag_title('', false) . '';
	} elseif (is_post_type_archive()) { /* 投稿タイプのアーカイブの場合 */
		$title = '' . post_type_archive_title('', false) . '';
	} elseif (is_tax()) { /* タームアーカイブの場合 */
		$title = '' . single_term_title('', false);
	} elseif (is_search()) { /* 検索結果アーカイブの場合 */
		$title = '「' . esc_html(get_query_var('s')) . '」の検索結果';
	} elseif (is_author()) { /* 作者アーカイブの場合 */
		$title = '' . get_the_author() . '';
	} elseif (is_date()) { /* 日付アーカイブの場合 */
		$title = '';
		if (get_query_var('year')) {
			$title .= get_query_var('year') . '年';
		}
		if (get_query_var('monthnum')) {
			$title .= get_query_var('monthnum') . '月';
		}
		if (get_query_var('day')) {
			$title .= get_query_var('day') . '日';
		}
	}
	return $title;
};
add_filter('get_the_archive_title', 'my_archive_title');


/**
 * 抜粋文の文字数の変更
 *
 * @param int $length 変更前の文字数.
 * @return int $length 変更後の文字数.
 */
function my_excerpt_length($length)
{
	return 80;
}
add_filter('excerpt_length', 'my_excerpt_length', 999);


/**
 * 抜粋文の省略記法の変更
 *
 * @param string $more 変更前の省略記法.
 * @return string $more 変更後の省略記法.
 */
function my_excerpt_more($more)
{
	return '...';
}
add_filter('excerpt_more', 'my_excerpt_more');



////////////////////////////////////////////////////
// /* 管理メニューの「投稿」に関する表示を「NEWS（任意）」に変更
// *************************************************************************************/
// function change_post_menu_label()
// {
// 	global $menu;
// 	global $submenu;
// 	$menu[5][0] = 'NEWS';
// 	$submenu['edit.php'][5][0] = 'NEWS一覧';
// 	$submenu['edit.php'][10][0] = '新しいNEWS';
// 	$submenu['edit.php'][16][0] = 'タグ';
// }

// /* 管理画面上の「投稿」に関する表示を「NEWS」に変更
// *************************************************************************************/
// function change_post_object_label()
// {
// 	global $wp_post_types;
// 	$labels = &$wp_post_types['post']->labels;
// 	$labels->name = 'NEWS';
// 	$labels->singular_name = 'NEWS';
// 	$labels->add_new = _x('追加', 'NEWS');
// 	$labels->add_new_item = 'NEWSの新規追加';
// 	$labels->edit_item = 'NEWSの編集';
// 	$labels->new_item = '新規NEWS';
// 	$labels->view_item = 'NEWSを表示';
// 	$labels->search_items = 'NEWSを検索';
// 	$labels->not_found = '記事が見つかりませんでした';
// 	$labels->not_found_in_trash = 'ゴミ箱に記事は見つかりませんでした';
// }
// add_action('init', 'change_post_object_label');
// add_action('admin_menu', 'change_post_menu_label');
//////////////////////////////////////////////////////////



////////////////////////////////////////////
// //カスタム投稿・表示順を新しい順にする
// function admin_custom_post-type_order($wp_query)
// {
// 	if (is_admin()) {
// 		$post_type = $wp_query->query['post_type'];
// 		if ($post_type == 'カスタム投稿slug') {
// 			$wp_query->set('orderby', 'date'); //並べ替えの基準(日付)
// 			$wp_query->set('order', 'ASC'); //古い順。新しい順にしたい場合はをDESC指定
// 		}
// 		if ($post_type == 'カスタム投稿slug') {
// 			$wp_query->set('orderby', 'date'); //並べ替えの基準(日付)
// 			$wp_query->set('order', 'DESC'); //新しい順。古い順にしたい場合はASCを指定
// 		}
// 	}
// }
// add_filter('pre_get_posts', 'admin_custom_post-type_order');
//////////////////////////////////////////////////////

function my_the_post_category($anchor = true, $id = 0)
{
	global $post;
	//引数が渡されなければ投稿IDを見るように設定
	if (0 === $id) {
		$id = $post->ID;
	}

	//カテゴリー一覧を取得
	$this_categories = get_the_category($id);
	if ($this_categories[0]) {
		if ($anchor) { //引数がtrueならリンク付きで出力
			echo '<a href="' . esc_url(get_category_link($this_categories[0]->term_id)) . '">' . esc_html($this_categories[0]->cat_name) . '</a>';
		} else { //引数がfalseならカテゴリー名のみ出力
			echo esc_html($this_categories[0]->cat_name);
		}
	}
}

function my_the_terms($anchor = true, $id = 0, $taxonomy)
{
	global $post;
	//引数が渡されなければ投稿IDを見るように設定
	if (0 === $id) {
		$id = $post->ID;
	}

	//カテゴリー一覧を取得
	$this_terms = get_the_terms($id, $taxonomy);
	if ($this_terms[0]) {
		if ($anchor) { //引数がtrueならリンク付きで出力
			echo '<a href="' . esc_url(get_term_link($this_terms[0]->term_id)) . '">' . esc_html($this_terms[0]->name) . '</a>';
		} else { //引数がfalseならカテゴリー名のみ出力
			echo esc_html($this_terms[0]->name);
		}
	}
}

// ContactForm7で自動挿入されるPタグ、brタグを削除
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
function wpcf7_autop_return_false()
{
	return false;
}

// ContactForm7で
function wpcf7_custom_item_error_position($items, $result)
{
	// メッセージを表示させたい場所のタグのエラー用のクラス名
	$class = 'wpcf7-custom-item-error';
	// メッセージの位置を変更したい項目名(※適宜ご自身の設定したものに変更してください)
	$names = array(
		"your-company",
		"your-section",
		"your-name",
		"your-NAME",
		"your-message"
	);
	// 入力エラーがある場合
	if (isset($items['invalid_fields'])) {
		foreach ($items['invalid_fields'] as $k => $v) {
			$orig = $v['into'];
			$name = substr($orig, strrpos($orig, ".") + 1);
			// 位置を変更したい項目のみ、エラーを設定するタグのクラス名を差替
			if (in_array($name, $names)) {
				$items['invalidFields'][$k]['into'] = ".{$class}.{$name}";
			}
		}
	}
	return $items;
}
add_filter('wpcf7_ajax_json_echo', 'wpcf7_custom_item_error_position', 10, 2);

// contact
add_action('wp_footer', 'add_thanks_page');
function add_thanks_page()
{
	echo <<< EOD
<script>
document.addEventListener( 'wpcf7mailsent', function( event ) {
	location = 'http://you-go-test.net/thanks/';
}, false );
</script>
EOD;
}

<?php 

/*--------------------------------------------------------------------------------------------------
  初期設定
  ページ引用
  ページネーション
  ニュース
  検索
  メニュー
  カスタム投稿絞り込み
  並べかえ
  ロゴ画像
  ロゴURL
--------------------------------------------------------------------------------------------------*/

/*--------------------------------------------------------------------------------------------------
  初期設定
--------------------------------------------------------------------------------------------------*/
//バージョン削除
remove_action('wp_head','wp_generator');
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');

//アップデートの数値を消す
add_action('admin_menu', 'remove_counts');
function remove_counts(){
global $menu,$submenu;
$menu[65][0] = 'プラグイン';
$submenu['index.php'][10][0] = 'Updates';
}
add_filter( 'pre_site_transient_update_core', '__return_zero' );
remove_action( 'wp_version_check', 'wp_version_check' );
remove_action( 'admin_init', '_maybe_update_core' );

//ログイン画面
function login_css() {
 echo '<link rel="stylesheet" type="text/css" href="'.get_bloginfo("stylesheet_directory").'/login.css">';
}
add_action('login_head', 'login_css'); 

//投稿URL
function auto_post_slug( $slug, $post_ID, $post_status, $post_type ) {
 if ( preg_match( '/(%[0-9a-f]{2})+/', $slug ) ) {
   $slug = utf8_uri_encode( $post_type ) . '-' . $post_ID;
 }
 return $slug;
}
add_filter( 'wp_unique_post_slug', 'auto_post_slug', 10, 4  );

// ビジュアルエディタ用CSS
add_editor_style('editor-style.css');
function custom_editor_settings( $initArray ) {
    $initArray['body_class'] = 'editor-area';
    $initArray['theme_advanced_blockformats'] = 'p,h3,h4,h5,h6';
    return $initArray;
}
add_filter( 'tiny_mce_before_init', 'custom_editor_settings' );

//添付ファイルのページの選択肢を消去
function media_script_buffer_start() {ob_start();}add_action( 'post-upload-ui', 'media_script_buffer_start' ); function media_script_buffer_get() {    $scripts = ob_get_clean();    $scripts = preg_replace( '#<option value="post">.*?</option>#s', '', $scripts );    echo $scripts;}add_action( 'print_media_templates', 'media_script_buffer_get' );

//絵文字削除
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles', 10 );

//ブルートフォース攻撃対策（idの解析対策）
add_action('init', 'disable_author_archive');
function disable_author_archive() {
	if( $_GET['author'] || preg_match('#^/author/.+#', $_SERVER['REQUEST_URI']) ){
		wp_redirect( home_url() );
		exit;
	}
}

//タグ消えないように
function override_mce_options( $init_array ) {
    global $allowedposttags;

    $init_array['valid_elements']          = '*[*]';
    $init_array['extended_valid_elements'] = '*[*]';
    $init_array['valid_children']          = '+a[' . implode( '|', array_keys( $allowedposttags ) ) . ']';
    $init_array['indent']                  = true;
    $init_array['wpautop']                 = false;
    $init_array['force_p_newlines']        = false;

    return $init_array;
}

add_filter( 'tiny_mce_before_init', 'override_mce_options' );
remove_filter( 'the_content', 'wpautop' );

//不要な項目削除(管理バー)
function remove_bar_menus( $wp_admin_bar ) {
  $wp_admin_bar->remove_menu('wp-logo');
  $wp_admin_bar->remove_menu('comments'); // コメント
  $wp_admin_bar->remove_menu('updates'); // アップデート
  $wp_admin_bar->remove_menu('customize'); // カスタマイズ
}
add_action('admin_bar_menu', 'remove_bar_menus',210);

//不要な項目削除(メニュー)
function remove_submenus() {
  remove_menu_page( 'edit-comments.php' ); //コメント
  remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=post_tag'); //タグ
  remove_meta_box('postcustom', 'post', 'normal'); // カスタムフィールド
  remove_meta_box('postexcerpt', 'post', 'normal'); // 抜粋
  remove_meta_box('commentsdiv', 'post', 'normal'); // コメント設定
  remove_meta_box('commentstatusdiv', 'post', 'normal'); // ディスカッション
  remove_meta_box('trackbacksdiv', 'post', 'normal'); // トラックバック設定
  remove_meta_box('formatdiv', 'post', 'normal'); // フォーマット設定
  remove_meta_box('slugdiv', 'post', 'normal'); // スラッグ設定
  remove_meta_box('authordiv', 'post', 'normal'); // 投稿者
  remove_meta_box('tagsdiv-post_tag', 'post', 'normal'); //タグ
  remove_menu_page('ps-taxonomy-expander.php');  
}
add_action('admin_menu', 'remove_submenus', 102);

//不要な項目削除(投稿一覧)
function custom_columns ($columns) {
	unset($columns['tags']);         // タグ
	unset($columns['comments']);     // コメント
	return $columns;
}
add_filter('manage_posts_columns', 'custom_columns');

//不要な項目削除(固定ページ一覧)
function custom_columns_page ($columns) {
	unset($columns['comments']);     // コメント
	return $columns;
}
add_filter('manage_pages_columns', 'custom_columns_page');

//アイキャッチ
add_theme_support('post-thumbnails');
add_image_size('worksthumb', 280, 179, true);


//管理画面メニュー並べ替え
function custom_menu_order($menu_ord) {
	if (!$menu_ord) return true;
	
	return array(
		'index.php', // ダッシュボード
		'separator1', // 最初の区切り線
		'edit.php', // ニュース
   		//'edit.php?post_type=works_clm',  //
   		//'edit.php?post_type=dcase',  //
		'edit.php?post_type=page', // 固定ページ
		'upload.php', // メディア
		'separator2', // 二つ目の区切り線
		'themes.php', // 外観
		'plugins.php', // プラグイン
		'users.php', // ユーザー
		'tools.php', // ツール
		'options-general.php', // 設定
		'separator-last' // 最後の区切り線
	);
}
add_filter('custom_menu_order', 'custom_menu_order');
add_filter('menu_order', 'custom_menu_order');

//カスタムメニュー
add_theme_support('menus');


//-------------------------------------------------

/*--------------------------------------------------------------------------------------------------
  ページ引用
--------------------------------------------------------------------------------------------------*/
function include_post_func($atts) {
  extract(shortcode_atts(array(
    'id' => '',
  ), $atts));

  $post_id = get_post ( $id );
  $content = $post_id->post_content;

  return $content;
}

add_shortcode('include-post', 'include_post_func');


/*--------------------------------------------------------------------------------------------------
  ページネーション
--------------------------------------------------------------------------------------------------*/
function pagination($pages = '', $range = 2){ 
  $showitems = ($range * 2)+1; 
  global $paged;
  if(empty($paged)) $paged = 1;
    if($pages == ''){
      global $wp_query;
      $pages = $wp_query->max_num_pages;
      if(!$pages){
        $pages = 1;
      }
  }  
  if(1 != $pages){
    echo "<ul>";
    if($paged > 1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged - 1)."'>&laquo;&nbsp;前へ</a>";
    for ($i=1; $i <= $pages; $i++){
      if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
        echo ($paged == $i)? "<li class=\"active\">".$i."</li>":"<li><a href='".get_pagenum_link($i)."'>".$i."</a></li>";
      }
    }
    if ($paged < $pages && $showitems < $pages) echo "<li><a href=\"".get_pagenum_link($paged + 1)."\">次へ&nbsp;&raquo;</a></li>"; 
    echo "</ul>\n";
  }
}




/*--------------------------------------------------------------------------------------------------
  検索
--------------------------------------------------------------------------------------------------*/
function empty_search_redirect( $wp_query ) {
    if ( $wp_query->is_main_query() && $wp_query->is_search && ! $wp_query->is_admin ) {
        $s = $wp_query->get( 's' );
        $s = trim( $s );
        if ( empty( $s ) ) {
            wp_safe_redirect( home_url('/') );
            exit;
        }
    }
}
add_action( 'parse_query', 'empty_search_redirect' );


/*--------------------------------------------------------------------------------------------------
  メニュー
--------------------------------------------------------------------------------------------------*/
add_filter( 'nav_menu_css_class', 'remove_to_currentClass', 10, 2 );
function remove_to_currentClass( $classes, $item ) {
    $classes = array();
    if( $item -> current == true ) {
        $classes[] = 'current';
    }
    return $classes;
}
 
add_filter('nav_menu_item_id', 'removeId', 10);
function removeId( $id ){ 
    return $id = array(); 
}


/*--------------------------------------------------------------------------------------------------
  カスタム投稿絞り込み
--------------------------------------------------------------------------------------------------*/
add_action( 'restrict_manage_posts', 'add_post_taxonomy_restrict_filter' );
function add_post_taxonomy_restrict_filter() {
    global $post_type;
    if ( 'works_clm' == $post_type ) {
        ?>
        <select name="workscat">
            <option value="">タクソノミー指定なし</option>
            <?php
            $terms = get_terms('workscat');
            foreach ($terms as $term) { ?>
                <option value="<?php echo $term->slug; ?>"><?php echo $term->name; ?></option>
            <?php } ?>
        </select>
        <?php
    }
}

add_action( 'restrict_manage_posts', 'add_post_taxonomy_restrict_filter2' );
function add_post_taxonomy_restrict_filter2() {
    global $post_type;
    if ( 'dcase' == $post_type ) {
        ?>
        <select name="dcasecat">
            <option value="">タクソノミー指定なし</option>
            <?php
            $terms = get_terms('dcasecat');
            foreach ($terms as $term) { ?>
                <option value="<?php echo $term->slug; ?>"><?php echo $term->name; ?></option>
            <?php } ?>
        </select>
        <?php
    }
}

/*--------------------------------------------------------------------------------------------------
  ならべかえ
--------------------------------------------------------------------------------------------------*/
add_action( 'pre_get_posts', 'my_pre_get_posts' );
function my_pre_get_posts( $query ) {
if ( is_admin() || ! $query->is_main_query() ) return;

if ( $query->is_tax( 'workscat' ) ) {
$query->set( 'orderby', 'menu_order' );
$query->set( 'order', 'ASC' );
}
}

remove_filter( 'the_content', 'wpautop' );


?>


<?php
add_theme_support('post-thumbnails');

function catch_that_image() {
    global $post, $posts;
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    $first_img = $matches [1] [0];
  
if(empty($first_img)){ //Defines a default image
        $first_img = "http://www.worldtire.co.jp/wp-content/themes/woldtire/common/image/default.jpg";
    }
    return $first_img;
}

//概要（抜粋）の文字数調整
function my_excerpt_length($length) {
	return 50;
}
add_filter('excerpt_length', 'my_excerpt_length');
//概要（抜粋）の省略文字
function my_excerpt_more($more) {
	return '...';
}
add_filter('excerpt_more', 'my_excerpt_more');


function my_unregister_taxonomies()
{
    global $wp_taxonomies;
 
    /*
     * 投稿機能から「カテゴリー」を削除
     */
    if (!empty($wp_taxonomies['category']->object_type)) {
        foreach ($wp_taxonomies['category']->object_type as $i => $object_type) {
            if ($object_type == 'post') {
                unset($wp_taxonomies['category']->object_type[$i]);
            }
        }
    }
 
    /*
     * 投稿機能から「タグ」を削除
     */
    if (!empty($wp_taxonomies['post_tag']->object_type)) {
        foreach ($wp_taxonomies['post_tag']->object_type as $i => $object_type) {
            if ($object_type == 'post') {
                unset($wp_taxonomies['post_tag']->object_type[$i]);
            }
        }
    }
 
    return true;
}
 
add_action('init', 'my_unregister_taxonomies');


/*--------------------------------------------------------------------------------------------------
  ロゴ画像
--------------------------------------------------------------------------------------------------*/
function login_logo_image() {
    echo '<style type="text/css">
            #login h1 a {
                background: url(' . get_bloginfo('template_directory') . '/common/image/logo.png) no-repeat;
								background-size:320px;
								width:320px;
								height: 40px;
            }
    </style>';
}
add_action('login_head', 'login_logo_image');


/*--------------------------------------------------------------------------------------------------
  ロゴURL
--------------------------------------------------------------------------------------------------*/
function login_logo_url() {
    return get_bloginfo('url');
}
add_filter('login_headerurl', 'login_logo_url');


/*--------------------------------------------------------------------------------------------------
  MW WP Form
--------------------------------------------------------------------------------------------------*/
function my_validation_rule($Validation, $data, $Data) {
	$Validation->set_rule('name', 'noEmpty', array('message' => '※入力してください'));
	return $Validation;
}
add_filter('mwform_validaton_mw-wp-form-82', 'my_validation_rule', 10, 3);
/*
function my_validation_rule($Validation, $data, $Data) {
	$Validation->set_rule('name', 'noEmpty', array('message' => '※入力してください'));
	return $Validation;
}
add_filter('mwform_validaton_mw-wp-form-105', 'my_validation_rule', 10, 3);
*/


?>



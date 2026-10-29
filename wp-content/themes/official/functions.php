<?php 

/*--------------------------------------------------------------------------------------------------
  初期設定
  ページ引用
  ページネーション
  検索
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

function custom_login_logo_url() {
	return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'custom_login_logo_url' );

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

//タグ整形
function tinymce_init( $init ) {
	$init['verify_html'] = false;
	return $init;
}
add_filter('tiny_mce_before_init', 'tinymce_init');

add_action('init', function() {
	remove_filter('the_excerpt', 'wpautop');
	remove_filter('the_content', 'wpautop');
});

add_filter('tiny_mce_before_init', function($init) {
	$init['wpautop'] = false;
	$init['apply_source_formatting'] = true;
	return $init;
});

//不要な項目削除(管理バー)
function remove_bar_menus( $wp_admin_bar ) {
  $wp_admin_bar->remove_menu('wp-logo');
  $wp_admin_bar->remove_menu('comments'); // コメント
  $wp_admin_bar->remove_menu('updates'); // アップデート
  $wp_admin_bar->remove_menu('customize'); // カスタマイズ
}
add_action('admin_bar_menu', 'remove_bar_menus',210);

//不要な項目削除(サブメニュー)
function remove_submenus() {
  remove_menu_page( 'edit-comments.php' ); //コメント
  remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=post_tag');
  remove_meta_box('postcustom', 'post', 'normal'); // カスタムフィールド
  remove_meta_box('postexcerpt', 'post', 'normal'); // 抜粋
  remove_meta_box('commentstatusdiv', 'post', 'normal'); // コメント設定
  remove_meta_box('trackbacksdiv', 'post', 'normal'); // トラックバック設定
  remove_meta_box('formatdiv', 'post', 'normal'); // フォーマット設定
  remove_meta_box('slugdiv', 'post', 'normal'); // スラッグ設定
  remove_meta_box('authordiv', 'post', 'normal'); // 投稿者
  remove_meta_box('tagsdiv-post_tag', 'post', 'normal'); //タグ
}
add_action('admin_menu', 'remove_submenus', 102);

//不要な項目削除(投稿一覧)
function custom_columns ($columns) {
	unset($columns['tags']);         // タグ
	unset($columns['comments']);     // コメント
	return $columns;
}
add_filter('manage_posts_columns', 'custom_columns');

//アイキャッチ
add_theme_support('post-thumbnails');

//画像サイズ追加
add_image_size('newsthumb', 592, 410, true); //ニュースサムネイル
add_image_size('worksthumb', 1000, 600, true); //施工サムネイル
add_image_size('worksphotos', 1000, 750, false); //施工

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
    echo "<div class=\"pager_wrap\"><ul class=\"pager\">";
    if($paged > 1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged - 1)."'>&laquo;&nbsp;前へ</a>";
    for ($i=1; $i <= $pages; $i++){
      if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
        echo ($paged == $i)? "<li class=\"active\">".$i."</li>":"<li><a href='".get_pagenum_link($i)."'>".$i."</a></li>";
      }
    }
    if ($paged < $pages && $showitems < $pages) echo "<li><a href=\"".get_pagenum_link($paged + 1)."\">次へ&nbsp;&raquo;</a></li>"; 
    echo "</ul></div>\n";
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
  パンくず
--------------------------------------------------------------------------------------------------*/
function bredcrumb(){
  global $post;
  $str = '';
  
  if(!is_home() && !is_admin()){
    $str.='<ol class="pan">';
    $str.='<li><a href="'.home_url('/').'">TOP</a>&ensp;&gt;&ensp;</li>';

    //404
    if(is_404()){
      $str.='<li>Not found</li>';
    
    
    }else if(is_search()){
      $str.='<li>検索結果</li>';
  
    //新着情報
    }else if(get_post_type() === 'post'){
      if(is_category()){
      	$catname = single_cat_title('',false);
        $str.='<li><a href="'.home_url('/').'news/">お知らせ</a>&ensp;&gt;&ensp;</li>';
        $str.='<li>'.$catname.'</li>';
      }else if(is_single()){
        $str.='<li><a href="'.home_url('/').'news/">お知らせ</a>&ensp;&gt;&ensp;</li>';
        $str.='<li>'.$post -> post_title.'</li>';
      }else{
         $str.='<li>お知らせ</li>';
      }

    //お知らせ
    }else if(get_post_type() === 'tinfoclm'){
        $str.='<li>'.$post -> post_title.'</li>';

    //ページ
    }else if(is_page()){
      if($post -> post_parent !=0){
        $ancestors = array_reverse(get_post_ancestors($post->ID));
        foreach($ancestors as $ancestor){
          $str.='<li><a href="'.get_permalink($ancestor).'">'.get_the_title($ancestor).'</a>&ensp;&gt;&ensp;</li>';
        }
      }
      $str.='<li>'.strip_tags($post -> post_title).'</li>';
    }
    
    //シングル
    else if(is_single()){
        $str.='<li><a href="'.home_url('/').'news/">お知らせ</a>&ensp;&gt;&ensp;</li>';
        $str.='<li>'.$post -> post_title.'</li>';
    }
    
  $str.='</ol>';
  }
  echo $str;
}

/*--------------------------------------------------------------------------------------------------
  一番上の親ページ取得
--------------------------------------------------------------------------------------------------*/
function get_most_parent_pageID($current_id = ''){
	global $post;
	if($current_id == '') $current_id ==$post->ID;  
	$par_id = get_post($current_id)->post_parent;
	$most_par_id = $current_id;
	while($par_id!= 0) :
		$par_post = get_post($par_id);
		$most_par_id = $par_post->ID;
		$par_id = $par_post->post_parent;
	endwhile;
	return $most_par_id;
}


/*--------------------------------------------------------------------------------------------------
  施工実績
--------------------------------------------------------------------------------------------------*/
register_post_type(
	'works', 
	array(
        'labels' => array(
	    	'name' => '施工実績',
	    	'singular_name' => '施工実績',
		    'add_new_item' => '施工実績を追加',
		    'add_new' => '新規追加',
		    'new_item' => '新規施工実績',
		    'view_item' => '施工実績を表示',
		    'edit_item' => '施工実績を編集',
		    'not_found' => '施工実績は見つかりませんでした',
		    'not_found_in_trash' => 'ゴミ箱に施工実績はありません。',
		    'search_items' => '施工実績を検索',
		    'description' => '施工実績',
        ),
		'hierarchical' => false,
		'public' => true,
		'show_ui' => true, 
		'query_var' => true,
		'supports' => array(
			'title',
			'editor',
	    )
    )
);

//投稿時のメッセージ
add_filter('post_updated_messages', 'snippets_pdt_updated_messages_works');
function snippets_pdt_updated_messages_works( $messages ) {

  $messages['works'] = array(
    0 => '',
    1 => sprintf( __('施工実績を更新しました。'), esc_url( get_permalink(isset($post_ID)) ) ),
    2 => __('カスタムフィールドを更新しました'),
    3 => __('カスタムフィールドを削除しました'),
    4 => __('施工実績更新'),
    5 => isset($_GET['revision']) ? sprintf( __(' %s 前に保存しました'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
    6 => sprintf( __('施工実績が公開されました。'), esc_url( get_permalink(isset($post_ID)) ) ),
    7 => __('施工実績を保存'),
    8 => sprintf( __('施工実績を送信 <a target="_blank" href="%s">プレビュー</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink(isset($post_ID)) ) ) ),
    9 => sprintf( __('施工実績を予約投稿しました: <strong>%1$s</strong>. <a target="_blank" href="%2$s">プレビュー</a>'),
      date_i18n( __( 'M j, Y @ G:i' ), strtotime( isset($post->post_date) ) ), esc_url( get_permalink(isset($post_ID)) ) ),
    10 => sprintf( __('施工実績の下書きを更新しました <a target="_blank" href="%s">プレビュー</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink(isset($post_ID)) ) ) ),
  );

  return $messages;
}

/*--------------------------------------------------------------------------------------------------
  技報
--------------------------------------------------------------------------------------------------*/
register_post_type(
	'techs', 
	array(
        'labels' => array(
	    	'name' => '技報',
	    	'singular_name' => '技報',
		    'add_new_item' => '技報を追加',
		    'add_new' => '新規追加',
		    'new_item' => '新規技報',
		    'view_item' => '技報を表示',
		    'edit_item' => '技報を編集',
		    'not_found' => '技報は見つかりませんでした',
		    'not_found_in_trash' => 'ゴミ箱に技報はありません。',
		    'search_items' => '技報を検索',
		    'description' => '技報',
        ),
		'hierarchical' => false,
		'public' => true,
		'show_ui' => true, 
		'query_var' => true,
		'supports' => array(
			'title',
			'editor',
	    )
    )
);

//投稿時のメッセージ
add_filter('post_updated_messages', 'snippets_pdt_updated_messages_techs');
function snippets_pdt_updated_messages_techs( $messages ) {

  $messages['techs'] = array(
    0 => '',
    1 => sprintf( __('技報を更新しました。'), esc_url( get_permalink(isset($post_ID)) ) ),
    2 => __('カスタムフィールドを更新しました'),
    3 => __('カスタムフィールドを削除しました'),
    4 => __('技報更新'),
    5 => isset($_GET['revision']) ? sprintf( __(' %s 前に保存しました'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
    6 => sprintf( __('技報が公開されました。'), esc_url( get_permalink(isset($post_ID)) ) ),
    7 => __('技報を保存'),
    8 => sprintf( __('技報を送信 <a target="_blank" href="%s">プレビュー</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink(isset($post_ID)) ) ) ),
    9 => sprintf( __('技報を予約投稿しました: <strong>%1$s</strong>. <a target="_blank" href="%2$s">プレビュー</a>'),
      date_i18n( __( 'M j, Y @ G:i' ), strtotime( isset($post->post_date) ) ), esc_url( get_permalink(isset($post_ID)) ) ),
    10 => sprintf( __('技報の下書きを更新しました <a target="_blank" href="%s">プレビュー</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink(isset($post_ID)) ) ) ),
  );

  return $messages;
}

add_filter( 'techs_rewrite_rules', '__return_empty_array');
?>
<?php
//注册菜单
register_nav_menus(array(
        'header_menu' => __('顶部菜单'),
        'footer_menu' => __('底部菜单'),
    )
);

//bootstrap二级菜单
require_once('wp_bootstrap_navwalker.php');

//文章浏览统计
function getPostViews($postID)
{  //此函数用于输出文章浏览次数
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);// _post_meta()函数获取统一文章id，//用于返回同一数值
    if ($count == '') {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return 0;//如果从setPostViews()函数中读取到$count为空，则文章未被浏览//过
    }
    return $count;
}

function setPostViews($postID)
{    //将文章id传到函数中，文章被采用一次，$count自加//1
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}


//分类文章数
function wt_get_category_count($input = '')
{
    global $wpdb;

    if ($input == '') {
        $category = get_the_category();
        return $category[0]->category_count;
    } elseif (is_numeric($input)) {
        $SQL = "SELECT $wpdb->term_taxonomy.count FROM $wpdb->terms, $wpdb->term_taxonomy WHERE $wpdb->terms.term_id=$wpdb->term_taxonomy.term_id AND $wpdb->term_taxonomy.term_id=$input";
        return $wpdb->get_var($SQL);
    } else {
        $SQL = "SELECT $wpdb->term_taxonomy.count FROM $wpdb->terms, $wpdb->term_taxonomy WHERE $wpdb->terms.term_id=$wpdb->term_taxonomy.term_id AND $wpdb->terms.slug='$input'";
        return $wpdb->get_var($SQL);
    }
}

//除去搜索结果出现页面
add_filter('pre_get_posts', 'SearchFilter');
function SearchFilter($query)
{
    if ($query->is_search) {
        $query->set('post_type', 'post');
    }
    return $query;
}

//缓存头像
function my_avatar($avatar)
{
    $tmp = strpos($avatar, 'http');
    $g = substr($avatar, $tmp, strpos($avatar, "'", $tmp) - $tmp);
    $tmp = strpos($g, 'avatar/') + 7;
    $f = substr($g, $tmp, strpos($g, "?", $tmp) - $tmp);
    $w = get_bloginfo('wpurl');
    $e = ABSPATH . 'avatar/' . $f . '.png';
    $t = 31536000;
    if (!is_file($e) || (time() - filemtime($e)) > $t) {
        copy(htmlspecialchars_decode($g), $e);
    } else  $avatar = strtr($avatar, array($g => $w . '/avatar/' . $f . '.png'));
    if (filesize($e) < 500) copy($w . '/avatar/default.png', $e);
    return $avatar;
}

add_filter('get_avatar', 'my_avatar');

//后台样式
function admin_css()
{
    if (is_user_logged_in())
        $current_user = wp_get_current_user();

    if ($current_user->user_login !== "Jeff")
        wp_enqueue_style("admin-my", get_template_directory_uri() . "/admin.css");
}

add_action('admin_head', 'admin_css');

//后台js文件
function backend_enqueue_scripts()
{
    wp_register_script('themes_js', get_bloginfo('template_directory') . '/js/admin.js');
    wp_enqueue_script('themes_js');
}

add_action('admin_enqueue_scripts', 'backend_enqueue_scripts');


//开启文章缩略图功能
add_theme_support('post-thumbnails', array('post'));

if (function_exists('add_image_size')) {
    add_image_size('category-thumb', 200, 200);
    add_image_size('homepage-thumb', 220, 220);
}

//文章简要文字长度
function new_excerpt_length($length)
{
    return 100;
}

add_filter('excerpt_length', 'new_excerpt_length');


//去除正文P标签包裹
remove_filter('the_content', 'wpautop');
//去除摘要P标签包裹
remove_filter('the_excerpt', 'wpautop');


//上传文件大小限制
function max_up_size()
{
    return 51000 * 1024; // 50 Mb
}

add_filter('upload_size_limit', 'max_up_size');

//增强搜索功能，搜索结果按照内容相关性来显示
if (is_search()) {
    add_filter('posts_orderby_request', 'search_orderby_filter');
}

function search_orderby_filter($orderby = '')
{
    global $wpdb;
    $keyword = $wpdb->prepare($_REQUEST['s']);
    return "((CASE WHEN {$wpdb->posts}.post_title LIKE '%{$keyword}%' THEN 2 ELSE 0 END) + (CASE WHEN {$wpdb->posts}.post_content LIKE '%{$keyword}%' THEN 1 ELSE 0 END)) DESC,
{$wpdb->posts}.post_modified DESC, {$wpdb->posts}.ID ASC";
}

//限制上传文件的类型
add_filter('upload_mimes', 'custom_upload_mimes');
function custom_upload_mimes($existing_mimes = array())
{
    unset ($existing_mimes);//禁止上传任何文件
    $existing_mimes['jpg|jpeg|gif|png'] = 'image/image';
    $existing_mimes['pdf'] = 'application/pdf';
    return $existing_mimes;
}


//后台登陆样式
//Login Page
function custom_login()
{
    echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('template_directory') . '/css/login.css" />' . "\n";
    echo '<script type="text/javascript" src="//cdn.bootcss.com/jquery/2.2.0/jquery.js"></script>' . "\n";
}

add_action('login_head', 'custom_login');

//Login Page Title
function custom_headertitle($title)
{
    return get_bloginfo('name');
}

add_filter('login_headertitle', 'custom_headertitle');

//Login Page Link
function custom_loginlogo_url($url)
{
    return esc_url(home_url('/'));
}

add_filter('login_headerurl', 'custom_loginlogo_url');

//Login Page Footer
function custom_html()
{
    echo '<div class="footer">' . "\n";
    echo '</div>' . "\n";
    echo '<script type="text/javascript" src="' . get_bloginfo('template_directory') . '/js/resizeBackground.js"></script>' . "\n";
    echo '<script type="text/javascript">' . "\n";
    echo 'jQuery("body").prepend("<div class=\"loading\"><img src=\"' . get_bloginfo('template_directory') . '/images/login_loading.gif\" width=\"58\" height=\"10\"></div><div id=\"bg\"><img /></div>");' . "\n";
    echo 'jQuery(\'#bg\').children(\'img\').attr(\'src\', \'' . get_bloginfo('template_directory') . '/images/login_bg.jpg\').load(function(){' . "\n";
    echo '	resizeImage(\'bg\');' . "\n";
    echo '	jQuery(window).bind("resize", function() { resizeImage(\'bg\'); });' . "\n";
    echo '	jQuery(\'.loading\').fadeOut();' . "\n";
    echo '});';
    echo '</script>' . "\n";
}

add_action('login_footer', 'custom_html');


//图片链接改为所在的文章地址
function auto_post_link($content)
{
    global $post;
    $content = preg_replace('/<\s*img\s+[^>]*?src\s*=\s*(\'|\")(.*?)\\1[^>]*?\/?\s*>/i', "<a title=\"" . $post->post_title . "\"><img src=\"$2\" alt=\"" . $post->post_title . "\" /></a>", $content);
    return $content;
}

add_filter('the_content', 'auto_post_link', 0);

//获得文章的第一张图片
function catch_first_image()
{
    global $post;
    ob_start();
    ob_end_clean();
    preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    $first_img = $matches [1] [0];
    return $first_img;
}


//默认文章的第一张图片为特色图片
function autoset_featured_image()
{
    global $post;
    $already_has_thumb = has_post_thumbnail($post->ID);
    if (!$already_has_thumb) {
        $attached_image = get_children("post_parent=$post->ID&post_type=attachment&post_mime_type=image&numberposts=1");
        if ($attached_image) {
            foreach ($attached_image as $attachment_id => $attachment) {
                set_post_thumbnail($post->ID, $attachment_id);
            }
        }
    }
}

add_action('the_post', 'autoset_featured_image');
add_action('save_post', 'autoset_featured_image');
add_action('draft_to_publish', 'autoset_featured_image');
add_action('new_to_publish', 'autoset_featured_image');
add_action('pending_to_publish', 'autoset_featured_image');
add_action('future_to_publish', 'autoset_featured_image');

//增加中文字体
function custum_fontfamily($initArray)
{
	$initArray['font_formats'] = "微软雅黑='微软雅黑';宋体='宋体';黑体='黑体';仿宋='仿宋';楷体='楷体';隶书='隶书';幼圆='幼圆';Andale Mono=andale mono,times;Arial=arial,helvetica,sans-serif;Arial Black=arial black,avant garde;Book Antiqua=book antiqua,palatino;Comic Sans MS=comic sans ms,sans-serif;Courier New=courier new,courier;Georgia=georgia,palatino;Helvetica=helvetica;Impact=impact,chicago;Symbol=symbol;Tahoma=tahoma,arial,helvetica,sans-serif;Terminal=terminal,monaco;Times New Roman=times new roman,times;Trebuchet MS=trebuchet ms,geneva;Verdana=verdana,geneva;Webdings=webdings;Wingdings=wingdings";
	return $initArray;
}

add_filter('tiny_mce_before_init', 'custum_fontfamily');


//禁止validation来允许contact-form7 表单的from 邮箱非本域名
add_filter( 'wpcf7_validate_configuration', '__return_false' );


//服务器租用配置短码
function colocation_shortcode_func($atts, $content) {
	$EnglishHTML = '<section class="collocation clearfix">
					<div class="sec-title text-center">
						<h2>Colocation</h2>
						<p>&nbsp;</p>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-12 text-center">
						<div class="service-item">
							<ul class="list-group">
								<li class="list-group-item collocation-item-title">1U hosting</li>
								<li class="list-group-item collocation-item-price">￥380 / month</li>
								<li class="list-group-item">1U managed specifications</li>
								<li class="list-group-item">10M BGP Exclusive network</li>
								<li class="list-group-item">One up Independent IP</li>
								<li class="list-group-item">5G up Free defense peak</li>
								<li class="list-group-item collocation-item-buy pointer"><a href="http://linkchina.hk/server/?configurations=1U">Buy</a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-12 text-center">
						<div class="service-item">
							<ul class="list-group">
								<li class="list-group-item collocation-item-title">2U hosting</li>
								<li class="list-group-item collocation-item-price">￥480 / month</li>
								<li class="list-group-item">2U managed specifications</li>
								<li class="list-group-item">10M BGP Exclusive network</li>
								<li class="list-group-item">One up Independent IP</li>
								<li class="list-group-item">5G up Free defense peak</li>
								<li class="list-group-item collocation-item-buy pointer"><a href="http://linkchina.hk/server/?configurations=2U">Buy</a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-12 text-center">
						<div class="service-item">
							<ul class="list-group">
								<li class="list-group-item collocation-item-title">Whole cabinet custody</li>
								<li class="list-group-item collocation-item-price">￥5700 / 月</li>
								<li class="list-group-item">Full cabinet hosting specification</li>
								<li class="list-group-item">100M BGP Exclusive network</li>
								<li class="list-group-item">32 up Independent IP</li>
								<li class="list-group-item">5G up Free defense peak</li>
								<li class="list-group-item collocation-item-buy pointer"><a href="http://linkchina.hk/server/?configurations=whole">Buy</a></li>
							</ul>
						</div>
					</div>
				</section>' . $atts[0][type] . ' ';

	$TraditionalHTML = '<section class="collocation clearfix">
						<div class="sec-title text-center">
							<h2>伺服器託管</h2>
							<p></p>
						</div>

						<div class="col-md-4 col-sm-4 col-xs-12 text-center">
							<div class="service-item">
								<ul class="list-group">
									<li class="list-group-item collocation-item-title">1U 托管</li>
									<li class="list-group-item collocation-item-price">￥380 / 月</li>
									<li class="list-group-item">1U 托管規格</li>
									<li class="list-group-item">10M BGP獨享網絡</li>
									<li class="list-group-item">1個起 獨立IP</li>
									<li class="list-group-item">5G起 免費防禦峰值</li>
									<li class="list-group-item collocation-item-buy pointer">
										<a href="http://linkchina.hk/server/?configurations=1U">立即搶購</a>
									</li>
								</ul>
							</div>
						</div>

						<div class="col-md-4 col-sm-4 col-xs-12 text-center">
							<div class="service-item">
								<ul class="list-group">
									<li class="list-group-item collocation-item-title">2U 托管</li>
									<li class="list-group-item collocation-item-price">￥480 / 月</li>
									<li class="list-group-item">2U 托管規格</li>
									<li class="list-group-item">10M BGP獨享網絡</li>
									<li class="list-group-item">1個起 獨立IP</li>
									<li class="list-group-item">5G起 免費防禦峰值</li>
									<li class="list-group-item collocation-item-buy pointer">
										<a href="http://linkchina.hk/server/?configurations=2U">立即搶購</a>
									</li>
								</ul>
							</div>
						</div>

						<div class="col-md-4 col-sm-4 col-xs-12 text-center">
							<div class="service-item">
								<ul class="list-group">
									<li class="list-group-item collocation-item-title">整櫃托管</li>
									<li class="list-group-item collocation-item-price">￥5700 / 月</li>
									<li class="list-group-item">整櫃 托管規格</li>
									<li class="list-group-item">100M BGP獨享網絡</li>
									<li class="list-group-item">32個起 獨立IP</li>
									<li class="list-group-item">5G起 免費防禦峰值</li>
									<li class="list-group-item collocation-item-buy pointer">
										<a href="http://linkchina.hk/server/?configurations=whole">立即搶購</a>
									</li>
								</ul>
							</div>
						</div>
					</section>';

	$ChineseHTML = '<section class="collocation clearfix">
						<div class="sec-title text-center">
							<h2>服务器托管</h2>
							<p></p>
						</div>

						<div class="col-md-4 col-sm-4 col-xs-12 text-center">
							<div class="service-item">
								<ul class="list-group">
									<li class="list-group-item collocation-item-title">1U 托管</li>
									<li class="list-group-item collocation-item-price">￥380 / 月</li>
									<li class="list-group-item">1U 托管规格</li>
									<li class="list-group-item">10M BGP独享网络</li>
									<li class="list-group-item">1个起 独立IP</li>
									<li class="list-group-item">5G起 免费防御峰值</li>
									<li class="list-group-item collocation-item-buy pointer">
										<a href="http://linkchina.hk/server/?configurations=1U">立即抢购</a>
									</li>
								</ul>
							</div>
						</div>

						<div class="col-md-4 col-sm-4 col-xs-12 text-center">
							<div class="service-item">
								<ul class="list-group">
									<li class="list-group-item collocation-item-title">2U 托管</li>
									<li class="list-group-item collocation-item-price">￥480 / 月</li>
									<li class="list-group-item">2U 托管规格</li>
									<li class="list-group-item">10M BGP独享网络</li>
									<li class="list-group-item">1个起 独立IP</li>
									<li class="list-group-item">5G起 免费防御峰值</li>
									<li class="list-group-item collocation-item-buy pointer">
										<a href="http://linkchina.hk/server/?configurations=2U">立即抢购</a>
									</li>
								</ul>
							</div>
						</div>

						<div class="col-md-4 col-sm-4 col-xs-12 text-center">
							<div class="service-item">
								<ul class="list-group">
									<li class="list-group-item collocation-item-title">整柜托管</li>
									<li class="list-group-item collocation-item-price">￥5700 / 月</li>
									<li class="list-group-item">整柜 托管规格</li>
									<li class="list-group-item">100M BGP独享网络</li>
									<li class="list-group-item">32个起 独立IP</li>
									<li class="list-group-item">5G起 免费防御峰值</li>
									<li class="list-group-item collocation-item-buy pointer">
										<a href="http://linkchina.hk/server/?configurations=whole">立即抢购</a>
									</li>
								</ul>
							</div>
						</div>
					</section>';

	switch (current($atts)) {
		case 'English' :
		return $EnglishHTML;

		case 'Traditional':
		return $TraditionalHTML;

		case 'Chinese': 
		return $ChineseHTML;
	}
}

add_shortcode('colocation', 'colocation_shortcode_func');


function cipFunction() {
	return '<iframe src="http://lg.linkchina.hk" width="100%" height="500"></iframe>';
}
add_shortcode('cipiframe', 'cipFunction');


?>
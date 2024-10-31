<?php
/*
@package    WordPress
@subpackage my_plugin
@author  Samurai6111 <samurai.blue6111@gmail.com>
Plugin Name: My WP Sitemap
Text Domain: my_plugin
Description: Wordpressで管理画面でサイトマップを表示させるプラグイン
Author: Shota Kawakatsu
Author URI: https://github.com/Samurai6111
Version: 1.2
Plugin URI: https://github.com/Samurai6111/wp-my-sitemap
*/

/*--------------------------------------------------
/* phpファイルのURLに直接アクセスされても中身見られないようにする
/*------------------------------------------------*/
if (!defined('ABSPATH')) exit;

//--------------------------------------------------
// 変数
//--------------------------------------------------
$mws_url = plugins_url('', __FILE__);
$mws_path = plugin_dir_path(__FILE__);

/**
 * ページ作成
 */
function mws_add_pages() {
	global $mws_path;
	add_menu_page(
		__('My Sitemap'),
		__('My Sitemap'),
		'manage_options',
		'mws_page',
		'mws_view',
		'dashicons-calendar-alt',
		100
	);
}
add_action('admin_menu', 'mws_add_pages');


/**
 * ページ読み込み時に実行される関数
 */
function mws_view() {
	global $mws_path;

	//--------------------------------------------------
	// インクルード
	//--------------------------------------------------
	require_once($mws_path . "/Includes/mws-includes.php");

	//--------------------------------------------------
	// ページ読み込み
	//--------------------------------------------------
	require_once($mws_path . "/Pages/mws-page.php");
}


/**
 * css読み込み
 */
function mws_load_css() {
	global $mws_url;
	wp_enqueue_style('mws_css', $mws_url . '/Assets/Css/style.css', false, '1.1', 'all');
}
add_action('admin_enqueue_scripts', 'mws_load_css');


/**
 * css読み込み
 */
function mws_load_js() {
	global $mws_url;
	wp_enqueue_script('my-wpdb', $mws_url . '/Assets/js/mws.js', [], false, true);
}
// add_action('admin_enqueue_scripts', 'mws_load_js');

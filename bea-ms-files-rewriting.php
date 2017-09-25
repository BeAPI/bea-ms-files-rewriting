<?php
/*
  Plugin Name: BEA - MS Files Rewriting
  Plugin URI: http://www.beapi.fr
  Description: Rewrite to have only one folder for all files.
  Author: BeAPI
  Author URI: http://beapi.fr
  Version: 1.0.0
 */


/**
 * For all files into one site folder.
 */
//add_filter( 'upload_dir', 'bea_move_uploads' );
function bea_move_uploads( $cache_key ) {
	$blog_id = get_current_blog_id();
	if ( 6 === $blog_id ) {
		return $cache_key;
	}

	$cache_key['path']    = WP_CONTENT_DIR . '/uploads/sites/6' . $cache_key['subdir'];
	$cache_key['url']     = WP_CONTENT_URL . '/uploads/sites/6' . $cache_key['subdir'];
	$cache_key['basedir'] = WP_CONTENT_DIR . '/uploads/sites/6';
	$cache_key['baseurl'] = WP_CONTENT_URL . '/uploads/sites/6';

	return $cache_key;
}



/**
 * Remove site rewriting, means all files into upload one.
 */
//add_filter( 'pre_site_option_' . 'ms_files_rewriting', '__return_true' );

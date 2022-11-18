<?php 

namespace app\Helpers;

/* Exit if accessed directly. */
if (!defined('ABSPATH')) {
	exit;
}

/**
 * Import helper class for importing other SEO 
 * plugin data into SimpleSEO.
 *
 * @since  2.0.0
 */
class Import {
	/**
 	 * Imports Ranked Math data into SimpleSEO data.
	 *
	 * @since  2.0.0
 	 */
	public static function importRanked() {
		global $wpdb;

		$results = $wpdb->get_results("SELECT post_id, meta_key, meta_value FROM ".$wpdb->prefix."postmeta WHERE (meta_key='rank_math_title') OR (meta_key='rank_math_description')");

		foreach($results as $result) {
			if (!empty($result->post_id)) {
				$old_meta_title = get_post_meta($result->post_id, 'sseo_meta_title', true);
				$new_meta_title = null;
				if (!empty($result->meta_key) && $result->meta_key == 'rank_math_title' && !empty($result->meta_value)) {
					$new_meta_title = sanitize_text_field($result->meta_value);
				}

				if ($new_meta_title && $new_meta_title != $old_meta_title) {
					update_post_meta($result->post_id, 'sseo_meta_title', $new_meta_title);
				}

				$old_meta_description = get_post_meta($result->post_id, 'sseo_meta_description', true);
				$new_meta_description = null;
				if (!empty($result->meta_key) && $result->meta_key == 'rank_math_description' && !empty($result->meta_value)) {
					$new_meta_description = sanitize_text_field($result->meta_value);
				}

				if ($new_meta_description && $new_meta_description != $old_meta_description) {
					update_post_meta($result->post_id, 'sseo_meta_description', $new_meta_description);
				}
			}

			wp_redirect('/wp-admin/options-general.php?page=simpleSEOAdminOptions&rankmath=1');
		}
	}
	
	/**
 	 * Imports Ranked Math data into SimpleSEO data.
	 *
	 * @since  2.0.0
 	 */
	public static function importAIOSEO() {
		global $wpdb;

		$results = $wpdb->get_results("SELECT post_id, meta_key, meta_value FROM ".$wpdb->prefix."postmeta WHERE (meta_key='_aioseo_title') OR (meta_key='_aioseo_description')");

		foreach($results as $result) {
			if (!empty($result->post_id)) {
				$old_meta_title = get_post_meta($result->post_id, 'sseo_meta_title', true);
				$new_meta_title = null;
				if (!empty($result->meta_key) && $result->meta_key == '_aioseo_title' && !empty($result->meta_value)) {
					$new_meta_title = sanitize_text_field($result->meta_value);
				}

				if ($new_meta_title && $new_meta_title != $old_meta_title) {
					update_post_meta($result->post_id, 'sseo_meta_title', $new_meta_title);
				}

				$old_meta_description = get_post_meta($result->post_id, 'sseo_meta_description', true);
				$new_meta_description = null;
				if (!empty($result->meta_key) && $result->meta_key == '_aioseo_description' && !empty($result->meta_value)) {
					$new_meta_description = sanitize_text_field($result->meta_value);
				}

				if ($new_meta_description && $new_meta_description != $old_meta_description) {
					update_post_meta($result->post_id, 'sseo_meta_description', $new_meta_description);
				}
			}

			wp_redirect('/wp-admin/options-general.php?page=simpleSEOAdminOptions&allinone=1');
		}
	}
	
	public static function importYoast() {
		global $wpdb;

		$results = $wpdb->get_results("SELECT post_id, meta_key, meta_value FROM ".$wpdb->prefix."postmeta WHERE (meta_key='_yoast_wpseo_title') OR (meta_key='_yoast_wpseo_metadesc')");

		foreach($results as $result) {
			if (!empty($result->post_id)) {
				$old_meta_title = get_post_meta($result->post_id, 'sseo_meta_title', true);
				$new_meta_title = null;
				if (!empty($result->meta_key) && $result->meta_key == '_yoast_wpseo_title' && !empty($result->meta_value)) {
					$new_meta_title = sanitize_text_field($result->meta_value);
				}

				if ($new_meta_title && $new_meta_title != $old_meta_title) {
					update_post_meta($result->post_id, 'sseo_meta_title', $new_meta_title);
				}

				$old_meta_description = get_post_meta($result->post_id, 'sseo_meta_description', true);
				$new_meta_description = null;
				if (!empty($result->meta_key) && $result->meta_key == '_yoast_wpseo_metadesc' && !empty($result->meta_value)) {
					$new_meta_description = sanitize_text_field($result->meta_value);
				}

				if ($new_meta_description && $new_meta_description != $old_meta_description) {
					update_post_meta($result->post_id, 'sseo_meta_description', $new_meta_description);
				}
			}

			wp_redirect('/wp-admin/options-general.php?page=simpleSEOAdminOptions&yoast=1');
		}
	}
	
}

?>
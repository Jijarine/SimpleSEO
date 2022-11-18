<?php 

namespace app\Admin\Meta;

/* Exit if accessed directly. */
if (!defined('ABSPATH')) {
	exit;
}

/**
 * Title class for header. Generates the title.
 *
 * @since  2.0.0
 */
class Title {

	/**
	 * Generates and returns the title from so we can tell 
	 * WordPress what to use inside the HTML title tag.
	 *
	 * @since 2.0.0
	 */
	public static function getTitle() {
		global $post;
		global $wp_query;

		if (!is_object($post)) {
			return;
		}

		$meta_title = null;
		$site_name = get_bloginfo('name');

		/* default */
		$default_title = get_option('sseo_default_meta_title');
		$default_title = apply_filters('sseo_default_meta_title', $default_title);

		if (is_front_page() && is_home()) { /* Default Homepage */
			$meta_title = $default_title;
		} elseif (is_home()) { /* Blog Page */
			$meta_title = get_post_meta(get_option('page_for_posts'), 'sseo_meta_title', true);
		} elseif ((is_front_page() || is_home()) && isset($post->ID)) { /* Static */
			$meta_title = get_post_meta($post->ID, 'sseo_meta_title', true);
		} elseif (isset($post->ID)) {
			$meta_title = get_post_meta($post->ID, 'sseo_meta_title', true);
		} else {
			$meta_title = $default_title;
		}

		/* WooCommerce */
		if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
			if (is_shop()) {
				$shop_page_id = get_option('woocommerce_shop_page_id');
				$meta_title = get_post_meta($shop_page_id, 'sseo_meta_title', true);
				if (empty($meta_title)) {
					$meta_title = esc_html('Shop | '.$site_name);
				}
			} elseif (is_product_category()) {
				$term = $wp_query->get_queried_object();
				if (!empty($term->term_id)) {
					$term_meta = get_option("taxonomy_".$term->term_id);
					if (!empty($term_meta['sseo_title'])) {
						$meta_title = $term_meta['sseo_title'];
					}
				}
			}
		}

		if (is_category() || is_tax() || is_tag()) {
			$term = $wp_query->get_queried_object();
			if (!empty($term->term_id)) {
				$term_meta = get_option("taxonomy_".$term->term_id);
				if (!empty($term_meta['sseo_title'])) {
					$meta_title = $term_meta['sseo_title'];
				} else {
					$meta_title = esc_html($term->name.' | '.$site_name);
				}
			}
		}

		if (is_date()) {
			if (is_year()) {
				$meta_title = esc_html(get_the_date('Y', $post->ID).' | '.$site_name);
			} elseif (is_month()) {
				$meta_title = esc_html(get_the_date('F Y', $post->ID).' | '.$site_name);
			} elseif (is_day()) {
				$meta_title = esc_html(get_the_date('F j, Y', $post->ID).' | '.$site_name);
			}
		}

		if (is_search() && 0 === $wp_query->found_posts) {
			$meta_title = __('Search Results for').'"'.esc_attr(get_search_query()).'" | '.esc_html($site_name);
		}

		if (is_search()) {
			$meta_title = __('Search Results for').'"'.esc_attr(get_search_query()).'" | '.esc_html($site_name);
		}

		if (empty($meta_title)) {
			return esc_html($post->post_title.' | '.$site_name);
		}

		return esc_html($meta_title);
	}
}

?>
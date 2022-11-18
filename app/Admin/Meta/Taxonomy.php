<?php 

namespace app\Admin\Meta;

/* Exit if accessed directly. */
if (!defined('ABSPATH')) {
	exit;
}

/**
 * Taxonomy class for meta box. This contains the meta box,
 * HTML, form fields, everything to have SimpleSEO within a
 * taxonomy.
 *
 * @since  2.0.0
 */
class Taxonomy {
	
	/**
	 * Adds meta fields for a editing a taxonomy
	 * Includes canonical URL
	 *
	 * @since  2.0.0
	 */
    public function editMetaBox($term) {
		$term_meta = get_option("taxonomy_".$term->term_id);
		$meta_title = null;
		if (isset($term_meta['sseo_title'])) {
			$meta_title = $term_meta['sseo_title'];
		}
		$meta_description = null;
		if (isset($term_meta['sseo_description'])) {
			$meta_description = $term_meta['sseo_description'];
		}
		$canonical_url = null;
		if (!empty($term_meta['sseo_canonical_url'])) {
			$canonical_url = $term_meta['sseo_canonical_url'];
		}

		echo '
		<tr class="form-field">
			<th scope="row" valign="top"><label for="term_meta[sseo_title]">'.__('SEO Title', 'sseo').'</label></th>
			<td><input type="text" name="term_meta[sseo_title]" id="term_meta[sseo_title]" value="'.esc_attr($meta_title).'"></td>
		</tr>
		<tr class="form-field">
			<th scope="row" valign="top"><label for="term_meta[sseo_description]">'.__('SEO Description', 'sseo').'</label></th>
			<td><input type="text" name="term_meta[sseo_description]" id="term_meta[sseo_description]" value="'.esc_attr($meta_description).'"></td>
		</tr>
		<tr class="form-field">
			<th scope="row" valign="top"><label for="term_meta[sseo_canonical_url]">'.__('Canonical URL', 'sseo').'</label></th>
			<td><input type="text" name="term_meta[sseo_canonical_url]" id="term_meta[sseo_canonical_url]" value="'.esc_attr($canonical_url).'"></td>
		</tr>
		';
	}
	
	/**
	 * Adds meta fields for a new taxonomy
	 * Includes canonical URL
	 *
	 * @since  2.0.0
	 */
	public function newMetaBox() {
		echo '<div class="form-field">
			<label for="term_meta[sseo_title]">'.__('SEO Title', 'sseo').'</label>
			<input type="text" name="term_meta[sseo_title]" id="term_meta[sseo_title]" value="">
		</div>
		<div class="form-field">
			<label for="term_meta[sseo_description]">'.__('SEO Description', 'sseo').'</label>
			<input type="text" name="term_meta[sseo_description]" id="term_meta[sseo_description]" value="">
		</div>
		<div class="form-field">
			<label for="term_meta[sseo_canonical_url]">'.__('Canonical URL', 'sseo').'</label>
			<input type="text" name="term_meta[sseo_canonical_url]" id="term_meta[sseo_canonical_url]" value="">
		</div>';
	}
	
}

?>
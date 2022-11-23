<?php 

namespace app\Admin\Meta;

/* Exit if accessed directly. */
if (!defined('ABSPATH')) {
	exit;
}

/**
 * Options class for meta box. This contains the meta box,
 * HTML, form fields, everything to have a SimpleSEO 
 * options page.
 *
 * @since  2.0.0
 */
class Options {
	
    public function __construct() {
		
		if (!empty($_GET['yoast'])) {
			echo '<div class="notice notice-success is-dismissible"><p>'.__('Yoast metadata has been coppied to Simple SEO, awesome!').'</p></div>';
		}
		
		if (!empty($_GET['allinone'])) {
			echo '<div class="notice notice-success is-dismissible"><p>'.__('All in One SEO metadata has been coppied to Simple SEO, awesome!').'</p></div>';
		}
		
		if (!empty($_GET['rankmath'])) {
			echo '<div class="notice notice-success is-dismissible"><p>'.__('Rank Math metadata has been coppied to Simple SEO, awesome!').'</p></div>';
		}
		
		echo '<div class="notice notice-info is-dismissible"><p>'.__('Please').'<a href="https://checkout.square.site/merchant/CGD6KJ0N7YECM/checkout/BN3726JNC6C6P6HL3JKNX3LC" target="_blank"> '.__('donate to Simple SEO').'.</a> or <a href="https://wordpress.org/support/plugin/cds-simple-seo/reviews/" target="_blank">'.__('Leave a Review.').'</a> Or Both! Please email <a href="mailto:dave@coleds.com">David Cole</a> with any questions.</p></div>';
		
		$content = '<div class="wrap">';
		$content .= '<h1>Simple SEO Options</h1>';
		
		$content .= '<form method="post" action="options.php" novalidate>';
		
		echo $content;
		
		settings_fields('sseo-settings-group');
		do_settings_sections('sseo-settings-group');
		
		$content = '<table class="form-table" role="presentation">';
		$content .= '<tbody>';
		
		$content .= '<tr>';
		$content .= '<th scope="row"><label for="sseo_default_meta_title">';
		$content .= __('Default Meta Title');
		$content .= '</label>';
		$content .= '<td>';
		$content .= '<input name="sseo_default_meta_title" type="text" id="sseo_default_meta_title" value="'.esc_attr(get_option('sseo_default_meta_title')).'" class="regular-text">';
		$content .= '<p class="description">';
		$content .= __('This is the default information used for meta title (&lt;title&gt;&lt;&#47;title&gt;) this information will only be used if there is no set home page. If a homepage is set, then the meta data will be used from that page.');
		$content .= '</p>';
		$content .= '</td>';
		$content .= '</tr>';
		
		$content .= '<tr>';
		$content .= '<th scope="row">';
		$content .= '<label for="sseo_default_meta_description">';
		$content .= __('Default Meta Description');
		$content .= '</label>';
		$content .= '</th>';
		$content .= '<td>';
		$content .= '<textarea name="sseo_default_meta_description" rows="5" cols="50" class="large-text code">'.esc_textarea(get_option('sseo_default_meta_description')).'</textarea>';
		$content .= '<p class="description">';
		$content .= __('This is the default information used for meta description (&lt;meta name="description" content=""&gt;) this information will only be used if there is no set home page. If a homepage is set, then the meta data will be used from that page.');
		$content .= '</p>';
		$content .= '</td>';
		$content .= '</tr>';
		
		$content .= '<tr>';
		$content .= '<th scope="row">';
		$content .= '<label for="sseo_default_meta_keywords">';
		$content .= __('Default Meta Keywords');
		$content .= '</label>';
		$content .= '</th>';
		$content .= '<td>';
		$content .= '<textarea name="sseo_default_meta_keywords" rows="5" cols="50" class="large-text code">'.esc_textarea(get_option('sseo_default_meta_keywords')).'</textarea>';
		$content .= '<p class="description">';
		$content .= __('This is the default information used for meta keywords (&lt;meta name="keywords" content=""&gt;) this information will only be used if there is no set home page. If a homepage is set, then the meta data will be used from that page.<br/><em>A comma separated list of your most important keywords for this will be written as the meta keywords.</em>');
		$content .= '</p>';
		$content .= '</td>';
		$content .= '</tr>';
		
		$content .= '<tr>';
		$content .= '<th scope="row"><label class="post-attributes-label" for="sseo_gsite_verification">';
		$content .= __('Google Verification Code');
		$content .= '</label>';
		$content .= '<td>';
		$content .= '<input name="sseo_gsite_verification" type="text" id="sseo_gsite_verification" value="'.esc_attr(get_option('sseo_gsite_verification')).'" class="regular-text">';
		$content .= '<p class="description">';
		$content .= '<a href="https://support.google.com/webmasters/answer/35179?hl=en" target="_blank">';
		$content .= __('Click Here For Site Verification Code');
		$content .= '</a>';
		$content .= '</p>';
		$content .= '</td>';
		$content .= '</tr>';
		
		/* sseo_ganalytics */
		$content .= '<tr>';
		$content .= '<th scope="row"><label class="post-attributes-label" for="sseo_ganalytics">';
		$content .= __('Google Analytics');
		$content .= '</label>';
		$content .= '<td>';
		$content .= '<input name="sseo_ganalytics" type="text" id="sseo_ganalytics" value="'.esc_attr(get_option('sseo_ganalytics')).'" class="regular-text">';
		$content .= '<p class="description">';
		$content .= __('Universal Analytics will be going away, ');
		$content .= '<a href="https://support.google.com/analytics/answer/10089681" rel="noopener" target="_blank">';
		$content .= __('Google Analytics 4 properties');
		$content .= '</a>. ';
		$content .= __('Refer to the ');
		$content .= '<a href="https://support.google.com/analytics#topic=10094551" rel="noopener" target="_blank">';
		$content .= __('Universal Analytics section');
		$content .= '</a> ';
		$content .= __('if you\'re still using a Universal Analytics property, which will ');
		$content .= '<a href="https://support.google.com/analytics/answer/11583528" rel="noopener" target="_blank">';
		$content .= __('stop processing data');
		$content .= '</a> ';
		$content .= __('on July 1, 2023 (July 1, 2024 for Analytics 360 properties).');
		$content .= '</p>';
		$content .= '</td>';
		$content .= '</tr>';
		
		/* sseo_g4analytics */
		$content .= '<tr>';
		$content .= '<th scope="row"><label class="post-attributes-label" for="sseo_g4analytics">';
		$content .= __('Google Analytics 4');
		$content .= '</label>';
		$content .= '<td>';
		$content .= '<input name="sseo_g4analytics" type="text" id="sseo_g4analytics" value="'.esc_attr(get_option('sseo_g4analytics')).'" class="regular-text">';
		$content .= '<p class="description">';
		$content .= '<a href="https://support.google.com/analytics/answer/10089681?hl=en&ref_topic=9143232" target="_blank">Get Your Code</a>';
		$content .= '</p>';
		$content .= '</td>';
		$content .= '</tr>';
		
		/* Bing verification code */
		$content .= '<tr>';
		$content .= '<th scope="row"><label class="post-attributes-label" for="sseo_bing">Bing Verification';
		$content .= __('Bing Verification Code');
		$content .= '</label>';
		$content .= '<td>';
		$content .= '<input name="sseo_bing" type="text" id="sseo_bing" value="'.esc_attr(get_option('sseo_bing')).'" class="regular-text">';
		$content .= '<p class="description">';
		$content .= '<a href="https://www.bing.com/webmasters/about#/Dashboard/" target="_blank">';
		$content .= __('Click Here To Get Your Bing Code');
		$content .= '</a>';
		$content .= '</p>';
		$content .= '</td>';
		$content .= '</tr>';
		
		/* Yandex verification code */
		$content .= '<tr>';
		$content .= '<th scope="row"><label class="post-attributes-label" for="sseo_yandex">';
		$content .= __('Yandex Verification Code');
		$content .= '</label>';
		$content .= '<td>';
		$content .= '<input name="sseo_yandex" type="text" id="sseo_yandex" value="'.esc_attr(get_option('sseo_yandex')).'" class="regular-text">';
		$content .= '<p class="description">';
		$content .= '<a href="https://webmaster.yandex.com/sites/add/" target="_blank">';
		$content .= __('Click Here To Get Your Yandex Code');
		$content .= '</a>';
		$content .= '</p>';
		$content .= '</td>';
		$content .= '</tr>';
		
		/* Facebook verification code */
		$content .= '<tr>';
		$content .= '<th scope="row"><label class="post-attributes-label" for="sseo_fb_app_id">';
		$content .= __('Facebook App ID');
		$content .= '</label>';
		$content .= '<td>';
		$content .= '<input name="sseo_fb_app_id" type="text" id="sseo_fb_app_id" value="'.esc_attr(get_option('sseo_fb_app_id')).'" class="regular-text">';
		$content .= '<p class="description">';
		$content .= '<a href="https://developers.facebook.com/docs/apps/" target="_blank">';
		$content .= __('Click Here To Get Your Facebook App ID');
		$content .= '</a>';
		$content .= '</p>';
		$content .= '</td>';
		$content .= '</tr>';
		
		/* sseo_twitter_username */
		/*$content .= '<tr>';
		$content .= '<th scope="row"><label class="post-attributes-label" for="sseo_twitter_username">';
		$content .= __('Twitter username');
		$content .= '</label>';
		$content .= '<td>';
		$content .= '<input name="sseo_twitter_username" type="text" id="sseo_twitter_username" value="'.esc_attr(get_option('sseo_twitter_username')).'" class="regular-text">';
		$content .= '<p class="description">';
		$content .= __('for example @coledesignstudios');
		$content .= '</p>';
		$content .= '</td>';
		$content .= '</tr>';
		$content .= '<tr>';
		$content .= '<th scope="row"><label class="post-attributes-label" for="sseo_fb_fimage">';
		$content .= __('Facebook Image');
		$content .= '</label>';
		$content .= '</th>';
		$content .= '<td>';
		$content .= '<select name="sseo_fb_fimage">';
		$selected = null;
		$sseo_fb_fimage = esc_attr(get_option('sseo_fb_fimage'));
		if (!empty($sseo_fb_fimage)) {
			$selected = ' selected="selected"';
		}
		$content .= '<option value="0"'.$selected.'>No</option>';
		$content .= '<option value="1"'.$selected.'>Yes</option>';
		$content .= '</select>';
		$content .= '<p class="description">';
		$content .= __('Use the post featured image instead of the facebook image. By default the featured image is used if there is no facebook image.');
		$content .= '</p>';
		$content .= '</td>';
		$content .= '</tr>';
		$content .= '<tr>';
		$content .= '<th scope="row"><label class="post-attributes-label" for="sseo_tw_fimage">';
		$content .= __('Twitter Image');
		$content .= '</label>';
		$content .= '</th>';
		$content .= '<td>';
		$content .= '<select name="sseo_tw_fimage">';
		$selected = null;
		$sseo_tw_fimage = esc_attr(get_option('sseo_tw_fimage'));
		if (!empty($sseo_tw_fimage)) {
			$selected = ' selected="selected"';
		}
		$content .= '<option value="0"'.$selected.'>No</option>';
		$content .= '<option value="1"'.$selected.'>Yes</option>';
		$content .= '</select>';
		$content .= '<p class="description">';
		$content .= __('Use the post featured image instead of the twitter image. By default the featured image is used if there is no twitter image.');
		$content .= '</p>';
		$content .= '</td>';
		$content .= '</tr>';*/
		$content .= '</tbody>';
		$content .= '</table>';
		
		$content .= '<input type="submit" name="submit" id="submit" class="button button-primary" value="';
		$content .= __('Save Changes');
		$content .= '">&nbsp;&nbsp;';
		
		$content .= '<a href="https://wp.coleds.com/wp-admin/admin-post.php?action=sseo_yoast_import" class="button button-primary" onclick="return confirm(';
		$content .= __('Are you sure you want to copy all Yoast title and description tags to Simple SEO? This will overwrite all Simple SEO data.');
		$content .= ')">';
		$content .= __('Import Yoast SEO Data');
		$content .= '</a>&nbsp;&nbsp;';
		
		$content .= '<a href="https://wp.coleds.com/wp-admin/admin-post.php?action=sseo_rankmath_import" class="button button-primary" onclick="return confirm(';
		$content .= __('Are you sure you want to copy all Rank Math title and description tags to Simple SEO? This will overwrite all Simple SEO data.');
		$content .= ')">';
		$content .= __('Import Rank Math SEO Data');
		$content .= '</a>&nbsp;&nbsp;';
		
		$content .= '<a href="https://wp.coleds.com/wp-admin/admin-post.php?action=sseo_allinone_import" class="button button-primary" onclick="return confirm(';
		$content .= __('Are you sure you want to copy all All In One SEO title and description tags to Simple SEO? This will overwrite all Simple SEO data.');
		$content .= ')">';
		$content .= __('Import All In One SEO Data');
		$content .= '</a>&nbsp;&nbsp;';
		
		$content .= '</form>';
		
		$content .= '<p>Simple SEO ' . SSEO_VERSION;
		
		$content .= '</div>';
		
		echo $content;
    }
	
}

?>
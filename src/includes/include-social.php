<?php
/**
 * Social Icons
 *
 * @package Betheme
 * @author Muffin group
 * @link http://muffingroup.com
 */

$target = mfn_opts_get('social-target') ? '_blank' : false;
$size = 'small';

echo '<div class="social is-clearfix has-text-centered-mobile pad-top-1">';

	if (mfn_opts_get('social-skype')) {
    echo do_shortcode(sprintf('[icon_bar size="' .$size. '" target="' .$target. '" social="%1$s" icon="icon-%1$s" link="%2$s"]', 'skype', esc_attr(mfn_opts_get('social-skype'))));
	}
	if (mfn_opts_get('social-whatsapp')) {
    echo do_shortcode(sprintf('[icon_bar size="' .$size. '" target="' .$target. '" social="%1$s" icon="icon-%1$s" link="%2$s"]', 'whatsapp', esc_attr(mfn_opts_get('social-whatsapp'))));
	}
	if (mfn_opts_get('social-facebook')) {
    echo do_shortcode(sprintf('[icon_bar size="' .$size. '" target="' .$target. '" social="%1$s" icon="icon-%1$s" link="%2$s"]', 'facebook', esc_attr(mfn_opts_get('social-facebook'))));
	}
	if (mfn_opts_get('social-googleplus')) {
    echo do_shortcode(sprintf('[icon_bar size="' .$size. '" target="' .$target. '" social="%1$s" icon="icon-%1$s" link="%2$s"]', 'googleplus', esc_attr(mfn_opts_get('social-googleplus'))));
	}
	if (mfn_opts_get('social-twitter')) {
		echo do_shortcode(sprintf('[icon_bar size="' .$size. '" target="' .$target. '" social="%1$s" icon="icon-%1$s" link="%2$s"]', 'twitter', esc_attr(mfn_opts_get('social-twitter'))));
	}
	if (mfn_opts_get('social-vimeo')) {
		echo do_shortcode(sprintf('[icon_bar size="' .$size. '" target="' .$target. '" social="%1$s" icon="icon-%1$s" link="%2$s"]', 'vimeo', esc_attr(mfn_opts_get('social-vimeo'))));
	}
	if (mfn_opts_get('social-youtube')) {
		echo do_shortcode(sprintf('[icon_bar size="' .$size. '" target="' .$target. '" social="%1$s" icon="icon-%1$s" link="%2$s"]', 'youtube', esc_attr(mfn_opts_get('social-youtube'))));
	}
	if (mfn_opts_get('social-flickr')) {
		echo do_shortcode(sprintf('[icon_bar size="' .$size. '" target="' .$target. '" social="%1$s" icon="icon-%1$s" link="%2$s"]', 'flickr', esc_attr(mfn_opts_get('social-flickr'))));
	}
	if (mfn_opts_get('social-linkedin')) {
		echo do_shortcode(sprintf('[icon_bar size="' .$size. '" target="' .$target. '" social="%1$s" icon="icon-%1$s" link="%2$s"]', 'linkedin', esc_attr(mfn_opts_get('social-linkedin'))));
	}
	if (mfn_opts_get('social-pinterest')) {
		echo do_shortcode(sprintf('[icon_bar size="' .$size. '" target="' .$target. '" social="%1$s" icon="icon-%1$s" link="%2$s"]', 'pinterest', esc_attr(mfn_opts_get('social-pinterest'))));
	}
	if (mfn_opts_get('social-dribbble')) {
		echo do_shortcode(sprintf('[icon_bar size="' .$size. '" target="' .$target. '" social="%1$s" icon="icon-%1$s" link="%2$s"]', 'dribbble', esc_attr(mfn_opts_get('social-dribbble'))));
	}
	if (mfn_opts_get('social-instagram')) {
		echo do_shortcode(sprintf('[icon_bar size="' .$size. '" target="' .$target. '" social="%1$s" icon="icon-%1$s" link="%2$s"]', 'instagram', esc_attr(mfn_opts_get('social-instagram'))));
	}
	if (mfn_opts_get('social-behance')) {
		echo do_shortcode(sprintf('[icon_bar size="' .$size. '" target="' .$target. '" social="%1$s" icon="icon-%1$s" link="%2$s"]', 'behance', esc_attr(mfn_opts_get('social-behance'))));
	}
	if (mfn_opts_get('social-tumblr')) {
		echo do_shortcode(sprintf('[icon_bar size="' .$size. '" target="' .$target. '" social="%1$s" icon="icon-%1$s" link="%2$s"]', 'tumblr', esc_attr(mfn_opts_get('social-tumblr'))));
	}
	if (mfn_opts_get('social-tripadvisor')) {
		echo do_shortcode(sprintf('[icon_bar size="' .$size. '" target="' .$target. '" social="%1$s" icon="icon-%1$s" link="%2$s"]', 'tripadvisor', esc_attr(mfn_opts_get('social-tripadvisor'))));
	}
	if (mfn_opts_get('social-vkontakte')) {
		echo do_shortcode(sprintf('[icon_bar size="' .$size. '" target="' .$target. '" social="%1$s" icon="icon-%1$s" link="%2$s"]', 'vkontakte', esc_attr(mfn_opts_get('social-vkontakte'))));
	}
	if (mfn_opts_get('social-viadeo')) {
		echo do_shortcode(sprintf('[icon_bar size="' .$size. '" target="' .$target. '" social="%1$s" icon="icon-%1$s" link="%2$s"]', 'viadeo', esc_attr(mfn_opts_get('social-viadeo'))));
	}
	if (mfn_opts_get('social-xing')) {
		echo do_shortcode(sprintf('[icon_bar size="' .$size. '" target="' .$target. '" social="%1$s" icon="icon-%1$s" link="%2$s"]', 'xing', esc_attr(mfn_opts_get('social-xing'))));
	}
	if (mfn_opts_get('social-rss')) {
		echo do_shortcode(sprintf('[icon_bar size="' .$size. '" target="' .$target. '" social="%1$s" icon="icon-%1$s" link="%2$s"]', 'rss', esc_attr(mfn_opts_get('social-rss'))));
	}

	if (mfn_opts_get('social-custom-icon') &&  mfn_opts_get('social-custom-link')) {
    // $title = mfn_opts_get('social-custom-title');
    $icon = esc_attr(mfn_opts_get('social-custom-icon'));
    echo do_shortcode(sprintf('[icon_bar size="' .$size. '" target="' .$target. '" icon="%s" link="%s"]', $icon, esc_attr(mfn_opts_get('social-custom-link'))));
	}

echo '</div>';

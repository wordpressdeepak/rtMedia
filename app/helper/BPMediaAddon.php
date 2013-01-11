<?php

/**
 * Description of BPMediaAddon
 *
 * @author Gagandeep Singh <gagandeep.singh@rtcamp.com>
 * @author Joshua Abenazer <joshua.abenazer@rtcamp.com>
 */
if (!class_exists('BPMediaAddon')) {

    class BPMediaAddon {

        public function get_addons() {
            global $bp_media;
            $addons = array(
                array(
                    'title' => __('BuddyPress-Media FFMPEG Add-on', $bp_media->text_domain),
                    'img_src' => 'http://cdn.rtcamp.com/files/2012/09/ffmpeg-logo-240x184.png',
                    'product_link' => 'http://rtcamp.com/store/buddypress-media-ffmpeg-converter/',
                    'desc' => '<p>' . __('Add supports for more audio & video formats using open-source media-node.', $bp_media->text_domain) . '</p>
                        <p>' . __('Media node comes with automated setup script for Ubuntu/Debian.', $bp_media->text_domain) . '</p>',
                    'price' => '$49',
                    'demo_link' => 'http://demo.rtcamp.com/bpm-media',
                    'buy_now' => 'http://rtcamp.com/store/?add-to-cart=13677'
                ),
                array(
                    'title' => __('BuddyPress-Media Kaltura Add-on', $bp_media->text_domain),
                    'img_src' => 'http://cdn.rtcamp.com/files/2012/10/new-buddypress-media-kaltura-logo-240x184.png',
                    'product_link' => 'http://rtcamp.com/store/buddypress-media-kaltura/',
                    'desc' => '<p>' . __('Add support for more video formats using Kaltura video solution.', $bp_media->text_domain) . '</p>
                    <p>' . __('Works with Kaltura.com, self-hosted Kaltura-CE and Kaltura-on-premise.', $bp_media->text_domain) . '</p>',
                    'price' => '$99',
                    'demo_link' => 'http://demo.rtcamp.com/bpm-kaltura/',
                    'buy_now' => 'http://rtcamp.com/store/?add-to-cart=15446',
                    'coming_soon' => true
                )
            );
            foreach ($addons as $addon) {
                $this->addon($addon);
            }
        }

        public function addon($args) {
            global $bp_media;

            $defaults = array(
                'title' => '',
                'img_src' => '',
                'product_link' => '',
                'desc' => '',
                'price' => '',
                'demo_link' => '',
                'buy_now' => '',
                'coming_soon' => false,
            );
            $args = wp_parse_args($args, $defaults);
            extract($args);
            $addon = '<div class="bp-media-addon'.($coming_soon?' coming-soon':'').'">
                <a href="' . $product_link . '"  title="' . $title . '">
                    <img width="240" height="184" title="' . $title . '" alt="' . $title . '" src="' . $img_src . '">
                </a>
                <h4><a href="' . $product_link . '"  title="' . $title . '">' . $title . '</a></h4>
                <div class="product_desc">
                    ' . $desc . '
                </div>
                <div class="product_footer">
                    <span class="price alignleft"><span class="amount">' . $price . '</span></span>
                    <a class="add_to_cart_button  alignright product_type_simple"  href="' . $buy_now . '">' . __('Buy Now', BP_MEDIA_TXT_DOMAIN) . '</a>
                    <a class="alignleft product_demo_link"  href="' . $demo_link . '" title="' . $title . '">' . __('Live Demo', BP_MEDIA_TXT_DOMAIN) . '</a>
                </div>
            </div>';
            echo $addon;
        }

    }

}
?>

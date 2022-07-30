<?php


namespace Team\Members\Frontend;

/**
 * Shortcode Handler Class
 */
class Shortcode {

    /**
     * Initializes The Class
     */
    function __construct() {
        add_shortcode('woo-shortcodes', [$this, 'render_shortcode']);
    }

    /**
     * Shortcode Handler Function
     *
     * @param [type] $atts
     * @param string $content
     * 
     * @return void
     */
    public function render_shortcode($atts, $content = '') { ?>
        <h1 class="heading-1">hello</h1>


<?php  }
}

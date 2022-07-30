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
        add_shortcode('team_members', [$this, 'render_shortcode']);
    }

    /**
     * Shortcode Handler Function
     *
     * @param [type] $atts
     * @param string $content
     * 
     * @return void
     */
    public function Render_Shortcode($atts, $content = '') {

        $shortcode_array = shortcode_atts(array(
            'total-team-number' => 5,
            'image-position' => 'top',
            'show-all' => true,

        ), $atts);


        $total_team_number_to_show = $shortcode_array['total-team-number'];
        $image_position = $shortcode_array['image-position'];
        $show_archieves = $shortcode_array['show-all'];


?>
       


<?php  }
}

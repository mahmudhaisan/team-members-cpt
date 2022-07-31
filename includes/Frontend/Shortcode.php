<?php


namespace Team\Members\Frontend;

/**
 * Shortcode Handler Class
 */

use Team\Members\Admin\Teamcpt;

class Shortcode extends Teamcpt {


    // $this->team_cpt;

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
            'show-all' => 'yes',

        ), $atts);


        $total_team_number_to_show = $shortcode_array['total-team-number'];
        $image_position = $shortcode_array['image-position'];
        $show_archieves = $shortcode_array['show-all'];

        $team_member_cpt = $this->team_cpt;

        $team_member_args = [
            'post_type' => $team_member_cpt,
            'numberposts' => -1

        ];

        $team_member_posts = get_posts($team_member_args);

        // var_dump($team_member_posts);



        echo '<div class="container"><div class="row row-cols-1 row-cols-lg-2 row-cols-xl-4">';
        foreach ($team_member_posts as $team_member_post) {
            $team_member_post_id = $team_member_post->ID;
            $default_image = 'https://themesfinity.com/wp-content/uploads/2018/02/default-placeholder.png';
            $member_image = wp_get_attachment_image_src(get_post_thumbnail_id($team_member_post_id))[0];


            $team_member_post_name = $team_member_post->post_title;

            if ($team_member_post_name == '') {
                $team_member_post_name = 'Default';
            }

            $member_position_value = get_post_meta($team_member_post_id, 'meta_position_input')[0];

            // var_dump($member_position_value);
            // $member_bio_value = get_post_meta($team_member_post_id, 'team-member-bio');

            if (is_post_type_archive('post')) {
            }
            var_dump(is_post_type_archive('post'));

?>


            <div class="col">
                <div class="card radius-15">
                    <div class="card-body text-center">
                        <div class="p-4 border radius-15">


                            <?php if ($image_position == 'top') {
                                if ($member_image) { ?>
                                    <img src="<?php echo $member_image; ?>" width="110" height="110" class="rounded-circle shadow" alt="">
                                <?php  } else { ?>
                                    <img src="<?php echo $default_image; ?>" width="110" height="110" class="rounded-circle shadow" alt="">

                            <?php }
                            } ?>


                            <h5 class="mb-0 mt-5"><a href="#"><?php echo $team_member_post_name; ?></a></h5>
                            <p class="mb-3"><?php echo $member_position_value; ?></p>


                            <?php if ($image_position == 'bottom') {
                                if ($member_image) { ?>
                                    <img src="<?php echo $member_image; ?>" width="110" height="110" class="rounded-circle shadow" alt="">
                                <?php  } else { ?>
                                    <img src="<?php echo $default_image; ?>" width="110" height="110" class="rounded-circle shadow" alt="">

                            <?php }
                            } ?>

                        </div>
                    </div>
                </div>
            </div>

        <?php }

        echo '</div></div>'; ?>
        <div>

            <?php
            if ($show_archieves == 'yes') { ?>
                <div class="text-center">
                    <a href="#" class="btn btn-dark text-white">Show All</a>
                </div>
            <?php } ?>
        </div>
<?php }
}

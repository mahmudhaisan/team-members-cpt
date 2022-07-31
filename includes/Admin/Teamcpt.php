<?php


namespace Team\Members\Admin;



class Teamcpt {

    public $team_cpt = 'team_member_cpt';


    public function __construct() {
        add_action('init', [$this, 'Team_Member_Cpt']);
        add_action('init', [$this, 'Team_Member_taxonomy']);
        add_action('add_meta_boxes', [$this, 'meta_box_fields']);
        add_filter('enter_title_here', [$this, 'title_text_change']);
        add_action('save_post', [$this, 'save_meta_values']);
    }

    /**
     * Register a custom post type called "Team Member".
     *
     * @see get_post_type_labels() for label keys.
     */
    public function Team_Member_Cpt() {
        $labels = array(
            'name'                  => _x('Team Members', 'Post type general name', 'apperanttm'),
            'singular_name'         => _x('Team Member', 'Post type singular name', 'apperanttm'),
            'menu_name'             => _x('Team Members', 'Admin Menu text', 'apperanttm'),
            'name_admin_bar'        => _x('Team_Members', 'Add New on Toolbar', 'apperanttm'),
            'add_new'               => __('Add New Team Member', 'apperanttm'),
            'add_new_item'          => __('Add New Team Member', 'apperanttm'),
            'new_item'              => __('New Team Member', 'apperanttm'),
            'edit_item'             => __('Edit Team Member', 'apperanttm'),
            'view_item'             => __('View Team Member', 'apperanttm'),
            'all_items'             => __('All Team Members', 'apperanttm'),
            'search_items'          => __('Search Team Members', 'apperanttm'),
            'parent_item_colon'     => __('Parent Team Members:', 'apperanttm'),
            'not_found'             => __('No Team Members found.', 'apperanttm'),
            'not_found_in_trash'    => __('No Team Members found in Trash.', 'apperanttm'),
            'featured_image'        => _x('Team Member profile  Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'apperanttm'),
            'set_featured_image'    => _x('Set profile image ', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'apperanttm'),
            'remove_featured_image' => _x('Remove profile image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'apperanttm'),
            'use_featured_image'    => _x('Use as profile image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'apperanttm'),
            'archives'              => _x('Team Member archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'apperanttm'),
            'insert_into_item'      => _x('Insert into Team Member', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'apperanttm'),
            'uploaded_to_this_item' => _x('Uploaded to this Team Member', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'apperanttm'),
            'filter_items_list'     => _x('Filter Team Members list', 'Screen reader text for the filter ghghfhgs heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'apperanttm'),
            'items_list_navigation' => _x('Team Members list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'apperanttm'),
            'items_list'            => _x('Team Members list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'apperanttm'),
        );

        $args = array(
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array('slug' => 'team-member'),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => null,
            'supports'           => array('title', 'thumbnail',),
        );

        register_post_type($this->team_cpt, $args);
    }




    // Register Custom taxonomy
    function Team_Member_taxonomy() {

        $labels = array(
            'name'                       => _x('Member Types', 'Member Type General Name', 'apperanttm'),
            'singular_name'              => _x('Member Type', 'Member Type Singular Name', 'apperanttm'),
            'menu_name'                  => __('Member Type', 'apperanttm'),
            'all_items'                  => __('All Member Types', 'apperanttm'),
            'parent_item'                => __('Parent Member Type', 'apperanttm'),
            'parent_item_colon'          => __('Parent Member Type:', 'apperanttm'),
            'new_item_name'              => __('New Member Type', 'apperanttm'),
            'add_new_item'               => __('Add New Member Type', 'apperanttm'),
            'edit_item'                  => __('Edit Member Type', 'apperanttm'),
            'update_item'                => __('Update Member Type', 'apperanttm'),
            'view_item'                  => __('View Member Type', 'apperanttm'),
            'separate_items_with_commas' => __('Separate Member Types with commas', 'apperanttm'),
            'add_or_remove_items'        => __('Add or remove Member Types', 'apperanttm'),
            'choose_from_most_used'      => __('Choose from the most used', 'apperanttm'),
            'popular_items'              => __('Popular Member Types', 'apperanttm'),
            'search_items'               => __('Search Member Types', 'apperanttm'),
            'not_found'                  => __('Not Found', 'apperanttm'),
            'no_terms'                   => __('No Member Types', 'apperanttm'),
            'items_list'                 => __('Member Types list', 'apperanttm'),
            'items_list_navigation'      => __('Member Types list navigation', 'apperanttm'),
        );
        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => true,
            'public'                     => true,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => true,
            'show_tagcloud'              => true,
        );

        register_taxonomy('apperanttm_category', $this->team_cpt, $args);
    }


    // cpt  post title input text placeholder
    function title_text_change($title) {
        $title = "Enter Your Team Member's Name";
        return $title;
    }



    // meta box fields
    public function meta_box_fields() {

        // bio meta field
        add_meta_box(
            'team-member-bio',
            __('Bio', 'apperanttm'),
            [$this, 'meta_box_bio_cb'],
            $this->team_cpt
        );

        // member position meta
        add_meta_box(
            'team-member-position',
            __('Position', 'apperanttm'),
            [$this, 'meta_box_position_cb'],
            $this->team_cpt
        );
    }



    // meta box bio callback
    public function meta_box_bio_cb($post) {

        $meta_id = get_post_meta($post->ID);

?>

        <div>
            <textarea cols="80" rows="10" name="meta_bio_textarea" class="meta_bio_textarea" placeholder="add member's bio" value="5"><?php if (isset($meta_id['meta_bio_textarea'])) echo $meta_id['meta_bio_textarea'][0]; ?></textarea>
        </div>


    <?php }

    // meta box position callback
    public function meta_box_position_cb($post) {
        $meta_id = get_post_meta($post->ID);
    ?>
        <div>
            <input name="meta_position_input" type="text" class="meta_position_input" placeholder="add member's position" value="<?php if (isset($meta_id['meta_position_input'])) echo $meta_id['meta_position_input'][0]; ?>">
        </div>
<?php }


    // save meta values to database
    public function save_meta_values($post_id) {
        if (isset($_POST['meta_bio_textarea'])) {
            update_post_meta($post_id, 'meta_bio_textarea', $_POST['meta_bio_textarea']);
        }
        if (isset($_POST['meta_position_input'])) {
            update_post_meta($post_id, 'meta_position_input', $_POST['meta_position_input']);
        }
    }
}

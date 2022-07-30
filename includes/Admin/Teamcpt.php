<?php


namespace Team\Members\Admin;



class Teamcpt {

    public $team_cpt = 'team_member_cpt';


    public function __construct() {

        add_action('init', [$this, 'apperanttm_image_post_type']); //plugin init
        add_action('init', [$this, 'apperanttm_cpt_team_member_category']); //plugin init
    }

    public $a = 55;

    /**
     * Register a custom post type called "Team Member".
     *
     * @see get_post_type_labels() for label keys.
     */
    function apperanttm_image_post_type() {
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
            'hierarchical'       => true,
            'menu_position'      => null,
            'supports'           => array('title', 'thumbnail',),
        );

        register_post_type($this->team_cpt, $args);
    }




    // Register Custom category
    function apperanttm_cpt_team_member_category() {

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
            'hierarchical'               => false,
            'public'                     => true,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => true,
            'show_tagcloud'              => true,
        );

        global $team_cpt;
        register_taxonomy('apperanttm_category', $this->team_cpt, $args);
    }
}

<?php

/**
 * Plugin Name: Apparent Team Members
 * Plugin URI: https://github.com/mahmudhaisan/team-members
 * Description: This plugin allows to create a new team member custom post type where user will be able to add their members data.
 * Version: 1.0
 * Author: Mahmud haisan
 * Author URI: https://github.com/mahmudhaisan
 * Developer: Mahmud Haisan
 * Developer URI: https://github.com/mahmudhaisan
 * Text Domain: apperanttm
 * Domain Path: /languages
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 */

if (!defined('ABSPATH')) {
    exit;
}

require_once __DIR__ . '/vendor/autoload.php';





/**
 * The Main Plugin Class
 */

final class Member_Type_Class {



    /**
     *  * plugin version
     * @var string
     */
    const VERSION = '1.0';

    /**
     * Class Constructor
     */
    private function __construct() {
        $this->define_Plugin_comstants();
        register_activation_hook(__FILE__, [$this, 'activate']); // activation hook
        add_action('plugins_loaded', [$this, 'init_plugin']); //plugin init
    }

    /**
     * Initialize Singleton Instance
     */
    public static function init() {
        static $instance = false;

        if (!$instance) {
            $instance = new self();
        }

        return $instance;
    }

    /**
     * Define Plugin Constants
     */
    public function define_Plugin_comstants() {
        define('MEMBER_TYPE_PLUGIN_VERSION', self::VERSION);
        define('MEMBER_TYPE_FILE_PATH', __FILE__);
        define('MEMBER_TYPE_DIR_PATH', __DIR__);
        define('MEMBER_TYPE_PLUGIN_URL', plugins_url('', MEMBER_TYPE_FILE_PATH));
        define('MEMBER_TYPE_PLUGIN_ASSETS', MEMBER_TYPE_PLUGIN_URL . '/assets');
    }


    /**
     * plugin activation callback function
     *
     * @return void
     */
    public function activate() {

        update_option('member_type_plugin_version', MEMBER_TYPE_PLUGIN_VERSION);
    }

    /**
     * plugins activity after activating the plugin
     *
     * @return plugins basic things
     */
    public function init_plugin() {
        // works for backend
        if (is_admin()) {
            new  Team\Members\Admin(); // admin menu class initialize
        } else { // for elsewhere
            new  Team\Members\Frontend(); // Frontend class initialize
        }
    }
}


/**
 * Initialize Main Plugin
 *
 * @return \Member_Type_Class
 */

function woo_solutions() {
    return Member_Type_Class::init();
}

// calling the main class instance
woo_solutions();

<?php

namespace Team\Members\Admin;


/**
 * Menu class
 */
class Menu {
    public function __construct() {
        add_action('admin_menu', [$this, 'admin_menu_callback']);
    }

    /**
     * Register Admin Menu
     *
     * @return void
     */
    public function admin_menu_callback() {
        add_menu_page(__('Woo Solutions', 'woosolutions493'), __('Woo Solutions', 'woosolutions493'), 'manage_options', 'woo-solutions', [$this, 'solutions_callback'], 'dashicons-saved');
        add_submenu_page(__('woo-solutions', 'woosolutions493'), __('Dashboard Page', 'woosolutions493'), 'Solutions Dashboard', 'manage_options', 'woo-solutions', [$this, 'solutions_callback']);
        add_submenu_page(__('woo-solutions', 'woosolutions493'), __('Settings', 'woosolutions493'), __('Settings', 'woosolutions493'), 'manage_options', 'settings', [$this, 'settings_callback']);
    }


    /**
     * Dashboard Main Page Callback
     *
     * @return void
     */
    public function solutions_callback() {
        $dashboard = new Dashboard();
        $dashboard->dashboard_page();
    }

    /**
     * Woo Solutions Plugin Callback
     *
     * @return void
     */
    public function settings_callback() {
        $setiings_template = new Settings();
        $setiings_template->settings_page();
    }
}

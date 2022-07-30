<?php

namespace Team\Members;


/**
 * The Admin Class
 */
class Admin {

    function __construct() {
        new Admin\Menu();
        new Frontend\Shortcode();
        new Admin\Teamcpt();
    }
}

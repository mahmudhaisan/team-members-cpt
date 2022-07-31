<?php

namespace Team\Members;


/**
 * Frontend Handler Class
 */
class Frontend {
    function __construct() {
        new Frontend\Shortcode();
        new Frontend\Archieve();
        new Admin\Teamcpt();
    }
}

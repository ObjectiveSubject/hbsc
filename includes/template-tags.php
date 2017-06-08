<?php

/**
 * Custom Template Tags
 *
 * Place custom template tags in this file. 
 **/
function hbsc_opening_hours_today() {
    echo get_option( 'hbsc_hours_' . strtolower(date('l')) );
}

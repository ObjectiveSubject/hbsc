<?php

/**
 * Functions and definitions
 */

// Useful global constants
define( 'HBSC_VERSION',      '0.1.0' );
define( 'HBSC_URL',          get_stylesheet_directory_uri() );
define( 'HBSC_TEMPLATE_URL', get_template_directory_uri() );
//define( 'HBSC_PATH',         get_template_directory() . '/' );
define( 'HBSC_PATH',         dirname( __FILE__ ) . '/' );
define( 'HBSC_INC',          HBSC_PATH . 'includes/' );
define( 'HBSC_ASSETS',       HBSC_TEMPLATE_URL . '/assets/' );

// Include compartmentalized functions
require_once HBSC_INC . 'core.php';

require_once HBSC_INC . 'comments.php';
require_once HBSC_INC . 'post-types.php';
require_once HBSC_INC . 'shortcodes.php';
require_once HBSC_INC . 'taxonomies.php';
require_once HBSC_INC . 'template-tags.php';

// Include lib classes
include( HBSC_INC . 'libraries/extended-cpts.php' );
include( HBSC_INC . 'libraries/extended-taxos.php' );


include( HBSC_INC . 'models/BaseModel.php' );
include( HBSC_INC . 'models/Event.php' );

// Run the setup functions
HBSC\Core\setup();
HBSC\Comments\setup();
HBSC\Shortcodes\setup();
HBSC\PostTypes\setup();
HBSC\Taxonomies\setup();

<?php
namespace HBSC\Options;

/**
 * Set up site options.
 *
 * @return void
 */
function setup() {
	$n = function ( $function ) {
		return __NAMESPACE__ . "\\$function";
	};

	add_action( 'admin_init', $n('hbsc_register_settings') );
    add_action( 'admin_menu', $n('hbsc_register_settings_page') );

}

function display_hbsc_phone(){
?><input class="regular-text" type="text" name="hbsc_phone" value="<?php echo esc_attr(get_option('hbsc_phone'));?>"><?php
}

function display_hbsc_email(){
?><input class="regular-text" type="text" name="hbsc_email" value="<?php echo esc_attr(get_option('hbsc_email'));?>"><?php
}

function display_hbsc_location(){
?><input class="regular-text" type="text" name="hbsc_location" value="<?php echo esc_attr(get_option('hbsc_location'));?>"><?php
}

function display_hbsc_address(){
?><textarea cols="60" rows="6" name="hbsc_address"><?php echo get_option('hbsc_address');?></textarea><?php
}

function display_hbsc_hours_monday(){
	?><input class="regular-text" type="text" name="hbsc_hours_monday" value="<?php echo esc_attr(get_option('hbsc_hours_monday'));?>"><?php
}

function display_hbsc_hours_tuesday(){
	?><input class="regular-text" type="text" name="hbsc_hours_tuesday" value="<?php echo esc_attr(get_option('hbsc_hours_tuesday'));?>"><?php
}

function display_hbsc_hours_wednesday(){
	?><input class="regular-text" type="text" name="hbsc_hours_wednesday" value="<?php echo esc_attr(get_option('hbsc_hours_wednesday'));?>"><?php
}

function display_hbsc_hours_thursday(){
	?><input class="regular-text" type="text" name="hbsc_hours_thursday" value="<?php echo esc_attr(get_option('hbsc_hours_thursday'));?>"><?php
}

function display_hbsc_hours_friday(){
	?><input class="regular-text" type="text" name="hbsc_hours_friday" value="<?php echo esc_attr(get_option('hbsc_hours_friday'));?>"><?php
}

function display_hbsc_hours_saturday(){
	?><input class="regular-text" type="text" name="hbsc_hours_saturday" value="<?php echo esc_attr(get_option('hbsc_hours_saturday'));?>"><?php
}

function display_hbsc_hours_sunday(){
	?><input class="regular-text" type="text" name="hbsc_hours_sunday" value="<?php echo esc_attr(get_option('hbsc_hours_sunday'));?>"><?php
}

function display_hbsc_facebook(){
?><input class="regular-text" type="text" name="hbsc_facebook" value="<?php echo esc_attr(get_option('hbsc_facebook'));?>"><?php
}

function display_hbsc_instagram(){
?><input class="regular-text" type="text" name="hbsc_instagram" value="<?php echo esc_attr(get_option('hbsc_instagram'));?>"><?php
}

function display_hbsc_twitter(){
?><input class="regular-text" type="text" name="hbsc_twitter" value="<?php echo esc_attr(get_option('hbsc_twitter'));?>"><?php
}

function display_hbsc_youtube(){
?><input class="regular-text" type="text" name="hbsc_youtube" value="<?php echo esc_attr(get_option('hbsc_youtube'));?>"><?php
}

function hbsc_register_settings() {
	add_settings_section("contact_settings", "Contact", null, "main_settings_section");
	add_settings_section("hours_settings", "Opening Hours", null, "main_settings_section");
	add_settings_section("social_settings", "Social Media", null, "main_settings_section");
	
	register_setting("hbsc_settings", "hbsc_phone");
    add_settings_field("hbsc_phone", "Phone Number", "HBSC\Options\display_hbsc_phone", "main_settings_section", "contact_settings");
	
	register_setting("hbsc_settings", "hbsc_email");
    add_settings_field("hbsc_email", "Email Address", "HBSC\Options\display_hbsc_email", "main_settings_section", "contact_settings");
	
	register_setting("hbsc_settings", "hbsc_address");
    add_settings_field("hbsc_address", "Address", "HBSC\Options\display_hbsc_address", "main_settings_section", "contact_settings");
	
	register_setting("hbsc_settings", "hbsc_location");
    add_settings_field("hbsc_location", "Location", "HBSC\Options\display_hbsc_location", "main_settings_section", "contact_settings");
	
	register_setting("hbsc_settings", "hbsc_hours_monday");
    add_settings_field("hbsc_hours_monday", "Monday", "HBSC\Options\display_hbsc_hours_monday", "main_settings_section", "hours_settings");
	
	register_setting("hbsc_settings", "hbsc_hours_tuesday");
    add_settings_field("hbsc_hours_tuesday", "Tuesday", "HBSC\Options\display_hbsc_hours_tuesday", "main_settings_section", "hours_settings");
	
	register_setting("hbsc_settings", "hbsc_hours_wednesday");
    add_settings_field("hbsc_hours_wednesday", "Wednesday", "HBSC\Options\display_hbsc_hours_wednesday", "main_settings_section", "hours_settings");
	
	register_setting("hbsc_settings", "hbsc_hours_thursday");
    add_settings_field("hbsc_hours_thursday", "Thursday", "HBSC\Options\display_hbsc_hours_thursday", "main_settings_section", "hours_settings");
	
	register_setting("hbsc_settings", "hbsc_hours_friday");
    add_settings_field("hbsc_hours_friday", "Friday", "HBSC\Options\display_hbsc_hours_friday", "main_settings_section", "hours_settings");
	
	register_setting("hbsc_settings", "hbsc_hours_saturday");
    add_settings_field("hbsc_hours_saturday", "Saturday", "HBSC\Options\display_hbsc_hours_saturday", "main_settings_section", "hours_settings");
	
	register_setting("hbsc_settings", "hbsc_hours_sunday");
    add_settings_field("hbsc_hours_sunday", "Sunday", "HBSC\Options\display_hbsc_hours_sunday", "main_settings_section", "hours_settings");
	
	register_setting("hbsc_settings", "hbsc_facebook");
    add_settings_field("hbsc_facebook", "Facebook", "HBSC\Options\display_hbsc_facebook", "main_settings_section", "social_settings");
	
	register_setting("hbsc_settings", "hbsc_twitter");
    add_settings_field("hbsc_twitter", "Twitter", "HBSC\Options\display_hbsc_twitter", "main_settings_section", "social_settings");
	
	register_setting("hbsc_settings", "hbsc_instagram");
    add_settings_field("hbsc_instagram", "Instagram", "HBSC\Options\display_hbsc_instagram", "main_settings_section", "social_settings");
	
	register_setting("hbsc_settings", "hbsc_youtube");
    add_settings_field("hbsc_youtube", "Youtube", "HBSC\Options\display_hbsc_youtube", "main_settings_section", "social_settings");
}

function hbsc_register_settings_page() {
    add_menu_page( 
        __( 'General Settings' ),
        'General Settings',
        'edit_pages',
        'general-settings',
        'HBSC\Options\hbsc_settings'
    ); 
}

function hbsc_settings() {
    if ( isset( $_GET['settings-updated'] ) ) {
     add_settings_error( 'hbsc_messages', 'hbsc_message', __( 'Settings Saved', 'hbsc' ), 'updated' );
     }
     settings_errors( 'hbsc_messages' );
     ?>
     <div class="wrap">
        <h1><?php esc_html_e( 'General Settings' ); ?></h1>
        <form method="post" action="options.php">
        <?php
            settings_fields("hbsc_settings");
            do_settings_sections("main_settings_section");      
            submit_button(); 
        ?>
        </form>
    </div>
<?php }

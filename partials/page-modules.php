<div class="page-content">

<?php 
while( have_rows('module') ): the_row(); 

    $type = get_sub_field('module_type');
    $color = get_sub_field('module_background_color');
    $card_color = get_sub_field('module_card_background_color');
    $display_title = get_sub_field('display_module_title');
    $title = get_sub_field('module_title');
    $content = get_sub_field('module_content');
    $content_position = get_sub_field('module_content_position');
    $sidebar = get_sub_field('module_sidebar');
    $display_button = get_sub_field('display_module_button');
    $button_link = get_sub_field('module_button_link');
    $button_text = get_sub_field('module_button_text');
    $image = get_sub_field('module_image');

    $videoEmbed = get_sub_field('module_video_embed');

    $moduleTypeName = str_replace( '--', '-', $type );
    $moduleTypeFilePath = sprintf( dirname( __FILE__ ) . '/modules/%s.php', $moduleTypeName );

    if( file_exists( $moduleTypeFilePath ) )
    {
        include $moduleTypeFilePath;
    }

endwhile; 
?>

</div>

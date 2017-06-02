<?php 
while( have_rows('module') ): the_row(); 

    $type = get_sub_field('module_type');
    $color = get_sub_field('module_background_color');
    $cardColor = get_sub_field('module_card_background_color');
    $display_title = get_sub_field('display_module_title');
    $title = get_sub_field('module_title');
    $content = get_sub_field('module_content');
    $content_position = get_sub_field('module_content_position');
    $content_vertical_position = get_sub_field('module_content_vertical_position');
    $display_sidebar = get_sub_field('display_module_sidebar');
    $sidebar = get_sub_field('module_sidebar');
    $display_button = get_sub_field('display_module_button');
    $button_link = get_sub_field('module_button_link');
    $button_text = get_sub_field('module_button_text');
    $image = get_sub_field('module_image');

    $moduleTypeName = str_replace( '--', '-', $type );
    $moduleTypeFilePath = sprintf( dirname( __FILE__ ) . '/modules/%s.php', $moduleTypeName );

    $contentVerticalPosClass = 'u-py-4';
    $cardVerticalPosClass = '';

    // Put somewhere else
    switch( $content_vertical_position )
    {
        case 'start':
        $contentVerticalPosClass = 'u-pb-4';
        $cardVerticalPosClass = 'u-flex-self-start';
        break;

        case 'end':
            $contentVerticalPosClass = 'u-pt-4';
            $cardVerticalPosClass = 'u-flex-self-end';        
        break;        
    }

    if( file_exists( $moduleTypeFilePath ) )
    {
        include $moduleTypeFilePath;
    }

endwhile; 
?>
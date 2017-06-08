<?php
get_header();
?>
    <div class="site-content">
        <?php 
            $staffBoardSectionConfig = array(
                'title'       => 'Staff',
                'people-type' => array('staff')
            );

            include HBSC_PATH . 'partials/people/staff-board-section.php';
            
            $staffBoardSectionConfig = array(
                'title'       => 'Board',
                'people-type' => array('board')
            );
            
            include HBSC_PATH . 'partials/people/staff-board-section.php';
        ?>
    </div>
<?php get_footer(); ?>
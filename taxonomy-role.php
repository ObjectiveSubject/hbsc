<?php get_header(); ?>

	<div class="site-content">
        <section class="section section--staff-member u-bg-light-gray">
            <div class="section__content u-container">
                <header class="section__header">
                    <h1 class="section-title"><?php single_term_title(); ?></h1>
                </header>
                <div class="section__body u-text-center">
                    <?php if( is_tax( 'role', 'board' ) ) : 
                        $board_page = get_page_by_title( 'Board' );
                    ?>
                        <a href="<?php echo get_permalink( $board_page->ID ); ?>" class="button module-button">Board of Trustees Login</a>
                    <?php endif; ?>
                    <?php
                    
                    if ( have_posts() ) :                         
                        $cnt = 0;
                    ?>
                      <ul class="staff-member--list u-list-nostyle">
                      <?php 
                        while ( have_posts() ) : the_post();                            
                            $mod = $cnt % 2;
                            $imagePos = 'image--positionner-left';

                            if($cnt % 2)
                            {
                                $imagePos = 'image--positionner-right';
                            }
                            
                            $cnt++;
                      ?>
                        <li class="u-mt-3 staff-member--item">
                            <?php if ( has_term( 'board', 'role' ) ) : ?>
                            <div class="u-display-inline-block staff-member--name-title">
                                <span class="h2"><?php the_title(); ?></span>
                                <span class="h3"><?php echo get_field('person_title'); ?></span>
                            </div>
                            <?php else : ?>
                            <a href="<?php the_permalink(); ?>" class="u-display-inline-block staff-member--name-title">
                                <span class="h2"><?php the_title(); ?></span>
                                <span class="h3"><?php echo get_field('person_title'); ?></span>
                            </a>
                            <?php endif; ?>
                            <div class="image--positionner <?php echo $imagePos; ?>" style="background-image:url('<?php echo wp_get_attachment_image_src( get_post_thumbnail_id(), 'large')[0];?>');"></div>
                        </li>
                    <?php endwhile; ?>
                    </ul>
                    <?php endif; ?>
                </div>
            </div>
        </section>

	</div>

<?php get_footer(); ?>
<script>
    var StaffMemberList;

    jQuery(document).ready(function()
    {
        StaffMemberList = new StaffMember();
        StaffMemberList.init();
    });
</script>
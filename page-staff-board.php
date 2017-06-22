<?php
/**
 * General page template
 */

$roles = get_terms( 'role' );

get_header(); ?>

	<div class="site-content">
		
        <?php
        foreach ( $roles as $role ) :
        ?>
        <section class="section section--staff-member u-bg-light-gray">
            <div class="section__content u-container">
                <header class="section__header">
                    <h1 class="section-title"><?php echo $role->name; ?></h1>
                </header>
                <div class="section__body u-text-center">
                    <?php
                    $args = array(
                        'post_type' => 'people',
                        'posts_per_page' => -1,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'role',
                                'field' => 'slug',
                                'terms' => $role->slug,
                            )
                        )
                    );
                    $people = new WP_Query($args);
                    
                    if ( $people->have_posts() ) :                         
                        $cnt = 0;
                    ?>
                      <ul class="staff-member--list">
                      <?php 
                        while ( $people->have_posts() ) : $people->the_post();                            
                            $mod = $cnt % 2;

                            $imagePos = 'image--positionner-left';

                            if($cnt % 2)
                            {
                                $imagePos = 'image--positionner-right';
                            }
                            
                            $cnt++;
                      ?>
                        <li class="u-mt-3 staff-member--item">
                            <a href="<?php the_permalink(); ?>" class="u-display-inline-block staff-member--name-title">
                                <span class="h2"><?php the_title(); ?></span>
                                <span class="h3"><?php echo get_field('person_title'); ?></span>                                                              
                            </a>
                            <div class="image--positionner <?php echo $imagePos; ?>" style="background-image:url('<?php echo wp_get_attachment_image_src( get_post_thumbnail_id(), 'large')[0];?>');"></div>
                        </li>
                    <?php 
                        endwhile; 
                        wp_reset_postdata();
                    ?>
                    </ul>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        <?php endforeach; ?>

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
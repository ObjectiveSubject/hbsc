<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php 
    if( !empty( $post->post_title ) )
    {
?>
        <div class="post--image" style="background-image:url('<?php echo get_the_post_thumbnail_url();?>')"></div>
        <div class="post--content">
            <header class="entry-header">            
                <?php the_title( sprintf( '<h5 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h5>' ); ?>
            </header><!-- .entry-header -->        
<?php
        if( !empty( get_the_excerpt() ) )
        {
?>
            <div class="entry-summary">
                <?php echo shortText(get_the_excerpt()); ?>
            </div><!-- .entry-summary -->
<?php
        }
    }
?>
        </div>
</article><!-- #post-## -->

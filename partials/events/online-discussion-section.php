<?php
if( comments_open() || get_comments_number() )
{
?>
    <a name="join_the_discussion"></a>
    <section class="module module--basic u-bg-white">
        <div class="module__content u-container">
            <header class="module__header">
                <div class="module-title">
                    ONLINE DISCUSSION
                </div>
            </header>
            <div class="module__body">
<?php
            if( !empty( get_field('event_discussion_title') ) )
            {
?>
                <h5 class="u-text-center u-mb-4"><?php echo get_field('event_discussion_title'); ?></h5>
<?php
            }

			if( comments_open() || get_comments_number() )
            {
?>                
				<div class="comments--thread"><?php comments_template(); ?></div>
<?php
			}
?>
            </div>
        </div>
    </section>
<?php
}
?>
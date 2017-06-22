<?php
//if( $eventDisplayDiscussion )
//{
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
			if( comments_open() || get_comments_number() )
            {
				comments_template();
			}
?>
            </div>
        </div>
    </section>
<?php
}
?>
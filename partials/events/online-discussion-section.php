<?php
if( $eventDisplayDiscussion )
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
<div id="disqus_thread"></div>
<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
/*
var disqus_config = function () {
this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
this.page.url = '<?php echo get_permalink(); ?>';
this.page.identifier = '<?php echo dsq_identifier_for_post($post); ?>';
*/
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://harriet-beecher-stowe-center.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>

            </div>
        </div>
    </section>
<?php
}

?>
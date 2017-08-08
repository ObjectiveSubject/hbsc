<?php
    $title = get_sub_field('module_title');
    $moduleId = preg_replace('/\W+/', '-', strtolower($title));
?>
<section id="module-<?php echo $moduleId; ?>" class="module module--gallery">
    <div class="module__content u-container">
        <aside class="module__sidebar">
            <?php if( $sidebar ) : ?>
            <div class="sidebar">
                <?php echo $sidebar; ?>
            </div>
            <?php endif; ?>
        </aside>
        <div class="module__body">
            <?php if( $display_title ) : ?>
            <div class="module-title">
                <?php echo $title; ?>
            </div>
            <?php endif; ?>
            <div class="image-gallery-presentation">
                <?php echo $content; ?>
            </div>
            <?php $images = get_sub_field('gallery_images');
            if( $images ): ?>
                <ul class="image-gallery">
                    <?php foreach( $images as $image ): ?>
                        <li class="u-span-4">
                            <a href="<?php echo $image['url']; ?>" style="background-image: url(<?php echo $image['url']; ?>);" data-lightbox="hbsc-gallery" data-title="<?php echo "<h5>".$image['title']."</h5>"; echo "<p class='u-font-size-sm'>".$image['description']."</p>"; ?>"></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <?php if( count($images) > 12 ) : ?>
                <div class="u-text-center">
                    <a href="#" class="button module-button">Load more</a>
                </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php
$content = get_field('thought_of_the_month_content', 'option');
$image = get_field('thought_of_the_month_image', 'option');

if ($content) { ?>
    <div class="thought__month">
        <div class="flex flex-wrap lg:flex-nowrap lg:gap-4 items-center">
            <div class="thought__month__content flex flex-wrap order-2 lg:order-1 lg:w-1/2">
                <div class="tag mb-3">THOUGHT OF THE MONTH</div>
                <p class='font-book text-text'><?php echo $content; ?></p>
            </div>
            <div class="thought__month__image order-1 lg:order-2 lg:w-1/2">
                <?php fps_get_Image($image); ?>
            </div>
        </div>
    </div>
<?php
}
?>
<?php
$content = get_field('footer_info', 'option');
if ($content) { ?>
    <div class="bottom__bar">
        <div class="container mx-auto">
            <div class="flex justify-between lg:justify-end px-4">
                <div class="content w-full flex justify-center lg:justify-end">
                    <?php echo $content; ?>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>
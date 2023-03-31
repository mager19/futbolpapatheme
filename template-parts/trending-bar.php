<div class="trending__bar px-4">
    <div class="container mx-auto">
        <div class="flex gap-4 lg:gap-8 justify-between px-4 trending__bar__container">
            <div class="trending__bar--title items-center">
                <span>Trending »</span>
            </div>

            <div class="trending__bar--content">
                <?php
                $trending = get_field('trending_text', 'option');
                $trendingLink = get_field('trending_has_link', 'option');
                if ($trending && $trendingLink) { ?>
                    <a href="<?php echo $trendingLink ?>">
                        <p><?php echo $trending; ?></p>
                    </a>

                <?php
                } else { ?>
                    <p><?php echo $trending; ?></p>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
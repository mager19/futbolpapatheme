<!-- Topbar -->
<div class="topbar">
    <div class="container mx-auto">
        <div class="flex">
            <div class="w-full flex items-center justify-between px-4">
                <div class="topbar--left ">
                    <!-- Todo: Falta Link a Login -->

                    <?php if (is_user_logged_in()) { 

                        ?>
                        <a href="<?php echo wp_logout_url( home_url() ); ?>" class='flex items-center gap-1'>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19 3H18V1H16V3H8V1H6V3H5C3.9 3 3 3.9 3 5V19C3 19.5304 3.21071 20.0391 3.58579 20.4142C3.96086 20.7893 4.46957 21 5 21H19C20.11 21 21 20.11 21 19V5C21 4.46957 20.7893 3.96086 20.4142 3.58579C20.0391 3.21071 19.5304 3 19 3ZM19 19H5V9H19V19ZM19 7H5V5H19M12 10C14 10 15 12.42 13.59 13.84C12.17 15.26 9.75 14.25 9.75 12.25C9.75 11 10.75 10 12 10ZM16.5 17.88V18H7.5V17.88C7.5 16.63 9.5 15.63 12 15.63C14.5 15.63 16.5 16.63 16.5 17.88Z" fill="white" />
                            </svg>
                            <span>Logout</span>
                        </a>
                    <?php
                    } else { ?>
                       <a href="<?php echo esc_url(get_bloginfo('url')); ?>/my-account/" class='flex items-center gap-1'>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19 3H18V1H16V3H8V1H6V3H5C3.9 3 3 3.9 3 5V19C3 19.5304 3.21071 20.0391 3.58579 20.4142C3.96086 20.7893 4.46957 21 5 21H19C20.11 21 21 20.11 21 19V5C21 4.46957 20.7893 3.96086 20.4142 3.58579C20.0391 3.21071 19.5304 3 19 3ZM19 19H5V9H19V19ZM19 7H5V5H19M12 10C14 10 15 12.42 13.59 13.84C12.17 15.26 9.75 14.25 9.75 12.25C9.75 11 10.75 10 12 10ZM16.5 17.88V18H7.5V17.88C7.5 16.63 9.5 15.63 12 15.63C14.5 15.63 16.5 16.63 16.5 17.88Z" fill="white" />
                            </svg>
                            <span>Login</span>
                        </a>
                    <?php
                    } ?>


                </div>
                <div class="topbar--right">

                    <?php
                    $rows = get_field('social_icons', 'option');
                    if ($rows) { ?>
                        <div class="social__icons flex justify-center lg:justify-start items-center gap-x-2">
                            <?php
                            foreach ($rows as $row) { ?>
                                <a href="<?php echo $row['social_profile']; ?>" target='_blank'>
                                    <div class="icon-<?php echo $row['social_icon']['value']; ?>--d"></div>
                                </a>
                            <?php
                            } ?>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
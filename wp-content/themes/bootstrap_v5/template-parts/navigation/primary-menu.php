<?php if (!defined('ABSPATH')) { exit; } ?>
<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-lg-1 col-12 align-self-center d-flex justify-content-center py-lg-0 py-3 text-center">
                <?php if ( function_exists( 'the_custom_logo' ) ) : ?>
                    <a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo get_bloginfo( 'title' ) . the_custom_logo(); ?></a>
                <?php else :
                    echo get_bloginfo( 'title' );
                endif; ?>
            </div>
            <div class="col-lg-11 col-12">
                <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
                    <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="collapse" data-bs-target="#primaryNav" aria-controls="primaryNav" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="bi-list"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="primaryNav">
                        <?php
                        wp_nav_menu([
                            'theme_location'    => 'primary',
                            'container'         => 'ul',
                            'menu_class'        => 'navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4',
                            'list_item_class'        => 'nav-item',
                            'link_class'        => 'nav-link ps-3'
                        ]);
                        ?>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>
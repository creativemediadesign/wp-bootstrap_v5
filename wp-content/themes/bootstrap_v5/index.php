<?php if (!defined('ABSPATH')) { exit; }

get_header(); ?>

    <div class="content my-5">
        <div class="container">

            <?php while ( have_posts() ) : the_post();
                get_template_part('template-parts/content', 'blog');

                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;
            endwhile; ?>

        </div>
    </div>

<?php get_footer();
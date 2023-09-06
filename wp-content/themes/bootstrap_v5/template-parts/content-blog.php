<?php if (!defined('ABSPATH')) { exit; } ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php the_content(); ?>
</article>
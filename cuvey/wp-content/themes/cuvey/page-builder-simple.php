<?php
/*
 * Template Name: Page Builder Template without header/footer                 
 *
 */
// Exit if accessed directly
if (!defined('ABSPATH')) {echo '<h1>Forbidden</h1>'; exit();} get_header(); ?>

<?php if (have_posts()) : ?>

    <?php while (have_posts()) : the_post(); ?>


                <?php the_content(); ?>


      

    <?php endwhile; ?>

<?php else : ?>

    <?php get_template_part('partials/nothing-found'); ?>

<?php endif; ?>
</div><!--wrapper end-->
<?php get_footer(); ?>
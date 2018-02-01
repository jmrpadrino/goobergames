<?php get_header(); ?>
<?php the_post(); ?>
<?php the_title('<h1 class="game_title">','</h1>'); ?>
<?php the_excerpt(); ?>
<?php the_content(); ?>
<?php echo edit_post_link( __( 'Edit this post', 'goobergames' ), '<span class="edit-link">', '</span>' ); ?>
<?php get_footer(); ?>
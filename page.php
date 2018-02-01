<?php get_header(); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                The Custom Tag Template for News
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <?php 
                    if (have_posts()){ while (have_posts()): the_post();
                ?>
                <article class="col-md-4">
                    <h1><?php the_title(); ?></h1>
                    <div class="item-contet">
                    <?php the_content(); ?>
                    </div>
                </article>
                <?php endwhile; }else{ echo 'no nay'; } ?>
            </div>
            <div class="col-md-4">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
<?php get_footer(); ?>
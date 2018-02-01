<?php get_header(); ?>
        <?php get_template_part('template-parts/home-animation'); ?>
        <section id="gameList" class="gameList">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="row">
                            <div class="col-xs-6 col-md-3">
                                <div class="game-box text-center animated fadeInUp">
                                    <article>
                                        <div class="feat-img">
                                            <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/assets/png/game1.png" alt="Game Title">
                                        </div>
                                        <h2>Goober Candy Craze</h2>
                                    </article>
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-3">
                                <div class="game-box text-center animated fadeInUp">
                                    <article>
                                        <div class="feat-img">
                                            <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/assets/png/game2.png" alt="Game Title">
                                        </div>
                                        <h2>Goober Drop!</h2>
                                    </article>
                                </div>
                            </div>
                            <div class="clearfix visible-xs"></div>
                            <div class="col-xs-6 col-md-3">
                                <div class="game-box text-center animated fadeInUp">
                                    <article>
                                        <div class="feat-img">
                                            <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/assets/png/game3.png" alt="Game Title">
                                        </div>
                                        <h2>Goober Word Search</h2>
                                    </article>
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-3">
                                <div class="game-box text-center animated fadeInUp">
                                    <article>
                                        <div class="feat-img">
                                            <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/assets/png/game4.png" alt="Game Title">
                                        </div>
                                        <h2>Century Wars</h2>
                                    </article>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <a href="#" class="button-link animated fadeInLeft">Show all games</a>
                        <a href="" class="button-link animated fadeInRight">I need support</a>
                    </div>
                </div>
            </div>
        </section>
        <section id="homeCta" class="homeCta">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 text-center animated fadeInUp">
                        <h2 class="seoTitle">Hey gamer, welcome to Goober games!</h2>
                        <p class="seoContent">One rule around here: explore, joke around, <span class="gonuts">go nuts!</span></p>
                    </div>
                </div>
            </div>
        </section>
        <section id="div" class="featuresContainer">
            <div class="curve">
                <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/assets/svg/fondo.svg" alt="Goober Games - Nice curves" >
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-md-push-5 features">
                        <div class="row no-gutters">
                            <div class="col-sm-6 col-sm-push-6 space-breaker">
                                <h3 class="featuredContainerTitle">The Company</h3>
                                <p class="featuredContainerText">Who is Goober?</p>
                            </div>
                            <div class="col-sm-6 col-sm-pull-6">
                                <img class="img-responsive img-thumbnail pull-right" src="<?php echo get_template_directory_uri(); ?>/assets/jpg/picture1.jpg" alt="Whatagoober - The Company">
                            </div>
                        </div>
                        <div class="row no-gutters">
                           <div class="col-sm-6 text-right space-breaker">
                                <h3 class="featuredContainerTitle">Blog</h3>
                                <p class="featuredContainerText">News, tips and cool stuff!</p>
                            </div>
                            <div class="col-sm-6">
                                <img class="img-responsive img-thumbnail" src="<?php echo get_template_directory_uri(); ?>/assets/jpg/picture2.jpg" alt="Whatagoober - Blog">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 col-md-pull-7">
                        <img class="img-responsive pull-right animated fadeInUp" src="<?php echo get_template_directory_uri(); ?>/assets/png/hand.png" alt="Goober Games - Goober candy Craze">
                    </div>
                </div>
            </div>
        </section>
<?php get_footer(); ?>
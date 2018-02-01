                    <div class="col-md-8">
                        <?php 
                            wp_nav_menu( array(
                                'theme_location'    => 'main-nav',
                                'depth'             => 2,
                                'container'         => 'div',
                                'container_class'   => 'hidden-sm hidden-xs pull-right no-transition',
                                'container_id'      => 'desktop-navbar',
                                'menu_class'        => 'nav navbar-nav sentry-nav-list',
                                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                                'walker'            => new wp_bootstrap_navwalker())
                            );
                        ?>
                    </div>                    
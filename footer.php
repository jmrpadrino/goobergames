</main>
    <footer id="gooberFooter" class="gooberFooter">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <a class="logoLink" href="#">
                        <div class="gooberLogo-container">
                            <img class="gooberLogo footer wow shake" src="<?php echo get_template_directory_uri(); ?>/assets/svg/logo.svg" alt="Goober Games - Logo" width="120" height="60">
                        </div>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <ul class="footerNav list-inline text-center">
                        <li class="active"><a href="#">The Company</a></li>
                        <li><a href="#about">Our Games</a></li>
                        <li><a href="#support">Support</a></li>
                        <li><a href="#blog">Blog</a></li>
                        <li><a href="#contact">Reach Us</a></li>
                    </ul>
                </div>
            </div>
            <div class="row copyAndTerms">
                <div class="col-sm-6"><small>Copyright &copy; 2017 Goober Games, Inc. All rights reserved</small></div>
                <div class="col-sm-6 text-right">
                    <ul class="alterPages list-inline">
                        <li><a href="#terms"><small>Terms of service</small></a></li>
                        <li><a href="#privacy"><small> policy</small></a></li>
                        <li><a href="#report"><small>Report a problem</small></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <?php wp_footer(); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/TweenMax.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.parallax.min.js"></script>
    <script>
        $('#scene').parallax();

        window.onload = function(){$('.anim-loader').hide()}

        var $emitter = $('#emitter');
        var tl = new TimelineLite(); 


        Math.randMinMax=function(t,n,a){
            var r=t+Math.random()*(n-t);
            return a&&(r=Math.round(r)),r;
        }

        for (var i = 0; i < 80; i++){
            var x = Math.randMinMax(-200, 200),
                y = Math.randMinMax(-200, 50),
                z = Math.randMinMax(-200, 200),
                degree = Math.randMinMax(0, 360),
                $particle = $('<div class="particle" />'); //create a new particle
                //even particles will be larger circles
            if(i%2 == 0){
                console.log("i = " + i%2)
                TweenLite.set($particle, {width:40, height:40})
            }
            
            
            $particle.css('opacity', 1);  //change color          
            $emitter.append( $particle );  //add it to emitter
        
        
            //for each particle insert a repeating tween into a timeline with a random duration, random repeatDelay at a random time
            tl.to($particle, Math.randMinMax(1.5, 3), {
                x:x,
                y:y,
                z:z,
                opacity:0,
                repeat:-1,
                repeatDelay:Math.randMinMax(0, 20),
                ease: Power3.easeOut
                }, Math.randMinMax(0, 4));
        }

    </script>
</body>
</html>
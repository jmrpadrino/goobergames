<?php 

require_once('include/wp_bootstrap_navwalker.php'); //Bootstrap menu walker
require_once('include/class-tgm-plugin-activation.php'); //For required plugins activation
require_once('include/goober_cpt.php'); //Register theme Custom Post Types (CPT)
require_once('include/goober_taxonomies.php'); //Register theme Taxonomies
require_once('include/goober_metaboxes.php'); //Register Metaboxes for CPT
require_once('include/goober_breadcrumbs.php'); //Breadcrumbs Helper

function goober_setup(){
    
    // Theme translation
    load_theme_textdomain( 'goobergames', get_template_directory() . '/languages/' );
    /* Theme components */
    add_theme_support( 'automatic-feed-links' );

    add_theme_support( 'html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
    ) );

    add_theme_support( 'post-thumbnails' );

    /* Enqueuing Styles and Sripts */

    function add_theme_scripts() {

        if (!is_admin())   
        {  
            wp_deregister_script('jquery');  

            // Load a copy of jQuery from the Google API CDN  
            // The last parameter set to TRUE states that it should be loaded  
            // in the footer.  
            wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js', FALSE, '1.11.0', TRUE);  

            wp_enqueue_script('jquery');  
        }
        // Including Bootstrap, Owlcarousel and PrettyPhoto files
        wp_enqueue_style( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css', array(), '3.3.7', 'all' );
        wp_enqueue_style( 'bootstrap_theme', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css', array(), '3.3.7', 'all' );
        wp_enqueue_style( 'owlslider', get_template_directory_uri() . '/css/owl.carousel.min.css', array(), '2.2.0', null );
        wp_enqueue_style( 'owltheme', get_template_directory_uri() . '/css/owl.theme.min.css', array(), '2.2.0', null );
        wp_enqueue_style( 'owltransition', get_template_directory_uri() . '/css/owl.transitions.css', array(), '2.2.0', null );
        wp_enqueue_style( 'animate', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css', array(), '2.2.0', null );
        wp_enqueue_script( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array ( 'jquery' ), '3.3.7', true);
        wp_enqueue_script( 'owlsliderjs', get_stylesheet_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), null, true );

        // Including theme styles
        wp_enqueue_style( 'goober_common', get_template_directory_uri() . '/css/main.css', array(), '1.1', 'all');
        wp_enqueue_style( 'goober_animations', get_template_directory_uri() . '/css/goober_animations.css', array(), '1.1', 'all');
        wp_enqueue_style( 'goober_fonts', 'https://fonts.googleapis.com/css?family=Dosis:400,700|Open+Sans', array(), '', 'all');
        wp_enqueue_style( 'style', get_stylesheet_uri() );
        //https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js
        wp_register_script( "goober", 'https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js', array('jquery') );
        wp_register_script( "wow", get_template_directory_uri() .'/js/scripts.js', array('jquery') );
        wp_localize_script( 'goober', 'gooberAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));        

        wp_enqueue_script( 'goober', get_template_directory_uri() . '/js/scripts.js', array ( 'jquery' ), '1.1', true);


        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
        }
    }
    add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );

    /* Theme Navigation */

    if (function_exists('register_nav_menus')) {
        register_nav_menus( array(
            'main-nav' => __( 'Main Navigation', 'goobergames' ),
            'footer-nav' => __( 'Footer Navigation', 'goobergames' ),
            'bottom-nav' => __( 'Bottom Navigaton', 'goobergames'),
        ) );
    };

    /* Create menu items */
    function add_items_to_menu($oldname, $oldtheme = false) {
        /* Create header and footer menus */
        $menus = array(
            'Main Navigation'  => array(
                'home' => __( 'Home', 'goobergames' ),
                'our-story'  => __( 'Our Story', 'goobergames' ),
                'products' => __( 'Products', 'goobergames' ),
                'support'  => __( 'Support', 'goobergames' ), 
                'contact-us' => __( 'Contact US', 'goobergames' )
            ), 
            'Footer Navigation' => array(
                'home' => __( 'Home', 'goobergames' ),
                'our-story'  => __( 'Our Story', 'goobergames' ),
                'products' => __( 'Products', 'goobergames' ),
                'support'  => __( 'Support', 'goobergames' ), 
                'contact-us' => __( 'Contact US', 'goobergames' )
            ),
            'Bottom Navigaton' => array(
                'sitemap' => __('Sitemap','goobergames'), 
                'legal-notice' => __('Legal Notice','goobergames'), 
                'terms-conditions' => __('Terms & Conditions','goobergames')
            )
        );
        foreach($menus as $menuname => $menuitems) {
            $menu_exists = wp_get_nav_menu_object($menuname);
            // If it doesn't exist, let's create it.
            if ( !$menu_exists) {
                $menu_id = wp_create_nav_menu($menuname);
                foreach($menuitems as $slug => $item) {
                    wp_update_nav_menu_item(
                        $menu_id, 0, array(
                            'menu-item-title'  => $item,
                            'menu-item-object'  => 'page',
                            'menu-item-object-id'  => get_page_by_path($slug)->ID,
                            'menu-item-type' => 'post_type',
                            'menu-item-status'  => 'publish'
                        )
                    );
                }
            }
        }
    }
    add_action('after_switch_theme', 'add_items_to_menu', 10 ,  2);

    /* Theme Sidebar(s) */

    register_sidebar( array(
        'name'          => __( 'Footer Subscription', 'goobergames' ),
        'id'            => 'widget_area_support',
        'description'   => __( 'Shows on the footer area of the website.', 'goobergames' ),
        'before_widget' => '<aside id="%1$s" class="widget suscribe %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    /* IMPORTANT ISSUE */
    /* Theme page creation */
    function goober_page_creation(){

        /* Please add the pages that worpress will create automaticaly as them are needed, write the title of the page as it will be plubished */
        $theme_pages = array(
            __('Home','goobergames'),
            __('The Company','goobergames'),
            __('Our Games','goobergames'),
            __('Support','goobergames'),
            __('Blog','goobergames'),
            __('Reach Us','goobergames')
        );

        /* Verify if page exists for page creation*/
        foreach ( $theme_pages as $theme_page ){
            /* transform the page name to slug */
            //$page_title_transform = strtolower( str_replace(' ', '-', $theme_page) );

            /* get wordpress page */
            //$page = get_page_by_path( $page_title_transform );

            $page = get_page_by_title( $theme_page );

            if ( $page == NULL ){
                // Create the page   
                $page_to_be_created = array(
                    'post_title'    => $theme_page,
                    'post_content'  => '',
                    'post_status'   => 'publish',
                    'post_author'   => get_current_user_id(),
                    'post_type'     => 'page',
                );

                // Insert the post into the database
                wp_insert_post( $page_to_be_created, '' );
            }

        }
    }
    add_action( 'init', 'goober_page_creation' );
    /*-------------------------*/

    // goober register required plugins
    function goobergames_register_required_plugins() {

        $plugins = array(
            array(
                'name'      => 'Meta Box',
                'slug'      => 'meta-box',
                'required'  => true,
                'force_deactivation' => true,
                'is_automatic' => true
            ),
            array(
                'name'      => 'WP Super Cache',
                'slug'      => 'wp-super-cache',
                'required'  => false,
            ),
            array(
                'name'      => 'qTranslate X',
                'slug'      => 'qtranslate-x',
                'required'  => true,
            )
        );

        $config = array(
            'id'           => 'goobergames',                 // Unique ID for hashing notices for multiple instances of TGMPA.
            'default_path' => '',                      // Default absolute path to bundled plugins.
            'menu'         => 'tgmpa-install-plugins', // Menu slug.
            'has_notices'  => true,                    // Show admin notices or not.
            'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
            'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
            'is_automatic' => true,                   // Automatically activate plugins after installation or not.
            'message'      => '',                      // Message to output right before the plugins table.
        );
        tgmpa( $plugins, $config );
    }
    add_action( 'tgmpa_register', 'goobergames_register_required_plugins' );

}
add_action( 'after_setup_theme', 'goober_setup' );



/* Send ajax mail */
function send_mail_via_ajax(){

    $fname = filter_input(INPUT_POST, 'fname');
    $lname = filter_input(INPUT_POST, 'lname');
    $email = filter_input(INPUT_POST, 'email');
    $phone = filter_input(INPUT_POST, 'phone');
    $company = filter_input(INPUT_POST, 'company');
    $region = filter_input(INPUT_POST, 'region');
    $inquiry = filter_input(INPUT_POST, 'inquiry');

    // Google reCaptcha features
    $secret = "6LcxGBIUAAAAAFb8fviBHQGneE7KjP7XJLuUwDql";
    $response = null;

    $path = 'https://www.google.com/recaptcha/api/siteverify?';
    $path .= 'secret=' . $secret;
    $path .= '&remoteip=' . $_SERVER["REMOTE_ADDR"];
    $path .= '&v=php_1.0';
    $path .= '&response='. $_POST["g-recaptcha-response"];

    $response = file_get_contents( $path );

    $answers = json_decode($response, true);

    if ( $response != null && trim($answers ['success']) == true ) {

        ob_start();
?>
<table border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#cccccc" style="width: 100%;">
    <table width="600" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#ffffff" style="margin-top:35px;margin-bottom:35px;font-family:Verdana !important;">
        <tr style="background-color: #232323;">
            <td align="center">
                <img src="http://goober.choclomedia.com/wp-content/themes/goober/images/goober-wellhead-systems-logo-footer.png" width="280" style="margin-top:35px;margin-bottom:35px;">
            </td>
        </tr>
        <tr>
            <td style="color:#222222!important; padding: 30px;">
                <h1 style="text-align:center;font-size:36px;color:#ff3c00;text-transform:uppercase;font-weight:800;">Web Contact</h1>
                <h2 style="color:#ff3c00;text-transform:uppercase;font-weight:800;margin-top: 35px;">Contact Information</h2>
                <p><strong>Full Name:</strong> <?php echo $fname ?> <?php echo $lname ?></p>
                <p><strong>Phone:</strong> <a href="phone:<?php echo $phone ?>"><?php echo $phone ?></a></p>
                <p><strong>Email:</strong> <a href="mailto:<?php echo $email ?>"><?php echo $email ?></a></p>
                <p><strong>Company:</strong> <?php echo $company ?></p>
                <p><strong>Region:</strong> <?php echo $region ?></p>

                <h2 style="color:#ff3c00;text-transform:uppercase;font-weight:800;margin-top: 70px;">Inquiry</h2>
                <p style="font-size:20px;"><?php echo $inquiry ?></p>
            </td>
        </tr>
        <tr style="background-color: #FF3C00; color: #ffffff; margin-top: 35px;">
            <td align="center">
                <p style="margin-top:35px;margin-bottom:35px;">This mail was sent via goober Wellhead Systems Website, on <?php echo date("d/m/Y") ?> at <?php echo date("h:i") ?></p>
            </td>
        </tr>
    </table>
</table>
<?php
            $body = ob_get_clean();

        //$contacto = get_page_by_path('contact');
        //$mail_admin = get_post_meta($contacto->ID, 'em', true);
        //$to = 'colocar un solo email';
        $subject = 'New contact message - goober Wellhead Systems';
        $asunto = 'New contact message - goober Wellhead Systems';

        require_once ABSPATH . WPINC . '/class-phpmailer.php';

        $mail = new PHPMailer( true );

        //$mail->AddAddress($to);
        $mail->AddAddress('jrodriguez@webcreek.com', 'First Contact');
        $mail->AddAddress('ppazmino@webcreek.com', 'Second Contact');
        $mail->FromName = 'goober Wellhead Systems - Contact';
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->IsHTML();
        $mail->CharSet = 'utf-8';
        $mail->Send();
        echo trim($answers ['success']);
        /*try {
            $mail->AddAddress($to);
            $mail->FromName = 'goober Wellhead Systems - Contact';
            $mail->Subject = $subject;
            $mail->Body = $body;
            $mail->IsHTML();
            $mail->CharSet = 'utf-8';
            $mail->Send();
            echo trim($answers ['success']);
        } catch (phpmailerException $e) {
          echo $e->errorMessage(); //Pretty error messages from PHPMailer
        } catch (Exception $e) {
            echo trim($answers ['success']);
          echo $e->getMessage(); //Boring error messages from anything else!
        }*/
    }else{
        echo trim($answers ['success']);
    }
}
add_action('wp_ajax_send_mail_via_ajax', 'send_mail_via_ajax');
add_action('wp_ajax_nopriv_send_mail_via_ajax', 'send_mail_via_ajax');
?>
<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<footer class="mt-large py-3 footer-bg">
        <div class="container pt-5">

            <div class="row mt-5 mb-5">
                <div class="col-md-6">
                    <h3 class="font-weight-bold">RooDigital<span style="font-weight: 300;">&trade;</span></h3>
                </div>
                <div class="col-md-6">
                    <a href="#top"><i class="fa fa-chevron-circle-up float-right" style="font-size: 3rem;" aria-hidden="true"></i></a>
                </div>
			</div>
			
            <div class="row mt-5 mb-5">

                <div class="col-md-12">
                    <div class="row">
                        <div class="col">
                            <p><b>Sitemap:</b></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Main Menu -->
                            <?php wp_nav_menu(
                                array(
                                    'theme_location'  => 'footer',
                                    'container_class' => '',
                                    'container_id'    => 'navbarNavDropdown',
                                    'menu_class'      => 'navbar-nav ml-auto',
                                    'fallback_cb'     => '',
                                    'menu_id'         => 'footer-menu',
                                    'depth'           => 2,
                                    'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
                                )
                            ); ?>
                        </div>
                    </div>
				</div>

            </div>

            <div class="row mt-3 mb-3">

                <div class="col-md-12">
                    <div class="row">
                        <div class="col footer-icons">
                            <?php get_template_part( 'sidebar-social' ); ?>
                        </div>
                    </div>
				</div>

            </div>
				
            <div class="row mt-3 mb-5">
                <div class="col text-center">
                    <p><span class="text-white-50">Copyright &copy; <?php echo date("Y"); ?> Roo Digital<br>ABN - 40 343 075 283</span></p>
                </div>
            </div>

        </div>
    </footer>

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

<script>
    $(document).ready(function() { 
        $('[data-toggle="tooltip"]').tooltip();    
    });

    // Takes the url parameters and adds the values to the fields e.g. https://roo.digital/survey/#name=bob&email=bob@hotmail.com
    var hashParams = window.location.hash.substr(1).split('&'); // substr(1) to remove the `#`
    for(var i = 0; i < hashParams.length; i++)
    {
        var p = hashParams[i].split('=');
        document.getElementById(p[0]).value = decodeURIComponent(p[1]);
    }

    // Send an event for Google analytics Goals on form submission
    document.addEventListener( 'wpcf7mailsent', function( event ) {
    gtag('event', 'click', {
            'event_category': 'Form',
            'event_label': 'Submit',
            'value': '1'
            }
        )
    });
</script>

<!-- Animate on scroll library -->
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script> 

    document.querySelectorAll('.fadeRight').forEach(div => {
        div.setAttribute('data-aos', 'fade-right');
    });

    document.querySelectorAll('.fadeLeft').forEach(div => {
        div.setAttribute('data-aos', 'fade-left');
    });

    document.querySelectorAll('.fadeUp' ).forEach(div => {
        div.setAttribute('data-aos', 'fade-up');
    });

    document.querySelectorAll('.fadeIn' ).forEach(div => {
        div.setAttribute('data-aos', 'fade-in');
    });

    AOS.init({
        // Global settings:
        disable: 'mobile',
        offset: 200,
        duration: 600,
        once: true
    });
</script>

<!-- Event snippet for Contact form submission conversion page
In your html page, add the snippet and call gtag_report_conversion when someone clicks on the chosen link or button. -->
<script>
    function gtag_report_conversion(url) {
    var callback = function () {
        if (typeof(url) != 'undefined') {
        window.location = url;
        }
    };
    gtag('event', 'conversion', {
        'send_to': 'AW-696882835/bMmzCJuL2rkBEJOtpswC',
        'event_callback': callback
    });
    return false;
    }

    // Hamburgers
    var forEach=function(t,o,r){if("[object Object]"===Object.prototype.toString.call(t))for(var c in t)Object.prototype.hasOwnProperty.call(t,c)&&o.call(r,t[c],c,t);else for(var e=0,l=t.length;l>e;e++)o.call(r,t[e],e,t)};
    
    var hamburgers = document.querySelectorAll(".hamburger");
    if (hamburgers.length > 0) {
      forEach(hamburgers, function(hamburger) {
        hamburger.addEventListener("click", function() {
          this.classList.toggle("is-active");
        }, false);
      });
    }
</script>

</body>

</html>


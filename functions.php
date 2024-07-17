<?php

function load_slick_carousel_styles()
{
    if (is_page_template('template-home.php')) {
        // Enqueue slick-carousel styles
        wp_enqueue_style(
            'slick-theme',
            'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css',
            array(),
            null,
            'all'
        );
        wp_enqueue_style(
            'slick',
            'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css',
            array(),
            null,
            'all'
        );
    }
}
add_action('wp_enqueue_scripts', 'load_slick_carousel_styles');

function load_slick_carousel_scripts()
{
    if (is_page_template('template-home.php')) {
        // Enqueue jQuery
        wp_enqueue_script('jquery');

        // Enqueue slick-carousel script
        wp_enqueue_script(
            'slick-js',
            'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js',
            array('jquery'),
            null,
            true
        );

        // Add custom inline script
        wp_add_inline_script('slick-js', "
            jQuery(document).ready(function($) {
                $('.slick-slider-faculty').slick({
                    dots: false,
                    arrows: false,
                    infinite: true,
                    speed: 500,
                    autoplay: false,
                    autoplaySpeed: 2500,
                    adaptiveHeight: true,
                    lazyLoad: 'ondemand',
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    responsive: [{
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: 3,
                                slidesToScroll: 1
                            }
                        },
                        {
                            breakpoint: 600,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 1
                            }
                        },
                        {
                            breakpoint: 480,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1
                            }
                        }
                    ]
                });

                $('.faculty-slick-prev').click(function() {
                    $('.slick-slider-faculty').slick('slickPrev');
                });

                $('.faculty-slick-next').click(function() {
                    $('.slick-slider-faculty').slick('slickNext');
                });

                $('.slick-slider-global-experts').slick({
                    dots: false,
                    arrows: false,
                    infinite: true,
                    speed: 500,
                    autoplay: false,
                    autoplaySpeed: 2500,
                    adaptiveHeight: true,
                    lazyLoad: 'ondemand',
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    responsive: [{
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: 3,
                                slidesToScroll: 1
                            }
                        },
                        {
                            breakpoint: 600,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 1
                            }
                        },
                        {
                            breakpoint: 480,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1
                            }
                        }
                    ]
                });

                $('.global-experts-slick-prev').click(function() {
                    $('.slick-slider-global-experts').slick('slickPrev');
                });

                $('.global-experts-slick-next').click(function() {
                    $('.slick-slider-global-experts').slick('slickNext');
                });
            });
        ");
    }
}
add_action('wp_enqueue_scripts', 'load_slick_carousel_scripts');




function oxford_selp_enqueue_styles()
{
    wp_enqueue_style("info-style", get_stylesheet_uri(), [], "1.0.0", "all");
}

add_action("wp_enqueue_scripts", "oxford_selp_enqueue_styles");

function my_custom_funcs()
{
?>
    <script type="text/javascript">
        function toggleReadMore(button) {
            // Get the data-target attribute value from the button
            const target = button.getAttribute('data-target');

            // Select the corresponding readmore content based on the target
            const readMoreContent = document.querySelectorAll('.readmore-content')[target];

            // Toggle the display style of the readmore content
            if (readMoreContent.style.display === 'none') {
                readMoreContent.style.display = 'block';
                button.innerText = 'Read Less';
            } else {
                readMoreContent.style.display = 'none';
                button.innerText = 'Read More';
            }
        }

        function lazyLoadVideo(videoId, triggerRef) {
            if (!videoId || !triggerRef) return;

            const videoEle = `
            <iframe src="https://www.youtube.com/embed/${videoId}?autoplay=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen autoplay class="aspect-video w-full h-full"></iframe>
            `;

            triggerRef.style.display = "none";
            triggerRef.insertAdjacentHTML("afterend", videoEle);
        }
    </script>
<?php
}

add_action("wp_footer", "my_custom_funcs");

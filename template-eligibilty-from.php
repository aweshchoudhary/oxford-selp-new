<?php
// Template Name: Eligibility Form
get_header(); ?>

<article class="md:px-44 md:py-10 px-5 py-10">
    <div>
        <header class="space-y-5 mb-5">
            <h1 class="text-center md:mb-10 mb-5">
                Oxford Senior Executive Leadership Programme
            </h1>
            <p>
                Thank you for your interest in the Oxford Senior Executive Leadership Programme.
                <br><br>
                We seek aspirants who wish to gain leadership knowledge and expertise, and are willing to contribute to the cohort and Oxford Business Alumni Network.

                <br><br>
                Please provide your details below. The admissions team will review your credentials and contact you shortly.
                <br><br>
            </p>
        </header>
        <div class="container mx-auto">
            <?php echo do_shortcode('[wpforms id="262" title="false"]'); ?>
        </div>
    </div>
</article>

<?php get_footer();
?>
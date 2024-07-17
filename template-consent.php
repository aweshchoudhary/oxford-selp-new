<?php
// Template Name: Consent Form
get_header(); ?>

<article class="md:px-44 md:py-10 px-5 py-10">
    <div>
        <header class="space-y-5 mb-5">
            <h1 class="text-center md:mb-10 mb-5">
                Participant Information Form
            </h1>
            <p>
                We are glad to see your interest in Oxford’s Senior Executive Leadership Programme.
            </p>
            <p>
                We are looking for aspirants who desire to gain knowledge and expertise in leadership and are willing to contribute to the cohort and Oxford’s Business Alumni (OBA) Network.
            </p>
            <p>
                Please provide your details. The Admissions Team will review your credentials and get back to you shortly.
            </p>
        </header>
        <div class="container mx-auto">
            <?php echo do_shortcode('[wpforms id="521" title="false"]'); ?>
        </div>
        <div class="md:mt-20 mt-10">
            <h2 class="font-tnr md:mb-10 mb-5">Frequently Asked Questions</h2>
            <div>
                <div>
                    <h3>Q1) Why do we have to share our email id?</h3>
                    <p> There are post-session activities that require collaboration among your fellow participants and it would be easier to connect via emails.</p>
                </div>
                <div>
                    <h3>Q2) What data will be shared with my fellow participants?</h3>
                    <p> Only your email id and name will be shared with your fellow participant to accomplish the collaborative assignment as part of your Oxford Senior Executive Leadership Programme journey.</p>
                </div>
                <div>
                    <h3>Q3) Is this necessary?</h3>
                    <p> While giving your consent is not necessary, we, however, encourage you to do so. This allows you to seamlessly connect with your fellow peers for any post-session collaborations.</p>
                </div>
                <div>
                    <h3>Q4) I do not wish to give my consent to share my email id, what should I do?</h3>
                    <p> The usual channels of communication through our Oxford Senior Executive Leadership Programme application continue to be accessible. You will still be able to connect and collaborate over the Oxford Senior Executive Leadership Programme application.</p>
                </div>
                <div>
                    <h3>Q5) Why do I have to give consent?</h3>
                    <p> Consent is required from each and every participant before sharing any personal information. We respect your data and follow best practices to protect your data privacy.</p>
                </div>
            </div>
        </div>
    </div>
</article>

<?php get_footer();
?>
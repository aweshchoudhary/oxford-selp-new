<?php
// Template Name: Brochure Download Page

get_header();

$download_brochure_file = get_field("download_brochure_file");
?>
<article class="md:p-20 p-5 min-h-[80vh] flex items-center justify-center">

    <h1 class="md:text-5xl text-2xl font-bold">Thank you</h1>

    <script>
        window.location.href = "<?php echo $download_brochure_file["brochure_file"]; ?>";
    </script>
</article>
<?php get_footer(); ?>
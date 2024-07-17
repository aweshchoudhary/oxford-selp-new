<?php
// Template Name: Brochure Download Page

// Start output buffering
ob_start();

get_header();

$download_brochure_file = get_field("download_brochure_file");

if ($download_brochure_file && isset($download_brochure_file["brochure_file"])) {
    $brochure_url = esc_url($download_brochure_file["brochure_file"]);
    // Immediate PHP Header Redirect
    header("Location: $brochure_url");
    exit;
}

// Flush the output buffer and turn off output buffering
ob_end_flush();
?>
<article class="md:p-20 p-5 min-h-[80vh] flex items-center justify-center">
    <noscript>
        <meta http-equiv="refresh" content="0;url=<?php echo $brochure_url; ?>">
    </noscript>
    <script>
        window.location.href = "<?php echo $brochure_url; ?>";
    </script>
</article>
<?php get_footer(); ?>
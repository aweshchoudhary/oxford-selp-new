<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo the_title(); ?></title>
    <?php wp_head(); ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/styles/global.css">
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <header>
        <div class="flex items-center justify-between md:px-28 px-5 py-4 md:gap-0 gap-20">
            <a aria-label="goto home page" href="/">
                <figure class="md:w-[180px] w-[100px]">
                    <?php $image_id = get_field("main_logo", "option") ?>
                    <?php echo wp_get_attachment_image($image_id, "medium", false, array(
                        "loading" => "eager",
                        "class" => "image-contain",
                    )); ?>
                    <figcaption><?php echo wp_get_attachment_caption(
                                    467
                                ); ?></figcaption>
                </figure>
            </a>
            <a aria-label="goto home page" href="/">
                <figure class="md:w-[120px] w-[80px]">
                    <?php $image_id = get_field("secondary_logo", "option") ?>
                    <?php echo wp_get_attachment_image($image_id, "medium", false, array(
                        "loading" => "eager",
                        "class" => "image-contain",
                    )); ?>
                    <figcaption><?php echo wp_get_attachment_caption(
                                    469
                                ); ?></figcaption>
                </figure>
            </a>
        </div>
    </header>

    <main>
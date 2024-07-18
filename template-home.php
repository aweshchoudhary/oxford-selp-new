<?php
// Template Name: Home Page

get_header();



?>
<article>
    <?php $hero_sec = get_field("hero_section"); ?>
    <?php if (!is_null($hero_sec)) { ?>
        <section>
            <figure class="w-full md:h-full h-[400px] md:p-0 p-5">
                <?php
                if (isset($hero_sec["hero_image"])) {
                    $image = $hero_sec["hero_image"];
                    $image_sizes = $image["sizes"];
                ?>
                    <?php echo wp_get_attachment_image($image["id"], "large", false, array(
                        "loading" => "eager",
                        "class" => "image-cover",
                    )); ?>
                    <figcaption class="sr-only"><?php echo esc_html($image["alt"]); ?></figcaption>
                <?php } ?>
            </figure>

            <div class="md:px-44 md:py-10 p-5">
                <?php if (isset($hero_sec["program_heading"])) { ?>
                    <h1 class="text-center font-tnr mb-5">
                        <?php echo esc_html($hero_sec["program_heading"]); ?>
                    </h1>
                <?php } ?>
                <div class="md:flex-row flex-col flex items-center gap-3 justify-center md:mb-10 mb-5">
                    <?php if (isset($hero_sec["apply_now"])) { ?>
                        <a aria-label="goto apply now page" href="<?php echo esc_url($hero_sec["apply_now"]["url"]); ?>" class="cbtn-primary"><?php echo esc_html($hero_sec["apply_now"]["title"]); ?></a>
                    <?php } ?>
                    <?php if (isset($hero_sec["review_my_application"])) { ?>
                        <a aria-label="goto eligibility page" href="<?php echo esc_url($hero_sec["review_my_application"]["url"]); ?>" class="cbtn-outline"><?php echo esc_html($hero_sec["review_my_application"]["title"]); ?></a>
                    <?php } ?>
                    <button name="open download brochure form" aria-label="open download brochure form" onclick="download_brochure.showModal();" class="cbtn-outline">Download brochure</button>
                </div>
                <hr class="border-primary border" />
                <div>
                    <?php if (isset($hero_sec["program_overview"]["heading"])) { ?>
                        <h2 class="mb-5 font-tnr">
                            <?php echo esc_html($hero_sec["program_overview"]["heading"]); ?>
                        </h2>
                    <?php } ?>
                    <div>
                        <?php if (isset($hero_sec["program_overview"]["description"])) { ?>
                            <?php echo wp_kses_post($hero_sec["program_overview"]["description"]); ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
        <dialog style="border-radius: 0 !important;" id="download_brochure" class="modal">
            <div class="modal-box rounded-none md:p-10 p-5 md:max-w-[60%]">
                <h2>Get your brochure</h2>
                <?php echo do_shortcode('[wpforms id="512"]'); ?>
            </div>
            <form method="dialog" class="modal-backdrop">
                <button>close</button>
            </form>
        </dialog>
    <?php } ?>

    <?php $program_details = get_field("program_details"); ?>
    <?php if (!is_null($program_details)) { ?>
        <section class="md:px-44 md:py-10 py-5 px-8 bg-[#D6D3CE]">
            <ul class="list-none pl-0 flex flex-wrap gap-5 items-center justify-between">
                <?php foreach ($program_details["list"] as $item) { ?>
                    <li class="flex items-center md:basis-1/4 flex-1 basis-full gap-5">
                        <figure class="w-[60px] h-full">
                            <?php
                            $image = $item["icon"];
                            $image_sizes = $image["sizes"];
                            ?>
                            <?php echo wp_get_attachment_image(
                                $image["id"],
                                "large",
                                false,
                                array("loading" => "lazy", "class" => "image-cover")
                            ); ?>
                            <figcaption class="sr-only"><?php echo $image["alt"]; ?></figcaption>
                        </figure>

                        <div>
                            <h3 class="md:text-2xl text-xl"><?php echo $item["subtitle"]; ?></h3>

                            <p class="mb-0 md:text-2xl text-lg font-bold"><?php echo $item["title"]; ?></p>

                            <?php if (!empty($item["modal"]["modal_name"])) { ?>
                                <button name="show more details" aria-label="show more details" class="mt-1 block underline" onclick="<?php echo $item["modal"]["modal_name"]; ?>.showModal()"><?php echo $item["modal"]["title"]; ?></button>

                            <?php } ?>
                        </div>
                    </li>
                <?php } ?>
            </ul>
        </section>
        <dialog style="border-radius: 0 !important;" id="emi_form_modal" class="modal">
            <div class="modal-box rounded-none md:p-10 p-5 md:max-w-[60%]">
                <?php echo do_shortcode('[wpforms id="235" title="true"]'); ?>
            </div>
            <form method="dialog" class="modal-backdrop">
                <button>close</button>
            </form>
        </dialog>
    <?php } ?>

    <?php $paul_fisher_video_section = get_field("paul_fisher_video_section"); ?>
    <?php if (!is_null($paul_fisher_video_section)) { ?>
        <section class="md:px-44 md:py-10 p-5">
            <div>
                <?php echo $paul_fisher_video_section["upper_description"]; ?>

                <h3 class="mb-5">
                    <?php echo $paul_fisher_video_section["youtube_video"]["video_title"]; ?>
                </h3>

                <div class="w-full">
                    <div class="bg-gray-200 rounded-none">
                        <figure class="cursor-pointer relative group" onclick="lazyLoadVideo('<?php echo $paul_fisher_video_section['youtube_video']['youtube_video_id'] ?>', this)">
                            <?php echo wp_get_attachment_image(
                                $paul_fisher_video_section["youtube_video"]["video_thumbnail"],
                                "large",
                                false,
                                ["loading" => "lazy", "class" => "image-video"]
                            ); ?>
                            <figcaption class="sr-only"></figcaption>
                            <button name="play video button" aria-label="play video button" class="play-btn">
                                <svg class="group-hover:opacity-0 ml-1 transition absolute inset-1/2 -translate-x-1/2 -translate-y-1/2" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                    <path fill="none" stroke="currentColor" stroke-width="1" d="m3 22l18-10L3 2z" />
                                </svg>

                                <svg class="group-hover:opacity-100 transition opacity-0 ml-1 absolute inset-1/2 -translate-x-1/2 -translate-y-1/2" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                    <path fill="none" stroke="currentColor" stroke-width="2" d="m3 22l18-10L3 2zm2-3l12.6-7L5 5zm2-3l7.2-4L7 8zm2-3l1.8-1L9 11z" />
                                </svg>
                            </button>
                        </figure>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>

    <?php $key_highlights = get_field("key_highlights"); ?>
    <?php if (!is_null($key_highlights)) { ?>
        <section style="background: url(<?php echo wp_get_attachment_image_url(
                                            $key_highlights["section_background_image"],
                                            "large"
                                        ); ?>);background-position:center;background-repeat: no-repeat;background-size: cover;" class="md:px-44 bg-center bg-no-repeat md:py-10 p-5 relative bg-primary text-white">
            <div>
                <h2 class="md:mb-20 mb-5 font-tnr">
                    <?php echo $key_highlights["section_title"] ?>
                </h2>
                <ul class="list-none pl-0 flex flex-wrap md:gap-16 gap-5">
                    <?php foreach ($key_highlights["key_highlight_points"] as $item) { ?>
                        <li class="flex items-center md:basis-1/3 flex-1 basis-full md:gap-10 gap-5">
                            <figure class="shrink-0 md:w-[80px] w-[60px]">
                                <?php echo wp_get_attachment_image(
                                    $item["icon"],
                                    "medium",
                                    false,
                                    ["loading" => "lazy", "class" => "image-contain"]
                                ); ?>
                                <figcaption class="sr-only"><?php echo wp_get_attachment_caption(
                                                                470
                                                            ); ?></figcaption>
                            </figure>
                            <div class="md:text-2xl mb-0 sm:text-xl text-lg font-semibold text-left">
                                <?php echo $item["title"] ?>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </section>
    <?php } ?>


    <?php $leadership_narratives = get_field("leadership_narratives"); ?>
    <?php if (!is_null($key_highlights)) { ?>
        <section class="md:px-44 md:py-10 p-5">
            <div>
                <h2 class="mb-5 font-tnr">
                    <?php echo $leadership_narratives["heading_1"] ?>
                </h2>
                <hr class="mt-10 border-primary" />
            </div>
            <div>
                <h2 class="mb-5 font-tnr">
                    <?php echo $leadership_narratives["section_title"] ?>
                </h2>

                <h3 class="mb-3">
                    <?php echo $leadership_narratives["pre_module"]["heading"] ?>
                </h3>
                <?php echo $leadership_narratives["pre_module"]["description"] ?>

                <h2 class="mb-5 font-tnr">
                    <?php echo $leadership_narratives["heading"] ?>
                </h2>

                <?php foreach ($leadership_narratives["programme_modules"] as $index => $item) { ?>

                    <div class="readmore-section md:mb-10 mb-5">
                        <h3>
                            <?php echo $item["heading"] ?>
                        </h3>
                        <?php echo $item["short_points"] ?>

                        <div class="readmore-content mt-5" style="display: none;">
                            <?php echo $item["read_more_description"] ?>
                        </div>

                        <button name="show more details" aria-label="show more details" class="cbtn-outline mt-5" data-target="<?php echo $index ?>" onclick="toggleReadMore(this)">Read more</button>
                    </div>

                <?php } ?>
                <hr class="border-primary" />
            </div>
        </section>
    <?php } ?>

    <?php $programme_outcome = get_field("programme_outcome"); ?>
    <?php if (!is_null($programme_outcome)) { ?>
        <section>
            <div class="md:px-44 md:py-10 p-5">
                <h2 class="font-tnr">
                    <?php echo $programme_outcome["section_title"] ?>
                </h2>
            </div>
            <figure class="md:h-auto h-[250px] object-cover">
                <?php echo wp_get_attachment_image($programme_outcome["main_image"], "large", false, [
                    "loading" => "lazy",
                    "class" => "image-cover",
                ]); ?>
                <figcaption class="sr-only"><?php echo wp_get_attachment_caption($programme_outcome["main_image"]); ?></figcaption>
            </figure>
            <div class="md:px-44 md:py-10 p-5 space-y-5">
                <?php echo $programme_outcome["description"] ?>
            </div>
        </section>
    <?php } ?>


    <?php $oxford_business_alumni_network = get_field("oxford_business_alumni_network"); ?>
    <?php if (!is_null($oxford_business_alumni_network)) { ?>
        <section class="bg-primary text-white">
            <div class="md:px-44 md:py-10 p-5 space-y-5">
                <h2 class="font-tnr">
                    <?php echo $oxford_business_alumni_network["section_title"] ?>
                </h2>
            </div>
            <figure class="md:h-auto h-[250px]">
                <?php echo wp_get_attachment_image($oxford_business_alumni_network["main_image"], "large", false, [
                    "loading" => "lazy",
                    "class" => "image-cover",
                ]); ?>
                <figcaption class="sr-only"><?php echo wp_get_attachment_caption($oxford_business_alumni_network["main_image"]); ?></figcaption>
            </figure>
            <div class="md:px-44 md:py-10 p-5 space-y-5">
                <?php echo $oxford_business_alumni_network["description"] ?>
            </div>
        </section>
    <?php } ?>


    <?php $faculty = get_field("learn_from_world-class_faculty"); ?>
    <?php if (!is_null($faculty)) { ?>
        <section class="md:py-10 py-5 md:pb-0 pb-0">
            <div class="md:px-44 md:mb-10 mb-5 px-5">
                <h2 class="font-tnr">
                    <?php echo $faculty["section_title"] ?>
                </h2>
            </div>
            <div class="relative">
                <button name="slide previous" aria-label="slide previous" class="faculty-slick-prev md:left-32 left-2 slick-btn"><svg class="rotate-180" xmlns="http://www.w3.org/2000/svg" width="0.48em" height="1em" viewBox="0 0 608 1280">
                        <g transform="translate(608 0) scale(-1 1)">
                            <path fill="currentColor" d="M595 288q0 13-10 23L192 704l393 393q10 10 10 23t-10 23l-50 50q-10 10-23 10t-23-10L23 727q-10-10-10-23t10-23l466-466q10-10 23-10t23 10l50 50q10 10 10 23" />
                        </g>
                    </svg></button>
                <button name="slide next" aria-label="slide next" class="faculty-slick-next md:right-32 right-2 slick-btn"><svg xmlns="http://www.w3.org/2000/svg" width="0.48em" height="1em" viewBox="0 0 608 1280">
                        <g transform="translate(608 0) scale(-1 1)">
                            <path fill="currentColor" d="M595 288q0 13-10 23L192 704l393 393q10 10 10 23t-10 23l-50 50q-10 10-23 10t-23-10L23 727q-10-10-10-23t10-23l466-466q10-10 23-10t23 10l50 50q10 10 10 23" />
                        </g>
                    </svg></button>


                <div class="slick-slider-faculty md:px-44 px-5 relative z-0">
                    <?php foreach ($faculty["slider"] as $item) { ?>
                        <div>
                            <div class="p-6 text-center h-full">
                                <figure onclick="<?php echo str_replace(' ', '_', $item["title"]) ?>.showModal()" class="aspect-square w-full overflow-hidden group cursor-pointer">
                                    <?php $image_id = $item["profile_image"]; ?>

                                    <?php echo wp_get_attachment_image($image_id, "medium", false, array(
                                        "loading" => "lazy",
                                        "class" => "image-cover",
                                    )); ?>

                                    <figcaption class="sr-only"><?php echo wp_get_attachment_caption($image_id); ?></figcaption>
                                </figure>
                                <p class="md:text-xl text-lg font-semibold mt-3 mb-0"><?php echo $item["title"] ?></p>
                                <p class="mb-2 text-left"><?php echo $item["subtitle"] ?></p>
                            </div>
                            <dialog id="<?php echo str_replace(' ', '_', $item["title"]) ?>" class="modal">
                                <div style="border-radius: 0 !important;" class="modal-box flex gap-10 md:flex-row flex-col rounded-none md:p-10 p-5 md:max-w-[60%]">
                                    <figure class="shrink-0 md:w-1/3 w-full h-full aspect-square">
                                        <?php echo wp_get_attachment_image($image_id, "medium", false, array(
                                            "loading" => "lazy",
                                            "class" => "image-cover",
                                        )); ?>
                                        <figcaption class="sr-only"><?php echo wp_get_attachment_caption($image_id); ?></figcaption>
                                    </figure>

                                    <div>
                                        <h3>
                                            <?php echo $item["title"] ?>
                                        </h3>
                                        <h4 class="mb-4">
                                            <?php echo $item["subtitle"] ?>
                                        </h4>
                                        <div>
                                            <?php echo $item["read_more_description"] ?>
                                        </div>
                                    </div>
                                </div>
                                <form method="dialog" class="modal-backdrop">
                                    <button>close</button>
                                </form>
                            </dialog>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>
    <?php } ?>

    <?php $experts = get_field("global_industry_experts"); ?>
    <?php if (!is_null($experts)) { ?>
        <section class="md:py-10 py-5">
            <div class="md:px-44 md:mb-10 mb-5 px-5">
                <h2 class="font-tnr">
                    <?php echo $experts["section_title"] ?>
                </h2>
            </div>
            <div class="relative">

                <button name="slide previous" aria-label="slide previous" class="global-experts-slick-prev md:left-32 left-2 slick-btn"><svg class="rotate-180" xmlns="http://www.w3.org/2000/svg" width="0.48em" height="1em" viewBox="0 0 608 1280">
                        <g transform="translate(608 0) scale(-1 1)">
                            <path fill="currentColor" d="M595 288q0 13-10 23L192 704l393 393q10 10 10 23t-10 23l-50 50q-10 10-23 10t-23-10L23 727q-10-10-10-23t10-23l466-466q10-10 23-10t23 10l50 50q10 10 10 23" />
                        </g>
                    </svg></button>

                <button name="slide next" aria-label="slide next" class="global-experts-slick-next md:right-32 right-2 slick-btn"><svg xmlns="http://www.w3.org/2000/svg" width="0.48em" height="1em" viewBox="0 0 608 1280">
                        <g transform="translate(608 0) scale(-1 1)">
                            <path fill="currentColor" d="M595 288q0 13-10 23L192 704l393 393q10 10 10 23t-10 23l-50 50q-10 10-23 10t-23-10L23 727q-10-10-10-23t10-23l466-466q10-10 23-10t23 10l50 50q10 10 10 23" />
                        </g>
                    </svg></button>

                <div class="slick-slider-global-experts h-full md:px-44 px-5 relative z-0">
                    <?php foreach ($experts["slider"] as $item) { ?>
                        <div>
                            <div class="p-6 text-center h-full">
                                <figure onclick="<?php echo str_replace(' ', '_', $item["title"]) ?>.showModal()" class="aspect-square w-full overflow-hidden group cursor-pointer">
                                    <?php $image_id = $item["profile_image"]; ?>

                                    <?php echo wp_get_attachment_image($image_id, "medium", false, array(
                                        "loading" => "lazy",
                                        "class" => "image-cover",
                                    )); ?>

                                    <figcaption class="sr-only"><?php echo wp_get_attachment_caption($image_id); ?></figcaption>
                                </figure>
                                <p class="md:text-xl text-lg font-semibold mt-3 mb-0"><?php echo $item["title"] ?></p>
                                <p class="mb-2 text-left"><?php echo $item["subtitle"] ?></p>
                            </div>
                            <dialog id="<?php echo str_replace(' ', '_', $item["title"]) ?>" class="modal">
                                <div style="border-radius: 0 !important;" class="modal-box flex gap-10 md:flex-row flex-col rounded-none md:p-10 p-5 md:max-w-[60%]">
                                    <figure class="shrink-0 md:w-1/3 w-full h-full aspect-square">
                                        <?php echo wp_get_attachment_image($image_id, "medium", false, array(
                                            "loading" => "lazy",
                                            "class" => "image-cover",
                                        )); ?>
                                        <figcaption class="sr-only"><?php echo wp_get_attachment_caption($image_id); ?></figcaption>
                                    </figure>

                                    <div>
                                        <h3>
                                            <?php echo $item["title"] ?>
                                        </h3>
                                        <h4 class="mb-4">
                                            <?php echo $item["subtitle"] ?>
                                        </h4>
                                        <div>
                                            <?php echo $item["read_more_description"] ?>
                                        </div>
                                    </div>
                                </div>
                                <form method="dialog" class="modal-backdrop">
                                    <button>close</button>
                                </form>
                            </dialog>
                        </div>
                    <?php } ?>
                    <?php if (count($experts["slider"]) < 4) { ?>
                        <?php foreach ($experts["slider"] as $item) { ?>
                            <div>
                                <div class="p-6 text-center h-full">
                                    <figure onclick="<?php echo str_replace(' ', '_', $item["title"]) ?>.showModal()" class="aspect-square w-full overflow-hidden group cursor-pointer">
                                        <?php $image_id = $item["profile_image"]; ?>

                                        <?php echo wp_get_attachment_image($image_id, "medium", false, array(
                                            "loading" => "lazy",
                                            "class" => "image-cover",
                                        )); ?>

                                        <figcaption class="sr-only"><?php echo wp_get_attachment_caption($image_id); ?></figcaption>
                                    </figure>
                                    <p class="md:text-xl text-lg font-semibold mt-3 mb-0"><?php echo $item["title"] ?></p>
                                    <p class="mb-2 text-left"><?php echo $item["subtitle"] ?></p>
                                </div>
                                <dialog id="<?php echo str_replace(' ', '_', $item["title"]) ?>" class="modal">
                                    <div style="border-radius: 0 !important;" class="modal-box flex gap-10 md:flex-row flex-col rounded-none md:p-10 p-5 md:max-w-[60%]">
                                        <figure class="shrink-0 md:w-1/3 w-full h-full aspect-square">
                                            <?php echo wp_get_attachment_image($image_id, "medium", false, array(
                                                "loading" => "lazy",
                                                "class" => "image-cover",
                                            )); ?>
                                            <figcaption class="sr-only"><?php echo wp_get_attachment_caption($image_id); ?></figcaption>
                                        </figure>

                                        <div>
                                            <h3>
                                                <?php echo $item["title"] ?>
                                            </h3>
                                            <h4 class="mb-4">
                                                <?php echo $item["subtitle"] ?>
                                            </h4>
                                            <div>
                                                <?php echo $item["read_more_description"] ?>
                                            </div>
                                        </div>
                                    </div>
                                    <form method="dialog" class="modal-backdrop">
                                        <button>close</button>
                                    </form>
                                </dialog>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </section>
    <?php } ?>



    <?php $certificate = get_field("certificate"); ?>
    <?php if (!is_null($certificate)) { ?>
        <section class="md:py-10 p-5 md:px-44">
            <hr class="border-primary md:mb-10 mb-5 border-2">
            <div>
                <h2 class="md:mb-10 mb-5 font-tnr"> <?php echo $certificate["section_title"] ?></h2>
                <?php echo $certificate["upper_description"] ?>

                <figure class="border border-primary">
                    <?php echo wp_get_attachment_image($certificate["certificate_image"], "large", false, [
                        "loading" => "lazy",
                        "class" => "image-contain",
                    ]); ?>
                    <figcaption class="sr-only"><?php echo wp_get_attachment_caption($certificate["certificate_image"]); ?></figcaption>
                </figure>
            </div>
            <div class="mt-5">
                <?php echo $certificate["lower_description"] ?>
            </div>
            <hr class="border-primary md:mt-10 mt-5 border-2">
        </section>
    <?php } ?>


    <?php $cohort_statistics = get_field("cohort_statistics"); ?>
    <?php if (!is_null($certificate)) { ?>
        <section class="md:px-44 md:py-10 p-5">
            <h2 class="font-tnr md:text-center md:mb-10 mb-5"><?php echo $cohort_statistics["section_title"] ?></h2>
            <div class="flex md:flex-row flex-col justify-between md:gap-10 gap-5">
                <div class="basis-[40%]">
                    <h3 class="mb-3 text-center"><?php echo $cohort_statistics["work_experience_chart"]["heading"] ?></h3>
                    <figure>
                        <?php echo wp_get_attachment_image($cohort_statistics["work_experience_chart"]["chart_image"], "large", false, [
                            "loading" => "lazy",
                            "class" => "image-contain",
                        ]); ?>
                        <figcaption class="sr-only"><?php echo wp_get_attachment_caption($cohort_statistics["work_experience_chart"]["chart_image"]); ?></figcaption>
                    </figure>
                    <p class="my-3 text-center"><?php echo $cohort_statistics["work_experience_chart"]["lower_text"] ?></p>
                </div>
                <div>
                    <h3 class="mb-3"><?php echo $cohort_statistics["designation"]["heading"] ?></h3>
                    <?php echo $cohort_statistics["designation"]["list"] ?>
                </div>
                <div>
                    <h3 class="mb-3"><?php echo $cohort_statistics["industry"]["heading"] ?></h3>
                    <?php echo $cohort_statistics["industry"]["list"] ?>
                </div>
            </div>
            <h3 class="text-center md:my-10 my-5"><?php echo $cohort_statistics["companies"]["heading"] ?></h3>
            <figure class="md:mt-10 mt-5">
                <?php echo wp_get_attachment_image($cohort_statistics["companies"]["companies_image"], "large", false, [
                    "loading" => "lazy",
                    "class" => "image-cover",
                ]); ?>
                <figcaption class="sr-only"><?php echo wp_get_attachment_caption($cohort_statistics["companies"]["companies_image"]); ?></figcaption>
            </figure>
            <hr class="border-primary md:mt-10 mt-5" />
        </section>
    <?php } ?>


    <?php $the_oxford_experience = get_field("the_oxford_experience"); ?>
    <?php if (!is_null($the_oxford_experience)) { ?>
        <section class="md:py-10 py-5">
            <div class="md:px-44 px-5">
                <h2 class="font-tnr md:mb-10 mb-5">
                    <?php echo $the_oxford_experience["heading"] ?>
                </h2>
                <?php echo $the_oxford_experience["description"] ?>

                <br>
                <h3 class="md:mb-10 mb-5">
                    <?php echo $the_oxford_experience["explore_the_oxford_campus"]["video_title"] ?>
                </h3>
                <div class="bg-gray-200 rounded-none">
                    <figure class="cursor-pointer relative group" onclick="lazyLoadVideo('<?php echo $the_oxford_experience['explore_the_oxford_campus']['youtube_video_id'] ?>', this)">
                        <?php echo wp_get_attachment_image($the_oxford_experience["explore_the_oxford_campus"]["video_thumbnail"], "large", false, [
                            "loading" => "lazy",
                            "class" => "image-video",
                        ]); ?>
                        <figcaption class="sr-only"><?php echo wp_get_attachment_caption($the_oxford_experience["explore_the_oxford_campus"]["video_thumbnail"]); ?></figcaption>

                        <button name="play video button" aria-label="play video button" class="play-btn">
                            <svg class="group-hover:opacity-0 ml-1 transition absolute inset-1/2 -translate-x-1/2 -translate-y-1/2" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                <path fill="none" stroke="currentColor" stroke-width="1" d="m3 22l18-10L3 2z" />
                            </svg>

                            <svg class="group-hover:opacity-100 transition opacity-0 ml-1 absolute inset-1/2 -translate-x-1/2 -translate-y-1/2" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                <path fill="none" stroke="currentColor" stroke-width="2" d="m3 22l18-10L3 2zm2-3l12.6-7L5 5zm2-3l7.2-4L7 8zm2-3l1.8-1L9 11z" />
                            </svg>
                        </button>
                    </figure>
                </div>
                <h3 class="md:my-10 my-5">
                    <?php echo $the_oxford_experience["hear_from_paul_fisher_programme_director"]["video_title"] ?>
                </h3>

                <div class="bg-gray-200 rounded-none">
                    <figure class="cursor-pointer relative group" onclick="lazyLoadVideo('<?php echo $the_oxford_experience['hear_from_paul_fisher_programme_director']['youtube_video_id'] ?>', this)">
                        <?php echo wp_get_attachment_image($the_oxford_experience["hear_from_paul_fisher_programme_director"]["video_thumbnail"], "large", false, [
                            "loading" => "lazy",
                            "class" => "image-video",
                        ]); ?>
                        <figcaption class="sr-only"><?php echo wp_get_attachment_caption($the_oxford_experience["hear_from_paul_fisher_programme_director"]["video_thumbnail"]); ?></figcaption>

                        <button name="play video button" aria-label="play video button" class="play-btn">
                            <svg class="group-hover:opacity-0 ml-1 transition absolute inset-1/2 -translate-x-1/2 -translate-y-1/2" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                <path fill="none" stroke="currentColor" stroke-width="1" d="m3 22l18-10L3 2z" />
                            </svg>

                            <svg class="group-hover:opacity-100 transition opacity-0 ml-1 absolute inset-1/2 -translate-x-1/2 -translate-y-1/2" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                <path fill="none" stroke="currentColor" stroke-width="2" d="m3 22l18-10L3 2zm2-3l12.6-7L5 5zm2-3l7.2-4L7 8zm2-3l1.8-1L9 11z" />
                            </svg>
                        </button>
                    </figure>
                </div>

            </div>
        </section>
    <?php } ?>


    <?php $is_the_programme_right_for_me = get_field("is_the_programme_right_for_me"); ?>
    <?php if (!is_null($the_oxford_experience)) { ?>
        <section class="bg-primary text-white">
            <div class="md:px-44 px-5 md:py-10 py-5">
                <h2 class="font-tnr md:mb-10 mb-5">
                    <?php echo $is_the_programme_right_for_me["section_title"] ?>
                </h2>
                <?php echo $is_the_programme_right_for_me["description"] ?>

            </div>
            <figure class="class=" md:h-auto h-[250px] object-cover w-full md:object-contain"">
                <?php echo wp_get_attachment_image($is_the_programme_right_for_me["main_image"], "large", false, [
                    "loading" => "lazy",
                    "class" => "image-cover",
                ]); ?>
                <figcaption class="sr-only"><?php echo wp_get_attachment_caption($is_the_programme_right_for_me["main_image"]); ?></figcaption>
            </figure>
        </section>
    <?php } ?>


    <?php $application_process = get_field("application_process"); ?>
    <?php if (!is_null($the_oxford_experience)) { ?>
        <section>
            <div class="md:px-44 md:py-10 p-5">
                <h2 class="font-tnr md:mb-10 mb-5">
                    <?php echo $application_process["section_title"] ?>
                </h2>
                <?php echo $application_process["upper_description"] ?>

                <div class="flex flex-wrap md:gap-8 gap-5 md:my-10 my-5">
                    <?php foreach ($application_process["application_process_steps"] as $index => $item) { ?>
                        <div class="md:basis-1/5 sm:basis-1/3 basis-full flex-1">
                            <div class="flex items-center justify-center rounded-full bg-primary text-white size-12 text-3xl font-bold mb-8">
                                <?php echo $index + 1 ?>
                            </div>
                            <h4><?php echo $item["title"] ?></h4>
                            <div class="steps-custom-styles">
                                <?php echo $item["description"] ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <?php echo $application_process["lower_description"]; ?>
                <a aria-label="goto apply now page" href="<?php echo $application_process["apply_now"]["url"] ?>" class="cbtn-outline"><?php echo $application_process["apply_now"]["title"] ?></a>
            </div>
        </section>
    <?php } ?>


    <?php $last_section = get_field("last_section"); ?>
    <?php if (!is_null($last_section)) { ?>
        <figure class="w-full md:h-[400px] h-[250px] object-cover">
            <?php echo wp_get_attachment_image($last_section["main_image"], "large", false, [
                "loading" => "lazy",
                "class" => "image-cover",
            ]); ?>
            <figcaption class="sr-only"><?php echo wp_get_attachment_caption($last_section["main_image"]); ?></figcaption>
        </figure>

        <section class="md:px-44 md:py-10 p-5">
            <div class="md:mb-10 mb-5">
                <h2 class="font-tnr md:mb-8 mb-5">
                    <?php echo $last_section["inquire_for_your_organisation"]["title"] ?>
                </h2>
                <?php echo $last_section["inquire_for_your_organisation"]["description"] ?>
                <a aria-label="goto get in touch" href="<?php echo $last_section["inquire_for_your_organisation"]["get_in_touch"]["url"] ?>" class="cbtn-outline"><?php echo $last_section["inquire_for_your_organisation"]["get_in_touch"]["title"] ?></a>
            </div>
            <div>
                <h2 class="font-tnr md:mb-8 mb-5">
                    <?php echo $last_section["refer_a_colleague"]["title"] ?>
                </h2>
                <?php echo $last_section["refer_a_colleague"]["description"] ?>
                <a aria-label="goto get in touch" href="<?php echo $last_section["refer_a_colleague"]["refer_and_earn"]["url"] ?>" class="cbtn-outline"><?php echo $last_section["refer_a_colleague"]["refer_and_earn"]["title"] ?></a>
            </div>
        </section>
    <?php } ?>
</article>
<?php get_footer(); ?>
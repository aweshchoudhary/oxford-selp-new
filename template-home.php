<?php
// Template Name: Home Page

get_header();


?>
<article>
    <?php
    $hero_sec = get_field("hero_section");
    if ($hero_sec) :
    ?>
        <section>
            <figure class="w-full md:h-full h-[400px] md:p-0 p-5">
                <?php if (!empty($hero_sec["hero_image"])) :
                    $image = $hero_sec["hero_image"];
                    echo wp_get_attachment_image($image["id"], "large", false, array(
                        "loading" => "eager",
                        "class" => "image-cover",
                    ));
                ?>
                    <figcaption class="sr-only"><?php echo esc_html($image["alt"]); ?></figcaption>
                <?php endif; ?>
            </figure>

            <div class="md:px-44 md:py-10 p-5">
                <?php if (!empty($hero_sec["program_heading"])) : ?>
                    <h1 class="text-center font-tnr mb-5"><?php echo wp_kses_post($hero_sec["program_heading"]); ?></h1>
                <?php endif; ?>

                <div class="md:flex-row flex-col flex items-center gap-3 justify-center md:mb-10 mb-5">
                    <?php if (!empty($hero_sec["apply_now"])) : ?>
                        <a aria-label="goto apply now page" href="<?php echo esc_url($hero_sec["apply_now"]["url"]); ?>" class="cbtn-primary"><?php echo wp_kses_post($hero_sec["apply_now"]["title"]); ?></a>
                    <?php endif; ?>
                    <?php if (!empty($hero_sec["review_my_application"])) : ?>
                        <a aria-label="goto eligibility page" href="<?php echo esc_url($hero_sec["review_my_application"]["url"]); ?>" class="cbtn-outline"><?php echo wp_kses_post($hero_sec["review_my_application"]["title"]); ?></a>
                    <?php endif; ?>
                    <button name="open download brochure form" aria-label="open download brochure form" onclick="download_brochure.showModal();" class="cbtn-outline">Download brochure</button>
                </div>

                <hr class="border-primary border" />

                <div>
                    <?php if (!empty($hero_sec["program_overview"]["heading"])) : ?>
                        <h2 class="mb-5 font-tnr"><?php echo wp_kses_post($hero_sec["program_overview"]["heading"]); ?></h2>
                    <?php endif; ?>

                    <?php if (!empty($hero_sec["program_overview"]["description"])) : ?>
                        <?php echo wp_kses_post($hero_sec["program_overview"]["description"]); ?>
                    <?php endif; ?>
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
    <?php endif; ?>


    <?php
    $program_details = get_field("program_details");
    if ($program_details) :
    ?>
        <section class="md:px-44 md:py-10 py-5 px-8 bg-[#D6D3CE]">
            <ul class="list-none pl-0 flex flex-wrap gap-5 items-center justify-between">
                <?php foreach ($program_details["list"] as $item) : ?>
                    <li class="flex items-center md:basis-1/4 flex-1 basis-full gap-5">
                        <figure class="w-[60px] h-full">
                            <?php
                            $image = $item["icon"];
                            echo wp_get_attachment_image(
                                $image["id"],
                                "large",
                                false,
                                array("loading" => "lazy", "class" => "image-cover")
                            );
                            ?>
                            <figcaption class="sr-only"><?php echo esc_html($image["alt"]); ?></figcaption>
                        </figure>

                        <div>
                            <h3 class="md:text-2xl text-xl"><?php echo esc_html($item["subtitle"]); ?></h3>
                            <p class="mb-0 md:text-2xl text-lg font-bold"><?php echo esc_html($item["title"]); ?></p>

                            <?php if (!empty($item["modal"]["modal_name"])) : ?>
                                <button name="show more details" aria-label="show more details" class="mt-1 block underline" onclick="<?php echo esc_attr($item["modal"]["modal_name"]); ?>.showModal()"><?php echo esc_html($item["modal"]["title"]); ?></button>
                            <?php endif; ?>
                        </div>
                    </li>
                <?php endforeach; ?>
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
    <?php endif; ?>


    <?php
    $paul_fisher_video_section = get_field("paul_fisher_video_section");
    if ($paul_fisher_video_section) :
    ?>
        <section class="md:px-44 md:py-10 p-5">
            <div>
                <?php echo !empty($paul_fisher_video_section["upper_description"]) ? wp_kses_post($paul_fisher_video_section["upper_description"]) : ''; ?>

                <h3 class="mb-5">
                    <?php echo !empty($paul_fisher_video_section["youtube_video"]["video_title"]) ? wp_kses_post($paul_fisher_video_section["youtube_video"]["video_title"]) : ''; ?>
                </h3>

                <div class="w-full bg-gray-200 rounded-none">
                    <figure class="cursor-pointer relative group" onclick="lazyLoadVideo('<?php echo esc_attr($paul_fisher_video_section['youtube_video']['youtube_video_id'] ?? ''); ?>', this)">
                        <?php
                        if (!empty($paul_fisher_video_section["youtube_video"]["video_thumbnail"])) {
                            echo wp_get_attachment_image(
                                $paul_fisher_video_section["youtube_video"]["video_thumbnail"],
                                "large",
                                false,
                                ["loading" => "lazy", "class" => "image-video"]
                            );
                        }
                        ?>
                        <figcaption class="sr-only"></figcaption>
                        <button name="play video button" aria-label="Play video" class="play-btn">
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
    <?php endif; ?>

    <?php
    $key_highlights = get_field("key_highlights");
    if ($key_highlights) :
        $background_image_url = !empty($key_highlights["section_background_image"]) ? esc_url(wp_get_attachment_image_url($key_highlights["section_background_image"], "large")) : '';
    ?>
        <section style="background: url('<?php echo $background_image_url; ?>'); background-position: center; background-repeat: no-repeat; background-size: cover;" class="md:px-44 bg-center bg-no-repeat md:py-10 p-5 relative bg-primary text-white">
            <div>
                <h2 class="md:mb-20 mb-5 font-tnr">
                    <?php echo !empty($key_highlights["section_title"]) ? wp_kses_post($key_highlights["section_title"]) : ''; ?>
                </h2>
                <ul class="list-none pl-0 flex flex-wrap md:gap-16 gap-5">
                    <?php foreach ($key_highlights["key_highlight_points"] as $item) : ?>
                        <li class="flex items-center md:flex-1 flex-1 md:basis-1/3 gap-5">
                            <figure class="shrink-0 md:w-[80px] w-[60px]">
                                <?php echo !empty($item["icon"]) ? wp_get_attachment_image(
                                    $item["icon"],
                                    "medium",
                                    false,
                                    ["loading" => "lazy", "class" => "image-contain"]
                                ) : ''; ?>
                                <figcaption class="sr-only"><?php echo !empty($item["icon"]) ? wp_kses_post(wp_get_attachment_caption($item["icon"])) : ''; ?></figcaption>
                            </figure>
                            <div class="md:text-2xl sm:text-xl text-lg font-semibold text-left">
                                <?php echo !empty($item["title"]) ? wp_kses_post($item["title"]) : ''; ?>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </section>
    <?php endif; ?>

    <?php
    $leadership_narratives = get_field("leadership_narratives");
    if ($leadership_narratives) :
    ?>
        <section class="md:px-44 md:py-10 p-5">
            <div>
                <h2 class="mb-5 font-tnr">
                    <?php echo !empty($leadership_narratives["heading_1"]) ? wp_kses_post($leadership_narratives["heading_1"]) : ''; ?>
                </h2>
                <hr class="mt-10 border-primary" />
            </div>
            <div>
                <h2 class="mb-5 font-tnr">
                    <?php echo !empty($leadership_narratives["section_title"]) ? wp_kses_post($leadership_narratives["section_title"]) : ''; ?>
                </h2>

                <h3 class="mb-3">
                    <?php echo !empty($leadership_narratives["pre_module"]["heading"]) ? wp_kses_post($leadership_narratives["pre_module"]["heading"]) : ''; ?>
                </h3>
                <p><?php echo !empty($leadership_narratives["pre_module"]["description"]) ? wp_kses_post($leadership_narratives["pre_module"]["description"]) : ''; ?></p>

                <h2 class="mb-5 font-tnr">
                    <?php echo !empty($leadership_narratives["heading"]) ? wp_kses_post($leadership_narratives["heading"]) : ''; ?>
                </h2>

                <?php foreach ($leadership_narratives["programme_modules"] as $index => $item) : ?>
                    <div class="readmore-section md:mb-10 mb-5">
                        <h3><?php echo !empty($item["heading"]) ? wp_kses_post($item["heading"]) : ''; ?></h3>
                        <p><?php echo !empty($item["short_points"]) ? wp_kses_post($item["short_points"]) : ''; ?></p>

                        <div class="readmore-content mt-5" style="display: none;">
                            <?php echo !empty($item["read_more_description"]) ? wp_kses_post($item["read_more_description"]) : ''; ?>
                        </div>

                        <button name="show more details" aria-label="Show more details" class="cbtn-outline mt-5" data-target="<?php echo esc_attr($index); ?>" onclick="toggleReadMore(this)">Read more</button>
                    </div>
                <?php endforeach; ?>

                <hr class="border-primary" />
            </div>
        </section>
    <?php endif; ?>

    <!-- Repeat similar checks and structures for other sections -->

    <?php
    $cohort_statistics = get_field("cohort_statistics");
    if ($cohort_statistics) :
    ?>
        <section class="md:px-44 md:py-10 p-5">
            <h2 class="font-tnr md:text-center md:mb-10 mb-5"><?php echo !empty($cohort_statistics["section_title"]) ? wp_kses_post($cohort_statistics["section_title"]) : ''; ?></h2>
            <div class="flex md:flex-row flex-col justify-between md:gap-10 gap-5">
                <div class="basis-[40%]">
                    <h3 class="mb-3 text-center"><?php echo !empty($cohort_statistics["work_experience_chart"]["heading"]) ? wp_kses_post($cohort_statistics["work_experience_chart"]["heading"]) : ''; ?></h3>
                    <figure>
                        <?php echo !empty($cohort_statistics["work_experience_chart"]["chart_image"]) ? wp_get_attachment_image($cohort_statistics["work_experience_chart"]["chart_image"], "large", false, [
                            "loading" => "lazy",
                            "class" => "image-contain",
                        ]) : ''; ?>
                        <figcaption class="sr-only"><?php echo !empty($cohort_statistics["work_experience_chart"]["chart_image"]) ? wp_kses_post(wp_get_attachment_caption($cohort_statistics["work_experience_chart"]["chart_image"])) : ''; ?></figcaption>
                    </figure>
                    <p class="my-3 text-center"><?php echo !empty($cohort_statistics["work_experience_chart"]["lower_text"]) ? wp_kses_post($cohort_statistics["work_experience_chart"]["lower_text"]) : ''; ?></p>
                </div>
                <div>
                    <h3 class="mb-3"><?php echo !empty($cohort_statistics["designation"]["heading"]) ? wp_kses_post($cohort_statistics["designation"]["heading"]) : ''; ?></h3>
                    <?php echo !empty($cohort_statistics["designation"]["list"]) ? wp_kses_post($cohort_statistics["designation"]["list"]) : ''; ?>
                </div>
                <div>
                    <h3 class="mb-3"><?php echo !empty($cohort_statistics["industry"]["heading"]) ? wp_kses_post($cohort_statistics["industry"]["heading"]) : ''; ?></h3>
                    <?php echo !empty($cohort_statistics["industry"]["list"]) ? wp_kses_post($cohort_statistics["industry"]["list"]) : ''; ?>
                </div>
            </div>
            <h3 class="text-center md:my-10 my-5"><?php echo !empty($cohort_statistics["companies"]["heading"]) ? wp_kses_post($cohort_statistics["companies"]["heading"]) : ''; ?></h3>
            <figure class="md:mt-10 mt-5">
                <?php echo !empty($cohort_statistics["companies"]["companies_image"]) ? wp_get_attachment_image($cohort_statistics["companies"]["companies_image"], "large", false, [
                    "loading" => "lazy",
                    "class" => "image-cover",
                ]) : ''; ?>
                <figcaption class="sr-only"><?php echo !empty($cohort_statistics["companies"]["companies_image"]) ? wp_kses_post(wp_get_attachment_caption($cohort_statistics["companies"]["companies_image"])) : ''; ?></figcaption>
            </figure>
            <hr class="border-primary md:mt-10 mt-5" />
        </section>
    <?php endif; ?>

    <!-- Repeat similar checks and structures for other sections -->

    <?php
    $the_oxford_institute = get_field("the_oxford_institute");
    if ($the_oxford_institute) :
    ?>
        <section class="md:px-44 md:py-10 p-5">
            <div>
                <h2 class="mb-5 font-tnr">
                    <?php echo !empty($the_oxford_institute["heading_1"]) ? wp_kses_post($the_oxford_institute["heading_1"]) : ''; ?>
                </h2>
                <hr class="mt-10 border-primary" />
            </div>
            <div>
                <h2 class="mb-5 font-tnr">
                    <?php echo !empty($the_oxford_institute["section_title"]) ? wp_kses_post($the_oxford_institute["section_title"]) : ''; ?>
                </h2>

                <h3 class="mb-3">
                    <?php echo !empty($the_oxford_institute["pre_module"]["heading"]) ? wp_kses_post($the_oxford_institute["pre_module"]["heading"]) : ''; ?>
                </h3>
                <p><?php echo !empty($the_oxford_institute["pre_module"]["description"]) ? wp_kses_post($the_oxford_institute["pre_module"]["description"]) : ''; ?></p>

                <h2 class="mb-5 font-tnr">
                    <?php echo !empty($the_oxford_institute["heading"]) ? wp_kses_post($the_oxford_institute["heading"]) : ''; ?>
                </h2>

                <?php foreach ($the_oxford_institute["programme_modules"] as $index => $item) : ?>
                    <div class="readmore-section md:mb-10 mb-5">
                        <h3><?php echo !empty($item["heading"]) ? wp_kses_post($item["heading"]) : ''; ?></h3>
                        <p><?php echo !empty($item["short_points"]) ? wp_kses_post($item["short_points"]) : ''; ?></p>

                        <div class="readmore-content mt-5" style="display: none;">
                            <?php echo !empty($item["read_more_description"]) ? wp_kses_post($item["read_more_description"]) : ''; ?>
                        </div>

                        <button name="show more details" aria-label="Show more details" class="cbtn-outline mt-5" data-target="<?php echo esc_attr($index); ?>" onclick="toggleReadMore(this)">Read more</button>
                    </div>
                <?php endforeach; ?>

                <hr class="border-primary" />
            </div>
        </section>
    <?php endif; ?>

    <?php
    $is_the_programme_right_for_me = get_field("is_the_programme_right_for_me");

    if ($is_the_programme_right_for_me) :
    ?>
        <section class="bg-primary text-white">
            <div class="md:px-44 px-5 md:py-10 py-5">
                <?php if (!empty($is_the_programme_right_for_me["section_title"])) : ?>
                    <h2 class="font-tnr md:mb-10 mb-5">
                        <?php echo wp_kses_post($is_the_programme_right_for_me["section_title"]); ?>
                    </h2>
                <?php endif; ?>
                <?php if (!empty($is_the_programme_right_for_me["description"])) : ?>
                    <?php echo wp_kses_post($is_the_programme_right_for_me["description"]); ?>
                <?php endif; ?>
            </div>
            <?php if (!empty($is_the_programme_right_for_me["main_image"])) : ?>
                <figure class="md:h-auto h-[250px] object-cover w-full md:object-contain">
                    <?php echo wp_get_attachment_image($is_the_programme_right_for_me["main_image"], "large", false, [
                        "loading" => "lazy",
                        "class" => "image-cover",
                    ]); ?>
                    <figcaption class="sr-only"><?php echo wp_kses_post(wp_get_attachment_caption($is_the_programme_right_for_me["main_image"])); ?></figcaption>
                </figure>
            <?php endif; ?>
        </section>
    <?php endif; ?>

    <?php
    $application_process = get_field("application_process");
    if ($application_process && !empty($application_process)) :
    ?>
        <section>
            <div class="md:px-44 md:py-10 p-5">
                <h2 class="font-tnr md:mb-10 mb-5">
                    <?php echo !empty($application_process["section_title"]) ? wp_kses_post($application_process["section_title"]) : ''; ?>
                </h2>
                <?php if (!empty($application_process["upper_description"])) : ?>
                    <?php echo wp_kses_post($application_process["upper_description"]); ?>
                <?php endif; ?>

                <div class="flex flex-wrap md:gap-8 gap-5 md:my-10 my-5">
                    <?php if (!empty($application_process["application_process_steps"]) && is_array($application_process["application_process_steps"])) : ?>
                        <?php foreach ($application_process["application_process_steps"] as $index => $item) : ?>
                            <div class="md:basis-1/5 sm:basis-1/3 basis-full flex-1">
                                <div class="flex items-center justify-center rounded-full bg-primary text-white size-12 text-3xl font-bold mb-8">
                                    <?php echo $index + 1 ?>
                                </div>
                                <h4><?php echo !empty($item["title"]) ? wp_kses_post($item["title"]) : ''; ?></h4>
                                <div class="steps-custom-styles">
                                    <?php echo !empty($item["description"]) ? wp_kses_post($item["description"]) : ''; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <?php if (!empty($application_process["lower_description"])) : ?>
                    <?php echo wp_kses_post($application_process["lower_description"]); ?>
                <?php endif; ?>

                <?php if (!empty($application_process["apply_now"]["url"]) && !empty($application_process["apply_now"]["title"])) : ?>
                    <a aria-label="Go to apply now page" href="<?php echo esc_url($application_process["apply_now"]["url"]); ?>" class="cbtn-outline"><?php echo wp_kses_post($application_process["apply_now"]["title"]); ?></a>
                <?php endif; ?>
            </div>
        </section>
    <?php endif; ?>

    <?php $last_section = get_field("last_section"); ?>
    <?php if ($last_section && !empty($last_section)) : ?>
        <figure class="w-full md:h-[400px] h-[250px] object-cover">
            <?php echo wp_get_attachment_image($last_section["main_image"], "large", false, [
                "loading" => "lazy",
                "class" => "image-cover",
            ]); ?>
            <figcaption class="sr-only"><?php echo wp_get_attachment_caption($last_section["main_image"]); ?></figcaption>
        </figure>

        <section class="md:px-44 md:py-10 p-5">
            <?php if (!empty($last_section["inquire_for_your_organisation"]["title"])) : ?>
                <div class="md:mb-10 mb-5">
                    <h2 class="font-tnr md:mb-8 mb-5">
                        <?php echo wp_kses_post($last_section["inquire_for_your_organisation"]["title"]); ?>
                    </h2>
                    <?php echo wp_kses_post($last_section["inquire_for_your_organisation"]["description"]); ?>
                    <?php if (!empty($last_section["inquire_for_your_organisation"]["get_in_touch"]["url"])) : ?>
                        <a aria-label="Go to get in touch" href="<?php echo esc_url($last_section["inquire_for_your_organisation"]["get_in_touch"]["url"]); ?>" class="cbtn-outline"><?php echo wp_kses_post($last_section["inquire_for_your_organisation"]["get_in_touch"]["title"]); ?></a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($last_section["refer_a_colleague"]["title"])) : ?>
                <div>
                    <h2 class="font-tnr md:mb-8 mb-5">
                        <?php echo wp_kses_post($last_section["refer_a_colleague"]["title"]); ?>
                    </h2>
                    <?php echo wp_kses_post($last_section["refer_a_colleague"]["description"]); ?>
                    <?php if (!empty($last_section["refer_a_colleague"]["refer_and_earn"]["url"])) : ?>
                        <a aria-label="Go to get in touch" href="<?php echo esc_url($last_section["refer_a_colleague"]["refer_and_earn"]["url"]); ?>" class="cbtn-outline"><?php echo wp_kses_post($last_section["refer_a_colleague"]["refer_and_earn"]["title"]); ?></a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </section>
    <?php endif; ?>

</article>
<?php get_footer(); ?>
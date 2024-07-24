</main>
<footer class="section bg-primary text-white">
    <div class="flex flex-wrap lg:gap-20 md:gap-10 gap-5">
        <div class="shrink-0">
            <figure class="md:w-32 w-20">
                <?php $image_id = get_field("footer_logo", "option") ?>
                <?php echo wp_get_attachment_image($image_id, "medium", false, [
                    "loading" => "lazy",
                    "class" => "image-contain",
                ]); ?>
                <figcaption><?php echo wp_get_attachment_caption(
                                $image_id
                            ); ?></figcaption>
            </figure>

            <ul class="list-none pl-0 mt-10 space-y-3 text-lg">
                <?php
                $contacts = get_field("contacts", "option");
                if (count($contacts)) :
                    foreach ($contacts as $item) :
                ?>
                        <li>
                            <a href="<?php echo $item["link"]["url"] ?>" class="text-white hover:text-white/80 flex items-center gap-5" style="color: #FFF;">
                                <figure class="w-[20px]">
                                    <?php echo wp_get_attachment_image($item["icon"], "thumbnail", false, [
                                        "loading" => "lazy",
                                        "class" => "image-contain",
                                    ]); ?>
                                    <figcaption><?php echo wp_get_attachment_caption(
                                                    $item["icon"]
                                                ); ?></figcaption>
                                </figure>
                                <?php echo $item["link"]["title"] ?>
                            </a>
                        </li>
                <?php endforeach;
                endif;
                ?>
            </ul>
        </div>
        <div class="flex flex-wrap flex-1">
            <?php
            $addresses = get_field("addresses", "option");
            if (count($addresses)) :
                foreach ($addresses as $item) :
            ?>
                    <div class="md:basis-1/2 basis-full flex items-start md:gap-5 gap-3 md:mt-10 mt-5">
                        <figure class="md:w-[40px] w-[30px] shrink-0">
                            <?php echo wp_get_attachment_image($item["icon"], "thumbnail", false, [
                                "loading" => "lazy",
                                "class" => "image-contain",
                            ]); ?>
                            <figcaption><?php echo wp_get_attachment_caption(
                                            $item["icon"]
                                        ); ?></figcaption>
                        </figure>
                        <div>
                            <h3 class="text-2xl mb-1 font-semibold"><?php echo wp_kses_post($item["title"]) ?></h3>
                            <?php echo wp_kses_post($item["address"]) ?>
                        </div>
                    </div>
            <?php endforeach;
            endif;
            ?>
        </div>
    </div>
    <div class="md:mt-10 mt-5">
        Saïd Business School, University of Oxford is collaborating with XED to offer a portfolio of high-impact programmes for senior leaders
    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>
<section class="blog-section py-6">
    <div class="container pb-4">
        <?php
        $args = array(
            'posts_per_page' => 9,
            'post_type' => 'post',
        );
        $query = new WP_Query($args);
        ?>
        <?php if ($query->have_posts()): ?>
            <?php while ($query->have_posts()): $query->the_post(); ?>
                <div class="row jc-center mb-n5">
                    <div class="col-sm-6 col-lg-4 mb-5">
                        <div class="item bg-white radius-10 overflow-hidden">
                            <?php if (has_post_thumbnail()): ?>
                                <a href="<?php echo get_permalink(); ?>" class="d-block thumbnail">
                                    <?php the_post_thumbnail('sarehal_blog_thumbnail', ['class' => 'img-fit', 'alt' => get_the_title()]); ?>
                                </a>
                            <?php endif; ?>

                            <div class="item-body p-3">
                                <a href="<?php echo get_permalink(); ?>" class="fw-semibold font-20 fg-pencil hvr-fg-main">
                                    <?php echo get_the_title(); ?>
                                </a>

                                <p class="text-justify font-15 my-3">
                                    <?php echo get_the_excerpt(); ?>
                                </p>

                                <div class="font-14 d-flex ai-center">
                                    <i class="fal fa-calendar fg-main ml-2"></i>

                                    <time class="w-space-2"><?php echo parsidate('j F Y', get_the_date('Y-m-d')); ?></time>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        <?php else: ?>
            <p class="text-center">مطلبی برای نمایش وجود ندارد!</p>
        <?php endif; ?>
    </div>
</section>
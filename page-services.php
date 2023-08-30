<?php get_header();?>
<?php include_once 'partials/fields.php' ?>
<main class="services">
    <section class="services__intro intro">
        <h2 class="intro__title">Nos services</h2>
    </section>
    <?php
    $services = new WP_Query([
        'post_type' => 'service',
        'posts_per_page' => 4,
    ]);
    if ($services->have_posts()): while ($services->have_posts()): $services->the_post(); ?>
        <section class="services__service service">
            <h2 class="service__title"><?= get_the_title(); ?></h2>
            <div class="service__desc"><?= get_field('desc') ?></div>
            <div class="service__members members">
                <h3 class="members__title "><?= __t('Membres') ?></h3>
                <ul class="members__list">
                    <?php
                        $members = new WP_Query([
                            'post_type' => 'membre',
                            'meta_query' => [
                                [
                                    'key' => 'service',
                                    'value' => get_the_ID(),
                                    'compare' => '=',
                                ],
                            ],
                        ]);
                    if ($members->have_posts()): while ($members->have_posts()): $members->the_post();?>

                    <li class="members__list__item item">
                        <img src="" alt="">
                        <span class="item__member"><?= get_the_title(); ?></span>
                        <span class="item__desc"><?= get_field('desc'); ?></span>
                    </li>
                    <?php endwhile; endif;
                    wp_reset_postdata(); ?>
                </ul>
            </div>
            <div class="service__news news">
                <h3 class="news__title"><?= __t('Actualité') ?></h3>
            </div>
        </section>
    <?php endwhile; endif; ?>
</main>

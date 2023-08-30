<?php get_header();?>
<?php include_once 'partials/fields.php' ?>
<main class="front">
    <section class="front__hero hero">
        <h2 class="hero__title"><?= $main_title ?></h2>
        <p class="hero__desc"><?= $main_desc ?></p>
        <?= kc_insert_image(get_field('main_image'), 'big', array('hero__image')); ?>
    </section>
    <section class="front__services services">
        <h2 class="services__title"><?= __t('Nos services') ?></h2>
        <?php
        $services = new WP_Query([
            'post_type' => 'service',
            'posts_per_page' => 4,
        ]);
        if ($services->have_posts()): while ($services->have_posts()): $services->the_post(); ?>
            <article class="services__service service">
                <?= kc_insert_image(get_field('service_image'), 'medium', array('service__image')); ?>
                <h3 class="service__title"><?= get_the_title(); ?></h3>
                <div class="service__desc"><?= get_field('desc') ?></div>
                <a class="service__link" href="<?= home_url() . '/services#' . get_the_title() ?>">
                     <?= __t('Plus d\'info sur les ') . get_the_title(); ?>
                </a>
            </article>
        <?php endwhile; endif;
        wp_reset_postdata() ?>
    </section>
    <section class="front__help help">
        <h2 class="help__title"><?= __t('Vous pouvez nous aidez'); ?></h2>
        <ul class="help__list">
            <li class="help__list__item"><a href="#"><?= __t('Faire un don') ?></a></li>
            <li class="help__list__item"><a href="#"><?= __t('Devenir bénévole') ?></a></li>
            <li class="help__list__item"><a href="#"><?= __t('Consulter nos produits') ?></a></li>
        </ul>
    </section>
    <section class="front__news news">
        <h2 class="new__title"><?= __t('Dernières nouvelles') ?></h2>
    </section>
    <section class="front__comments comments">
        <h2 class="comments__title"><?= __t('Ce qu’on dit de nous') ?></h2>
    </section>
</main>

<?php
/*
Template Name: Sidebar Aktiviteter
*/
get_header();
?>
<div class="aktiviteter-page">
    <div class="container">
        <div class="main-content3">
            <div class="activity-content">
                <?php
                $args = array(
                    'post_type' => 'aktiviteter',
                    'posts_per_page' => -1,
                );

                $aktiviteter_query = new WP_Query($args);

                if ($aktiviteter_query->have_posts()) :
                    while ($aktiviteter_query->have_posts()) : $aktiviteter_query->the_post();
                    ?>
                        <div class="activity-item">
                            <div class="activity-text">
                                <h2><?php the_title(); ?></h2>
                                <?php the_content(); ?>
                            </div>
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="activity-image">
                                    <?php
                                    // Visa utvald bild med anpassade dimensioner
                                    the_post_thumbnail('custom-thumbnail-size'); // Anpassa storleken
                                    ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo 'Inga aktiviteter hittades.';
                endif;
                ?>
            </div>
            <div class="activity-sidebar">
                    <?php
                    $price_list_args = array(
                        'post_type' => 'price_list',
                        'posts_per_page' => -1,
                    );

                    $price_list_query = new WP_Query($price_list_args);

                    if ($price_list_query->have_posts()) :
                        while ($price_list_query->have_posts()) : $price_list_query->the_post();
                        ?>
                            <h3><?php the_title(); ?>: </h3>
                            <?php the_content(); ?>
                        <?php
                        endwhile;
                        wp_reset_postdata();
                    else :
                        echo 'Ingen prislista hittades.';
                    endif;
                    ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
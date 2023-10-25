<?php
/*
Template Name: Boenden
*/
get_header();
?>
<div class="container">
    <div class="main-content2">
    <section class="hero2">
            <h1>Boka din vistelse redan idag!</h1>
            <p>Läs vidare om våra boendeformer och skicka en bokningsförfrågan</p>
            <a href="#widget-area-anchor" class="cta-button">Boka</a>
        </section>
        <section class="page-content">
            <?php
            if (have_posts()) :
                while (have_posts()) : the_post();
                    the_content();
                endwhile;
            endif;
            ?>
        </section>
        <section class="boenden">
            <?php
            $category_slug = 'boenden'; // Här anger du kategorislugget för den kategori du vill visa

            $args = array(
                'post_type' => 'post', // Inläggstyp för boenden
                'posts_per_page' => -1, // Visa alla inlägg
                'category_name' => 'boenden', 
            );

            $boenden_query = new WP_Query($args);

            if ($boenden_query->have_posts()) :
                while ($boenden_query->have_posts()) : $boenden_query->the_post();
                ?>
                <div class="boenden-item">
                <?php
                    if (has_post_thumbnail()) { // Kontrollera om det finns en utvald bild för inlägget
                        echo '<div class="boende-image">' . get_the_post_thumbnail() . '</div>';
                    }
                    ?>
                        <h2><?php the_title(); ?></h2>
                        <div class="boenden-content">
                            <?php the_content(); ?>
                        </div>
                    </div>
                <?php
                endwhile;
                wp_reset_postdata(); // Återställ postdata
            endif;
            ?>
        </section>
        <div class="widget-area"><a name="widget-area-anchor"></a>
    <?php if (is_active_sidebar('custom-widget-area')) : ?>
        <?php dynamic_sidebar('custom-widget-area'); ?>
    <?php endif; ?>
</div>

    </div>
</div>
<?php get_footer(); ?>

<?php get_header(); ?>

<div class="container">
    <div class="main-content">
        <section class="hero">
            <h1>Välkommen till Hotel Bali</h1>
            <p>Upptäck paradiset och njut av en oförglömlig vistelse.</p>
            <a href="bo.php/#widget-area-anchor" class="cta-button">Boka nu</a>
        </section>
        
        <!-- Puffar -->
        <div class="puff-container"> 
            <?php
            // Anpassad loop för puffar
            $args = array(
                'post_type' => 'puff', // Anpassad posttyp
                'posts_per_page' => 2, // Antal puffar att visa
            );

            $puffs_query = new WP_Query($args);

            if ($puffs_query->have_posts()) :
                while ($puffs_query->have_posts()) : $puffs_query->the_post();
            ?>
                <div class="puff">
                    <h3><?php the_title(); ?></h3>
                    <?php the_content(); ?>
                </div>
            <?php
                endwhile;
                wp_reset_postdata(); // Återställ postdata
            endif;
            ?>
        </div> 
        <!-- Boenden-->
        <div class="bo-container">
            <h2>Våra boendeformer</h2>
            <div class="bo">
                <?php
                $news_args = array(
                    'post_type' => 'post', // Inläggstyp för nyheter
                    'category_name' => 'boenden', // Kategorin "boenden"
                    'posts_per_page' => 3, // Antal nyheter att visa
                );

                $news_query = new WP_Query($news_args);

                if ($news_query->have_posts()) :
                    while ($news_query->have_posts()) : $news_query->the_post();
                ?>
                <div class="bo-item">
                    <?php
                    if (has_post_thumbnail()) { // Kontrollera om det finns en utvald bild för inlägget
                        echo '<div class="bo-image">' . get_the_post_thumbnail() . '</div>';
                    }
                    ?>
                    <h3><?php the_title(); ?></h3>
                    <?php the_excerpt(); ?>
                    <a href="<?php the_permalink(); ?>" class="btn-continue-reading">Läs mer</a>
                </div>
                <?php
                    endwhile;
                    wp_reset_postdata(); // Återställ postdata
                endif;
                ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>

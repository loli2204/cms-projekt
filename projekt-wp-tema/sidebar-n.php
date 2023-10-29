<?php
/*
Template Name: Sidebar Nyheter
*/
get_header();
?>
<body class="nyheter-page">
    <div class="container">
        <div class="main-content3">
            <div class="news-content">
                <?php
                // Lägg till en WordPress Loop 
                $args = array(
                    'post_type' => 'post', // Använd posttypen "post" för nyheter
                    'posts_per_page' => -1,
                    'category_name' => 'nyheter', 
                );

                $nyheter_query = new WP_Query($args);

                if ($nyheter_query->have_posts()) :
                    while ($nyheter_query->have_posts()) : $nyheter_query->the_post();
                    ?>
                        <div class="news-item">
                            <div class="news-text">
                                <h2><?php the_title(); ?></h2>
                                <?php the_excerpt(); // Visa utdrag av nyhetsinlägget ?>
                                <a href="<?php the_permalink(); ?>" class="read-more-link">Läs mer</a>
                            </div>
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="news-image">
                                    <?php the_post_thumbnail('custom-thumbnail-size'); // Anpassa storleken
                                    ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo 'Inga nyheter hittades.';
                endif;
                ?>
            </div>
            <div class="news-sidebar">
                <div class="sidebar">
                <div class="sidebar">
                    <?php dynamic_sidebar('sidebar-widget-area'); ?>
                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php get_footer();
?>

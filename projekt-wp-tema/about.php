<?php
/*
Template Name: Kontakt
*/
get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <section class="contact">
            <div class="container">
                <div class="contact-content">
                    <div class="contact-info">
                        <h2>Kontakt</h2>
                        <div class="contact-post">
                            <?php
                            $args = array(
                                'post_type' => 'employee',
                                'posts_per_page' => 3,
                            );

                            $employee_query = new WP_Query($args);

                            if ($employee_query->have_posts()) :
                                while ($employee_query->have_posts()) : $employee_query->the_post();
                                    ?>
                                    <div class="employee">
                                        <?php the_post_thumbnail('medium'); ?>
                                        <h3><?php the_title(); ?></h3>
                                        <?php the_content(); ?>
                                    </div>
                                    <?php
                                endwhile;
                            endif;
                            wp_reset_postdata();
                            ?>
                        </div>
                    </div>
                    <div class="contact-form">
                        <?php
                        // Hämta inlägg med kategorin "Kontakt"
                        $args = array(
                            'post_type' => 'post', 
                            'category_name' => 'Kontakt',
                            'posts_per_page' => -1, 
                        );

                        $contact_posts = new WP_Query($args);

                        if ($contact_posts->have_posts()) :
                            while ($contact_posts->have_posts()) : $contact_posts->the_post();
                                ?>
                                <div class="contact-post">
                                    <h3><?php the_title(); ?></h3>
                                    <?php the_content(); ?>
                                </div>
                                <?php
                            endwhile;
                        else:
                            echo 'Inga inlägg i kategorin "kontakt" hittades.';
                        endif;
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </div>
        </section>

    </main>
</div>

<?php
get_footer();
?>

<?php get_header(); ?>

<div class="nyheter-page">
    <div class="container-single">
        <div class="single-post">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                <div class="post-meta">
                <?php if (has_post_thumbnail()) : ?>
                    <div class="post-thumbnail-container">
                        <?php the_post_thumbnail('hero-thumbnail-size'); ?>
                    </div>
                    <?php endif; ?>
                    <h2><?php the_title(); ?></h2>
                    Skriven av <?php the_author(); ?> den <?php the_date(); ?>
                </div>
                <div class="post-content">
                    <?php the_content(); ?>
                </div>

            <?php endwhile; endif; ?>
        </div>
        <div class="related-posts">
    <h3>Fler inlägg</h3>
    <ul>
        <?php
        
        $related_posts = get_posts(array(
            'posts_per_page' => 4, // 4 posts
            'post__not_in' => array(get_the_ID()), 
            'category__in' => wp_get_post_categories(get_the_ID()), 
            'tag__in' => wp_get_post_tags(get_the_ID()), 
        ));

        if ($related_posts) {
            foreach ($related_posts as $post) :
                setup_postdata($post);
        ?>
            <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
        <?php
            endforeach;
            wp_reset_postdata();
        } else {
            echo 'Hittade inga liknande inlägg.';
        }
        ?>
    </ul>
</div>
</div>
    </div>
<?php get_footer();

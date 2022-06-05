<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="container">
        <div class="row">
            <?php
            $args = array(
                'posts_per_page' => 4,
            );
            $last_posts_query = new WP_Query( $args );
            while( $last_posts_query->have_posts() ) : $last_posts_query->the_post();?>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class='card'>
                        <div class='card-thumb' style='background-image:url(<?php echo get_the_post_thumbnail_url();?>);'></div>
                        <div class='card-body'>
                            <h5 class='card-title'><a href='<?php the_permalink()?>'><?php the_title();?></a></h5>
                            <div class="entry-meta">
                                <?php the_date() ?> 
                            </div>
                            <p class='card-text'><?php the_excerpt();?></p>
                        </div>
                    </div>
                </div>
            <?php endwhile;
            wp_reset_query();
            ?>
        </div>
        <?php 
        if(function_exists('display_podcasts')){
            display_podcasts(); 
        }
        ?>
    </div>
</article>
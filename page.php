<?php
/** 
 * The page template file.<br>
 * This file works as display page content (post type "page") and its comments.
 * 
 * @package bootstrap-basic4
 */


// begins template. -------------------------------------------------------------------------
get_header();
?>
    <?php
    $main_width = 8; 
    if(get_field('pagina_de_programacio','option')==$post->ID){
        $main_width = 12;   
    }?>
    <main id="main" class="col-md-<?php echo $main_width?> site-main" role="main">
        <?php
        if (have_posts()) {
            $Bsb4Design = new \BootstrapBasic4\Bsb4Design();
            while (have_posts()) {
                the_post();
                get_template_part('template-parts/content', 'page');
                echo "\n\n";

                $Bsb4Design->pagination();
                echo "\n\n";

                // If comments are open or we have at least one comment, load up the comment template
                if (comments_open() || '0' != get_comments_number()) {
                    // comments_template();
                }
                echo "\n\n";
            }// endwhile;

            
            unset($Bsb4Design);
        } else {
            get_template_part('template-parts/section', 'no-results');
        }// endif;
        ?> 
    </main>
<?php
get_footer();
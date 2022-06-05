<?php
/**
 * The main template file.
 * 
 * To override home page (for listing latest post) add home.php into the theme.<br>
 * If front page displays is set to static, the index.php file will be use.<br>
 * If front-page.php exists, it will be override any home page file such as home.php, index.php.<br>
 * To learn more please go to https://developer.wordpress.org/themes/basics/template-hierarchy/ .
 * 
 * @package bootstrap-basic4
 */


// begins template. -------------------------------------------------------------------------
get_header();
?> 
                <main id="main" class="col-md-12 site-main" role="main">
                    <?php $homeblog_id = get_option('page_for_posts');
                    ?>
                    <header class="page-header">
                        <h1 class="page-title"><?php echo get_the_title($homeblog_id);?></h1>
                    </header>
                    <div class="row">
                        <?php
                        if (have_posts()) {?>
                            <?php while (have_posts()) {
                                the_post();?>
                                <div class="col-sm-12 col-md-6 col-lg-4">  
                                    <?php get_template_part('template-parts/content', get_post_format());?>
                                </div>
                            <?php }// endwhile;

                            $Bsb4Design = new \BootstrapBasic4\Bsb4Design();
                            $Bsb4Design->pagination();
                            unset($Bsb4Design);
                        } else {
                            get_template_part('template-parts/section', 'no-results');
                        }// endif;
                        ?> 
                    </div>
                </main>
<?php
get_footer();
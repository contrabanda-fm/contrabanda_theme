<?php
/** 
 * Template Name: Links
 * 
 * @package bootstrap-basic4
 */


// begins template. -------------------------------------------------------------------------
get_header();
?> 
                <main id="main" class="col-md-8 site-main" role="main">
                    <?php
                    if (have_posts()) {
                        $Bsb4Design = new \BootstrapBasic4\Bsb4Design();
                        while (have_posts()) {
                            the_post();?>
                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <header class="entry-header">
                                    <h1 class="entry-title"><?php the_title(); ?></h1>
                                </header><!-- .entry-header -->

                                <div class="entry-content">
                                    <?php //the_content(); ?> 
                                    <?php wp_list_bookmarks('show_description=1&link_after=<br/>&category=187'); ?>
                                    <?php wp_list_bookmarks('show_description=1&link_after=<br/>&category=188'); ?>
                                    <?php wp_list_bookmarks('show_description=1&link_after=<br/>&category=189'); ?>
                                    <?php wp_list_bookmarks('show_description=1&link_after=<br/>&category=2'); ?>
                                    <?php wp_list_bookmarks('show_description=1&link_after=<br/>&category=191'); ?>
                                    <?php wp_list_bookmarks('show_description=1&link_after=<br/>&category=6&category_before=<div class="link__block">&category_after=</div>'); ?>
                                    <div class="clearfix"></div>
                                </div><!-- .entry-content -->

                                <footer class="entry-meta">
                                    <div class="entry-meta-comment-tools">
                                        <?php $Bsb4Design->editPostLink(); ?> 
                                    </div>
                                </footer><!-- .entry-meta -->
                            </article><!-- #post-## -->
                            <?php unset($Bsb4Design); 
                        }// endwhile;
                    } else {
                        get_template_part('template-parts/section', 'no-results');
                    }// endif;
                    ?> 
                </main>
<?php
get_footer();
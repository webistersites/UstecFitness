<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Athena
 */
get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main athena-page" role="main">
        <div class="row">
        <section class="error-404 not-found">
            <header class="page-header">
                <h1 class="page-title"><i class="fa fa-exclamation-triangle"></i> <?php esc_html_e('Oops! That page can&rsquo;t be found.', 'athena'); ?></h1>
            </header><!-- .page-header -->

            <div class="page-content">
                <p><?php esc_html_e('It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'athena'); ?></p>

                <?php get_search_form(); ?>
 
                <hr>
                
                <?php wp_list_pages(); ?>
                
                <br>
                <br>
                
            </div><!-- .page-content -->
        </section><!-- .error-404 -->
        </div>
    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>

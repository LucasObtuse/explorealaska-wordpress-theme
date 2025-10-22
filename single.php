<?php
/**
 * The template for displaying single posts
 */
get_header(); ?>

<main class="site-content">
    <div class="content-area">
        <?php
        while (have_posts()) : the_post(); ?>
            
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                
                <?php if (has_post_thumbnail()) : ?>
                    <div class="post-thumbnail">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                <?php endif; ?>
                
                <header class="entry-header">
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                    
                    <div class="entry-meta">
                        <span class="posted-on">
                            Published on <?php echo get_the_date(); ?>
                        </span>
                        <span class="byline">
                            by <?php the_author(); ?>
                        </span>
                        <?php if (has_category()) : ?>
                            <span class="cat-links">
                                in <?php the_category(', '); ?>
                            </span>
                        <?php endif; ?>
                    </div>
                </header>
                
                <div class="entry-content">
                    <?php the_content(); ?>
                </div>
                
                <?php if (has_tag()) : ?>
                    <footer class="entry-footer">
                        <span class="tags-links">
                            <?php the_tags('Tags: ', ', ', ''); ?>
                        </span>
                    </footer>
                <?php endif; ?>
                
            </article>
            
            <?php
            // Post navigation
            the_post_navigation(array(
                'prev_text' => '← Previous Post',
                'next_text' => 'Next Post →',
            ));
            
            // Comments
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;
            
        endwhile;
        ?>
    </div>
</main>

<?php get_footer(); ?>

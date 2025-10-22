<?php
/**
 * The main template file
 */
get_header(); ?>

<main class="site-content">
    <div class="content-area">
        <?php if (have_posts()) : ?>
            
            <?php while (have_posts()) : the_post(); ?>
                
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="post-thumbnail">
                            <?php the_post_thumbnail('large'); ?>
                        </div>
                    <?php endif; ?>
                    
                    <header class="entry-header">
                        <h2 class="entry-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>
                        
                        <div class="entry-meta">
                            <span class="posted-on">
                                <?php echo get_the_date(); ?>
                            </span>
                            <span class="byline">
                                by <?php the_author(); ?>
                            </span>
                        </div>
                    </header>
                    
                    <div class="entry-content">
                        <?php 
                        if (is_singular()) {
                            the_content();
                        } else {
                            the_excerpt();
                        }
                        ?>
                    </div>
                    
                    <?php if (!is_singular()) : ?>
                        <a href="<?php the_permalink(); ?>" class="read-more">Read More →</a>
                    <?php endif; ?>
                    
                </article>
                
            <?php endwhile; ?>
            
            <div class="pagination">
                <?php
                the_posts_pagination(array(
                    'mid_size' => 2,
                    'prev_text' => '← Previous',
                    'next_text' => 'Next →',
                ));
                ?>
            </div>
            
        <?php else : ?>
            
            <article class="no-results">
                <header class="entry-header">
                    <h1 class="entry-title">Nothing Found</h1>
                </header>
                <div class="entry-content">
                    <p>Sorry, no posts matched your criteria. Try searching for something else.</p>
                    <?php get_search_form(); ?>
                </div>
            </article>
            
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>

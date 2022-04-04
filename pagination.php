<?php
/**
* Template Name: Whatson Archive Template
*
*/
get_header();

// Render partials
get_template_part('template-parts/story/block', 'heading');
?>

<?php 
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $args = array(
        'post_type'=> 'whats_on',
        'post_status'=>'publish',
        'posts_per_page' => -1,
        'posts_per_page' => 9,
        'paged' => $paged
    );              
    
    $the_query = new WP_Query( $args ); 
?>

<div class="section section__tiles three-column">
    <div class="container">
        <div class="row">
            <?php
                if ($the_query->have_posts()) {
                    $counter = 1;
                    while ($the_query->have_posts()) {
                        $the_query->the_post();
                        get_template_part('template-parts/story/block', 'post');

                        // Divider
                        if (
                            $counter % 3 === 0
                            && $the_query->post_count !== $counter
                        ) {
                            echo '<div class="col-lg-12 hidden-sm"><span class="section-border"></span></div>';
                        }

                        $counter++;
                    }
                }
            ?>
        </div>

        <div class="row">
            <div class="col-md-12 mx-auto">
                <?php
                    $big = 999999999; // need an unlikely integer

                    $links = paginate_links( array(
                        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                        'format' => '?paged=%#%',
                        'current' => max(1, get_query_var('paged')),
                        'total' => $the_query->max_num_pages,
                        'show_all' => false,
                        'end_size' => 3,
                        'mid_size' => 2,
                        'prev_next' => true,
                        'prev_text' => __('Prev'),
                        'next_text' => __('Next'),
                        'type' => 'array',
                    ));

                    if ($links) {
                        echo '<nav class="page-navigation "><ul class="pagination">';
                        foreach ($links as $link) {
                            echo sprintf('<li class="page-item">%s</li>', str_replace('page-numbers', 'page-numbers page-link',  $link));
                        }
                        echo '</ul></nav>';
                    }
                ?>
            </div>
        </div>

        <?php  
        $instag = get_field('instagram', 'option');
        ?>
        <div class="section section__followus">
            <div class="container">
                <?php
                    if (isset($instag['heading']) && $instag['heading']) {
                        printf('<h2>%s</h2>', trim($instag['heading']));
                    }
                ?>
                <div class="row">
                    <div class="col-md-12 mt-5 mx-auto text-center">
                        <?php
                            if (isset($instag['shortcode']) && $instag['shortcode'])
                                echo do_shortcode(trim($instag['shortcode']));
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();

<?php 
get_header();
?>

<!-- Page Title
============================================= -->
<section id="page-title">
<div class="container clearfix">
<h1><?php single_post_title(); ?></h1>
<span>
    <?php 
    if( function_exists( 'the_subtitle' ) ) {
        the_subtitle();
    }
    ?>
</span>
</div>
</section><!-- #page-title end -->


<!-- Content
    ============================================= -->
<section id="content">

    <div class="content-wrap">

        <div class="container clearfix">

            <!-- Post Content
          ============================================= -->
            <div class="postcontent nobottommargin clearfix">
                <?php
                    while( have_posts() ) {
                        the_post();
                        global $post;
                        $author_id = $post->post_author;
                        $author_url = get_author_posts_url( $author_id );
                        ?>

                        <div class="single-post nobottommargin">

                            <!-- Single Post
                                    ============================================= -->
                            <div class="entry clearfix">

                                <!-- Entry Image
                                        ============================================= -->
                                        <?php if ( has_post_thumbnail() ) : ?>
                                            <div class="entry-image">
                                                <a href="#">
                                                    <?php the_post_thumbnail( 'full' ) ?>
                                                </a>
                                            </div>
                                        <?php endif; ?><!-- .entry-image end -->

                                <!-- Entry Content
                                        ============================================= -->
                                <div class="entry-content notopmargin">

                                    <?php 
                                        the_content();
                                        $defaults = [
                                            'before'        =>  '<p class="text-center">' . __( 'Pages: ', 'udemy'),
                                            'after'         =>  '</p>'
                                        ];
                                        wp_link_pages( $defaults );
                                     ?>
                                    <!-- Post Single - Content End -->

                                    <div class="clear"></div>
                                    <!-- Tag Cloud
                                            ============================================= -->
                                    <div class="tagcloud clearfix bottommargin">
                                        <?php the_tags( '', ' ' ); ?>
                                    </div><!-- .tagcloud end -->

                                    <div class="clear"></div>

                                </div>
                            </div><!-- .entry end -->

                            <div class="line"></div>


                            <?php 
                                if( comments_open() || get_comments_number() ) {
                                    comments_template();
                                }
                            ?>
                            
                        </div>
                        <?php
                    }
                ?>
                

            </div><!-- .postcontent end -->

            <?php get_sidebar() ?>

        </div>

    </div>

</section>
<!-- #content end -->

<?php get_footer() ?>
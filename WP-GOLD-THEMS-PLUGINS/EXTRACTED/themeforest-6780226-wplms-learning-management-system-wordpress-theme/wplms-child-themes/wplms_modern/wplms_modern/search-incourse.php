<?php
    get_header(wplms_modern_get_header());
    global $wp_query;
    $total_results = $wp_query->found_posts; 
?>
<?php
    $vibe = Wplms_Modern_Init::init();
    
?>
<section id="title" class="title-area">
    <div class="title-content">
        <div class="container">
            <div class="title-text">
                <div class="row">
                    <div class="col-md-12">
                        <h1><?php _e('Search Results for "', 'wplms_modern'); the_search_query(); ?>"</h1>
                        <h5><?php echo $total_results.__(' results found','wplms_modern');  ?></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</section>
<section id="content">
    <div class="container">
        <div class="scontent">
            <?php
                $select_boxes = apply_filters('wplms_course_search_selects','instructors=1&cats=1&level=1');
               echo the_widget('BP_Course_Search_Widget',$select_boxes,array()); 
            ?>
        </div>
        <?php
            do_action('wplms_course_sidebar_hook');
        ?>
        <div class="search_results">
            <?php
                if ( have_posts() ) : while ( have_posts() ) : the_post();
                //if($post->post_type == 'course'){
                    if(function_exists('thumbnail_generator')){
                        echo '<div class="col-md-3 clear4">'.thumbnail_generator($post,'course','medium',0,0,0).'</div>';
                    }else{
                       echo ' <div class="blogpost">
                            <div class="meta">
                               <div class="date">
                                <p class="day"><span>'.get_the_time('j').'</span></p>
                                <p class="month">'.get_the_time('M').'</p>
                               </div>
                            </div>
                            '.(has_post_thumbnail(get_the_ID())?'
                            <div class="featured">
                                <a href="'.get_permalink().'">'.get_the_post_thumbnail(get_the_ID(),'full').'</a>
                            </div>':'').'
                            <div class="excerpt '.(has_post_thumbnail(get_the_ID())?'thumb':'').'">
                                <h3><a href="'.get_permalink().'">'.get_the_title().'</a></h3>
                                <div class="cats">
                                    '.$cats.'
                                    <p>| 
                                    <a href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'">'.get_the_author_meta( 'display_name' ).'</a>
                                    </p>
                                </div>
                                <p>'.get_the_excerpt().'</p>
                                <a href="'.get_permalink().'" class="link">'.__('Read More','wplms_modern').'</a>
                            </div>
                        </div>';
                    }
                //}   
                endwhile;
                else:
                    echo '<h3>'.__('Sorry, No results found.','wplms_modern').'</h3>';
                endif;
                pagination();
                wp_reset_postdata();
            ?>
        </div>
    </div>
</section>
<?php
get_footer(wplms_modern_get_footer());
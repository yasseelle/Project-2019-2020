<?php

  if(is_user_logged_in()):

    global $post;

    $user_id = get_current_user_id();
    $coursetaken=get_user_meta($user_id,$post->ID,true);

    if(isset($coursetaken) && $coursetaken){
     
      
    $answers=get_comments(array(
      'post_id' => $post->ID,
      'status' => 'approve',
      'user_id' => $user_id
      ));
    if(isset($answers) && is_array($answers) && count($answers)){
        $answer = end($answers);
        $content = $answer->comment_content;
    }else{
        $content='';
    }

    $fields =  array(
        'author' => '<p><label class="comment-form-author clearfix">'.__( 'Name','wplms_modern' ) . ( $req ? '<span class="required">*</span>' : '' ) . '</label> ' . '<input class="form_field" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" /></p>',
        'email'  => '<p><label class="comment-form-email clearfix">'.__( 'Email','wplms_modern' ) .  ( $req ? '<span class="required">*</span>' : '' ) . '</label> ' .          '<input id="email" class="form_field" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '"/></p>',
        'url'   => '<p><label class="comment-form-url clearfix">'. __( 'Website','wplms_modern' ) . '</label>' . '<input id="url" name="url" type="text" class="form_field" value="' . esc_attr( $commenter['comment_author_url'] ) . '"/></p>',
         );
        
   $comment_field='<p>' . '<textarea id="comment" name="comment" class="form_field" rows="8" ">'.$content.'</textarea></p>';

   if ( isset($_POST['review']) && wp_verify_nonce($_POST['review'],get_the_ID()) ):

    comment_form(array('fields'=>$fields,'comment_field'=>$comment_field,'label_submit' => __('Post Review','wplms_modern'),'title_reply'=> '<span>'.__('Write a Review','wplms_modern').'</span>','logged_in_as'=>'','comment_notes_after'=>'' ));
    echo '<div id="comment-status" data-quesid="'.$post->ID.'"></div><script>jQuery(document).ready(function($){$("#submit").hide();$("#comment").on("keyup",function(){if($("#comment").val().length){$("#submit").show(100);}else{$("#submit").hide(100);}});});</script>';
    endif;
  }
  ?>
<?php
  endif;

if(!isset($_POST['review'])){
?>
<div class="course_reviews">
  <h3 class="heading"><?php _e('Course Reviews','wplms_modern'); ?></h3>
  <div class="review_breakup">
    <?php
    $vibe = Wplms_Modern_Init::init();
    $average_rating = get_post_meta(get_the_ID(),'average_rating',true);
    $count = get_post_meta(get_the_ID(),'rating_count',true);
    $breakup = $vibe->get_rating_breakup();
    $ratings = array(1=>0,2=>0,3=>0,4=>0,5=>0);
    foreach($breakup as $value){
       $ratings[$value->val] = intval($value->count);
    }
    ?>
    <div class="col-md-4">
      <div class="rating_snapshot">
        <h2><?php echo (($average_rating)?$average_rating:'N.A'); ?></h2>
        <?php
        echo '<div class="modern-star-rating">';
            for($i=1;$i<=5;$i++){
              if($average_rating >= 1){
                echo '<span class="dashicons dashicons-star-filled"></span>';
              }elseif(($average_rating < 1 ) && ($average_rating >= 0.3 ) ){
                echo '<span class="dashicons dashicons-star-half"></span>';
              }else{
                echo '<span class="dashicons dashicons-star-empty"></span>';
              }
              $average_rating--;
            }
            echo '</div>';
            echo '<span>'.$count.' '.__('ratings','wplms_modern').'</span>';
        ?>
      </div>
    </div>
    <div class="col-md-8">
      <ul class="rating_breakup">
      <?php
        if(empty($count)){$count=1;}
        foreach($ratings as $k => $rating){
          echo '<li><span>'.$k.' '.__('stars','wplms_modern').'</span><strong><span style="width:'.(100*($rating/$count)).'%">'.$rating.'</span></strong></li>';
        }
      ?>
      </ul>
    </div>
  </div>
  <div class="show_course_reviews">
      <?php
      if (get_comments_number()==0) {
        echo '<div id="message" class="notice"><p>';_e('No Reviews found for this course.','wplms_modern');echo '</p></div>';
      }else{
      ?>

      <ol class="reviewlist commentlist"> 
      <?php 
            //wp_list_comments('type=comment&avatar_size=120&reverse_top_level=false'); 
            wp_list_comments(array(
               'type'        =>'comment',
               'reverse_top_level'=>false,
               'avatar_size' =>120,
               'callback'    => 'vibe_reviews'
               )
             ); 
            paginate_comments_links( array('prev_text' => '&laquo;', 'next_text' => '&raquo;') )
        ?>  
      </ol> 
      <a class="show_reviews" data-default="<?php _e('More Reviews','wplms_modern'); ?>" data-less="<?php _e('Less Reviews','wplms_modern'); ?>"><?php _e('More Reviews','wplms_modern'); ?></a>
  <?php
    }
    ?>
    </div>
    <?php
    $course_review = get_post_meta(get_the_ID(),'vibe_course_review',true);
    if(is_user_logged_in() && vibe_validate($course_review) && bp_course_is_member($post->ID,$user_id)){
      comment_form(array('fields'=>$fields,'comment_field'=>$comment_field,'label_submit' => __('Post Review','wplms_modern'),'title_reply'=> '<span>'.__('Post Review','wplms_modern').'</span>','logged_in_as'=>'','comment_notes_after'=>'' ));
    }
  ?>
</div>
<?php
}
?>


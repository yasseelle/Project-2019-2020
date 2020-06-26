<?php
 if (comments_open()){
?>

<div id="comments">
   <h3 class="comments-title"><?php comments_number(__('No comments, be the first one to comment !','wplms_modern'),sprintf(__('%d comment','wplms_modern'),1),sprintf(__('%s comments','wplms_modern'),'%')); ?><a href="<?php echo get_post_comments_feed_link(' '); ?>" class="comments_rss"><i class="fa fa-rss"></i></a></h3>
          <ol class="commentlist"> 
          <?php 
           wp_list_comments(array(
             'type'        =>'comment',
             'avatar_size' =>120,
             'callback'    => 'vibe_better_comments'
             )
           );

       ?>    
          </ol>    
      <div class="navigation">
         <div class="alignleft"><?php previous_comments_link() ?></div>
         <div class="alignright"><?php next_comments_link() ?></div>
     </div>
     
     <?php
                       
$fields =  array(
       'author' => '<p class="col-md-6">' . '<input id="author" class="form_field" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" placeholder="'.__( 'Name','wplms_modern' ) . ( $req ? '*' : '' ) . '"/></p>',
       'email'  => '<p class="col-md-6">' . '<input id="email" class="form_field"name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" placeholder="'.__( 'Email','wplms_modern' ) .  ( $req ? '*' : '' ) . '"/></p>');

$comment_field='<p class="col-md-12">' . '<textarea id="comment" name="comment" class="form_field" rows="8" placeholder="'. __( 'Comment','wplms_modern' ) . '"></textarea></p>';


comment_form(array('fields'=>$fields,'comment_field'=>$comment_field));

?>
</div>
<?php
}
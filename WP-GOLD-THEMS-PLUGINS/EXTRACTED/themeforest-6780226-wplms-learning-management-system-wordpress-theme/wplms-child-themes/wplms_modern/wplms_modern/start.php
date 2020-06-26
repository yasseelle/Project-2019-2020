<?php
/**
 * Template Name: Start Course Page
 */

// COURSE STATUS : 
// 0 : NOT STARTED 
// 1: STARTED 
// 2 : SUBMITTED
// > 2 : EVALUATED

// VERSION 1.8.4 NEW COURSE STATUSES
// 1 : START COURSE
// 2 : CONTINUE COURSE
// 3 : FINISH COURSE : COURSE UNDER EVALUATION
// 4 : COURSE EVALUATED

do_action('wplms_before_start_course');

get_header(wplms_modern_get_header());

$user_id = get_current_user_id();  

if(isset($_POST['course_id'])){
    $course_id=$_POST['course_id'];
    $coursetaken=get_user_meta($user_id,$course_id,true);
}else if(isset($_COOKIE['course'])){
      $course_id=$_COOKIE['course'];
      $coursetaken=1;
}

if(!isset($course_id) || !is_numeric($course_id))
    wp_die(__('INCORRECT COURSE VALUE. CONTACT ADMIN','wplms_modern'));

$course_curriculum=vibe_sanitize(get_post_meta($course_id,'vibe_course_curriculum',false));
$unit_id = wplms_get_course_unfinished_unit($course_id);

$unit_comments = vibe_get_option('unit_comments');
$class= '';
if(isset($unit_comments) && is_numeric($unit_comments)){
    $class .= 'enable_comments';
}

$class= apply_filters('wplms_unit_wrap',$class,$unit_id,$user_id);

if ( have_posts() ) : while ( have_posts() ) : the_post();

?>
<section id="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                <div class="unit_wrap <?php echo $class; ?>">
                <div id="unit_content" class="unit_content">
                
                <div id="unit" class="<?php echo get_post_type($unit_id); ?>_title" data-unit="<?php if(isset($unit_id)) echo $unit_id; ?>">
                	<?php
                    do_action('wplms_unit_header',$unit_id,$course_id);

                    $minutes=0;
                    $mins = get_post_meta($unit_id,'vibe_duration',true);
                    $unit_duration_parameter = apply_filters('vibe_unit_duration_parameter',60);
                    if($mins){
                      if($mins > $unit_duration_parameter){
                        $hours = floor($mins/$unit_duration_parameter);
                        $minutes = $mins - $hours*$unit_duration_parameter;
                      }else{
                        $minutes = $mins;
                      }
                    
                      do_action('wplms_course_unit_meta',$unit_id);
                      if($mins < 9999){ 
                        if($unit_duration_parameter == 1)
                          echo '<span><i class="icon-clock"></i> '.(isset($hours)?$hours.__(' Minutes','wplms_modern'):'').' '.$minutes.__(' seconds','wplms_modern').'</span>';
                        else if($unit_duration_parameter == 60)
                          echo '<span><i class="icon-clock"></i> '.(isset($hours)?$hours.__(' Hours','wplms_modern'):'').' '.$minutes.__(' minutes','wplms_modern').'</span>';
                        else if($unit_duration_parameter == 3600)
                          echo '<span><i class="icon-clock"></i> '.(isset($hours)?$hours.__(' Days','wplms_modern'):'').' '.$minutes.__(' hours','wplms_modern').'</span>';
                      } 

                    }

                	?>
                	<br /><h1><?php 
                    if(isset($course_id)){
                    	echo get_the_title($unit_id);
                    }else{
                        the_title();
                    }
                     ?></h1>
                    <?php
					if(isset($course_id)){
                    	the_sub_title($unit_id);
                    }else{
                    	the_sub_title();	
                    }	
                    ?>	
                    </div>
                    <?php

                    if(isset($coursetaken) && $coursetaken && $unit_id !=''){
                    	if(isset($course_curriculum) && is_array($course_curriculum)){
							the_unit($unit_id);
                            if(isset($unit_comments) && is_numeric($unit_comments)){
                                echo "<script>jQuery(document).ready(function($){ $('.unit_content').trigger('load_comments'); });</script>";
                            }
                    	}else{
                    		echo '<h3>';
                    		_e('Course Curriculum Not Set.','wplms_modern');
                    		echo '</h3>';
                    	}
                    }else{
                        the_content();
                        if(isset($course_id) && is_numeric($course_id)){
                            $course_instructions = get_post_meta($course_id,'vibe_course_instructions',true);
                            echo apply_filters('the_content',$course_instructions);
                        }
                    }
                    
                endwhile;
                endif;
                ?>
                <?php
                $units=array();
                if(isset($course_curriculum) && is_array($course_curriculum) && count($course_curriculum)){
                  foreach($course_curriculum as $key=>$curriculum){
                    if(is_numeric($curriculum)){
                        $units[]=$curriculum;
                    }
                  }
                }else{
                    echo '<div class="error"><p>'.__('Course Curriculum Not Set','wplms_modern').'</p></div>';
                }   

                  if($unit_id ==''){
                    echo  '<div class="unit_prevnext"><div class="col-md-3"></div><div class="col-md-6">
                          '.((isset($done_flag) && $done_flag)?'': '<a href="#" data-unit="'.$units[0].'" class="unit unit_button">'.__('Start Course','wplms_modern').'</a>').
                        '</div></div>';
                  }else{

                    $k = array_search($unit_id,$units);
                  
                  if(empty($k)) $k = 0;

            	  $next=$k+1;
                  $prev=$k-1;
                  $max=count($units)-1;

                  $done_flag=get_user_meta($user_id,$unit_id,true);
                  

                  echo  '<div class="unit_prevnext"><div class="col-md-3">';
                  if($prev >=0){
                    if(get_post_type($units[$prev]) == 'quiz'){
                        echo '<a href="#" data-unit="'.$units[$prev].'" class="unit unit_button">'.__('Previous Quiz','wplms_modern').'</a>';
                    }else    
                        echo '<a href="#" id="prev_unit" data-unit="'.$units[$prev].'" class="unit unit_button">'.__('Previous Unit','wplms_modern').'</a>';
                  }
                  echo '</div>';

                  echo  '<div class="col-md-6">';
                  $quiz_passing_flag = true;
                    if(!isset($done_flag) || !$done_flag){
                            if(get_post_type($units[($k)]) == 'quiz'){

                                $quiz_status = get_user_meta($user_id,$units[($k)],true);
                                $quiz_class = apply_filters('wplms_in_course_quiz','');
                                if(is_numeric($quiz_status)){
                                    if($quiz_status < time()){ 
                                        echo '<a href="'.bp_loggedin_user_domain().BP_COURSE_SLUG.'/'.BP_COURSE_RESULTS_SLUG.'/?action='.$units[($k)].'" class="quiz_results_popup">'.__('Check Results','wplms_modern').'</a>';
                                    }else{
                                        echo '<a href="'.get_permalink($units[($k)]).'" class=" unit_button '.$quiz_class.' continue">'.__('Continue Quiz','wplms_modern').'</a>';
                                    }
                                }else{
                                    echo '<a href="'.get_permalink($units[($k)]).'" class=" unit_button '.$quiz_class.'">'.__('Start Quiz','wplms_modern').'</a>';
                                }
                            }else{
                                echo apply_filters('wplms_unit_mark_complete','<a href="#" id="mark-complete" data-unit="'.$units[($k)].'" class="unit_button">'.__('Mark this Unit Complete','wplms_modern').'</a>',$unit_id,$course_id);
                            }
                    }else{
                        if(get_post_type($units[($k)]) == 'quiz'){
                            $quiz_status = get_user_meta($user_id,$units[($k)],true);
                            $quiz_class = apply_filters('wplms_in_course_quiz','');
                            $quiz_passing_flag = apply_filters('wplms_next_unit_access',true,$units[($k)]);
                            if(is_numeric($quiz_status)){
                                if($quiz_status < time()){ 
                                    echo '<a href="'.bp_loggedin_user_domain().BP_COURSE_SLUG.'/'.BP_COURSE_RESULTS_SLUG.'/?action='.$units[($k)].'" class="quiz_results_popup">'.__('Check Results','wplms_modern').'</a>';
                                }else{
                                    echo '<a href="'.get_permalink($units[($k)]).'" class=" unit_button '.$quiz_class.' continue">'.__('Continue Quiz','wplms_modern').'</a>';
                                }
                            }else{
                                echo '<a href="'.bp_loggedin_user_domain().BP_COURSE_SLUG.'/'.BP_COURSE_RESULTS_SLUG.'/?action='.$units[($k)].'" class="quiz_results_popup">'.__('Check Results','wplms_modern').'</a>';
                            }
                          }
                          // If unit does not show anything
                    }
                    echo '</div>';

                  echo  '<div class="col-md-3">';

                  $nextflag=1;
                  if($next <= $max){
                    $nextunit_access = vibe_get_option('nextunit_access');
                    if(isset($nextunit_access) && $nextunit_access){
                        for($i=0;$i<$next;$i++){
                            $status = get_post_meta($units[$i],$user_id,true);
                            if(!empty($status) && (!isset($done_flag) || !$done_flag)){
                                $nextflag=0;
                                break;
                            }
                        }
                    }
                    $class = 'unit unit_button';

                    $unit_lock = vibe_get_option('nextunit_access');
                    if(isset($unit_lock) && $unit_lock && (!isset($done_flag) || !$done_flag)){
                        $class .=' hide';
                    }
                    if($nextflag){
                        if(get_post_type($units[$next]) == 'quiz'){
                            if($quiz_passing_flag)
                                echo '<a href="#" id="next_quiz" data-unit="'.$units[$next].'" class="'.$class.'">'.__('Next Quiz','wplms_modern').'</a>';
                        }else{
                            if(get_post_type($units[$next]) == 'unit'){ //Display Next unit link because current unit is a quiz on Page reload
                               if($quiz_passing_flag)
                                echo '<a href="#" id="next_unit" data-unit="'.$units[$next].'" class="'.$class.'">'.__('Next Unit','wplms_modern').'</a>';
                            }
                        } 
                    }else{
                        echo '<a href="#" id="next_unit" class="unit unit_button hide">'.__('Next Unit','wplms_modern').'</a>';
                    }
                  }
                  echo '</div></div>';

                } // End the Bug fix on course begining
	            ?>
                </div>
                <?php
                	wp_nonce_field('security','hash');
                	echo '<input type="hidden" id="course_id" name="course" value="'.$course_id.'" />';
                ?>
                <div id="ajaxloader" class="disabled"></div>
                <div class="side_comments"><a id="all_comments_link" data-href="<?php if(isset($unit_comments) && is_numeric($unit_comments)){echo get_permalink($unit_comments);} ?>"><?php _e('SEE ALL','wplms_modern'); ?></a>
                    <ul class="main_comments">
                        <li class="hide">
                            <div class="note">
                            <?php
                            $author_id = get_current_user_id();
                            echo get_avatar($author_id).' <a href="'.bp_core_get_user_domain($author_id).'" class="unit_comment_author"> '.bp_core_get_user_displayname( $author_id) .'</a>';
                            
                            $link = vibe_get_option('unit_comments');
                            if(isset($link) && is_numeric($link))
                                $link = get_permalink($link);
                            else
                                $link = '#';
                            ?>
                            <div class="unit_comment_content"></div>
                            <ul class="actions">
                                <li><a class="tip edit_unit_comment" title="<?php _e('Edit','wplms_modern'); ?>"><i class="icon-pen-alt2"></i></a></li>
                                <li><a class="tip public_unit_comment" title="<?php _e('Make Public','wplms_modern'); ?>"><i class="icon-fontawesome-webfont-3"></i></a></li>
                                <li><a class="tip private_unit_comment" title="<?php _e('Make Private','wplms_modern'); ?>"><i class="icon-fontawesome-webfont-4"></i></a></li>
                                <li><a class="tip reply_unit_comment" title="<?php _e('Reply','wplms_modern'); ?>"><i class="icon-curved-arrow"></i></a></li>
                                <li><a class="tip instructor_reply_unit_comment" title="<?php _e('Request Instructor reply','wplms_modern'); ?>"><i class="icon-forward-2"></i></a></li>
                                <li><a data-href="<?php echo $link; ?>" class="popup_unit_comment" title="<?php _e('Open in Popup','wplms_modern'); ?>" target="_blank"><i class="icon-windows-2"></i></a></li>
                                <li><a class="tip remove_unit_comment" title="<?php _e('Remove','wplms_modern'); ?>"><i class="icon-cross"></i></a></li>
                            </ul>
                            </div>
                        </li>
                    </ul>

                    <a class="add-comment"><?php _e('Add a Note','wplms_modern');?></a>
                    <div class="comment-form">
                        <?php
                        echo get_avatar($author_id); echo ' <span>'.__('YOU','wplms_modern').'</span>';
                        ?>
                        <article class="live-edit" data-model="article" data-id="1" data-url="/articles">
                            <div class="new_side_comment" data-editable="true" data-name="content" data-text-options="true">
                            <?php _e('Add your Comment','wplms_modern'); ?>
                            </div>
                        </article>
                        <ul class="actions">
                            <li><a class="post_unit_comment tip" title="<?php _e('Post','wplms_modern'); ?>"><i class="icon-fontawesome-webfont-4"></i></a></li>
                            <li><a class="remove_side_comment tip" title="<?php _e('Remove','wplms_modern'); ?>"><i class="icon-cross"></i></a></li>
                        </ul>
                    </div>       
                </div>
                </div>
            </div>
            <div class="col-md-3">
            	<div class="course_time">
            		<?php
            			the_course_time("course_id=$course_id&user_id=$user_id");
            		?>
            	</div>
                <?php 

                do_action('wplms_course_start_after_time',$course_id,$unit_id);  

                echo the_course_timeline($course_id,$unit_id);

                do_action('wplms_course_start_after_timeline',$course_id,$unit_id);

            	if(isset($course_curriculum) && is_array($course_curriculum)){
            		?>
            	<div class="more_course">
            		<a href="<?php echo get_permalink($course_id); ?>" class="unit_button full button"><?php _e('BACK TO COURSE','wplms_modern'); ?></a>
            		<form action="<?php echo get_permalink($course_id); ?>" method="post">
            		<?php
            		$finishbit=bp_course_get_user_course_status($user_id,$course_id);
            		if(is_numeric($finishbit)){
            			if($finishbit < 4){
                            echo '<input type="submit" name="review_course" class="review_course unit_button full button" value="'. __('REVIEW COURSE ','wplms_modern').'" />';
            			    echo '<input type="submit" name="submit_course" class="review_course unit_button full button" value="'. __('FINISH COURSE ','wplms_modern').'" />';
            			}
            		}
            		?>	
            		<?php wp_nonce_field($course_id,'review'); ?>
            		</form>
            	</div>
            	<?php
            		}
            	?>	
            </div>
        </div>
    </div>
</section>
<?php
get_footer(wplms_modern_get_footer());
?>
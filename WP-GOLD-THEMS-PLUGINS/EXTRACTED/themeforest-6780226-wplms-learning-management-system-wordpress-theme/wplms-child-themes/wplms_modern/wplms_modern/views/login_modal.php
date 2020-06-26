<div id="login-modal">
    <div class="md-content">
        <div id="login_register_form">
            <div class="col-md-6">
                <form name="form" name="login-form" class="form-validation" action="<?php echo apply_filters('wplms_login_widget_action',home_url( 'wp-login.php', 'login-post' )); ?>" method="post">
                    <h3><?php _e('Login','wplms_modern'); ?></h3>
                      <div class="list-group list-group-sm">
                        <div class="list-group-item">
                          <label><?php _e('USERNAME','wplms_modern'); ?></label>  
                          <input type="text" name="log" placeholder="<?php _e('Enter Username','wplms_modern'); ?>" class="form-control no-border" required="" tabindex="0" aria-required="true" aria-invalid="true">
                        </div>
                        <div class="list-group-item">
                           <label><?php _e('PASSWORD','wplms_modern'); ?></label>  
                           <input type="password" name="pwd" placeholder="<?php _e('Enter Password','wplms_modern'); ?>" class="form-control no-border" required="" tabindex="0" aria-required="true" aria-invalid="true">
                        </div>
                      </div>
                      <div class="pull-right"><a id="forgot_password_trigger" href="#"><?php _e('Forgot Password?','wplms_modern'); ?></a></div>
                      <div class="checkbox">
                        <input type="checkbox" id="rememberme" name="rememberme" value="forever">
                        <label for="rememberme"><?php _e('Remember me','wplms_modern'); ?></label>
                      </div>
                      <input type="submit" name="wp-submit" class="btn btn-lg btn-primary btn-block" id="wp-submit" value="<?php _e('SIGN IN','wplms_modern'); ?>" tabindex="100" />
                      <input type="hidden" name="testcookie" value="1" />
                      <div class="line line-dashed"></div>
                      <?php do_action( 'login_form' ); //BruteProtect FIX ?>
                </form>
            </div>
            <div class="col-md-6">
                <h3><?php _e('Register','wplms_modern'); ?></h3>
                <?php do_action('bp_social_connect'); 

                $disable_ajax_registration = vibe_get_option('disable_ajax_registration');
                if(empty($disable_ajax_registration)){
                ?>
                <a id="create_account_trigger" class="btn btn-lg btn-default btn-block" href="#" ><?php _e('Create an Account','wplms_modern'); ?></a>
                <?php
                }else{
                  $registration_link = apply_filters('wplms_buddypress_registration_link',site_url( BP_REGISTER_SLUG . '/' ));
                ?>
                <a href="<?php echo $registration_link; ?>" class="btn btn-lg btn-default btn-block" href="#" ><?php _e('Create an Account','wplms_modern'); ?></a>
                <?php
                }
                ?>
            </div>
        </div>
        <div id="create_account">
            <div class="col-md-6 col-md-offset-3">
              <form role="form" id="new_user">
                <div class="list-group list-group-sm">
                  <?php
                    $fields = apply_filters('vibe_projects_registration_fields',array(
                      array(
                          'label'=> __('Username','wplms_modern'),
                          'placeholder'=> __('Enter Name','wplms_modern'),
                          'id'=> 'user_login',
                          'field' => 'text',
                          'validation'=>'',
                          'set' => 'core',
                          'class'=> 'form-control no-border',
                          'extras'=> array('data-parsley-trigger'=>'change'),
                          'required' => 1,
                        ),
                      array(
                          'id'=> 'user_email',
                          'label'=> __('Email','wplms_modern'),
                          'placeholder'=> __('Enter email address','wplms_modern'),
                          'field' => 'email',
                          'validation'=>'email',
                          'set' => 'core',
                          'extras' => array('parsley-type'=>'email','parsley-trigger'=>'keyup','data-parsley-validation-threshold'=>'3'),
                          'class'=> 'form-control no-border',
                          'required' => 1,
                        ),
                      array(
                          'label'=> __('Password','wplms_modern'),
                          'placeholder'=> __('Enter password','wplms_modern'),
                          'id'=> 'user_pass',
                          'validation'=>'',
                          'field' => 'password',
                          'set' => 'core',
                          'class'=> 'form-control no-border',
                          'required' => 1,
                          'extras'=> array('parsley-trigger'=>'change'),
                        ),
                    ));
                   
                    foreach($fields as $field){
                        ?>
                          <?php echo WPLMS_Modern_Generate_Fields::generate_fields($field); ?>
                        <?php
                    }

                    wp_nonce_field('security','security');
                  ?>
                    
                    <a id="create_account_button" class="btn btn-lg btn-success btn-block"><?php _e('Create an Account','wplms_modern'); ?></a>
                    <a class="link"><?php _e('Back to login/register','wplms_modern'); ?></a>
                </div>
              </form>
            </div>  
        </div>  
        <div id="forgot_password">
            <div class="col-md-6 col-md-offset-3">
                <div class="list-group list-group-sm">
                  <form role="form">
                      <?php
                      $fields = apply_filters('vibe_projects_forgot_password_fields',array(
                       array(
                          'id'=> 'user_email',
                          'label'=> __('Email','wplms_modern'),
                          'placeholder'=> __('Enter email address','wplms_modern'),
                          'field' => 'email',
                          'validation'=>'email',
                          'set' => 'core',
                          'extras' => '',
                          'class'=> 'form-control no-border',
                          'required' => 1,
                        ),
                       ));
                        foreach($fields as $field){
                             echo WPLMS_Modern_Generate_Fields::generate_fields($field); 
                        }

                        wp_nonce_field('security','security');
                      
                      ?>
                    <a id="forgot_password_submit" class="btn btn-lg btn-info btn-block" href="#" tabindex="0" aria-disabled="true"><?php _e('Retrieve Password','wplms_modern'); ?></a>
                  </form>  
                    <a class="link"><?php _e('Back to login/register','wplms_modern'); ?></a>
              </div>
            </div>  
        </div>    
    </div>
</div>
<div id="login-modal-overlay">
    <a id="close-modal"></a>
</div>
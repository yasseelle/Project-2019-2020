<?php
/**
 * Project Creation functions and actions.
 *
 * @author 		VibeThemes
 * @category 	Admin
 * @package 	Vibe Projects/Includes
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


class WPLMS_Modern_Generate_Fields{

	function generate_fields($field,$id = null){
		
		$return = '<div class="list-group-item form-group">';
		$value ='';
		if($field['type'] == 'array')
			$value = array();
		if(!empty($id)){
			switch($field['from']){
				case 'post':
					$value = get_post_field($field['id'],$id);
				break;
				case 'taxonomy':
					$terms = wp_get_post_terms( $id, $field['taxonomy']);
					foreach($terms as $term){
						$value[]=$term->term_id;
					}

				break;
				case 'meta':
					$value = get_post_meta($id,$field['id'],true);
				break;
			}	
		}
		


		switch($field['field']){
			case 'label':
				$return .= '<label>'.$field['label'].(empty($field['desc'])?'':'<a class="tip" title="'.$field['desc'].'"><i class="fa fa-question-circle"></i></a>').'</label>';
			break;
			case 'editor':
				$return .= '<label>'.$field['label'].(empty($field['desc'])?'':'<a class="tip" title="'.$field['desc'].'"><i class="fa fa-question-circle"></i></a>').'</label>';
				ob_start();
				wp_editor($value,$field['id'],array('media_buttons'=>true,'textarea_name'=>$field['id'],'editor_class'=>'form-control'));    
				$return .= ob_get_clean();
			break;
			case 'select':
				$return .= '<label>'.$field['label'].(empty($field['desc'])?'':'<a class="tip" title="'.$field['desc'].'"><i class="fa fa-question-circle"></i></a>').'</label>';
				$return .='<select name="'.$field['id'].'" id="'.$field['id'].'" class="form-control">';
				foreach($field['options'] as $key => $option){
					$return .= '<option value="'.$key.'" '.(($value == $key)?'selected="selected"':'').'>'.$option.'</option>';
				}
				$return .= '</select>';
			break;
			case 'multiselect':
				$return .= '<label>'.$field['label'].(empty($field['desc'])?'':'<a class="tip" title="'.$field['desc'].'"><i class="fa fa-question-circle"></i></a>').'</label>';
				$return .='<select name="'.$field['id'].'" id="'.$field['id'].'" class="form-control select" multiple>';
				foreach($field['options'] as $key => $option){
					$return .= '<option value="'.$key.'" '.(($value == $key)?'selected="selected"':'').'>'.$option.'</option>';
				}
				$return .= '</select>';
			break;
			case 'textarea':
				$return .= '<label>'.$field['label'].'</label>';    
				$return .= '<textarea name="'.$field['id'].'" id="'.$field['id'].'" placeholder="'.$field['label'].'" class="form-control no-border trumbowyg">'.$value.'</textarea>';
			break;
			case 'checkbox':
				$return .= '<div class="checkbox"><input type="checkbox" class="form-control" id="'.$field['id'].'" '.(($value == 1)?'checked="checked"':'').' value="1" /><label for="'.$field['id'].'">'.$field['label'].(empty($field['desc'])?'':'<a class="tip" title="'.$field['desc'].'"><i class="fa fa-question-circle"></i></a>').'</label></div>';
			break;
			case 'datetime':
				$return .= '<label>'.$field['label'].(empty($field['desc'])?'':'<a class="tip" title="'.$field['desc'].'"><i class="fa fa-question-circle"></i></a>').'</label>';    
				$return .= '<input class="datetimepicker form-control no-border" type="text" id="'.$field['id'].'" value="'.$value.'" />';
			break;
			case 'radio':
				$return .= '<label for="'.$field['id'].$key.'">'.$field['label'].(empty($field['desc'])?'':'<a class="tip" title="'.$field['desc'].'"><i class="fa fa-question-circle"></i></a>').'</label>';
				foreach($field['options'] as $key => $option){
					$return .= '<div class="radio"><input type="radio" id="'.$field['id'].$key.'" name="'.$field['id'].'" class="form-control" value="'.$key.'"  '.(($value == $key)?'checked':'').'><label for="'.$field['id'].$key.'">'.$option.'</label></div>';
				}
			break;
			case 'email':
				$extras = '';
				if(!empty($field['extras'])){
					foreach($field['extras'] as $k => $v){
						$extras.= $k.'="'.$v.'" ';
					}
				}
				$return .= '<label>'.$field['label'].'</label>';
				$return .= '<input type="email" name="'.$field['id'].'" id="'.$field['id'].'" '.$extras.' placeholder="'.(($field['placeholder'])?$field['placeholder']:$field['label']).'" class="'.((!empty($field['class']))?$field['class']:'form-control no-border').'" value="'.$value.'" '.(empty($field['required'])?'':'required').' />';
			break;
			case 'password':
				$extras = '';
				if(!empty($field['extras'])){
					foreach($field['extras'] as $k => $v){
						$extras.= $k.'='.$v;
					}
				}
				$return .= '<label>'.$field['label'].'</label>';
				$return .= '<input type="password" name="'.$field['id'].'" id="'.$field['id'].'" '.$extras.' placeholder="'.(($field['placeholder'])?$field['placeholder']:$field['label']).'" class="'.((!empty($field['class']))?$field['class']:'form-control no-border').'" value="'.$value.'" '.(empty($field['required'])?'':'required').' />';
			break;
			case 'number':
				$extras = '';
				if(!empty($field['extras'])){
					foreach($field['extras'] as $k => $v){
						$extras.= $k.'='.$v;
					}
				}
				$return .= '<label>'.$field['label'].'</label>';
				$return .= '<input type="number" name="'.$field['id'].'" id="'.$field['id'].'" '.$extras.' placeholder="'.(($field['placeholder'])?$field['placeholder']:$field['label']).'" class="'.((!empty($field['class']))?$field['class']:'form-control no-border').'" value="'.$value.'" '.(empty($field['required'])?'':'required').' />';
			break;
			default:
				$extras = '';
				if(!empty($field['extras'])){
					foreach($field['extras'] as $k => $v){
						$extras.= $k.'='.$v;
					}
				}
				$return .= '<label>'.$field['label'].'</label>';
				$return .= '<input type="text" name="'.$field['id'].'" id="'.$field['id'].'" '.$extras.' placeholder="'.(($field['placeholder'])?$field['placeholder']:$field['label']).'" class="'.((!empty($field['class']))?$field['class']:'form-control no-border').'" value="'.$value.'" '.(empty($field['required'])?'':'required').' />';
			break;
		}
		$return .='</div>';

		return $return;
	}
}
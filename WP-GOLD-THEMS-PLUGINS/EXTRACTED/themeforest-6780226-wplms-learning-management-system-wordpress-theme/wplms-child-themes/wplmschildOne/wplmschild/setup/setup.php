<?php

/*
add_filter('wplms_setup_sidebars_file','wplms_child_one_sidebars_file');
function wplms_child_one_sidebars_file($file){
	return VIBE_CHILD_PATH.'/setup/assets/sidebars.txt';
}

add_filter('wplms_setup_widgets_file','wplms_child_one_widgets_file');
function wplms_child_one_widgets_file($file){
	return VIBE_CHILD_PATH.'/setup/assets/widgets.txt';
}
*/
add_filter('wplms_setup_import_file_path','wplms_child_one_import_file_path',10,2);

function wplms_child_one_import_file_path($file_path,$file){
	$file_path = VIBE_CHILD_PATH.'/setup/assets/sampledata.xml';
	return $file_path;
}

add_filter('wplms_data_import_url','wplms_child_one_data_import_url');
function wplms_child_one_data_import_url(){
	return VIBE_CHILD_URL.'/setup/assets/uploads/';
}
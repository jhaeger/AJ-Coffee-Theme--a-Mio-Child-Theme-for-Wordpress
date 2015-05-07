<?php
/**
* SP FRAMEWORK FILE - DO NOT EDIT!
* 
* include all styles
******************************************************************/

function sp_custom_styles() {
	global $data, $config;
	$output = '';
	$font = '';
	if (is_ssl()) :
		$ssl_url = "https";
	else:
		$ssl_url = "http";
	endif;
	if (isset($data[THEME_SHORTNAME.'skins']) && $data[THEME_SHORTNAME.'skins'] != '1' && $data[THEME_SHORTNAME.'skins'] != '') {
		$output .= "\r\n".'<link href="'.get_bloginfo('stylesheet_directory').'/skins/skin'.$data[THEME_SHORTNAME.'skins'].'.css" rel="stylesheet" type="text/css" />'."\r\n";
	}
	$output .= '<style type="text/css">'."\r\n";
	// include theme widgets
	if (file_exists(TEMPLATEPATH. '/sp-dynamic.php')) {
		require_once(TEMPLATEPATH. '/sp-dynamic.php');
	}
	
	if (is_array($config['tab'])) {
		foreach ($config['tab'] as $tabs) {
			foreach ($tabs['panel'] as $panels) {
				if (is_array($panels['wrapper'])) {
					foreach ($panels['wrapper'] as $wrappers) {
						if (is_array($wrappers['module'])) {
							foreach ($wrappers['module'] as $module) {
								switch ($module['_attr']['property']) {
									case 'font-size' :
										if (isset($data[THEME_SHORTNAME.$module['_attr']['id']]) && $data[THEME_SHORTNAME.$module['_attr']['id']] != '') {
											$output .= $module['_attr']['handle'].' {'.$module['_attr']['property'].':'.$data[THEME_SHORTNAME.$module['_attr']['id']].'px;}';
										}
									break;
		
									case 'color' :
										if (isset($data[THEME_SHORTNAME.$module['_attr']['id']]) && $data[THEME_SHORTNAME.$module['_attr']['id']] != '') {							
											$output .= $module['_attr']['handle'].' {color:'.$data[THEME_SHORTNAME.$module['_attr']['id']].';}';
										}
									break;
									
									case 'text-hover' :
										if (isset($data[THEME_SHORTNAME.$module['_attr']['id']]) && $data[THEME_SHORTNAME.$module['_attr']['id']] != '') {							
											$output .= $module['_attr']['handle'].':hover {color:'.$data[THEME_SHORTNAME.$module['_attr']['id']].';}';
										}
									break;
									case 'font-weight' :
										if (isset($data[THEME_SHORTNAME.$module['_attr']['id']]) && $data[THEME_SHORTNAME.$module['_attr']['id']] != '0') {							
											$output .= $module['_attr']['handle'].' {'.$module['_attr']['property'].':'.$data[THEME_SHORTNAME.$module['_attr']['id']].';}';
										}
									break;
									
									case 'font-style' :
										if (isset($data[THEME_SHORTNAME.$module['_attr']['id']]) && $data[THEME_SHORTNAME.$module['_attr']['id']] != '0') {							
											$output .= $module['_attr']['handle'].' {'.$module['_attr']['property'].':'.$data[THEME_SHORTNAME.$module['_attr']['id']].';}';
										}
									break;
									
									case 'font-family' :
										if (isset($data[THEME_SHORTNAME.$module['_attr']['id']]) && $data[THEME_SHORTNAME.$module['_attr']['id']] != '0') {	
										$option = array('0','"Oswald"','"Pacifico"','"Anton"','"Copse"','"Cuprum"','"Josefin Slab"','"Yanone Kaffeesatz"','"Cabin"','"Alerta"','"Gruppo"');								
											$output .= $module['_attr']['handle'].' {'.$module['_attr']['property'].':'.$option[$data[THEME_SHORTNAME.$module['_attr']['id']]].',san-serif;}';
											$font .= '<link rel="stylesheet" type="text/css" href="'.$ssl_url.'://fonts.googleapis.com/css?family='.str_replace(array('"',' '),array('','+'),$option[$data[THEME_SHORTNAME.$module['_attr']['id']]]).'">'."\r\n";
										}
									break;

									case 'background-image' :
										if (isset($data[THEME_SHORTNAME.$module['_attr']['id']]) && $data[THEME_SHORTNAME.$module['_attr']['id']] != '' && isset($data[THEME_SHORTNAME.'background_image'])) {							
											$output .= $module['_attr']['handle'].' {'.$module['_attr']['property'].':url('.$data[THEME_SHORTNAME.$module['_attr']['id']].');}';
										}
									break;

									case 'background-position' :
										if (isset($data[THEME_SHORTNAME.$module['_attr']['id']]) && $data[THEME_SHORTNAME.$module['_attr']['id']] != '0' && isset($data[THEME_SHORTNAME.'background_image'])) {							
											$output .= $module['_attr']['handle'].' {'.$module['_attr']['property'].':'.$data[THEME_SHORTNAME.$module['_attr']['id']].';}';
										}
									break;

									case 'background-repeat' :
										if (isset($data[THEME_SHORTNAME.$module['_attr']['id']]) && $data[THEME_SHORTNAME.$module['_attr']['id']] != '0' && isset($data[THEME_SHORTNAME.'background_image'])) {							
											$output .= $module['_attr']['handle'].' {'.$module['_attr']['property'].':'.$data[THEME_SHORTNAME.$module['_attr']['id']].';}';
										}
									break;

									case 'background-attachment' :
										if (isset($data[THEME_SHORTNAME.$module['_attr']['id']]) && $data[THEME_SHORTNAME.$module['_attr']['id']] != '0' && isset($data[THEME_SHORTNAME.'background_image'])) {							
											$output .= $module['_attr']['handle'].' {'.$module['_attr']['property'].':'.$data[THEME_SHORTNAME.$module['_attr']['id']].';}';
										}
									break;

									case 'background-color' :
										if (isset($data[THEME_SHORTNAME.$module['_attr']['id']]) && $data[THEME_SHORTNAME.$module['_attr']['id']] != '' && isset($data[THEME_SHORTNAME.'background_image'])) {							
											$output .= $module['_attr']['handle'].' {'.$module['_attr']['property'].':'.$data[THEME_SHORTNAME.$module['_attr']['id']].';}';
										}
									break;
									
									default:
									break;	
								}
		
							}
						}
					}
				}
			}			
		}
		
	}
	$output .= '</style>'."\r\n".$font;
	echo $output;
}
if (!is_admin()) {
	add_action('wp_head','sp_custom_styles');	
}

<?php
// -- START -- TEMP
function bsa_space()
{
	return null;
}
function get_option()
{
	return '#';
}
function get_site_url()
{
	return '#';
}
$col_per_row = 1;
// -- END -- TEMP
$template_name 	= "new-template-1";
$crop 			= (isset($crop) && $crop == 'no') ? 'no' : 'yes';

if ( isset($_POST['bsa_get_required_inputs']) ) {

	// -- START -- GET REQUIRED INPUTS
	return 'title,desc,url,img'; // inputs shows in form (default: 'title,desc,url,img or html')
	// -- END -- GET REQUIRED INPUTS

} else {

// -- START -- IF EXAMPLE TEMPLATE
	$ads = array(
				array(
					"template" => $template_name,
					"id" => 0,
					"title" => "Sample Title (max 40 characters)",
					"description" => "Sample Description (max 80 characters)",
					"url" => "http://adspro.scripteo.info",
					"img" => "http://adspro.scripteo.info/theme-forest.png"
				)
			);
// -- END -- IF EXAMPLE TEMPLATE

// -- START -- TEMPLATE HTML
	foreach ( $ads as $key => $ad ) {

		if ( $ad['id'] != 0 && bsa_ad($ad['id']) != NULL ) {  // -- COUNTING FUNCTION (DO NOT REMOVE!)
			$model = new BSA_PRO_Model();
			$model->bsaProCounter($ad['id']);
		}

		echo '<div class="view view-first" style="background-image: url(&#39;'.$ad['img'].'&#39;)">'; // -- ITEM -- IMG
			
			echo '<div class="mask">';
			
				echo '<h2>'.$ad['title'].'</h2>';
				echo '<p>'.$ad['description'].'</p>';				
				
				echo '<a class="info" href="'.$ad['url'].'" target="_blank">Read More</a>';
				
			echo '</div>';
		echo '</div>';
	}	
// -- END -- TEMPLATE HTML
}
<?php 
/**
 * This file contains the function which hooks to a brick's content output
 *
 * @since 1.0.0
 *
 * @package    MP Stacks Second Video
 * @subpackage Functions
 *
 * @copyright  Copyright (c) 2013, Move Plugins
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @author     Philip Johnston
 */
 
/**
 * Filter Content Output for video
 */
function mp_stacks_brick_content_output_second_video($default_content_output, $mp_stacks_content_type, $post_id){
	
	//If this stack content type is set to be an image	
	if ($mp_stacks_content_type == 'second_video'){
		
		//Set default value for $content_output to NULL
		$content_output = NULL;
		
		//Get video URL
		$brick_video = get_post_meta($post_id, 'brick_second_video_url', true);
						
		//Get video max width
		$brick_video_max_width = get_post_meta($post_id, 'brick_second_video_max_width', true);
		$brick_video_max_width = !empty( $brick_video_max_width ) ? $brick_video_max_width : NULL;
			
		//Content output
		if (!empty($brick_video)){
			
			$args = array(
				'min_width' => NULL,
				'max_width' => $brick_video_max_width,
				'iframe_css_id' => NULL,
				'iframe_css_class' => NULL,
			);
			
			$content_output .= '<div class="mp-brick-video">' . mp_core_oembed_get( $brick_video, $args ) . '</div>'; 
		}
		
		//Return
		return $content_output;
	}
	else{
		//Return
		return $default_content_output;	
	}
}
add_filter('mp_stacks_brick_content_output', 'mp_stacks_brick_content_output_second_video', 10, 3);
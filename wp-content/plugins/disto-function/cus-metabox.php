<?php
if ( ! defined( 'ABSPATH' ) ) exit;
	class elono_Meta_Box{
		
		protected $_metabox;
		
		function __construct( $metabox ) {
			if ( !is_admin() ) return;
	
			$this->_metabox = $metabox;
	
			add_action( 'admin_menu', array( &$this, 'add' ) );
			add_action( 'save_post', array( &$this, 'save' ) );
	
		}
		
		// Add metaboxes
		function add() {
			$this->_metabox['context'] = empty($this->_metabox['context']) ? 'normal' : $this->_metabox['context'];
			$this->_metabox['priority'] = empty($this->_metabox['priority']) ? 'high' : $this->_metabox['priority'];
			
			foreach ( $this->_metabox['pages'] as $page ) {
				add_meta_box( $this->_metabox['id'], $this->_metabox['title'], array(&$this, 'show'), $page, $this->_metabox['context'], $this->_metabox['priority']) ;
			}
		}
		
		// Show fields
		function show() {
			global $post;
			
			echo '<input type="hidden" name="wp_meta_box_nonce" value="', wp_create_nonce( basename(__FILE__) ), '" />';
			echo '<table class="form-table user_review-metabox">';
			
			foreach ( $this->_metabox['fields'] as $field ) {
				
				if ( !isset( $field['name'] ) ) $field['name'] = '';
				if ( !isset( $field['desc'] ) ) $field['desc'] = '';
				if ( !isset( $field['std'] ) ) $field['std'] = '';
			
				// get value of this field if it exists for this post
				$meta = get_post_meta($post->ID, $field['id'], true);
				
				// Use standard value if empty
				$meta = ( '' === $meta || array() === $meta ) ? $field['std'] : $meta;
				
				// begin a table row with
				echo '<tr id="'.$field['id'].'_box">';
					echo '<th><label for="'.$field['id'].'">'.$field['label'].'</label></th>';
					
					echo '<td>';
					switch($field['type']) {

						// images
						case 'images':
							foreach ( $field['options'] as $key => $val ) {
							$i = 0;
							$i++;
							echo '<span>';
							echo '<input type="radio" class="checkbox of-radio-img-radio" name="'.$field['id'].'" id="of-radio-img-'.$field['id']. $i .'" value="'.$key.'" ',$meta == $key ? ' checked="checked"' : '',' style="display: none;" />';
							echo '<div class="of-radio-img-label" style="display: none;">'. $key .'</div>';
							echo '<img src="'. $val .'" class="of-radio-img-img', $meta == $key ? '  of-radio-img-selected' : '', '" onClick="document.getElementById(\'of-radio-img-'. $field['id'] . $i.'\').checked = true;" style="display: inline-block;"/>';
							echo '</span>';
							}
							break;
						
						// text
						case 'text':
							echo '<input type="text" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'" size="64" />';
							echo '<br /><span style="margin-top: 10px; display: block;" class="description">'.$field['desc'].'</span>';
							break;

					// text
						case 'line':							
							echo '<span style="margin-top: 10px; display: block;" class="description">'.$field['desc'].'</span>';
							break;		

						// text
						case 'gallery':
							echo '<br /><span style="margin-top: 10px; display: block;" class="description">'.$field['desc'].'</span>';
							?>
							<ul class="jlmedia-gallery-images-holder clearfix">
								<?php
								$image_gallery_val = get_post_meta( $post->ID, $field['id'], true);
								if($image_gallery_val!='' ) $image_gallery_array=explode(',',$image_gallery_val);

								if(isset($image_gallery_array) && count($image_gallery_array)!=0):

									foreach($image_gallery_array as $gimg_id):
										$gimage_wp = wp_get_attachment_image_src($gimg_id,'thumbnail', true);
										echo '<li class="jlmedia-gallery-image-holder"><img src="'.esc_url($gimage_wp[0]).'"/></li>';

									endforeach;

								endif;
								?>
							</ul>
							<input type="hidden" value="<?php echo esc_attr($image_gallery_val); ?>" id="<?php echo esc_attr( $field['id']) ?>" name="<?php echo esc_attr( $field['id']) ?>">
							<div class="jlmedia-gallery-uploader">
								<a class="jlmedia-gallery-upload-btn btn btn-sm btn-primary"
								   href="javascript:void(0)"><?php esc_html_e('Upload or Edit', 'disto'); ?></a>
								<a class="jlmedia-gallery-clear-btn btn btn-sm btn-default pull-right"
								   href="javascript:void(0)"><?php esc_html_e('Remove All', 'disto'); ?></a>
							</div>
							<?php
							break;
						
						// textarea
						case 'textarea':
							echo '<textarea name="'.$field['id'].'" id="'.$field['id'].'" cols="60" rows="4">'.$meta.'</textarea>';
							echo '<br /><span style="margin-top: 10px; display: block;" class="description">'.$field['desc'].'</span>';
							break;
						
						// checkbox
						case 'checkbox':
							echo '<input style="margin-right: 10px;" type="checkbox" name="'.$field['id'].'" id="'.$field['id'].'" ',$meta ? ' checked="checked"' : '','/>';
							echo '<label for="'.$field['id'].'">'.$field['desc'].'</label>';
							break;

						// select
						case 'select':
							echo '<select name="'.$field['id'].'" id="'.$field['id'].'">';
							foreach ($field['options'] as $key => $val) {
								echo '<option', $meta == $key ? ' selected="selected"' : '', ' value="'.$key.'">'.$val.'</option>';
							}
							echo '</select><br /><span style="margin-top: 10px; display: block;" class="description">'.$field['desc'].'</span>';
							break;


						
						// radio
						case 'radio':
							foreach ( $field['options'] as $key => $val ) {
								echo '<input type="radio" name="'.$field['id'].'" id="'.$field['id'].'_'.$key.'" value="'.$key.'" ',$meta == $key ? ' checked="checked"' : '',' />';
								echo '<label for="'.$field['id'].'_'.$key.'">'.$val.'</label><br>';
							}
							break;

						
					}
					echo '</td>';
				echo '</tr>';
				
			}
			
			echo '</table>';
		}
		


		// Save data from metabox
		function save( $post_id)  {
			// verify nonce
			if ( ! isset( $_POST['wp_meta_box_nonce'] ) || !wp_verify_nonce( $_POST['wp_meta_box_nonce'], basename(__FILE__) ) ) {
				return $post_id;
			}
			
			// check autosave
			if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
				return $post_id;
				
			// check permissions
			if ('page' == $_POST['post_type']) {
				if (!current_user_can('edit_page', $post_id))
					return $post_id;
				} elseif (!current_user_can('edit_post', $post_id)) {
					return $post_id;
			}
			
			// loop through fields and save the data
			foreach ( $this->_metabox['fields'] as $field ) {
				
				$old = get_post_meta($post_id, $field['id'], true);
				
				$new = isset( $_POST[$field['id']] ) ? $_POST[$field['id']] : null;
				
				if ($new && $new != $old) {
					update_post_meta($post_id, $field['id'], $new);
				} 
				elseif ('' == $new && $old) {
					delete_post_meta($post_id, $field['id'], $old);
				}
				
			} // end foreach
		}
	}
	


/*	Initialize Metabox
 *	--------------------------------------------------------- */
	function cus_init_metaboxes() {
		if ( class_exists( 'elono_Meta_Box' ) ) {
			

//// user metabox field
add_filter( 'cus_meta_metaboxes', 'cus_meta_metaboxes' );
	
function cus_meta_metaboxes( array $metaboxes ) {

		$prefix = 'user_review';		

//post options
		$metaboxes[] = array(
			'id'		 => 'single_post_layout',
			'title'      => esc_html__('Single Post Options', 'disto'),
			'pages'      => array('post'), // Post type
			'context'    => 'normal',
			'priority'   => 'high',
			'fields' => array(
				array(
					'label' => esc_html__('Enable Full Post', 'disto'),
					'desc'	=> esc_html__('Check this to enable single post content full.', 'disto'),
					'id'	=> 'single_post_full_single_post_full',
					'type'	=> 'checkbox'
				),

				array(
					'label' => esc_html__('Post Subtitle', 'disto'),
					'id'	=> 'single_post_subtitle',
					'type'	=> 'text'
				),

				array(
					'label' => esc_html__('Select Post Layout', 'disto'),
					'desc'	=> '',
					'id'	=> 'single_post_layout',
					'std' => 'title_below_align_left',
					'type'	=> 'radio',
					'options' => array (
						'title_below_align_left' => 'Title Below Align Left',
						'title_above_align_left' => 'Title Above Align Left',
						'full_width_image_with_caption_overlay_center' => 'Full Width Image With Caption Overlay Center',
						'full_width_image_with_caption_overlay_bottom' => 'Full Width Image With Caption Overlay Bottom',
						'full_width_image_with_caption_above' => 'Full Width Image With Caption above',
						'full_width_caption_without_image' => 'Full Width Only Caption',
						'full_width_caption_with_post_format' => 'Full Width Caption With Post Format',
						'caption_without_image' => 'Caption Without Image'
						)
				),
			)
		);


//post format
		$metaboxes[] = array(
			'id'		 => 'single_post_format',
			'title'      => esc_html__('Single Post Format', 'disto'),
			'pages'      => array('post'), // Post type
			'context'    => 'normal',
			'priority'   => 'high',
			'fields' => array(
				// gallery
				array(
					'label' => esc_html__('gallery', 'disto'),
					'id'	=> 'gallery_post_format',
					'type'	=> 'gallery'
				),
				array(
					'label' => "",
					'id'	=> 'customline',
					'type'	=> 'line'
				),
				// quote
				array(
					'label' => esc_html__('Quote title', 'disto'),
					'id'	=> 'quote_post_title',
					'type'	=> 'textarea'
				),
				array(
					'label' => esc_html__('Quote author', 'disto'),
					'id'	=> 'quote_post_author',
					'type'	=> 'text'
				),
				array(
					'label' => "",
					'id'	=> 'customline',
					'type'	=> 'line'
				),

				// video
				array(
					'label' => esc_html__('Video Embed', 'disto'),
					'id'	=> 'video_post_embed',
					'type'	=> 'textarea'
				),
				array(
					'label' => esc_html__('Video link', 'disto'),
					'id'	=> 'video_post_link',
					'type'	=> 'text'
				),
				array(
					'label' => "",
					'id'	=> 'customline',
					'type'	=> 'line'
				),

				// audio
				array(
					'label' => esc_html__('Audio Embed', 'disto'),
					'id'	=> 'auto_post_embed',
					'type'	=> 'textarea'
				),
				array(
					'label' => esc_html__('Audio link', 'disto'),
					'id'	=> 'auto_post_link',
					'type'	=> 'text'
				),
				



			)
		);


//page options
$metaboxes[] = array(
			'id'		 => 'pageslider_option_home',
			'title'      => esc_html__('Post slider, feature post and page options', 'disto'),
			'pages'      => array('page'), // Post type
			'context'    => 'normal',
			'priority'   => 'high',
			'fields' => array(
				
				array(
					'label' => esc_html__('Remove top margin', 'disto'),
					'desc'	=> esc_html__('Check this to remove top margin', 'disto'),
					'id'	=> 'jl_remove_top',
					'type'	=> 'checkbox'
				),

				array(
					'label' => esc_html__('Hide page title', 'disto'),
					'desc'	=> esc_html__('Check this to hide page title', 'disto'),
					'id'	=> 'jl_rm_title',
					'type'	=> 'checkbox'
				),

				array(
					'label' => esc_html__('Pagination for grid layout', 'disto'),
					'desc'	=> '',
					'id'	=> 'pagination_grid_layout_options',
					'std' => 'loadmore',
					'type'	=> 'radio',
					'options' => array (
						'loadmore' => 'Pagination Load More',
						'number' => 'Pagination Number'
						)
				)

				
			)
		);

		
		
	return $metaboxes;
}
//// end user metabox field
			$metaboxes = array();
			$metaboxes = apply_filters ( 'cus_meta_metaboxes' , $metaboxes );
			foreach ( $metaboxes as $metabox ) {
				$my_box = new elono_Meta_Box( $metabox );
			}
		}
	}
	
	add_action( 'init', 'cus_init_metaboxes', 9999 );
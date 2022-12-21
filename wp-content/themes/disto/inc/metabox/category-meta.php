<?php
/**
 * Edit category header field.
 */
function disto_add_category_settings() {
	$jelly_header_id ='';
?>

	<tr class="form-field">
        <th valign="top" scope="row">
            <label for="category_color_options">Category Color</label>
        </th>
        <td>
            <input type="text" name="category_color_options" id="category_color_options" class="colorpicker" value=""/>
          
        </td>
    </tr>


    <tr class="form-field jl_cat_image">
		<th scope="row" valign="top"><label><?php esc_html_e( 'Category background Image', 'disto' ); ?></label></th>
		<td>
			
			<div style="line-height:60px;">
				<input type="hidden" id="jelly_cat_header_image_id" name="jelly_cat_header_image_id" value="<?php echo esc_attr($jelly_header_id); ?>" />
				<button type="submit" class="jelly_upload_header button"><?php esc_html_e( 'Add Category background Image', 'disto' ); ?></button>
				<button type="submit" class="jelly_remove_header button"><?php esc_html_e( 'Remove Image', 'disto' ); ?></button>
			</div>
			<div id="jelly_cat_header" style="margin-top:-20px; width: 150px;"><img src="<?php echo esc_url(get_template_directory_uri().'/inc/metabox/category_asset/images/none_image.png'); ?>" style="max-width: 150px;"/></div>
		</td>

	</tr>
   
	
	<tr class="form-field">
		<th scope="row" valign="top"><label>Pagination Style</label></th>
		<td>
		
			<div class="category_style_item_image_wrapper">
			<div class="category_style_item_image"><input type="radio" name="disto_cat_infinite" id="disto_cat_infinite-1" value="cb-off" class="radio" checked><label for="disto_cat_infinite-1"><img src="<?php echo esc_url(get_template_directory_uri().'/inc/metabox/category_asset/images/pagination1.png'); ?>"/></label></div>
			<div class="category_style_item_image"><input type="radio" name="disto_cat_infinite" id="disto_cat_infinite-2" value="infinite-scroll" class="radio"><label for="disto_cat_infinite-2"><img src="<?php echo esc_url(get_template_directory_uri().'/inc/metabox/category_asset/images/pagination2.png'); ?>"/></label></div>
			<div class="category_style_item_image"><input type="radio" name="disto_cat_infinite" id="disto_cat_infinite-3" value="infinite-load" class="radio"><label for="disto_cat_infinite-3"><img src="<?php echo esc_url(get_template_directory_uri().'/inc/metabox/category_asset/images/pagination3.png'); ?>"/></label></div>
			</div>
		</td>
	</tr>
	<?php

}

add_action( 'category_add_form_fields', 'disto_add_category_settings', 10,2 );




function disto_edit_category_settings( $term, $taxonomy ) {

	$disto_cat_infinite  = get_term_meta( $term->term_id, 'disto_cat_infinite', true );
	$category_color_options 	= get_term_meta( $term->term_id, 'category_color_options', true );



	$category_image = '';
	$jelly_header_id ='';
	$jelly_header_id = absint( get_term_meta( $term->term_id, 'jelly_header_id', true ) );
	if ($jelly_header_id) {
		$category_image = wp_get_attachment_url( $jelly_header_id );
	}else {}
	?>

	<tr class="form-field">
        <th valign="top" scope="row">
            <label for="category-text">Category Color</label>
        </th>
        <td>
            <input type="text" name="category_color_options" id="category-text" class="colorpicker" value="<?php echo esc_attr($category_color_options); ?>"/>
          
        </td>
    </tr>


    <tr class="form-field">
		<th scope="row" valign="top"><label><?php esc_html_e( 'Category background Image', 'disto' ); ?></label></th>
		<td>
			
			<div style="line-height:60px;">
				<input type="hidden" id="jelly_cat_header_image_id" name="jelly_cat_header_image_id" value="<?php echo esc_attr($jelly_header_id); ?>" />
				<button type="submit" class="jelly_upload_header button"><?php esc_html_e( 'Add Category background Image', 'disto' ); ?></button>
				<button type="submit" class="jelly_remove_header button"><?php esc_html_e( 'Remove Image', 'disto' ); ?></button>
			</div>
			<div id="jelly_cat_header" style="margin-top:-20px; width: 150px;"><img src="<?php echo esc_url($category_image); ?>" style="max-width: 150px;" /></div>		
		</td>

	</tr>



	<tr class="form-field">
		<th scope="row" valign="top"><label>Pagination Style</label></th>
		<td>
			<div class="category_style_item_image_wrapper">
			<div class="category_style_item_image"><input type="radio" name="disto_cat_infinite" id="disto_listing_style-1" value="cb-off" class="radio" <?php if($disto_cat_infinite === 'cb-off'){ echo 'checked="checked"'; } ?>><label for="disto_listing_style-1"><img src="<?php echo esc_url(get_template_directory_uri().'/inc/metabox/category_asset/images/pagination1.png'); ?>"/></label></div>
			<div class="category_style_item_image"><input type="radio" name="disto_cat_infinite" id="disto_listing_style-2" value="infinite-scroll" class="radio" <?php if($disto_cat_infinite === 'infinite-scroll'){ echo 'checked="checked"'; } ?>><label for="disto_listing_style-2"><img src="<?php echo esc_url(get_template_directory_uri().'/inc/metabox/category_asset/images/pagination2.png'); ?>"/></label></div>
			<div class="category_style_item_image"><input type="radio" name="disto_cat_infinite" id="disto_listing_style-3" value="infinite-load" class="radio" <?php if($disto_cat_infinite === 'infinite-load'){ echo 'checked="checked"'; } ?>><label for="disto_listing_style-3"><img src="<?php echo esc_url(get_template_directory_uri().'/inc/metabox/category_asset/images/pagination3.png'); ?>"/></label></div>
			</div>
		</td>
	</tr>
	<?php

}

add_action( 'category_edit_form_fields', 'disto_edit_category_settings', 10,2 );





function disto_category_setting_save( $term_id='', $tt_id='', $taxonomy='' ) {	

	if ( isset( $_POST['jelly_cat_header_image_id'] ) ) {
		update_term_meta( $term_id, 'jelly_header_id', absint( $_POST['jelly_cat_header_image_id'] ) );
	}

	if ( isset( $_POST['category_color_options'] ) ) {
		update_term_meta( $term_id, 'category_color_options', $_POST['category_color_options'] );
	}

	if ( isset( $_POST['disto_cat_infinite'] ) ) {
		update_term_meta( $term_id, 'disto_cat_infinite', $_POST['disto_cat_infinite'] );
	}

	

}

add_action( 'edit_term', 'disto_category_setting_save', 10,3 );
add_action('create_category','disto_category_setting_save');






//Enqueue Color Picker
function colorpicker_enqueue() {
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_media();
    wp_enqueue_script( 'category-colorpicker-js', get_template_directory_uri() . '/inc/metabox/category_asset/category-meta-color.js', array( 'wp-color-picker' ) );
    wp_enqueue_style( 'category-template-style-admin', get_template_directory_uri().'/inc/metabox/category_asset/category_meta.css', false, '1.0' ); 
}
add_action('admin_enqueue_scripts', 'colorpicker_enqueue' );


?>
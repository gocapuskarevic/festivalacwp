<?php
/**
 * widget social counter
 */
if ( ! function_exists( 'disto_widget_social_counter' ) ) {
	add_action( 'widgets_init', 'disto_widget_social_counter' );

	function disto_widget_social_counter() {
		register_widget( 'disto_widget_social_counter_c' );
	}
}

if ( ! class_exists( 'disto_widget_social_counter_c' ) ) {
	class disto_widget_social_counter_c extends WP_Widget {

		function __construct() {
			$widget_ops = array(
				'classname'   => 'jl-widget-social-counter',
				'description' => esc_html__( 'Display number of social followers', 'disto')
			);

			parent::__construct( 'disto_widget_social_counter_c', esc_html__( 'Social Counter', 'disto' ), $widget_ops );
		}

		function widget( $args, $instance ) {

			extract($args, EXTR_SKIP);

			$title                          = apply_filters( 'widget_title', ! empty( $instance['title'] ) ? $instance['title'] : '', $instance );
			$style                          = ( ! empty( $instance['style'] ) ) ? esc_attr( $instance['style'] ) : '';
			$facebook_page                  = ( ! empty( $instance['facebook_page'] ) ) ? $instance['facebook_page'] : '';
			$facebook_token                 = ( ! empty( $instance['facebook_token'] ) ) ? $instance['facebook_token'] : '';
			$youtube_user                   = ( ! empty( $instance['youtube_user'] ) ) ? $instance['youtube_user'] : '';
			$youtube_channel                = ( ! empty( $instance['youtube_channel'] ) ) ? $instance['youtube_channel'] : '';
			$dribbble_user                  = ( ! empty( $instance['dribbble_user'] ) ) ? $instance['dribbble_user'] : '';
			$dribbble_token                 = ( ! empty( $instance['dribbble_token'] ) ) ? $instance['dribbble_token'] : '';
			$soundcloud_user                = ( ! empty( $instance['soundcloud_user'] ) ) ? $instance['soundcloud_user'] : '';
			$soundcloud_api                 = ( ! empty( $instance['soundcloud_api'] ) ) ? $instance['soundcloud_api'] : '';
			$instagram_api                  = ( ! empty( $instance['instagram_api'] ) ) ? $instance['instagram_api'] : '';
			$pinterest_user                 = ( ! empty( $instance['pinterest_user'] ) ) ? $instance['pinterest_user'] : '';
			$vimeo_user                     = ( ! empty( $instance['vimeo_user'] ) ) ? $instance['vimeo_user'] : '';
			$vk_user                        = ( ! empty( $instance['vk_user'] ) ) ? $instance['vk_user'] : '';

			echo $before_widget;

			if ( ! empty( $title ) ) {
				echo $before_title . esc_attr($title) . $after_title;
			}

			$class_name   = array();
			$class_name[] = 'jl_social_counter social_counter_wraper';
			switch ( $style ) {
				case 1:
					$class_name[] = 'jl_count_style_1 social_counter_item';
					break;
				case 2:
					$class_name[] = 'jl_count_style_2 social_counter_item';
					break;				
			}

			$class_name = implode( ' ', $class_name ); ?>

			<div class="<?php echo esc_attr($class_name); ?>">

				<?php if ( ! empty( $facebook_page ) ) :
					$option['facebook_page'] = $facebook_page;
					$option['facebook_token'] = $facebook_token;
					$facebook_count          = disto_jl_social_fan::jl_get_social_counter( 'facebook_page', $option );
					?>
					<div class="jlsocial-element jl-facebook">
						<a target="_blank" href="https://facebook.com/<?php echo esc_html($facebook_page); ?>" class="facebook" title="facebook"></a>
						<span class="jlsocial-element-left">
							<i class="fa fa-facebook" aria-hidden="true"></i>
							<span class="num-count"><?php echo esc_attr(disto_counter_num($facebook_count)); ?></span>
						</span>
						<span class="jlsocial-element-right"><?php echo 'fans'; ?></span>
					</div>
				<?php  endif;				

				if ( ! empty( $pinterest_user ) ) :
					$option['pinterest_user'] = $pinterest_user;
					$pinterest_count          = disto_jl_social_fan::jl_get_social_counter( 'pinterest', $option );
					?>
					<div class="jlsocial-element jl-pinterest">
						<a target="_blank" href="https://pinterest.com/<?php echo esc_html( $pinterest_user ); ?>" class="pinterest" title="pinterest"></a>
						<span class="jlsocial-element-left">
						<i class="fa fa-pinterest" aria-hidden="true"></i>
						<span
							class="num-count"><?php echo esc_attr( disto_counter_num( $pinterest_count ) ); ?></span>
						</span>
						<span class="jlsocial-element-right"><?php echo 'followers'; ?></span>
					</div>
				<?php endif;

				if (!empty($instagram_api)):
					$option['instagram_api'] = $instagram_api;
					$data_instagram = disto_jl_social_fan::jl_get_social_counter('instagram', $option);
					if ( empty( $data_instagram ) ) {
						$data_instagram = array(
							'count'     => 0,
							'user_name' => '',
							'url'       => '',
						);
					};
					?>
					<div class="jlsocial-element jl-instagram">
						<a target="_blank" href="<?php echo esc_url( $data_instagram['url'] ) ?>" title="instagram"></a>
						<span class="jlsocial-element-left">
							<i class="fa fa-instagram" aria-hidden="true"></i>
							<span class="num-count"><?php echo esc_attr( disto_counter_num( $data_instagram['count'] ) ); ?></span>
						</span>
						<span class="jlsocial-element-right"><?php echo 'followers'; ?></span>
					</div>

				<?php endif;

				if ( ! empty( $youtube_user ) || !empty($youtube_channel) ) :
					$option['youtube_user']    = $youtube_user;
					$option['youtube_channel'] = $youtube_channel;
					$youtube_count             = disto_jl_social_fan::jl_get_social_counter( 'youtube', $option );
					?>
					<div class="jlsocial-element jl-youtube">
						<?php if($option['youtube_user']) : ?>
						<a target="_blank" href="https://www.youtube.com/user/<?php echo esc_html( $youtube_user ); ?>" title="Youtube"></a>
						<?php else : ?>
						<a target="_blank" href="https://www.youtube.com/channel/<?php echo esc_html( $youtube_channel ); ?>" title="Youtube"></a>
						<?php endif; ?>
						<span class="jlsocial-element-left">
							<i class="fa fa-youtube" aria-hidden="true"></i>
							<span class="num-count"><?php echo esc_attr(disto_counter_num($youtube_count)); ?></span>
						</span>
						<span class="jlsocial-element-right"><?php echo 'subscribers'; ?></span>
					</div>
				<?php endif;

				if ( ! empty( $soundcloud_user ) && ! empty( $soundcloud_api ) ):
					$option['soundcloud_user'] = $soundcloud_user;
					$option['soundcloud_api']  = $soundcloud_api;
					$soundcloud_data           = disto_jl_social_fan::jl_get_social_counter( 'soundcloud', $option );
					if ( empty( $soundcloud_data ) ) {
						$soundcloud_data = array(
							'url'   => '',
							'count' => ''
						);
					}
					?>
					<div class="jlsocial-element jl-soundcloud">
						<a target="_blank" href="<?php echo esc_url($soundcloud_data['url']); ?>" title="soundclound"></a>
						<span class="jlsocial-element-left">
							<i class="fa fa-soundcloud" aria-hidden="true"></i>
							<span class="num-count"><?php echo esc_attr(disto_counter_num($soundcloud_data['count'])); ?></span>
						</span>
						<span class="jlsocial-element-right"><?php echo 'followers'; ?></span>
					</div>
				<?php endif;

				if ( ! empty( $vimeo_user ) ) :
					$option['vimeo_user'] = $vimeo_user;
					$vimeo_count          = disto_jl_social_fan::jl_get_social_counter( 'vimeo', $option );
					?>
					<div class="jlsocial-element jl-vimeo">
						<a target="_blank" href="https://vimeo.com/<?php echo esc_html($vimeo_user); ?>" title="vimeo"></a>
						<span class="jlsocial-element-left">
							<i class="fa fa-vimeo" aria-hidden="true"></i>
							<span class="num-count"><?php echo esc_attr(disto_counter_num($vimeo_count)); ?></span>
						</span>
						<span class="jlsocial-element-right"><?php echo 'subscribers'; ?></span>
					</div>
				<?php endif;

				if ( ! empty( $dribbble_user ) || !empty($dribbble_token) ) :
					$option['dribbble_user']  = $dribbble_user;
					$option['dribbble_token'] = $dribbble_token;
					$dribbble_count           = disto_jl_social_fan::jl_get_social_counter( 'dribbble', $option );
					?>
					<div class="jlsocial-element jl-dribbble">
						<a target="_blank" href="https://dribbble.com/<?php echo esc_html($dribbble_user); ?>" title="dribbble"></a>
						<span class="jlsocial-element-left">
							<i class="fa fa-dribbble" aria-hidden="true"></i>
							<span class="num-count"><?php echo esc_attr(disto_counter_num($dribbble_count)); ?></span>
						</span>
						<span class="jlsocial-element-right"><?php echo 'followers'; ?></span>
					</div>
				<?php endif;

				if ( ! empty( $vk_user ) ) :
					$option['vk_user'] = $vk_user;
					$vk_count          = disto_jl_social_fan::jl_get_social_counter( 'vk', $option );
					?>
					<div class="jlsocial-element jl-vk">
						<a target="_blank" href="https://vk.com/<?php echo esc_html($vk_user); ?>" title="VKontakte"></a>
						<span class="jlsocial-element-left">
							<i class="fa fa-vk" aria-hidden="true"></i>
							<span class="num-count"><?php echo esc_attr(disto_counter_num($vk_count)); ?></span>
						</span>
						<span class="jlsocial-element-right"><?php echo 'members'; ?></span>
					</div>
				<?php endif; ?>

			</div>

			<?php
			echo $after_widget;
		}


		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;

			delete_transient( 'disto_social_fan_facebook_page' );
			delete_transient( 'disto_social_fan_pinterest' );
			delete_transient( 'disto_social_fan_instagram' );
			delete_transient( 'disto_social_fan_youtube' );
			delete_transient( 'disto_social_fan_soundcloud' );
			delete_transient( 'disto_social_fan_vimeo' );
			delete_transient( 'disto_social_fan_dribbble' );
			delete_transient( 'disto_social_fan_vk' );

			$instance['title']           = strip_tags( $new_instance['title'] );
			$instance['style']           = strip_tags( $new_instance['style'] );
			$instance['facebook_page']   = strip_tags( $new_instance['facebook_page'] );
			$instance['facebook_token']  = strip_tags( $new_instance['facebook_token'] );
			$instance['youtube_user']    = strip_tags( $new_instance['youtube_user'] );
			$instance['youtube_channel'] = strip_tags( $new_instance['youtube_channel'] );
			$instance['dribbble_user']   = strip_tags( $new_instance['dribbble_user'] );
			$instance['dribbble_token']  = strip_tags( $new_instance['dribbble_token'] );
			$instance['soundcloud_user'] = strip_tags( $new_instance['soundcloud_user'] );
			$instance['soundcloud_api']  = strip_tags( $new_instance['soundcloud_api'] );
			$instance['instagram_api']   = strip_tags( $new_instance['instagram_api'] );
			$instance['pinterest_user']  = strip_tags( $new_instance['pinterest_user'] );
			$instance['vimeo_user']      = strip_tags( $new_instance['vimeo_user'] );
			$instance['vk_user']         = strip_tags( $new_instance['vk_user'] );

			return $instance;
		}

		function form( $instance ) {

			$defaults = array(
				'title'           => esc_html__( 'Stay Connected', 'disto' ),
				'style'           => 1,
				'facebook_page'   => '',
				'facebook_token'  => '',
				'youtube_user'    => '',
				'youtube_channel' => '',
				'dribbble_user'   => '',
				'dribbble_token'  => '',
				'soundcloud_user' => '',
				'soundcloud_api'  => '',
				'pinterest_user'  => '',
				'instagram_api'   => '',
				'vimeo_user'      => '',
				'vk_user'         => ''

			);
			$instance = wp_parse_args( (array) $instance, $defaults ); ?>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><strong><?php esc_attr_e('Title:','disto') ?></strong></label>
				<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php if(!empty($instance['title'])) echo esc_attr($instance['title']); ?>" />
			</p>
			<!--style -->
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'style' )); ?>"><strong><?php esc_attr_e('Style:', 'disto'); ?></strong></label>
				<select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'style' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'style' )); ?>" >
					<option value="1" <?php if( !empty($instance['style']) && $instance['style'] == '1' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_attr_e('Style 1', 'disto'); ?></option>
					<option value="2" <?php if( !empty($instance['style']) && $instance['style'] == '2' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_attr_e('Style 2', 'disto'); ?></option>
				</select>
			</p>

			<!--facebook -->
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'facebook_page' )); ?>"><strong><?php esc_attr_e('Facebook Page Name:', 'disto');?></strong></label>
				<input type="text" class="widefat"   id="<?php echo esc_attr($this->get_field_id( 'facebook_page' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'facebook_page' )); ?>" value="<?php echo esc_attr($instance['facebook_page']); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'facebook_token' )); ?>"><?php esc_attr_e('Facebook App Token (Optional):', 'disto');?></label>
				<input type="text" class="widefat"   id="<?php echo esc_attr($this->get_field_id( 'facebook_token' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'facebook_token' )); ?>" value="<?php echo esc_attr($instance['facebook_token']); ?>" />
			</p>
			
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'pinterest_user' )); ?>"><strong><?php esc_attr_e('Pinterest User Name:','disto');?></strong> </label>
				<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'pinterest_user' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'pinterest_user' )); ?>" value="<?php echo esc_attr($instance['pinterest_user']); ?>"/>
			</p>
			<!--instagram -->
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'instagram_api' )); ?>"><strong><?php esc_attr_e('Instagram Access Token Key:','disto') ?></strong> </label>
				<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'instagram_api' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'instagram_api' )); ?>" value="<?php echo esc_textarea($instance['instagram_api']); ?>"/>
			</p>
			<p><?php echo html_entity_decode( esc_html__( '<a target="_blank" href="https://archetypethemes.co/pages/instagram-token-generator">Instagram access token generater</a></p>', 'disto' ) ); ?>
				<!--youtube -->
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'youtube_user' )); ?>"><strong><?php esc_attr_e('Youtube User Name:', 'disto');?></strong></label>
				<input type="text"  class="widefat" id="<?php echo esc_attr($this->get_field_id( 'youtube_user' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'youtube_user' )); ?>" value="<?php echo esc_attr($instance['youtube_user']); ?>"/>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'youtube_channel' )); ?>"><strong><?php esc_attr_e('Youtube Channel ID:', 'disto');?></strong></label>
				<input type="text"  class="widefat" id="<?php echo esc_attr($this->get_field_id( 'youtube_channel' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'youtube_channel' )); ?>" value="<?php echo esc_attr($instance['youtube_channel']); ?>"/>
			</p>
			<p><?php esc_attr_e('If use add Channel ID so no need to add user name','disto') ?></p>
			<!--sound cloud-->
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'soundcloud_user' )); ?>"><strong><?php esc_attr_e('SoundCloud User Name:','disto');?></strong> </label>
				<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'soundcloud_user' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'soundcloud_user' )); ?>" value="<?php echo esc_attr($instance['soundcloud_user']); ?>"/>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'soundcloud_api' )); ?>"><?php esc_attr_e('Soundcloud API Key(Client ID) :','disto') ?> </label>
				<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'soundcloud_api' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'soundcloud_api' )); ?>" value="<?php echo esc_attr($instance['soundcloud_api']); ?>"/>
			</p>
			<p><a target="_blank" href="https://soundcloud.com/you/apps/"><?php esc_attr_e('Generate your soundcloud app','disto') ?></a></p>
			<!--vimeo -->
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'vimeo_user' )); ?>"><strong><?php esc_attr_e('Vimeo User Name:','disto');?></strong> </label>
				<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'vimeo_user' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'vimeo_user' )); ?>" value="<?php echo esc_attr($instance['vimeo_user']); ?>"/>
			</p>
			<!--dribbble -->
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'dribbble_user' )); ?>"><strong><?php esc_attr_e('Dribbble User Name:', 'disto');?></strong></label>
				<input type="text"  class="widefat" id="<?php echo esc_attr($this->get_field_id( 'dribbble_user' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'dribbble_user' )); ?>" value="<?php echo esc_attr($instance['dribbble_user']); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'dribbble_token' )); ?>"><strong><?php esc_attr_e('Dribbble Token (Client Access Token):', 'disto');?></strong></label>
				<input type="text"  class="widefat" id="<?php echo esc_attr($this->get_field_id( 'dribbble_token' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'dribbble_token' )); ?>" value="<?php echo esc_attr($instance['dribbble_token']); ?>" />
			</p>
			<p><a target="_blank" href="https://dribbble.com/account/applications/new"><?php esc_attr_e('Generate your dribbble app','disto') ?></a></p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'vk_user' )); ?>"><strong><?php esc_attr_e('VK User Name/ID:', 'disto');?></strong></label>
				<input type="text"  class="widefat" id="<?php echo esc_attr($this->get_field_id( 'vk_user' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'vk_user' )); ?>" value="<?php echo esc_attr($instance['vk_user']); ?>" />
			</p>
		<?php
		}
	}
}

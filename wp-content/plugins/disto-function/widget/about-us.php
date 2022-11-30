<?php
if ( ! defined( 'ABSPATH' ) ) exit;
add_action('widgets_init','disto_about_us_load_widgets');
function disto_about_us_load_widgets(){
		register_widget("disto_about_us_widget");
}

class disto_about_us_widget extends WP_widget{

/*-----------------------------------------------------------------------------------*/
/*	Widget Setup
/*-----------------------------------------------------------------------------------*/

	public function __construct() {
		$widget_ops = array( 'classname' => 'jellywp_about_us_widget', 'description' => esc_html__( 'About us and social icons' , 'disto') );
		parent::__construct('disto_about_us_widget', esc_html__('jellywp: About us', 'disto'), $widget_ops);
	}

/*-----------------------------------------------------------------------------------*/
/*	Display Widget
/*-----------------------------------------------------------------------------------*/
	
	function widget($args,$instance){
	extract($args);		
		
		$title = isset($instance['title']) ? $instance['title'] : "About us";
		$feed_description = isset($instance['feed_description']) ? $instance['feed_description'] : "Mauris mattis auctor cursus. Phasellus tellus tellus, imperdiet ut imperdiet eu, iaculis a sem imperdiet ut imperdiet eu.";
		$image = isset($instance['image']) ? $instance['image'] : "";
		$image_sign = isset($instance['image_sign']) ? $instance['image_sign'] : "";
		$facebook = isset($instance['facebook']) ? $instance['facebook'] : "#";
		$behance = isset($instance['behance']) ? $instance['behance'] : "#";
        $telegram = isset($instance['telegram']) ? $instance['telegram'] : "#";
		$vimeo = isset($instance['vimeo']) ? $instance['vimeo'] : "#";
		$youtube = isset($instance['youtube']) ? $instance['youtube'] : "#";
		$instagram = isset($instance['instagram']) ? $instance['instagram'] : "#";
		$tumblr = isset($instance['tumblr']) ? $instance['tumblr'] : "#";
		$linkedin = isset($instance['linkedin']) ? $instance['linkedin'] : "#";
		$pinterest = isset($instance['pinterest']) ? $instance['pinterest'] : "#";
		$twitter = isset($instance['twitter']) ? $instance['twitter'] : "#";
		$deviantart = isset($instance['deviantart']) ? $instance['deviantart'] : "#";
		$dribble = isset($instance['dribble']) ? $instance['dribble'] : "#";
		$dropbox = isset($instance['dropbox']) ? $instance['dropbox'] : "#";
		$rss = isset($instance['rss']) ? $instance['rss'] : "#";
		$skype = isset($instance['skype']) ? $instance['skype'] : "#";
		$stumbleupon = isset($instance['stumbleupon']) ? $instance['stumbleupon'] : "#";
		$wordpress = isset($instance['wordpress']) ? $instance['wordpress'] : "#";
		$yahoo = isset($instance['yahoo']) ? $instance['yahoo'] : "#";
		$flickr = isset($instance['flickr']) ? $instance['flickr'] : "#";
		$sound_cloud = isset($instance['sound_cloud']) ? $instance['sound_cloud'] : "#";
        $spotify_i = isset($instance['spotify_i']) ? $instance['spotify_i'] : "#";
        $wechat = isset($instance['wechat']) ? $instance['wechat'] : "#";
        $google_podcast = isset($instance['google_podcast']) ? $instance['google_podcast'] : "#";
        $anchor_i = isset($instance['anchor_i']) ? $instance['anchor_i'] : "#";
        $hello_i = isset($instance['hello_i']) ? $instance['hello_i'] : "#";

		?>

<?php print '<span class="jl_none_space"></span>'.$before_widget;?>
<div class="widget_jl_wrapper about_widget_content">
    <?php
		if($title) {
			print '<span class="jl_none_space"></span>'.$before_title.esc_attr($title).$after_title;
		}
		
			?>

    <div class="jellywp_about_us_widget_wrapper">

        <?php if($image){?><img class="footer_logo_about" src="<?php echo esc_attr($image);?>" />
        <?php }?>
        <?php if($feed_description){?>
        <p>
            <?php echo esc_attr($feed_description); ?>
        </p>
        <?php }?>
        <?php if($image_sign){?>
        <div class="jl_img_sign"><img class="footer_logo_about" src="<?php echo esc_attr($image_sign);?>" /></div>
        <?php }?>
        <div class="social_icons_widget">
            <ul class="social-icons-list-widget icons_about_widget_display">
                <?php if($facebook !=''){?>
                <li><a href="<?php echo esc_url($facebook);?>" class="facebook" target="_blank"><i class="fa fa-facebook"></i></a></li>
                <?php }?>
                <?php if($behance !=''){?>
                <li><a href="<?php echo esc_url($behance);?>" class="behance" target="_blank"><i class="fa fa-behance"></i></a></li>
                <?php }?>
                <?php if($telegram !=''){?>
                <li><a style="background:#1d96d3" href="<?php echo esc_url($telegram);?>" class="telegram" target="_blank"><i class="fa fa-paper-plane"></i></a></li>
                <?php }?>
                <?php if($vimeo !=''){?>
                <li><a href="<?php echo esc_url($vimeo);?>" class="vimeo" target="_blank"><i class="fa fa-vimeo-square"></i></a></li>
                <?php }?>
                <?php if($youtube !=''){?>
                <li><a href="<?php echo esc_url($youtube);?>" class="youtube" target="_blank"><i class="fa fa-youtube"></i></a></li>
                <?php }?>
                <?php if($tumblr !=''){?>
                <li><a href="<?php echo esc_url($tumblr);?>" class="tumblr" target="_blank"><i class="fa fa-tumblr"></i></a></li>
                <?php }?>
                <?php if($instagram !=''){?>
                <li><a href="<?php echo esc_url($instagram);?>" class="instagram" target="_blank"><i class="fa fa-instagram"></i></a></li>
                <?php }?>
                <?php if($linkedin !=''){?>
                <li><a href="<?php echo esc_url($linkedin);?>" class="linkedin" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                <?php }?>
                <?php if($pinterest !=''){?>
                <li><a href="<?php echo esc_url($pinterest);?>" class="pinterest" target="_blank"><i class="fa fa-pinterest"></i></a></li>
                <?php }?>
                <?php if($twitter !=''){?>
                <li><a href="<?php echo esc_url($twitter);?>" class="twitter" target="_blank"><i class="fa fa-twitter"></i></a></li>
                <?php }?>
                <?php if($deviantart !=''){?>
                <li><a href="<?php echo esc_url($deviantart);?>" class="deviantart" target="_blank"><i class="fa fa-deviantart"></i></a></li>
                <?php }?>
                <?php if($dribble !=''){?>
                <li><a href="<?php echo esc_url($dribble);?>" class="dribble" target="_blank"><i class="fa fa-dribbble"></i></a></li>
                <?php }?>
                <?php if($dropbox !=''){?>
                <li><a href="<?php echo esc_url($dropbox);?>" class="dropbox" target="_blank"><i class="fa fa-dropbox"></i></a></li>
                <?php }?>
                <?php if($rss !=''){?>
                <li><a href="<?php echo esc_url($rss);?>" class="rss" target="_blank"><i class="fa fa-rss"></i></a></li>
                <?php }?>
                <?php if($skype !=''){?>
                <li><a href="<?php echo esc_url($skype);?>" class="skype" target="_blank"><i class="fa fa-skype"></i></a></li>
                <?php }?>
                <?php if($stumbleupon !=''){?>
                <li><a href="<?php echo esc_url($stumbleupon);?>" class="stumbleupon" target="_blank"><i class="fa fa-stumbleupon"></i></a></li>
                <?php }?>
                <?php if($wordpress !=''){?>
                <li><a href="<?php echo esc_url($wordpress);?>" class="wordpress" target="_blank"><i class="fa fa-wordpress"></i></a></li>
                <?php }?>
                <?php if($yahoo !=''){?>
                <li><a href="<?php echo esc_url($yahoo);?>" class="yahoo" target="_blank"><i class="fa fa-yahoo"></i></a></li>
                <?php }?>
                <?php if($flickr !=''){?>
                <li><a href="<?php echo esc_url($flickr);?>" class="flickr" target="_blank"><i class="fa fa-flickr"></i></a></li>
                <?php }?>
                <?php if($sound_cloud !=''){?>
                <li><a href="<?php echo esc_url($sound_cloud);?>" class="soundcloud" target="_blank"><i class="fa fa-soundcloud"></i></a></li>
                <?php }?>

                <?php if($spotify_i !=''){?>
                <li><a style="background:#5eb343;" href="<?php echo esc_url($spotify_i);?>" class="soundcloud" target="_blank"><i class="fa fa-spotify"></i></a></li>
                <?php }?>
                <?php if($wechat !=''){?>
                <li><a style="background:#2dc123;" href="<?php echo esc_url($wechat);?>" class="soundcloud" target="_blank"><i class="fa fa-wechat"></i></a></li>
                <?php }?>
                <?php if($google_podcast !=''){?>
                <li><a style="background:#fff;" href="<?php echo esc_url($google_podcast);?>" class="soundcloud" target="_blank"><img style=" max-width: 70%; " src="<?php echo esc_url(get_template_directory_uri().'/img/google_podcast.png'); ?>" /></a></li>
                <?php }?>
                <?php if($anchor_i !=''){?>
                <li><a style="background:#fff;" href="<?php echo esc_url($anchor_i);?>" class="soundcloud" target="_blank"><img style=" max-width: 70%; " src="<?php echo esc_url(get_template_directory_uri().'/img/anchor.png'); ?>" /></a></li>
                <?php }?>
                <?php if($hello_i !=''){?>
                <li><a style="background:#fff;" href="<?php echo esc_url($hello_i);?>" class="soundcloud" target="_blank"><img style=" max-width: 70%; " src="<?php echo esc_url(get_template_directory_uri().'/img/helo.png'); ?>" /></a></li>
                <?php }?>
            </ul>
        </div>
    </div>

    <?php
		print '<span class="jl_none_space"></span>'.$after_widget;
	print "</div>";
	}

/*-----------------------------------------------------------------------------------*/
/*	Update Widget
/*-----------------------------------------------------------------------------------*/
	
	function update($new_instance, $old_instance){
		$instance = $old_instance;
		
		$instance['title'] = $new_instance['title'];
		$instance['feed_description'] = $new_instance['feed_description'];
		$instance['image'] = $new_instance['image'];
		$instance['image_sign'] = $new_instance['image_sign'];
		$instance['facebook'] = $new_instance['facebook'];
		$instance['behance'] = $new_instance['behance'];
        $instance['telegram'] = $new_instance['telegram'];
		$instance['vimeo'] = $new_instance['vimeo'];
		$instance['youtube'] = $new_instance['youtube'];
		$instance['tumblr'] = $new_instance['tumblr'];
		$instance['instagram'] = $new_instance['instagram'];
		$instance['linkedin'] = $new_instance['linkedin'];
		$instance['pinterest'] = $new_instance['pinterest'];
		$instance['twitter'] = $new_instance['twitter'];
		$instance['blogger'] = $new_instance['blogger'];
		$instance['deviantart'] = $new_instance['deviantart'];
		$instance['dribble'] = $new_instance['dribble'];
		$instance['dropbox'] = $new_instance['dropbox'];
		$instance['rss'] = $new_instance['rss'];
		$instance['skype'] = $new_instance['skype'];
		$instance['stumbleupon'] = $new_instance['stumbleupon'];
		$instance['wordpress'] = $new_instance['wordpress'];
		$instance['yahoo'] = $new_instance['yahoo'];
		$instance['flickr'] = $new_instance['flickr'];
		$instance['sound_cloud'] = $new_instance['sound_cloud'];

        $instance['spotify_i'] = $new_instance['spotify_i'];
        $instance['wechat'] = $new_instance['wechat'];
        $instance['google_podcast'] = $new_instance['google_podcast'];
        $instance['anchor_i'] = $new_instance['anchor_i'];
        $instance['hello_i'] = $new_instance['hello_i'];
		
		return $instance;
	}



	function form($instance){
		?>
    <?php
			$defaults = array( 'title' => esc_html__( 'About us' , 'disto'), 'feed_description' => 'Mauris mattis auctor cursus. Phasellus tellus tellus, imperdiet ut imperdiet eu, iaculis a sem imperdiet ut imperdiet eu.' , 'image' => '', 'image_sign' => '', 'facebook' => '#', 'behance' => '#', 'telegram' => '#', 'vimeo' => '#', 'youtube' => '#', 'tumblr' => '#', 'instagram' => '#', 'linkedin' => '#', 'pinterest' => '#', 'twitter' => '#', 'blogger' => '#', 'deviantart' => '#', 'dribble' => '#', 'dropbox' => '#', 'rss' => '#', 'skype' => '#', 'stumbleupon' => '#', 'wordpress' => '#', 'yahoo' => '#', 'flickr' => '#', 'sound_cloud' => '#', 'spotify_i' => '#', 'wechat' => '#', 'google_podcast' => '#', 'anchor_i' => '#', 'hello_i' => '#');
			$instance = wp_parse_args((array) $instance, $defaults); 
		?>

    <p>
        <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
            <?php esc_html_e( 'Title:', 'disto'); ?></label>
        <input class="widefat" width="100%" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" />
    </p>

    <p>
        <label for="<?php echo esc_attr($this->get_field_id('image')); ?>">
            <?php esc_html_e( 'Image Url:' , 'disto' ); ?></label>
        <input class="widefat" width="100%" id="<?php echo esc_attr($this->get_field_id('image')); ?>" name="<?php echo esc_attr($this->get_field_name('image')); ?>" type="text" value="<?php echo esc_url($instance['image']); ?>" />
    </p>

    <p>
        <label for="<?php echo esc_attr($this->get_field_id('image_sign')); ?>">
            <?php esc_html_e( 'Image sign Url:' , 'disto' ); ?></label>
        <input class="widefat" width="100%" id="<?php echo esc_attr($this->get_field_id('image_sign')); ?>" name="<?php echo esc_attr($this->get_field_name('image_sign')); ?>" type="text" value="<?php echo esc_url($instance['image_sign']); ?>" />
    </p>

    <p>
        <label for="<?php echo esc_attr($this->get_field_id('feed_description')); ?>">
            <?php esc_html_e( 'Feed description:', 'disto'); ?></label>
        <textarea class="widefat" style="width: 100%; height:150px;" id="<?php echo esc_attr($this->get_field_id('feed_description')); ?>" name="<?php echo esc_attr($this->get_field_name('feed_description')); ?>"><?php echo esc_attr($instance['feed_description']); ?></textarea>
    </p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id('facebook')); ?>">
            <?php esc_html_e( 'Facebook Url:' , 'disto' ); ?></label>
        <input class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('facebook')); ?>" name="<?php echo esc_attr($this->get_field_name('facebook')); ?>" type="text" value="<?php echo esc_url($instance['facebook']); ?>" />
    </p>    
    <p>
        <label for="<?php echo esc_attr($this->get_field_id('behance')); ?>">
            <?php esc_html_e( 'Behance Url:' , 'disto' ); ?></label>
        <input class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('behance')); ?>" name="<?php echo esc_attr($this->get_field_name('behance')); ?>" type="text" value="<?php echo esc_url($instance['behance']); ?>" />
    </p>

    <p>
        <label for="<?php echo esc_attr($this->get_field_id('telegram')); ?>">
            <?php esc_html_e( 'Telegram Url:' , 'disto' ); ?></label>
        <input class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('telegram')); ?>" name="<?php echo esc_attr($this->get_field_name('telegram')); ?>" type="text" value="<?php echo esc_url($instance['telegram']); ?>" />
    </p>

    <p>
        <label for="<?php echo esc_attr($this->get_field_id('vimeo')); ?>">
            <?php esc_html_e( 'Vimeo Url:' , 'disto' ); ?></label>
        <input class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('vimeo')); ?>" name="<?php echo esc_attr($this->get_field_name('vimeo')); ?>" type="text" value="<?php echo esc_url($instance['vimeo']); ?>" />
    </p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id('youtube')); ?>">
            <?php esc_html_e( 'Youtube Url:' , 'disto' ); ?></label>
        <input class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('youtube')); ?>" name="<?php echo esc_attr($this->get_field_name('youtube')); ?>" type="text" value="<?php echo esc_url($instance['youtube']); ?>" />
    </p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id('tumblr')); ?>">
            <?php esc_html_e( 'tumblr Url:' , 'disto' ); ?></label>
        <input class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('tumblr')); ?>" name="<?php echo esc_attr($this->get_field_name('tumblr')); ?>" type="text" value="<?php echo esc_url($instance['tumblr']); ?>" />
    </p>

    <p>
        <label for="<?php echo esc_attr($this->get_field_id('instagram')); ?>">
            <?php esc_html_e( 'Instagram Url:' , 'disto' ); ?></label>
        <input class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('instagram')); ?>" name="<?php echo esc_attr($this->get_field_name('instagram')); ?>" type="text" value="<?php echo esc_url($instance['instagram']); ?>" />
    </p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id('linkedin')); ?>">
            <?php esc_html_e( 'Linkedin Url:' , 'disto' ); ?></label>
        <input class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('linkedin')); ?>" name="<?php echo esc_attr($this->get_field_name('linkedin')); ?>" type="text" value="<?php echo esc_url($instance['linkedin']); ?>" />
    </p>

    <p>
        <label for="<?php echo esc_attr($this->get_field_id('pinterest')); ?>">
            <?php esc_html_e( 'Pinterest Url:' , 'disto' ); ?></label>
        <input class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('pinterest')); ?>" name="<?php echo esc_attr($this->get_field_name('pinterest')); ?>" type="text" value="<?php echo esc_url($instance['pinterest']); ?>" />
    </p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id('twitter')); ?>">
            <?php esc_html_e( 'Twitter Url:' , 'disto' ); ?></label>
        <input class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('twitter')); ?>" name="<?php echo esc_attr($this->get_field_name('twitter')); ?>" type="text" value="<?php echo esc_url($instance['twitter']); ?>" />
    </p>

    <p>
        <label for="<?php echo esc_attr($this->get_field_id('blogger')); ?>">
            <?php esc_html_e( 'Blogger Url:' , 'disto' ); ?></label>
        <input class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('blogger')); ?>" name="<?php echo esc_attr($this->get_field_name('blogger')); ?>" type="text" value="<?php echo esc_url($instance['blogger']); ?>" />
    </p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id('deviantart')); ?>">
            <?php esc_html_e( 'Deviantart Url:' , 'disto' ); ?></label>
        <input class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('deviantart')); ?>" name="<?php echo esc_attr($this->get_field_name('deviantart')); ?>" type="text" value="<?php echo esc_url($instance['deviantart']); ?>" />
    </p>

    <p>
        <label for="<?php echo esc_attr($this->get_field_id('dribble')); ?>">
            <?php esc_html_e( 'Dribble Url:' , 'disto' ); ?></label>
        <input class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('dribble')); ?>" name="<?php echo esc_attr($this->get_field_name('dribble')); ?>" type="text" value="<?php echo esc_url($instance['dribble']); ?>" />
    </p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id('stumbleupon')); ?>">
            <?php esc_html_e( 'Stumbleupon Url:' , 'disto' ); ?></label>
        <input class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('stumbleupon')); ?>" name="<?php echo esc_attr($this->get_field_name('stumbleupon')); ?>" type="text" value="<?php echo esc_url($instance['stumbleupon']); ?>" />
    </p>

    <p>
        <label for="<?php echo esc_attr($this->get_field_id('dropbox')); ?>">
            <?php esc_html_e( 'Dropbox Url:' , 'disto' ); ?></label>
        <input class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('dropbox')); ?>" name="<?php echo esc_attr($this->get_field_name('dropbox')); ?>" type="text" value="<?php echo esc_url($instance['dropbox']); ?>" />
    </p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id('rss')); ?>">
            <?php esc_html_e( 'RSS Url:' , 'disto' ); ?></label>
        <input class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('rss')); ?>" name="<?php echo esc_attr($this->get_field_name('rss')); ?>" type="text" value="<?php echo esc_url($instance['rss']); ?>" />
    </p>

    <p>
        <label for="<?php echo esc_attr($this->get_field_id('skype')); ?>">
            <?php esc_html_e( 'Skype Url:' , 'disto' ); ?></label>
        <input class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('skype')); ?>" name="<?php echo esc_attr($this->get_field_name('skype')); ?>" type="text" value="<?php echo esc_url($instance['skype']); ?>" />
    </p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id('wordpress')); ?>">
            <?php esc_html_e( 'Wordpress Url:' , 'disto' ); ?></label>
        <input class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('wordpress')); ?>" name="<?php echo esc_attr($this->get_field_name('wordpress')); ?>" type="text" value="<?php echo esc_url($instance['wordpress']); ?>" />
    </p>

    <p>
        <label for="<?php echo esc_attr($this->get_field_id('yahoo')); ?>">
            <?php esc_html_e( 'Yahoo Url:' , 'disto' ); ?></label>
        <input class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('yahoo')); ?>" name="<?php echo esc_attr($this->get_field_name('yahoo')); ?>" type="text" value="<?php echo esc_url($instance['yahoo']); ?>" />
    </p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id('flickr')); ?>">
            <?php esc_html_e( 'Flickr Url:' , 'disto' ); ?></label>
        <input class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('flickr')); ?>" name="<?php echo esc_attr($this->get_field_name('flickr')); ?>" type="text" value="<?php echo esc_url($instance['flickr']); ?>" />
    </p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id('sound_cloud')); ?>">
            <?php esc_html_e( 'Sound Cloud Url:' , 'disto' ); ?></label>
        <input class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('sound_cloud')); ?>" name="<?php echo esc_attr($this->get_field_name('sound_cloud')); ?>" type="text" value="<?php echo esc_url($instance['sound_cloud']); ?>" />
    </p>

    <p>
        <label for="<?php echo esc_attr($this->get_field_id('spotify_i')); ?>">
            <?php esc_html_e( 'spotify Url:' , 'disto' ); ?></label>
        <input class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('spotify_i')); ?>" name="<?php echo esc_attr($this->get_field_name('spotify_i')); ?>" type="text" value="<?php echo esc_url($instance['spotify_i']); ?>" />
    </p>

    <p>
        <label for="<?php echo esc_attr($this->get_field_id('wechat')); ?>">
            <?php esc_html_e( 'wechat Url:' , 'disto' ); ?></label>
        <input class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('wechat')); ?>" name="<?php echo esc_attr($this->get_field_name('wechat')); ?>" type="text" value="<?php echo esc_url($instance['wechat']); ?>" />
    </p>

    <p>
        <label for="<?php echo esc_attr($this->get_field_id('google_podcast')); ?>">
            <?php esc_html_e( 'google podcast Url:' , 'disto' ); ?></label>
        <input class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('google_podcast')); ?>" name="<?php echo esc_attr($this->get_field_name('google_podcast')); ?>" type="text" value="<?php echo esc_url($instance['google_podcast']); ?>" />
    </p>

    <p>
        <label for="<?php echo esc_attr($this->get_field_id('anchor_i')); ?>">
            <?php esc_html_e( 'anchor Url:' , 'disto' ); ?></label>
        <input class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('anchor_i')); ?>" name="<?php echo esc_attr($this->get_field_name('anchor_i')); ?>" type="text" value="<?php echo esc_url($instance['anchor_i']); ?>" />
    </p>

    <p>
        <label for="<?php echo esc_attr($this->get_field_id('hello_i')); ?>">
            <?php esc_html_e( 'hello Url:' , 'disto' ); ?></label>
        <input class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('hello_i')); ?>" name="<?php echo esc_attr($this->get_field_name('hello_i')); ?>" type="text" value="<?php echo esc_url($instance['hello_i']); ?>" />
    </p>



    <?php

	}
}
?>
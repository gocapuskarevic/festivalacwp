<?php
if ( ! defined( 'ABSPATH' ) ) exit;
add_action( 'widgets_init', 'disto_recent_comments_widgets' );

function disto_recent_comments_widgets() {
	register_widget( 'disto_recent_comments_widget' );
}

class disto_recent_comments_widget extends WP_widget {

/*-----------------------------------------------------------------------------------*/
/*	Widget Setup
/*-----------------------------------------------------------------------------------*/

	public function __construct() {
		$widget_ops = array( 'classname' => 'post_list_widget comment_widget', 'description' => esc_html__('Displays recent comments.', 'disto') );
		parent::__construct( 'disto_recent_comments_widget', esc_html__('jellywp: Recent Comments', 'disto'), $widget_ops);
	}

/*-----------------------------------------------------------------------------------*/
/*	Display Widget
/*-----------------------------------------------------------------------------------*/

	function widget( $args, $instance ) {
		
		extract( $args );
	    $title = isset($instance['title']) ? $instance['title'] : "Recent Comments";
		print '<span class="jl_none_space"></span>'.$before_widget;
		if ( $title )
		print '<span class="jl_none_space"></span>'.$before_title . esc_attr($title) . $after_title;
  
       ?>
<?php
	   $entries_display = isset($instance['entries_display']) ? $instance['entries_display'] : 5; ?>
    <ul class="jl_comment_post">
        <?php 
                $args = array(
                       'status' => 'approve',
                       'post_type' =>'post',
                        'number' => $entries_display
					);					
				$comments = get_comments($args);				
                foreach($comments as $comment) :
				        $commentauthor = $comment->comment_author;                    
                        $commenttitle = get_the_title( $comment->comment_post_ID);
                        $commentid = $comment->comment_ID;
                        $commenturl = get_comment_link($commentid); ?>
        <li>
            <div class="jl_item_comment">
                <i class="fa fa-comment-o"></i>
                <span class="feature-post-title"><a class="post-title" href="<?php echo esc_url($commenturl); ?>">
                        <?php echo esc_attr($commentauthor); ?></a></span><?php esc_html_e('On', 'disto'); ?>
                <h3 class="jl_comment_title">
                    <a class="post-title" href="<?php echo esc_url($commenturl); ?>">
                    <?php echo esc_attr($commenttitle); ?>
                    </a>
                </h3>
            </div>
        </li>
        <?php endforeach; ?>
    </ul>
    <?php
	print '<span class="jl_none_space"></span>'.$after_widget;
	}

/*-----------------------------------------------------------------------------------*/
/*	Widget Settings (Displays the widget settings controls on the widget panel)
/*-----------------------------------------------------------------------------------*/

	function form( $instance ) {
		$defaults = array('title' => 'Recent Comments', 'entries_display' => 3);
		$instance = wp_parse_args((array) $instance, $defaults);
	?>
    <p><label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>">
            <?php esc_html_e('Title:', 'disto'); ?></label>
        <input type="text" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($instance['title']); ?>" style="width:100%;" /></p>

    <p><label for="<?php echo esc_attr($this->get_field_id( 'entries_display' )); ?>">
            <?php esc_html_e('How many entries to display?', 'disto'); ?></label>
        <input type="text" id="<?php echo esc_attr($this->get_field_id('entries_display')); ?>" name="<?php echo esc_attr($this->get_field_name('entries_display')); ?>" value="<?php echo esc_attr($instance['entries_display']); ?>" style="width:100%;" /></p>

    <?php
	}
}
?>
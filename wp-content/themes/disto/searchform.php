<form method="get" class="searchform_theme" action="<?php echo esc_url(home_url('/')); ?>">
    <input type="text" placeholder="<?php echo esc_html__('Search...', 'disto'); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" class="search_btn" />
    <button type="submit" class="button"><i class="fa fa-search"></i></button>
</form>
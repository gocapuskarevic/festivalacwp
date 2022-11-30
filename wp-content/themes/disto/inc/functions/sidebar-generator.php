<?php
class disto_sidebar_generator {
	
	function __construct(){
		add_action('init',array('disto_sidebar_generator','init'));
		add_action('admin_menu',array('disto_sidebar_generator','admin_menu'));
		add_action('admin_print_scripts', array('disto_sidebar_generator','admin_print_scripts'));


		if ( current_user_can('manage_options') ){
		add_action('wp_ajax_add_sidebar', array('disto_sidebar_generator','add_sidebar') );
		add_action('wp_ajax_remove_sidebar', array('disto_sidebar_generator','remove_sidebar') );
		}
		
			
		//edit posts/pages
		add_action('edit_form_advanced', array('disto_sidebar_generator', 'edit_form'));
		add_action('edit_page_form', array('disto_sidebar_generator', 'edit_form'));
		
		//save posts/pages
		add_action('edit_post', array('disto_sidebar_generator', 'save_form'));
		add_action('publish_post', array('disto_sidebar_generator', 'save_form'));
		add_action('save_post', array('disto_sidebar_generator', 'save_form'));
		add_action('edit_page_form', array('disto_sidebar_generator', 'save_form'));

	}
	
	public static function init(){
		//go through each sidebar and register it
	    $sidebars = disto_sidebar_generator::get_sidebars();
	    

	    if(is_array($sidebars)){
			foreach($sidebars as $sidebar){
				$sidebar_class = disto_sidebar_generator::name_to_class($sidebar);
				register_sidebar(array(
					'name' => sanitize_title( $sidebar ), 
					'id' => sanitize_title( $sidebar ),
			        'before_widget' => '<div id="%1$s" class="widget %2$s">',
			        'after_widget' => "</div>",
			        'before_title' => '<h3 class="widget-title"><span>',
			        'after_title' => '</span></h3>',
		    	));
			}
		}
	}
	
	public static function admin_print_scripts(){
		wp_print_scripts( array( 'sack' ));
		?>
			<script>
				function add_sidebar( sidebar_name )
				{
					
					var mysack = new sack("<?php echo esc_url(get_site_url()); ?>/wp-admin/admin-ajax.php" );    
				
				  	mysack.execute = 1;
				  	mysack.method = 'POST';
				  	mysack.setVar( "action", "add_sidebar" );
				  	mysack.setVar( "sidebar_name", sidebar_name );
				  	mysack.encVar( "cookie", document.cookie, false );
				  	mysack.onError = function() { alert('Ajax error. Cannot add sidebar' )};
				  	mysack.runAJAX();
					return true;
				}
				
				function remove_sidebar( sidebar_name,num )
				{
					
					var mysack = new sack("<?php echo esc_url(get_site_url()); ?>/wp-admin/admin-ajax.php" );    
				
				  	mysack.execute = 1;
				  	mysack.method = 'POST';
				  	mysack.setVar( "action", "remove_sidebar" );
				  	mysack.setVar( "sidebar_name", sidebar_name );
				  	mysack.setVar( "row_number", num );
				  	mysack.encVar( "cookie", document.cookie, false );
				  	mysack.onError = function() { alert('Ajax error. Cannot add sidebar' )};
				  	mysack.runAJAX();
					//alert('hi!:::'+sidebar_name);
					return true;
				}
			</script>
		<?php
	}
	
	public static function add_sidebar(){
		$sidebars = disto_sidebar_generator::get_sidebars();
		$name = str_replace(array("\n","\r","\t"),'',$_POST['sidebar_name']);
		$id = disto_sidebar_generator::name_to_class($name);
		if(isset($sidebars[$id])){
			die("alert('Sidebar already exists, please use a different name.')");
		}
		
		$sidebars[$id] = $name;
		disto_sidebar_generator::update_sidebars($sidebars);
		
		$js = "
			var tbl = document.getElementById('sbg_table');
			var lastRow = tbl.rows.length;
			// if there's no header row in the table, then iteration = lastRow + 1
			var iteration = lastRow;
			var row = tbl.insertRow(lastRow);
			
			// left cell
			var cellLeft = row.insertCell(0);
			var textNode = document.createTextNode('$name');
			cellLeft.appendChild(textNode);
			
			//middle cell
			var cellLeft = row.insertCell(1);
			var textNode = document.createTextNode('$id');
			cellLeft.appendChild(textNode);
			
			//var cellLeft = row.insertCell(2);
			//var textNode = document.createTextNode('[<a href=\'javascript:void(0);\' onclick=\'return remove_sidebar_link($name);\'>Remove</a>]');
			//cellLeft.appendChild(textNode)
			
			var cellLeft = row.insertCell(2);
			removeLink = document.createElement('a');
      		linkText = document.createTextNode('remove');
			removeLink.setAttribute('onclick', 'remove_sidebar_link(\'$name\')');
			removeLink.setAttribute('href', 'javacript:void(0)');
        
      		removeLink.appendChild(linkText);
      		cellLeft.appendChild(removeLink);

			
		";
		
		
		die( "$js");
	}
	
	public static function remove_sidebar(){
		$sidebars = disto_sidebar_generator::get_sidebars();
		$name = str_replace(array("\n","\r","\t"),'',$_POST['sidebar_name']);
		$id = disto_sidebar_generator::name_to_class($name);
		if(!isset($sidebars[$id])){
			die("alert('Sidebar does not exist.')");
		}
		$row_number = $_POST['row_number'];
		unset($sidebars[$id]);
		disto_sidebar_generator::update_sidebars($sidebars);
		$js = "
			var tbl = document.getElementById('sbg_table');
			tbl.deleteRow($row_number)

		";
		die($js);
	}
	
	public static function admin_menu(){
			
		add_theme_page(  esc_html__('Custom Sidebars', 'disto'),  esc_html__('Custom Sidebars', 'disto'), 'manage_options', 'disto_sidebar_generator.php', array('disto_sidebar_generator','admin_page'));

	}
	
	public static function admin_page(){
		?>
		<script>
			function remove_sidebar_link(name,num){
				answer = confirm("Are you sure you want to remove " + name + "?\nThis will remove any widgets you have assigned to this sidebar.");
				if(answer){
					//alert('AJAX REMOVE');
					remove_sidebar(name,num);
				}else{
					return false;
				}
			}
			function add_sidebar_link(){
				var number = Math.floor(1000 + Math.random() * 9000);
				var sidebar_name = prompt("Sidebar Name:","sidebar"+number);
				//alert(sidebar_name);
				add_sidebar(sidebar_name);
			}
		</script>
		<div class="wrap">
			<h2><?php esc_html_e('Custom Sidebars','disto'); ?></h2>
			<br />
			<div class="add_sidebar">
				<a href="javascript:void(0);" onclick="return add_sidebar_link()">+ Add Sidebar</a>
			</div>
			<br />
			<table class="widefat page" id="sbg_table" style="width:600px;">
				<tr>
					<th>Name</th>
					<th>CSS class</th>
					<th>Remove</th>
				</tr>
				<?php
				$sidebars = disto_sidebar_generator::get_sidebars();
				//$sidebars = array('bob','john','mike','asdf');
				if(is_array($sidebars) && !empty($sidebars)){
					$cnt=0;
					foreach($sidebars as $sidebar){
						$alt = ($cnt%2 == 0 ? 'alternate' : '');
				?>
				<tr class="<?php echo esc_attr($alt);?>">
					<td><?php echo esc_attr($sidebar); ?></td>
					<td><?php echo esc_html(disto_sidebar_generator::name_to_class($sidebar)); ?></td>
					<td><a href="javascript:void(0);" onclick="return remove_sidebar_link('<?php echo esc_attr($sidebar); ?>',<?php echo esc_attr($cnt+1); ?>);">remove</a></td>
				</tr>
				<?php
						$cnt++;
					}
				}else{
					?>
					<tr>
						<td colspan="3"><?php esc_html_e('No Sidebars defined', 'disto'); ?></td>
					</tr>
					<?php
				}
				?>
			</table>
			<br /><br />
		</div>
		<?php
	}
	
	/**
	 * for saving the pages/post
	*/
	public static function save_form($post_id){
		//$is_saving = $_POST['sbg_edit'];
		if(!empty($_POST['sbg_edit'])){
			delete_post_meta($post_id, 'sbg_selected_sidebar_replacement');
			add_post_meta($post_id, 'sbg_selected_sidebar_replacement', $_POST['disto_sidebar_generator_replacement']);
		}		
	}
	
	public static function edit_form(){
	    global $post;
	    $post_id = $post;
	    if (is_object($post_id)) {
	    	$post_id = $post_id->ID;
	    }
	    $selected_sidebar = get_post_meta($post_id, 'sbg_selected_sidebar', true);
	    if(!is_array($selected_sidebar)){
	    	$tmp = $selected_sidebar; 
	    	$selected_sidebar = array(); 
	    	$selected_sidebar[0] = $tmp;
	    }
	    $selected_sidebar_replacement = get_post_meta($post_id, 'sbg_selected_sidebar_replacement', true);
		if(!is_array($selected_sidebar_replacement)){
	    	$tmp = $selected_sidebar_replacement; 
	    	$selected_sidebar_replacement = array(); 
	    	$selected_sidebar_replacement[0] = $tmp;
	    }
		?>
	 
	<div id='sbg-sortables' class='meta-box-sortables'>
		<div id="sbg_box" class="postbox" >
			<div class="postbox-header">
				<h2 class='hndle ui-sortable-handle'>Sidebars</h2>
				<div class="handle-actions hide-if-no-js"><button type="button" class="handle-order-higher" aria-disabled="false" aria-describedby="sidebardiv-handle-order-higher-description"><span class="screen-reader-text">Move up</span><span class="order-higher-indicator" aria-hidden="true"></span></button><span class="hidden" id="sidebardiv-handle-order-higher-description"></span><button type="button" class="handle-order-lower" aria-disabled="false" aria-describedby="sidebardiv-handle-order-lower-description"><span class="screen-reader-text"></span><span class="order-lower-indicator" aria-hidden="true"></span></button><span class="hidden" id="sidebardiv-handle-order-lower-description"></span><button type="button" class="handlediv" aria-expanded="true"><span class="screen-reader-text"></span><span class="toggle-indicator" aria-hidden="true"></span></button></div>
			</div>
			<div class="inside">
				<div class="sbg_container">
					<input name="sbg_edit" type="hidden" value="sbg_edit" />					
					<p>
	<?php esc_html_e('Select the custom sidebar, leave unselected to use the default sidebar', 'disto'); ?>
					</p>
					<ul>
					<?php 
					global $wp_registered_sidebars;
					//var_dump($wp_registered_sidebars);		
						for($i=0;$i<1;$i++){ ?>
							<li>
							<select name="disto_sidebar_generator_replacement[<?php $i ?>]">
								<option value="0"<?php if($selected_sidebar_replacement[$i] == ''){ echo " selected";} ?>>None</option>
							<?php
							
							$sidebar_replacements = $wp_registered_sidebars;//disto_sidebar_generator::get_sidebars();
							if(is_array($sidebar_replacements) && !empty($sidebar_replacements)){
								foreach($sidebar_replacements as $sidebar){
									if($selected_sidebar_replacement[$i] == $sidebar['name']){
										echo "<option value='{$sidebar['name']}' selected>{$sidebar['name']}</option>\n";
									}else{
										echo "<option value='{$sidebar['name']}'>{$sidebar['name']}</option>\n";
									}
								}
							}
							?>
							</select> 
							
							</li>
						<?php } ?>
					</ul>
				</div>
			</div>
		</div>
	</div>

		<?php
	}
	
	/**
	 * called by the action get_sidebar. this is what places this into the theme
	*/
	public static function get_sidebar($name="0"){
		if(!is_singular()){
			if($name != "0"){
				dynamic_sidebar($name);
			}else{
				dynamic_sidebar();
			}
			return;//dont do anything
		}
		global $wp_query;
		$post = $wp_query->get_queried_object();
		$selected_sidebar = get_post_meta($post->ID, 'sbg_selected_sidebar', true);
		$selected_sidebar_replacement = get_post_meta($post->ID, 'sbg_selected_sidebar_replacement', true);
		$did_sidebar = false;
		//this page uses a generated sidebar
		if($selected_sidebar != '' && $selected_sidebar != "0"){
			echo "\n\n<!-- begin generated sidebar -->\n";
			if(is_array($selected_sidebar) && !empty($selected_sidebar)){
				for($i=0;$i<sizeof($selected_sidebar);$i++){					
					
					if($name == "0" && $selected_sidebar[$i] == "0" &&  $selected_sidebar_replacement[$i] == "0"){
						//echo "\n\n<!-- [called $name selected {$selected_sidebar[$i]} replacement {$selected_sidebar_replacement[$i]}] -->";
						dynamic_sidebar();//default behavior
						$did_sidebar = true;
						break;
					}elseif($name == "0" && $selected_sidebar[$i] == "0"){
						//we are replacing the default sidebar with something
						//echo "\n\n<!-- [called $name selected {$selected_sidebar[$i]} replacement {$selected_sidebar_replacement[$i]}] -->";
						dynamic_sidebar($selected_sidebar_replacement[$i]);//default behavior
						$did_sidebar = true;
						break;
					}elseif($selected_sidebar[$i] == $name){
						//we are replacing this $name
						//echo "\n\n<!-- [called $name selected {$selected_sidebar[$i]} replacement {$selected_sidebar_replacement[$i]}] -->";
						$did_sidebar = true;
						dynamic_sidebar($selected_sidebar_replacement[$i]);//default behavior
						break;
					}
					//echo "<!-- called=$name selected={$selected_sidebar[$i]} replacement={$selected_sidebar_replacement[$i]} -->\n";
				}
			}
			if($did_sidebar == true){
				echo "\n<!-- end generated sidebar -->\n\n";
				return;
			}
			//go through without finding any replacements, lets just send them what they asked for
			if($name != "0"){
				dynamic_sidebar($name);
			}else{
				dynamic_sidebar();
			}
			echo "\n<!-- end generated sidebar -->\n\n";
			return;			
		}else{
			if($name != "0"){
				dynamic_sidebar($name);
			}else{
				dynamic_sidebar();
			}
		}
	}
	
	/**
	 * replaces array of sidebar names
	*/
	public static function update_sidebars($sidebar_array){
		$sidebars = update_option('sbg_sidebars',$sidebar_array);
	}	
	
	/**
	 * gets the generated sidebars
	*/
	public static function get_sidebars(){
		$sidebars = get_option('sbg_sidebars');
		return $sidebars;
	}
	public static function name_to_class($name){
		$class = str_replace(array(' ',',','.','"',"'",'/',"\\",'+','=',')','(','*','&','^','%','$','#','@','!','~','`','<','>','?','[',']','{','}','|',':',),'',$name);
		return $class;
	}
	
}
$sbg = new disto_sidebar_generator;

function generated_dynamic_sidebar($name='0'){
	disto_sidebar_generator::get_sidebar($name);	
	
	return true;
}
?>
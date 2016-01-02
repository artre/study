<?php
/*
Plugin Name: AK Options
Plugin URI: http://football.com
Description: creating options page
Version: 1.0
Author: Tomek
Author URI: http://football.com
*/

class JW_Options 
{
	public $options;
	
	public function __construct()
	{
		//delete_option('jw_plugin_options'); // to prevent errors and notices to show up
		$this->options = get_option('jw_plugin_options');
		$this->register_setting_and_fields();
	}
	
	public function add_menu_page()
	{
		add_options_page('Theme Options', 'Theme Options', 'administrator', __FILE__, array(JW_Options, 'display_options_page'));
	}
	
	public function display_options_page() 
	{
		?>
			<div class="wrap">
				<h2>My Theme Options</h2>
				<?php
					$o = get_option('jw_plugin_options');
					echo '<pre>';
					print_r($o);
					echo '</pre>';	
				?>
				<form method="post" action="options.php" enctype="multipart/form-data">
					<?php settings_fields('jw_plugin_options'); // include this function for security reasons inside the form. Its a wordpress function made just for this. It will generate empty input fields?>
					<?php do_settings_sections(__FILE__); ?>
					
					<p class="submit">
						<input name="submit" type="submit" class="button-primary" value="Save Changes"/>
					</p>
				</form>
			</div>
		<?php
		
	}
	
	public function register_setting_and_fields()
	{
		register_setting('jw_plugin_options', 'jw_plugin_options',  array($this,'jw_validate_settings')); // 3rd param = optional cb.
		add_settings_section('jw_main_section', 'Main Settings', array($this,'jw_main_section_cb'), __FILE__); //id, title of section, cb, which page?
		add_settings_field('jw_banner_heading', 'Banner Heading: ', array($this,'jw_banner_heading_setting'), __FILE__, 'jw_main_section');
		add_settings_field('jw_logo', 'Your Logo: ', array($this,'jw_logo_setting'), __FILE__, 'jw_main_section');
		add_settings_field('jw_color_sheme', 'Your Desired Colored Scheme: ', array($this,'jw_color_scheme_setting'), __FILE__, 'jw_main_section');
	}
	
	public function jw_main_section_cb() 
	{
		
	}
	
	public function jw_validate_settings($plugin_options)
	{
		if ( !empty($_FILES['jw_logo_upload']['tmp_name']) ) {
			$overide = array('test_form' => false);
			$file = wp_handle_upload($_FILES['jw_logo_upload'], $overide);
			$plugin_options['jw_logo'] = $file['url'];
		} else {
			$plugin_options['jw_logo'] = $this->options['jw_logo'];
		}
	}
	
	
	/*
		*
		* Inputs
		*
		*/
	
	// Banner Heading	
	public function jw_banner_heading_setting()
	{
		echo "<input name='jw_plugin_options[jw_banner_heading]' type='text' value='{$this->options['jw_banner_heading']}' />";
	}
	// Your Logo	
	public function jw_logo_setting()
	{
		echo '<input type="file" name="jw_logo_upload" /><br /><br />';
		if ( isset($this->options['jw_logo']) ){
			echo "img src='{$this->options['jw_logo']}' />";
		}
	}
	
	
	public function jw_color_scheme_setting()
	{
		$items = array('red', 'green', 'blue', 'Yellow', 'Black', 'White');
		echo "<select name='jw_pulgin_options[jw_color_sheme]'>";
		foreach($items as $item) {
			$selected = ( $this->options['jw_color_sheme'] === $item ) ? 'selected="selected"' : '';
			echo "<option value='$item' $selected>$item</option>";
		}
		echo "</select>";
	}
	
}


add_action('admin_menu', function() {
	JW_Options::add_menu_page();
});

add_action('admin_init', function() {
	new JW_Options();
});

















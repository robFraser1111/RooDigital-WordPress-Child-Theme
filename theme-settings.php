<?php

	function theme_settings_page() {
		?>
			<div class="wrap">
				<h1>Theme Panel</h1>
				<form method="post" action="options.php">
					<?php
						settings_fields("section");
						do_settings_sections("theme-options");      
						submit_button(); 
					?>          
				</form>
			</div>
		<?php
	}

	function add_theme_menu_item() {
		add_menu_page("Theme Panel", "Theme Panel", "manage_options", "theme-panel", "theme_settings_page", null, 99);
	}
	add_action("admin_menu", "add_theme_menu_item");


	function display_analytics_element() {
		?>
			<textarea rows="20" cols="200" name="analytics" id="analytics"><?php echo get_option('analytics'); ?></textarea>
		<?php
	}

	function display_theme_panel_fields() {
		add_settings_section("section", "All Settings", null, "theme-options");
		add_settings_field("analytics", "Analytics", "display_analytics_element", "theme-options", "section");
		register_setting("section", "analytics");
	}

	add_action("admin_init", "display_theme_panel_fields");

?>
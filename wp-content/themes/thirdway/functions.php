<?php

	function thirdway_register_theme_menu(){
		register_nav_menu('primary','Main Navigation Menu');
	}
	add_action('init','thirdway_register_theme_menu');
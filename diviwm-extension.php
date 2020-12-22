<?php
/*
Plugin Name: Diviwm Extension
Plugin URI:  http://rajasingha.com/wpplugins/divi-widget-module
Description: This is a wordpress plugin for DIVI Extension that enables option to integrate custom widget area to DIVI builder .
Version:     1.0.0
Author:      Nelson M.
Author URI:  http://rajasingha.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: diviwmext-diviwm-extension
Domain Path: /languages

Diviwm Extension is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Diviwm Extension is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Diviwm Extension. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/


if ( ! function_exists( 'diviwmext_initialize_extension' ) ):
/**
 * Creates the extension's main class instance.
 *
 * @since 1.0.0
 */
function diviwmext_initialize_extension() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/DiviwmExtension.php';
}
add_action( 'divi_extensions_init', 'diviwmext_initialize_extension' );
endif;

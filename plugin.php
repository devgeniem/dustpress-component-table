<?php
/**
 * Plugin Name: DustPress Component Table
 * Plugin URI: https://github.com/devgeniem/dustpress-components-table
 * Description: DustPress component boilerplate
 * Version: 1.0.0
 * Author: Geniem Oy / Timi-Artturi Mäkelä
 * Author URI: http://www.geniem.com
 * Text Domain: dpc-component-table
 * Domain Path: /languages
 */

namespace DustPress\Components;

\add_action( 'plugins_loaded', function() {


	class ComponentTable extends Component {

		/**
		 * Variables
		 * label = Name of the component shows in admin side
		 * name  = Add component name
		 * key   = ACF field key
		 */
		public function __construct() {
			$this->label    = __( 'Table', 'dpc-component-table' );
			$this->name 	= 'component-table';
			$this->key 		= 'dpc_component_table';

			parent::__construct();
		}

		public function init() {
			// Example
			add_action( 'example_function', array( $this, 'example_function' ) );
		}

		/**
		 * acf field component data
		 * @param  [type] $data
		 * @return [type] [description]
		 * 
		 * !remember to describe acf field names!
		 * $data['field_slug'] = description
		 */
		public function data( $data ) {
			// do stuff with data
			return $data;
		}

		/**
		 * 
		 * @return [type] [description]
		 */
		public function before() {
			// place to enqueue resources
			wp_register_script( 'dustpress-components-component-table', plugins_url( 'dist/plugin.js',__FILE__ ), null, null, true );
		}

		/**
		 * [after description]
		 * @return [type] [description]
		 */
		public function after() {
			wp_enqueue_script( 'dustpress-components-component-table' );
		}

		/**
		 * ACF fields
		 * @return [type] [description]
		 */
		public function fields() {
			return array (

				'key' 			=> $this->key,
				'name' 			=> $this->name,
				'label' 		=> $this->label,
				'display' 		=> 'block',
				'sub_fields' 	=> array (
					array (
						'key' => 'dpc_table_field',
						'label' => 'Taulukkokenttä',
						'name' => 'table_field',
						'type' => 'table',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array (
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'use_header' => 0,
					)
				)
			);
		}

		/**
		 * example of custom function inside component
		 * @return [type] [description]
		 */
		private function example_function() {

		}
	}

	if ( is_plugin_active( 'dustpress-components/plugin.php' ) ) {
		Components::add( new ComponentTable() );

		$table_field_plugin_file_path 		= 'advanced-custom-fields-table-field/acf-table.php';
		$table_field_plugin_file_full_path 	= WP_PLUGIN_DIR . '/advanced-custom-fields-table-field/acf-table.php';

		// if acf-table-field plugin exists and plugin is not activate activate acf-table-field
		if ( file_exists( $table_field_plugin_file_full_path ) && !is_plugin_active( $table_field_plugin_file_path )  ) {
			activate_plugin( $table_field_plugin_file_path );
		}
		else if ( !file_exists( $table_field_plugin_file_full_path ) ) {
			error_log( "dustpress-component-table: wp-plugin 'advanced-custom-fields-table-field' doesn't exists" );
		}

	}

}, 2, 1 );

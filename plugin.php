<?php
/**
 * Plugin Name: DustPress Component: Component Name
 * Plugin URI: https://github.com/devgeniem/dustpress-components-google-maps
 * Description: Google Maps component for DustPress Components
 * Version: 0.0.1
 * Author: Geniem Oy / Miika Arponen
 * Author URI: http://www.geniem.com
 */

namespace DustPress\Components;

\add_action( 'plugins_loaded', function() {


	class ComponentName extends Component {

		/**
		 * Varialbes
		 * label = Name of the component shows in admin side
		 * name  = ACF field slug
		 * key   = 
		 */
		var $label 	= 'Name of the component';
		var $name 	= 'component_name';
		var $key 	= 'dpc_component_name';

		public function init() {
			// Example
			add_action( 'example_function', array( $this, 'example_function' ) );
		}

		/**
		 * acf field component data
		 * @param  [type] $data
		 * @return [type]       [description]
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
			wp_register_script( 'dustpress-components-component-name', plugins_url( 'dist/plugin.js',__FILE__ ), null, null, true );
		}

		/**
		 * [after description]
		 * @return [type] [description]
		 */
		public function after() {
			wp_enqueue_script( 'dustpress-components-component-name' );
		}

		/**
		 * ACF fields
		 * @return [type] [description]
		 */
		public function fields() {
			return array (

				'key' => $this->key,
				'name' => $this->name,
				'label' => $this->label,
				'display' => 'block',
				'sub_fields' => array (
					/* 
					* sub_fields = acf php export 'fields' array
					* Here you can add your exported acf fields
					* Add arrays of the fields array see the documentation for the details http://todooo.com
					*/
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
	
	Components::add( new ComponentName() );
}, 2, 1 );
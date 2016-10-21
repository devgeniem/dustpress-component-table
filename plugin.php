<?php
/**
 * Plugin Name: DustPress Component: Google Maps
 * Plugin URI: https://github.com/devgeniem/dustpress-components-google-maps
 * Description: Google Maps component for DustPress Components
 * Version: 0.0.1
 * Author: Geniem Oy / Miika Arponen
 * Author URI: http://www.geniem.com
 */

namespace DustPress\Components;

\add_action( 'plugins_loaded', function() {
	class Gmaps extends Component {
		var $label = 'Google Maps';
		var $name = 'gmaps';

		static $counter = 0;

		public function fields() {
			return array (
				'key' => 'dpc_gmaps',
				'name' => $this->name,
				'label' => $this->label,
				'display' => 'block',
				'sub_fields' => array (
					array (
						'key' => 'dpc_gmaps_map',
						'label' => 'Google Maps',
						'name' => 'map',
						'type' => 'google_map',
						'instructions' => '',
						'required' => 1,
						'conditional_logic' => 0,
						'wrapper' => array (
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'center_lat' => '60.4466233',
	                    'center_lng' => '22.2975134',
	                    'zoom' => '',
	                    'height' => ''
					),
					array (
						'key' => 'dpc_gmaps_zoom',
						'label' => 'Zoom',
						'name' => 'zoom',
						'type' => 'number',
						'instructions' => '1: World\r\n5: Continent\r\n15: Street level\r\n20: Buildings',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array (
							'width' => '50',
							'class' => '',
							'id' => '',
						),
						'default_value' => 15,
	                    'placeholder' => '',
	                    'prepend' => '',
	                    'append' => '',
	                    'min' => 1,
	                    'max' => 20,
	                    'step' => '',
	                    'readonly' => 0,
	                    'disabled' => 0
					),
					array (
						'key' => 'dpc_gmaps_color',
						'label' => 'Color',
						'name' => 'color',
						'type' => 'select',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array (
							'width' => '50',
							'class' => '',
							'id' => '',
						),
						'choices' => [
							'normal' => 'Normal',
							'paper' => 'Paper',
							'grey' => 'Grey',
							'retro' => 'Retro'
						],
						'default_value' => [],
	                    'allow_null' => 0,
	                    'multiple' => 0,
	                    'ui' => 1,
	                    'ajax' => 0,
	                    'return_format' => 'value',
	                    'placeholder' => ''
					),
				),
				'min' => '',
				'max' => '',
			);
		}

		public function data( $data ) {
			$data['counter'] = self::$counter++;

			wp_localize_script( 'dustpress-components-google-maps', 'dustpress_components_google_maps_' . $data['counter'], $data );

			return $data;
		}

		public function before() {
			wp_register_script( 'dustpress-components-google-maps', plugins_url( 'dist/plugin.js',__FILE__ ), null, null, true );
			wp_enqueue_script( 'google-maps-api', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCDepDTTcNoS0pFE0cibJ9cLhUIinScg00', null, null, true );
		}

		public function after() {
			wp_enqueue_script( 'dustpress-components-google-maps' );
		}
	}
	
	Components::add( new Gmaps() );
}, 2, 1 );
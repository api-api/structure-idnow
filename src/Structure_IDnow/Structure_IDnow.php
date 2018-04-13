<?php
/**
 * Structure_IDnow class
 *
 * @package APIAPI\Structure_Billomat
 * @since   1.0.0
 */

namespace APIAPI\Structure_IDnow;

use APIAPI\Core\Structures\Structure;
use APIAPI\Core\Request\Method;

if ( ! class_exists( 'APIAPI\Structure_IDnow\Structure_IDnow' ) ) {

	/**
	 * Structure implementation for IDnow.
	 *
	 * @since 1.0.0
	 */
	class Structure_IDnow extends Structure {
		/**
		 * Sets up the API structure.
		 * This method should populate the routes array, and can also be used to
		 * handle further initialization functionality, like setting the authenticator
		 * class and default authentication data.
		 *
		 * @since 1.0.0
		 */
		protected function setup() {
			$this->title         = 'IDnow API';

			$this->description   = 'Allows to access and manage the data in your IDnow account.';
			$this->base_uri      = 'https://gateway.test.idnow.de/api/v1/{companyID}/';

			$this->base_uri_params['companyID'] = array(
				'description' => 'companyID of the account.',
				'internal'    => true
			);

			$this->authenticator = 'x-account';
			$this->authentication_data_defaults = array(
				'placeholder_name' => 'companyID',
				'header_name'      => 'API-KEY',
			);

			$this->routes['/login'] = array(
				'methods' => array(
					Method::POST  => array(
						'request_data_type'    => 'json',
						'description'          => 'Adds identification',
						'needs_authentication' => true,
						'params'            => array(
							'apiKey'    => array(
								'description'   => 'API Key to get token',
								'type'          => 'string'
							)
						)
					)
				)
			);

			$this->routes['/identifications'] = array(
				'methods' => array(
					Method::GET  => array(
						'description'          => 'Adds identification',
						'needs_authentication' => true,
					)
				)
			);

			$this->routes['/identifications/(?P<transaction_number>[\\d]+)/start'] = array(
				'methods' => array(
					Method::POST  => array(
						'description'          => 'Adds identification',
						'needs_authentication' => true,
						'request_data_type'    => 'json',
						'params'               => array(
							'birthday'        => array(
								'description' => 'The user’s birthday in ISO 8601 format: YYYY-MM-DD',
								'type'        => 'string',
							),
							'birthplace'          => array(
								'description' => 'The user’s birthplace.',
								'type'        => 'string',
							),
							'birthname'       => array(
								'description' => 'The user’s birthname. Do not include prefixes like “Geb.” Or “Geborene”.',
								'type'        => 'string',
							),
							'city'            => array(
								'description' => 'The user\'s city',
								'type'        => 'string',
							),
							'country'         => array(
								'description' => 'The user\'s country. Uppercase twoletter code as defined in ISO 3166',
								'type'        => 'string',
							),
							'custom1'         => array(
								'description' => 'Custom text field. Use this to pass your own IDs, tags etc. You will get this information back in the identification results',
								'type'        => 'string',
							),
							'custom2'         => array(
								'description' => 'Custom text field. Use this to pass your own IDs, tags etc. You will get this information back in the identification results',
								'type'        => 'string',
							),
							'custom3'         => array(
								'description' => 'Custom text field. Use this to pass your own IDs, tags etc. You will get this information back in the identification results',
								'type'        => 'string',
							),
							'custom4'         => array(
								'description' => 'Custom text field. Use this to pass your own IDs, tags etc. You will get this information back in the identification results',
								'type'        => 'string',
							),
							'custom5'         => array(
								'description' => 'Custom text field. Use this to pass your own IDs, tags etc. You will get this information back in the identification results',
								'type'        => 'string',
							),
							'trackingid'      => array(
								'description' => 'Custom tracking field. Can be used to pass tracking information. You will get this information back in the identification results. Can also be set as parameter „tid“ in user frontend.',
								'type'        => 'string',
							),
							'email'           => array(
								'description' => 'The user\'s email address',
								'type'        => 'string',
							),
							'firstname'       => array(
								'description' => 'The user\'s first name(s)',
								'type'        => 'string',
							),
							'gender'          => array(
								'description' => 'The user\'s gender. use \'MALE\' or \'FEMALE\'',
								'type'        => 'string',
							),
							'lastname'        => array(
								'description' => 'The user\'s lastname',
								'type'        => 'string',
							),
							'mobilephone'     => array(
								'description' => 'The user\'s mobile phone number. If no country code is given, 0049 is assumed.',
								'type'        => 'string',
							),
							'nationality'     => array(
								'description' => 'The user\'s nationality. Uppercase two-letter code as defined in ISO 3166',
								'type'        => 'string',
							),
							'preferredLang'   => array(
								'description' => 'The preferred language the user would like to use for the conversation with the agent. Language codes per ISO 639-1. Please contact your technical account manager for the available languages.',
								'type'        => 'string',
							),
							'street'          => array(
								'description' => 'The user\'s street',
								'type'        => 'string',
							),
							'streetnumber'    => array(
								'description' => 'The user’s street number. This field can be configured to be part of the field “street”, if you have street and number saved in one field in your database. If you wish to activate this setting please contact your technical account manager at IDnow.',
								'type'        => 'string',
							),
							'title'           => array(
								'description' => 'Academic title. This should only be used, if the title is part of the name and shown in ID documents.',
								'type'        => 'string',
							),
							'zipcode'         => array(
								'description' => 'The user\'s zip code',
								'type'        => 'string',
							),
							'questions'          => array(
								'description' => 'Pre-defined values for questions shown to the identification agent.',
								'type'        => 'string',
							),
						)
					)
				)
			);
		}
	}
}

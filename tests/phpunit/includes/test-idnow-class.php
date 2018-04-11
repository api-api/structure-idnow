<?php

class IDnow_TestCase extends Structure_TestCase {
	/**
	 * @var \APIAPI\Core\APIAPI
	 */
	protected $apiapi;

	/**
	 * @var \APIAPI\Structure_IDnow\Structure_IDnow
	 */
	protected $api;

	protected function setUp() {

		$api_key = getenv( 'IDNOW_API_KEY' );
		$company_id = getenv( 'IDNOW_COMPANY_ID' );

		$config = array(
			'transporter'            => 'curl',
			'idnow'                => array(
				'authentication_data' => array(
					'account'    => $company_id,
					'token'   => $api_key
				)
			)
		);

		$this->apiapi = apiapi( 'test-api', $config );
	}
}
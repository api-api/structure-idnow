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

		$username = getenv( 'VIDYO_USER' );
		$password = getenv( 'VIDYO_PASS' );

		$config = array(
			'transporter'            => 'curl',
			'idnow'                => array(
				'authentication_data' => array(
					'username'    => $username,
					'password' => $password,
				)
			)
		);

		$this->apiapi = apiapi( 'test-api', $config );
	}
}
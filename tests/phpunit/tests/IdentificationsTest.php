<?php

require_once dirname( dirname( __FILE__ ) ) . '/includes/bootstrap.php';

class IdentificationsTests extends IDnow_TestCase {
	public function testLogin() {
		$request = $this->apiapi->get_request_object( 'idnow', '/login', 'POST' );
		$request->set_param('apiKey', getenv('IDNOW_API_KEY' ) );
		$response = $this->apiapi->send_request( $request );

		$this->assertEquals( 200, $response->get_response_code() );
	}

	public function testGet() {
		$auth_token = $this->get_auth_token();
		$request = $this->apiapi->get_request_object( 'idnow', '/identifications' );
		$request->set_header( 'X-API-LOGIN-TOKEN', $auth_token );
		$response = $this->apiapi->send_request( $request );

		$this->assertEquals( 200, $response->get_response_code() );
	}

	public function testAdd() {
		$transaction_number = time() * rand();

		$request = $this->apiapi->get_request_object( 'idnow', '/identifications/(?P<transaction_number>[\\d]+)/start', 'POST' );
		$request->set_param('transaction_number', $transaction_number );
		$request->set_param('firstname', 'test1');
		$response = $this->apiapi->send_request( $request );

		$this->assertEquals( 201, $response->get_response_code() );
	}

	private function get_auth_token() {
		$request = $this->apiapi->get_request_object( 'idnow', '/login', 'POST' );
		$request->set_param('apiKey', getenv('IDNOW_API_KEY' ) );
		$response = $this->apiapi->send_request( $request );

		$params = $response->get_params();

		return $params[ 'authToken' ];
	}
}
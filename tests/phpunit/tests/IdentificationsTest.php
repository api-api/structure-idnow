<?php

require_once dirname( dirname( __FILE__ ) ) . '/includes/bootstrap.php';

class IdentificationsTests extends IDnow_TestCase {
	public function testAdd() {
		$request = $this->apiapi->get_request_object( 'idnow', '/identifications', 'POST' );

		$request->set_param('firstname', 'test');
		$response = $this->apiapi->send_request( $request );
		$params = $response->get_params();

		$this->assertEquals( 1, count( $params ) );
		// $this->assertEquals( 'testgroup1', $params[ 0 ]['name'] );
	}
}
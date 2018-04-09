<?php

require_once dirname( dirname( __FILE__ ) ) . '/includes/bootstrap.php';

class UsergroupsTests extends IDnow_TestCase {
	public function testGetUsergroups() {
		$request = $this->apiapi->get_request_object( 'idnow', '/usergroups' );
		$request->set_param('name', 'testgroup1');
		$response = $this->apiapi->send_request( $request );
		$params = $response->get_params();

		$this->assertEquals( 1, count( $params ) );
		$this->assertEquals( 'testgroup1', $params[ 0 ]['name'] );
	}

	public function testPostGetUsergroups() {
		$request = $this->apiapi->get_request_object( 'idnow', '/usergroups', 'POST' );
		$request->set_param('name', 'Meine dolle Gruppe' );
		$response = $this->apiapi->send_request( $request );
		print_r( $response );
	}
}
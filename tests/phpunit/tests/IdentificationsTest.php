<?php

require_once dirname( dirname( __FILE__ ) ) . '/includes/bootstrap.php';

class IdentificationsTests extends IDnow_TestCase {
	public function testAdd() {
		$transaction_number = time() * rand();

		$request = $this->apiapi->get_request_object( 'idnow', '/identifications/(?P<transaction_number>[\\d]+)/start', 'POST' );

		$request->set_param('transaction_number', $transaction_number );
		$request->set_param('firstname', 'test1');
		$response = $this->apiapi->send_request( $request );

		$this->assertEquals( 201, $response->get_response_code() );
	}
}
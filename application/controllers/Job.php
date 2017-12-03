<?php
/**
 * REST server for the todo list
 *
 * ------------------------------------------------------------------------
 */
require APPPATH . '/third_party/restful/libraries/Rest_controller.php';

class Job extends Rest_Controller {
	function __construct()
	{
		parent::__construct();
	}
	// Handle an incoming GET ... 	returns a list of ports
	function index_get($jobId)
	{
        $this->response($this->tasks->get($jobId), 200);
	}
	// The other REST methods are not handled, since we are not doing maintenance
}

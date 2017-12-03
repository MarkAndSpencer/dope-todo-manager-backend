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
    // Handle an incoming GET - cRud
    function index_get($key=null)
    {
        if (!$key)
        {
            $this->response($this->tasks->all(), 200);
        } else
        {
            $result = $this->tasks->get($key);
            if ($result != null)
                $this->response($result, 200);
            else
                $this->response(array('error' => 'Todo item not found!'), 404);
        }
    }

    // Handle an incoming PUT - crUd
    function index_put($key=null)
    {
        $record = array_merge(array('id' => $key), $this->_put_args);
        $task = $this->task->create((object)$record);
        $this->tasks->update($task);
        $this->response(array('ok'), 200);
    }

    // Handle an incoming POST - Crud
    function index_post($key=null)
    {
        $record = array_merge(array('id' => $key), $_POST);
        $task = $this->task->create((object)$record);
        $task->id = $this->tasks->highest() + 1;
        $this->tasks->add($task);
        $this->response(array('ok'), 200);
    }

    // Handle an incoming DELETE - cruD
    function index_delete($key=null)
    {
        $this->tasks->delete($key);
        $this->response(array('ok'), 200);
    }
}

<?php

abstract class Controller
{
    protected $controller_name;
    protected $action_name;

    public function __construct()
    {
        $this->controller_name = strtolower(substr(get_class($this), 0, -10));
    }

    public function run($action, $params = [])
    {
        $this->action_name = $action;
        $action_method = $action . 'Action';
        if (! method_exists($this, $action_method)) {
            $this->forbidden();
        }
    }

    public function forbidden()
    {
        throw new Exception('Forwarded 404 page from ' . $this->controller_name . '/' . $this->action_name);
    }
}

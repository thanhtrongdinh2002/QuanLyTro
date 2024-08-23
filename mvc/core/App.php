<?php
class App
{
    protected $controller = "Home";
    protected $action = "About";
    protected $params = [];

    public function UrlProcess()
    {
        if (isset($_GET["url"])) {
            $url = filter_var(trim($_GET["url"], "/"));
            return explode("/", $url);
        }
    }

    public function __construct()
    {
        $arr = $this->UrlProcess();

        // Controller
        if (!empty($arr[0]) && file_exists("./mvc/controllers/{$arr[0]}.php")) {
            $this->controller = $arr[0];
            unset($arr[0]);
        }
        require_once "./mvc/controllers/{$this->controller}.php";
        $this->controller = new $this->controller;

        // Action
        if (!empty($arr[1]) && method_exists($this->controller, $arr[1])) {
            $this->action = $arr[1];
            unset($arr[1]);
        }

        // Params
        $this->params = !empty($arr) ? array_values($arr) : [];

        call_user_func_array([$this->controller, $this->action], $this->params);
    }
}

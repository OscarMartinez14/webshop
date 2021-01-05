<?php
require_once 'UriParser.php';

class View
{
    
    
    private $viewfile;
    private $properties = array();

    public function __construct($viewfileName)
    {
        $uriParser = new UriParser();
        $this->viewfile = "./../MVC/Views/". UriParser::getControllerName() . "/" . $viewfileName . ".php";
    }

    public function __set($key, $value)
    {
        if (!isset($this->$key)) {
            $this->properties[$key] = $value;
        }
    }

    public function __get($key)
    {
        if (isset($this->properties[$key])) {
            return $this->properties[$key];
        }
    }

    public function display()
    {
        extract($this->properties);

        require './../MVC/Views/header.php';
        require $this->viewfile;
        require './../MVC/Views/footer.php';
    }
}

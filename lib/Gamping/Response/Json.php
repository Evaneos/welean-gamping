<?php
namespace Gamping\Response;

use Gamping\Response;
use Gamping\Layout;
use Gamping\View;

class Json implements Response
{

    private $file;

    private $layout;

    public function render(array $data)
    {
        if (trim($this->file) == '') {
            return json_encode($data);
        }
        
        $view = new View($this->file);
        $view->assignx($data);
        
        return $view->compile();
    }

    public function setLayout(Layout $layout)
    {
        $this->layout = $layout;
    }

    public function setViewFile($viewName)
    {
        $this->file = $viewName;
    }
}
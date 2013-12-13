<?php

namespace Gamping\Response;

use Gamping\Response;
use Gamping\Layout;

class Json implements Response
{
    private $file;
    
    private $layout;
    
    public function render(array $data)
    {
        return json_encode($data);
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
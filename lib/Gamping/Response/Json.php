<?php

namespace Gamping\Response;

use Gamping\Response;

class Json implements Response
{
    private $file;
    
    public function render(array $data)
    {
        return json_encode($data);
    }
    
    public function setViewFile($viewName)
    {
        $this->file = $viewName;
    }
}
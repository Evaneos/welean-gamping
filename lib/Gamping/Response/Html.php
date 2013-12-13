<?php
namespace Gamping\Response;

use Gamping\Response;
use Gamping\View;

class Html implements Response
{
    private $file;
    
    public function render(array $data)
    {
        $view = new View($this->file);
        
        $view->assignx($data);
        
        return $view->compile();
    }
    
    public function setViewFile($file)
    {
        $this->file = $file;
    }
}
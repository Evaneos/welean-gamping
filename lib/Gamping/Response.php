<?php

namespace Gamping;

interface Response 
{
    function render(array $data);
    
    function setLayout(Layout $layout);
    
    function setViewFile($viewName);
}
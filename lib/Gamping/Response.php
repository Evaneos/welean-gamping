<?php

namespace Gamping;

interface Response 
{
    function render(array $data);
    
    function setViewFile($viewName);
}
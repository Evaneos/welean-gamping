<?php
namespace Gamping;

use Gamping\Response\Html;
use Symfony\Component\HttpFoundation\Request;

class ResponseSelector
{

    public function getResponse(Request $request)
    {
        return new Html();
    }
}
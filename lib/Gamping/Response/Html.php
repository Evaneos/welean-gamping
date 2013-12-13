<?php
namespace Gamping\Response;

use Gamping\Response;

class Html implements Response
{
    public function render(array $data)
    {
        return $data['data'];
    }
}
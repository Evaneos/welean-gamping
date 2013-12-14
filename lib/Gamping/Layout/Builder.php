<?php
namespace Gamping\Layout;

use Gamping\ArrayWrapper;
use Gamping\Layout;

class Builder
{

    private $rootDirectory;

    public function setRootDirectory($directory)
    {
        $this->rootDirectory = $directory;
    }

    public function build($name, $data)
    {
        $wrapper = new ArrayWrapper($data);
        $wrapper->wrapArrays(true);
        
        $template = $wrapper->tryGet('template', null);
        $layout = new Layout($this->rootDirectory . DIRECTORY_SEPARATOR . $template);
        
        $scripts = $wrapper->tryGet('scripts', array());
        
        foreach ($scripts->tryGet('head', array()) as $script) {
            $layout->addJavascriptFile($script, 'head');
        }
        
        foreach ($scripts->tryGet('top', array()) as $script) {
            $layout->addJavascriptFile($script, 'top');
        }
        
        foreach ($scripts->tryGet('bottom', array()) as $script) {
            $layout->addJavascriptFile($script, 'bottom');
        }
        
        $stylesheets = $wrapper->tryGet('stylesheets', array());
        
        foreach ($stylesheets as $stylesheet) {
            $stylesheet = new ArrayWrapper($stylesheet);
            $layout->addStyleSheet('style', $stylesheet->tryGet(0, ''), 
                $stylesheet->tryGet(2, 'screen'), $stylesheet->tryGet(1, 'css'));
        }
        
        return $layout;
    }
}
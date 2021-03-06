<?php

namespace Gamping;

class Layout extends View
{
    private $javascripts = array();

    private $stylesheets = array();

    private $metas = array();

    public function __construct($filename = null)
    {
        parent::__construct($filename);
    }

    public function addCustomMeta($key, $value)
    {
        $this->metas[] = array('key' => $key, 'value' => $value);

        return $this;
    }

    public function addStyleSheet($group, $url, $media = 'all', $type = 'css')
    {
        if (! array_key_exists($group, $this->stylesheets)) {
            $this->stylesheets[$group] = array();
        }

        if (! array_key_exists($media, $this->stylesheets[$group])) {
            $this->stylesheets[$group][$media] = array();
        }

        $this->stylesheets[$group][$media][] = array('url' => $url, 'type' => $type);

        return $this;
    }

    public function addJavascriptFile($url, $position = 'head')
    {
        if (! array_key_exists($position, $this->javascripts)) {
            $this->javascripts[$position] = array();
        }

        $this->javascripts[$position][] = $url;

        return $this;
    }

    protected function renderCustomMetas()
    {
        $buffer = '';

        foreach ($this->metas as $meta) {
            $buffer .= sprintf('<meta name="%s" content="%s" />', $meta['key'], $meta['value']) . PHP_EOL;
        }

        return $buffer;
    }

    protected function renderJavascripts($position = 'head')
    {
        $buffer = '';

        if (! array_key_exists($position, $this->javascripts)) {
            return $buffer;
        }

        foreach ($this->javascripts[$position] as $jsInclude) {
            $buffer .= sprintf('<script src="%s" type="text/javascript"></script>%s', $jsInclude, PHP_EOL);
        }

        return $buffer;
    }

    protected function renderStylesheets()
    {
        $buffer = '';

        foreach ($this->stylesheets as $group) {
            foreach ($group as $media => $mediaGroup) {
                foreach ($mediaGroup as $stylesheet) {
                    $buffer .= sprintf('<link rel="stylesheet" media="%s" href="%s" type="text/%s" />',
                        $media, $stylesheet['url'], $stylesheet['type']) . PHP_EOL;
                }
            }
        }

        return $buffer;
    }
}
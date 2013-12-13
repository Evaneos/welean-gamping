<?php
function t($key, $lang = null) {
    if ($lang === null) {
        $lang = 'fr';
    }

    return \Translation_Manager::getInstance()->translate($key, $lang);
}
<?php
function t($key, $lang = null) {
    return \Translation_Manager::getInstance()->translate($key, $lang);
}
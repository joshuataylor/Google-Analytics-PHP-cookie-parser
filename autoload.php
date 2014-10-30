<?php

if (!class_exists('SplClassLoader')) {
    require __DIR__ . '/lib/SplClassLoader.php';
}

$_classLoader = new \SplClassLoader('GoogleAnalytics', __DIR__ . '/src');
$_classLoader->register();

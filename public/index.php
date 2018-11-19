<?php
/**
 * This makes our life easier when dealing with paths. Everything is relative
 * to the application root now.
 */
chdir(dirname(__DIR__));

ini_set('upload_max_filesize', '512M');
ini_set('max_execution_time', '999');
ini_set('memory_limit', '128M');
ini_set('post_max_size', '512M');

// Setup autoloading
require 'init_autoloader.php';

// Run the application!
Zend\Mvc\Application::init(require 'config/application.config.php')->run();

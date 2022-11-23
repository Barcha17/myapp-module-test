<?php

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Barcha17\Module\ModuleTest\DependencyInjection\ModuleTestExtension;
require_once __DIR__ . '/../vendor/autoload.php';


/** @var array<array> app-level configuration options */
$configs = [['storageDir' => __DIR__ . '/db']];// Build the service container
$container = new ContainerBuilder();
$extension = new ModuleTestExtension();
$extension->load($configs, $container);
$container->compile();// Set and create the output directory
$outDir = __DIR__ . '/out';if (!file_exists($outDir)) 
    mkdir($outDir);// Define the file name and contents
$index = count(scandir($outDir));
$path = "$outDir/document$index.docx";
$text = 'Hello world!';// Use the services in the bundle
$id = $container->get('app.document.db')->newDocument($text);
$container->get('app.document.formatter')->format($id, $path);echo "The document is at '$path'\n";
<?php

require_once __DIR__ . '/../vendor/autoload.php';

// register IoC
$app = new Illuminate\Container\Container;

// Filesystem
$app['files'] = $app->share(function() {
    return new Illuminate\Filesystem\Filesystem;
});

// Translation loader
$app['translation.loader'] = $app->share(function($app){
    $path = __DIR__ . '/../lang';

    return new Illuminate\Translation\FileLoader($app['files'], $path);
});

// Translation
$app['translation'] = $app->share(function($app){
    $locale = 'en';

    return new Illuminate\Translation\Translator($app['translation.loader'], $locale);
});

// Validator
$app['validator'] = $app->share(function($app){
    return new Illuminate\Validation\Factory($app['translation']);
});

// TestValidator
$app->bind('App\Validators\TestValidator', function() use ($app){
    return new App\Validators\TestValidator($app['validator']);
});
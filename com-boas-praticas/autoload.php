<?php
spl_autoload_register(function ($className) {
    $className = str_replace("\\", DIRECTORY_SEPARATOR, $className);

    $classFile = __DIR__ . DIRECTORY_SEPARATOR . $className . '.php';
    if (file_exists($classFile)) {
        require_once $classFile;
        return;
    }

    $parentClassFile = dirname(__DIR__) . DIRECTORY_SEPARATOR . $className . '.php';
    if (file_exists($parentClassFile)) {
        require_once $parentClassFile;
        return;
    }

    throw new Exception("Classe $className não encontrada");
});

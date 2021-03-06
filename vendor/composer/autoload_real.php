<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitaba9395f50bb6306dbaacd14e4ac58ea
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInitaba9395f50bb6306dbaacd14e4ac58ea', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitaba9395f50bb6306dbaacd14e4ac58ea', 'loadClassLoader'));

        $includePaths = require __DIR__ . '/include_paths.php';
        $includePaths[] = get_include_path();
        set_include_path(implode(PATH_SEPARATOR, $includePaths));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitaba9395f50bb6306dbaacd14e4ac58ea::getInitializer($loader));

        $loader->register(true);

        $includeFiles = \Composer\Autoload\ComposerStaticInitaba9395f50bb6306dbaacd14e4ac58ea::$files;
        foreach ($includeFiles as $fileIdentifier => $file) {
            composerRequireaba9395f50bb6306dbaacd14e4ac58ea($fileIdentifier, $file);
        }

        return $loader;
    }
}

/**
 * @param string $fileIdentifier
 * @param string $file
 * @return void
 */
function composerRequireaba9395f50bb6306dbaacd14e4ac58ea($fileIdentifier, $file)
{
    if (empty($GLOBALS['__composer_autoload_files'][$fileIdentifier])) {
        $GLOBALS['__composer_autoload_files'][$fileIdentifier] = true;

        require $file;
    }
}

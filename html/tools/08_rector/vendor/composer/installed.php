<?php return array(
    'root' => array(
        'name' => 'systemsdk/docker-apache-php-laravel-tools',
        'pretty_version' => 'dev-main',
        'version' => 'dev-main',
        'reference' => '4add6c72c05555b58eaf4e0ca572a2b9674c181a',
        'type' => 'library',
        'install_path' => __DIR__ . '/../../',
        'aliases' => array(),
        'dev' => true,
    ),
    'versions' => array(
        'phpstan/phpstan' => array(
            'pretty_version' => '1.9.18',
            'version' => '1.9.18.0',
            'reference' => 'f2d5cf71be91172a57c649770b73c20ebcffb0bf',
            'type' => 'library',
            'install_path' => __DIR__ . '/../phpstan/phpstan',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'rector/rector' => array(
            'pretty_version' => '0.15.16',
            'version' => '0.15.16.0',
            'reference' => '826539a991aa22590e91f8add06ca99f76e21ccd',
            'type' => 'library',
            'install_path' => __DIR__ . '/../rector/rector',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'roave/security-advisories' => array(
            'pretty_version' => 'dev-latest',
            'version' => 'dev-latest',
            'reference' => 'df155ba3057743b818f94889528787f145992478',
            'type' => 'metapackage',
            'install_path' => NULL,
            'aliases' => array(
                0 => '9999999-dev',
            ),
            'dev_requirement' => true,
        ),
        'systemsdk/docker-apache-php-laravel-tools' => array(
            'pretty_version' => 'dev-main',
            'version' => 'dev-main',
            'reference' => '4add6c72c05555b58eaf4e0ca572a2b9674c181a',
            'type' => 'library',
            'install_path' => __DIR__ . '/../../',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
    ),
);

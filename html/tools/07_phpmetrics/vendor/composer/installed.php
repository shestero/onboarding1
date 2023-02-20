<?php return array(
    'root' => array(
        'name' => 'systemsdk/docker-apache-php-laravel-tools',
        'pretty_version' => '1.0.0+no-version-set',
        'version' => '1.0.0.0',
        'reference' => NULL,
        'type' => 'library',
        'install_path' => __DIR__ . '/../../',
        'aliases' => array(),
        'dev' => true,
    ),
    'versions' => array(
        'halleck45/php-metrics' => array(
            'dev_requirement' => true,
            'replaced' => array(
                0 => '*',
            ),
        ),
        'halleck45/phpmetrics' => array(
            'dev_requirement' => true,
            'replaced' => array(
                0 => '*',
            ),
        ),
        'nikic/php-parser' => array(
            'pretty_version' => 'v4.15.3',
            'version' => '4.15.3.0',
            'reference' => '570e980a201d8ed0236b0a62ddf2c9cbb2034039',
            'type' => 'library',
            'install_path' => __DIR__ . '/../nikic/php-parser',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'phpmetrics/phpmetrics' => array(
            'pretty_version' => 'v2.8.1',
            'version' => '2.8.1.0',
            'reference' => 'e279f7317390f642339941b693359e9a181817a7',
            'type' => 'library',
            'install_path' => __DIR__ . '/../phpmetrics/phpmetrics',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'roave/security-advisories' => array(
            'pretty_version' => 'dev-latest',
            'version' => 'dev-latest',
            'reference' => '9206ad5e9490993f471ef1503f630afd7a849170',
            'type' => 'metapackage',
            'install_path' => NULL,
            'aliases' => array(
                0 => '9999999-dev',
            ),
            'dev_requirement' => true,
        ),
        'systemsdk/docker-apache-php-laravel-tools' => array(
            'pretty_version' => '1.0.0+no-version-set',
            'version' => '1.0.0.0',
            'reference' => NULL,
            'type' => 'library',
            'install_path' => __DIR__ . '/../../',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
    ),
);

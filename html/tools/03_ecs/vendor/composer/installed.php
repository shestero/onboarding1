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
        'composer/pcre' => array(
            'pretty_version' => '3.1.0',
            'version' => '3.1.0.0',
            'reference' => '4bff79ddd77851fe3cdd11616ed3f92841ba5bd2',
            'type' => 'library',
            'install_path' => __DIR__ . '/./pcre',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'composer/semver' => array(
            'pretty_version' => '3.3.2',
            'version' => '3.3.2.0',
            'reference' => '3953f23262f2bff1919fc82183ad9acb13ff62c9',
            'type' => 'library',
            'install_path' => __DIR__ . '/./semver',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'composer/xdebug-handler' => array(
            'pretty_version' => '3.0.3',
            'version' => '3.0.3.0',
            'reference' => 'ced299686f41dce890debac69273b47ffe98a40c',
            'type' => 'library',
            'install_path' => __DIR__ . '/./xdebug-handler',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'doctrine/annotations' => array(
            'pretty_version' => '2.0.1',
            'version' => '2.0.1.0',
            'reference' => 'e157ef3f3124bbf6fe7ce0ffd109e8a8ef284e7f',
            'type' => 'library',
            'install_path' => __DIR__ . '/../doctrine/annotations',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'doctrine/lexer' => array(
            'pretty_version' => '3.0.0',
            'version' => '3.0.0.0',
            'reference' => '84a527db05647743d50373e0ec53a152f2cde568',
            'type' => 'library',
            'install_path' => __DIR__ . '/../doctrine/lexer',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'friendsofphp/php-cs-fixer' => array(
            'pretty_version' => 'v3.14.4',
            'version' => '3.14.4.0',
            'reference' => '1b3d9dba63d93b8a202c31e824748218781eae6b',
            'type' => 'application',
            'install_path' => __DIR__ . '/../friendsofphp/php-cs-fixer',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'psr/cache' => array(
            'pretty_version' => '3.0.0',
            'version' => '3.0.0.0',
            'reference' => 'aa5030cfa5405eccfdcb1083ce040c2cb8d253bf',
            'type' => 'library',
            'install_path' => __DIR__ . '/../psr/cache',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'psr/container' => array(
            'pretty_version' => '2.0.2',
            'version' => '2.0.2.0',
            'reference' => 'c71ecc56dfe541dbd90c5360474fbc405f8d5963',
            'type' => 'library',
            'install_path' => __DIR__ . '/../psr/container',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'psr/event-dispatcher' => array(
            'pretty_version' => '1.0.0',
            'version' => '1.0.0.0',
            'reference' => 'dbefd12671e8a14ec7f180cab83036ed26714bb0',
            'type' => 'library',
            'install_path' => __DIR__ . '/../psr/event-dispatcher',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'psr/event-dispatcher-implementation' => array(
            'dev_requirement' => true,
            'provided' => array(
                0 => '1.0',
            ),
        ),
        'psr/log' => array(
            'pretty_version' => '3.0.0',
            'version' => '3.0.0.0',
            'reference' => 'fe5ea303b0887d5caefd3d431c3e61ad47037001',
            'type' => 'library',
            'install_path' => __DIR__ . '/../psr/log',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'psr/log-implementation' => array(
            'dev_requirement' => true,
            'provided' => array(
                0 => '1.0|2.0|3.0',
            ),
        ),
        'roave/security-advisories' => array(
            'pretty_version' => 'dev-latest',
            'version' => 'dev-latest',
            'reference' => 'bc35b8e9853346249e3adec090d33c6041fb2df4',
            'type' => 'metapackage',
            'install_path' => NULL,
            'aliases' => array(
                0 => '9999999-dev',
            ),
            'dev_requirement' => true,
        ),
        'sebastian/diff' => array(
            'pretty_version' => '5.0.0',
            'version' => '5.0.0.0',
            'reference' => '70dd1b20bc198da394ad542e988381b44e64e39f',
            'type' => 'library',
            'install_path' => __DIR__ . '/../sebastian/diff',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'symfony/console' => array(
            'pretty_version' => 'v6.2.5',
            'version' => '6.2.5.0',
            'reference' => '3e294254f2191762c1d137aed4b94e966965e985',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/console',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'symfony/deprecation-contracts' => array(
            'pretty_version' => 'v3.2.0',
            'version' => '3.2.0.0',
            'reference' => '1ee04c65529dea5d8744774d474e7cbd2f1206d3',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/deprecation-contracts',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'symfony/event-dispatcher' => array(
            'pretty_version' => 'v6.2.5',
            'version' => '6.2.5.0',
            'reference' => 'f02d108b5e9fd4a6245aa73a9d2df2ec060c3e68',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/event-dispatcher',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'symfony/event-dispatcher-contracts' => array(
            'pretty_version' => 'v3.2.0',
            'version' => '3.2.0.0',
            'reference' => '0782b0b52a737a05b4383d0df35a474303cabdae',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/event-dispatcher-contracts',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'symfony/event-dispatcher-implementation' => array(
            'dev_requirement' => true,
            'provided' => array(
                0 => '2.0|3.0',
            ),
        ),
        'symfony/filesystem' => array(
            'pretty_version' => 'v6.2.5',
            'version' => '6.2.5.0',
            'reference' => 'e59e8a4006afd7f5654786a83b4fcb8da98f4593',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/filesystem',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'symfony/finder' => array(
            'pretty_version' => 'v6.2.5',
            'version' => '6.2.5.0',
            'reference' => 'c90dc446976a612e3312a97a6ec0069ab0c2099c',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/finder',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'symfony/options-resolver' => array(
            'pretty_version' => 'v6.2.5',
            'version' => '6.2.5.0',
            'reference' => 'e8324d44f5af99ec2ccec849934a242f64458f86',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/options-resolver',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'symfony/polyfill-ctype' => array(
            'pretty_version' => 'v1.27.0',
            'version' => '1.27.0.0',
            'reference' => '5bbc823adecdae860bb64756d639ecfec17b050a',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/polyfill-ctype',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'symfony/polyfill-intl-grapheme' => array(
            'pretty_version' => 'v1.27.0',
            'version' => '1.27.0.0',
            'reference' => '511a08c03c1960e08a883f4cffcacd219b758354',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/polyfill-intl-grapheme',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'symfony/polyfill-intl-normalizer' => array(
            'pretty_version' => 'v1.27.0',
            'version' => '1.27.0.0',
            'reference' => '19bd1e4fcd5b91116f14d8533c57831ed00571b6',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/polyfill-intl-normalizer',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'symfony/polyfill-mbstring' => array(
            'pretty_version' => 'v1.27.0',
            'version' => '1.27.0.0',
            'reference' => '8ad114f6b39e2c98a8b0e3bd907732c207c2b534',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/polyfill-mbstring',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'symfony/polyfill-php80' => array(
            'pretty_version' => 'v1.27.0',
            'version' => '1.27.0.0',
            'reference' => '7a6ff3f1959bb01aefccb463a0f2cd3d3d2fd936',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/polyfill-php80',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'symfony/polyfill-php81' => array(
            'pretty_version' => 'v1.27.0',
            'version' => '1.27.0.0',
            'reference' => '707403074c8ea6e2edaf8794b0157a0bfa52157a',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/polyfill-php81',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'symfony/process' => array(
            'pretty_version' => 'v6.2.5',
            'version' => '6.2.5.0',
            'reference' => '9ead139f63dfa38c4e4a9049cc64a8b2748c83b7',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/process',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'symfony/service-contracts' => array(
            'pretty_version' => 'v3.2.0',
            'version' => '3.2.0.0',
            'reference' => 'aac98028c69df04ee77eb69b96b86ee51fbf4b75',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/service-contracts',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'symfony/stopwatch' => array(
            'pretty_version' => 'v6.2.5',
            'version' => '6.2.5.0',
            'reference' => '00b6ac156aacffc53487c930e0ab14587a6607f6',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/stopwatch',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'symfony/string' => array(
            'pretty_version' => 'v6.2.5',
            'version' => '6.2.5.0',
            'reference' => 'b2dac0fa27b1ac0f9c0c0b23b43977f12308d0b0',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/string',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'symplify/easy-coding-standard' => array(
            'pretty_version' => '11.2.8',
            'version' => '11.2.8.0',
            'reference' => '012d68b5cad4a5e3a6ccd99571209142b87491f5',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symplify/easy-coding-standard',
            'aliases' => array(),
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

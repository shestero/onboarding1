<?php

namespace ECSPrefix202302;

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
use ECSPrefix202302\Symfony\Component\VarDumper\VarDumper;
if (!\function_exists('ECSPrefix202302\\dump')) {
    /**
     * @author Nicolas Grekas <p@tchwork.com>
     * @param mixed $var
     * @param mixed ...$moreVars
     * @return mixed
     */
    function dump($var, ...$moreVars)
    {
        VarDumper::dump($var);
        foreach ($moreVars as $v) {
            VarDumper::dump($v);
        }
        if (1 < \func_num_args()) {
            return \func_get_args();
        }
        return $var;
    }
}
if (!\function_exists('ECSPrefix202302\\dd')) {
    /**
     * @return never
     */
    function dd(...$vars) : void
    {
        if (!\in_array(\PHP_SAPI, ['cli', 'phpdbg'], \true) && !\headers_sent()) {
            \header('HTTP/1.1 500 Internal Server Error');
        }
        foreach ($vars as $v) {
            VarDumper::dump($v);
        }
        exit(1);
    }
}

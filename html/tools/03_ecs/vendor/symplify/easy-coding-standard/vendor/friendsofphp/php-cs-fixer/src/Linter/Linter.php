<?php

declare (strict_types=1);
/*
 * This file is part of PHP CS Fixer.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *     Dariusz Rumiński <dariusz.ruminski@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
namespace PhpCsFixer\Linter;

/**
 * Handle PHP code linting process.
 *
 * @author Dariusz Rumiński <dariusz.ruminski@gmail.com>
 *
 * @internal
 */
final class Linter implements \PhpCsFixer\Linter\LinterInterface
{
    /**
     * @var \PhpCsFixer\Linter\LinterInterface
     */
    private $subLinter;
    public function __construct()
    {
        $this->subLinter = new \PhpCsFixer\Linter\TokenizerLinter();
    }
    /**
     * {@inheritdoc}
     */
    public function isAsync() : bool
    {
        return $this->subLinter->isAsync();
    }
    /**
     * {@inheritdoc}
     */
    public function lintFile(string $path) : \PhpCsFixer\Linter\LintingResultInterface
    {
        return $this->subLinter->lintFile($path);
    }
    /**
     * {@inheritdoc}
     */
    public function lintSource(string $source) : \PhpCsFixer\Linter\LintingResultInterface
    {
        return $this->subLinter->lintSource($source);
    }
}
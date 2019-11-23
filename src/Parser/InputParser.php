<?php declare(strict_types=1);

namespace Lfn\Oat\QuestionApi\Parser;

/**
 * Class InputParser
 *
 * @package Lfn\Oat\QuestionApi\Parser
 */
class InputParser
{
    /** @var string */
    private $inputFile;

    /**
     * InputParser constructor.
     *
     * @param string $inputFile
     */
    public function __construct(string $inputFile)
    {
        $this->inputFile = $inputFile;
    }

    public function parse(): void
    {
        var_dump($this->inputFile); exit;
    }
}
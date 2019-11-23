<?php declare(strict_types=1);

namespace Lfn\Oat\QuestionApi\Parser;

use Lfn\Oat\QuestionApi\Collection\QuestionCollection;
use Lfn\Oat\QuestionApi\Exception\InputFileNotFoundException;
use Symfony\Component\Filesystem\Filesystem;

/**
 * Class QuestionInputParser
 *
 * @package Lfn\Oat\QuestionApi\Parser
 */
class QuestionInputParser implements QuestionParserInterface
{
    public const INPUT_TYPE_JSON = 'json';
    public const INPUT_TYPE_CSV  = 'csv';

    /** @var string */
    private $inputFile;

    /** @var Filesystem */
    private $filesystem;

    /** @var QuestionCsvParser */
    private $questionCsvParser;

    /** @var QuestionJsonParser */
    private $questionJsonParser;

    /**
     * QuestionInputParser constructor.
     *
     * @param string             $inputFile
     * @param Filesystem         $filesystem
     * @param QuestionCsvParser  $questionCsvParser
     * @param QuestionJsonParser $questionJsonParser
     */
    public function __construct(
        string $inputFile,
        Filesystem $filesystem,
        QuestionCsvParser $questionCsvParser,
        QuestionJsonParser $questionJsonParser
    ) {
        $this->inputFile          = $inputFile;
        $this->filesystem         = $filesystem;
        $this->questionCsvParser  = $questionCsvParser;
        $this->questionJsonParser = $questionJsonParser;
    }

    /**
     * @throws InputFileNotFoundException
     */
    public function parse(): QuestionCollection
    {
        if (!$this->filesystem->exists($this->inputFile)) {
            throw new InputFileNotFoundException('Input file ' . $this->inputFile . ' not found');
        }

        switch ($this->getInputFileExtension()) {
            case self::INPUT_TYPE_CSV:
                return $this->questionCsvParser->parse();
            case self::INPUT_TYPE_JSON:
                return $this->questionJsonParser->parse();
            default:
                throw new InvalidInputFileTypeException('Input file type ' . getInputFileExtension() . ' is invalid');
        }
    }

    /**
     * @return string
     */
    private function getInputFileExtension(): string
    {
        return pathinfo($this->inputFile, PATHINFO_EXTENSION);
    }
}
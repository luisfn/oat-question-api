<?php declare(strict_types=1);

namespace Lfn\Oat\QuestionApi\Parser;

use DateTime;
use Exception;
use League\Csv\Reader;
use Lfn\Oat\QuestionApi\Collection\QuestionCollection;
use Lfn\Oat\QuestionApi\DataObject\Choice;
use Lfn\Oat\QuestionApi\DataObject\Question;
use Lfn\Oat\QuestionApi\Exception\CsvParseException;

/**
 * Class QuestionCsvParser
 *
 * @package Lfn\Oat\QuestionApi\Parser
 */
class QuestionCsvParser
{
    /**
     * @param string $inputFile
     *
     * @return QuestionCollection
     *
     * @throws CsvParseException
     */
    public function parse(string $inputFile): QuestionCollection
    {
        try {
            $collection = new QuestionCollection();

            $csv = Reader::createFromPath($inputFile, 'r');
            $csv->setHeaderOffset(0);

            $records = $csv->getRecords();

            foreach ($records as $record) {
                $question = new Question($record['Question text'], new DateTime($record['Created At']));

                foreach ($this->getChoices($record) as $choiceText) {
                    $question->addChoice(new Choice($choiceText));
                }

                $collection->add($question);
            }

            return $collection;
        } catch (Exception $exception) {
            throw new CsvParseException($exception->getMessage());
        }
    }

    /**
     * @param array $record
     *
     * @return array
     */
    private function getChoices(array $record): array
    {
        return array_filter($record, function ($key) {
            return stripos($key, 'choice') !== false;
        }, ARRAY_FILTER_USE_KEY);
    }
}

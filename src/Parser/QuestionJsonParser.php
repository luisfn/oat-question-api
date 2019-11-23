<?php declare(strict_types=1);

namespace Lfn\Oat\QuestionApi\Parser;

use DateTime;
use Exception;
use Lfn\Oat\QuestionApi\Collection\QuestionCollection;
use Lfn\Oat\QuestionApi\DataObject\Choice;
use Lfn\Oat\QuestionApi\DataObject\Question;
use Lfn\Oat\QuestionApi\Exception\JsonParseException;

/**
 * Class QuestionJsonParser
 *
 * @package Lfn\Oat\QuestionApi\Parser
 */
class QuestionJsonParser
{
    /**
     * @param string $inputFile
     *
     * @return QuestionCollection
     *
     * @throws JsonParseException
     */
    public function parse(string $inputFile): QuestionCollection
    {
        try {
            $collection = new QuestionCollection();
            $data       = file_get_contents($inputFile);
            $questions  = json_decode($data, false);

            foreach ($questions as $item) {
                $question = new Question($item->text, new DateTime($item->createdAt));

                foreach ($item->choices as $choice) {
                    $question->addChoice(new Choice($choice->text));
                }

                $collection->add($question);
            }

            return $collection;
        } catch (Exception $exception) {
            throw new JsonParseException($exception->getMessage());
        }
    }
}

<?php declare(strict_types=1);

namespace Lfn\Oat\QuestionApi\Translator;

use Exception;
use Lfn\Oat\QuestionApi\Collection\QuestionCollection;
use Lfn\Oat\QuestionApi\Exception\TranslationException;
use Stichoza\GoogleTranslate\GoogleTranslate;

/**
 * Class Translator
 *
 * @package Lfn\Oat\QuestionApi\Translator
 */
class Translator
{
    /** @var GoogleTranslate */
    private $googleTranslate;

    /**
     * Translator constructor.
     *
     * @param GoogleTranslate $googleTranslate
     */
    public function __construct(GoogleTranslate $googleTranslate)
    {
        $this->googleTranslate = $googleTranslate;
    }

    /**
     * @param QuestionCollection $questions
     * @param string             $lang
     *
     * @throws TranslationException
     */
    public function translate(QuestionCollection $questions, string $lang): void
    {
        try {
            $this->googleTranslate->setTarget($lang);

            foreach ($questions->getAll() as $question) {
                $translation = $this->googleTranslate->translate($question->getText());
                $question->setText($translation);

                foreach ($question->getChoices()->getAll() as $choice) {
                    $translation = $this->googleTranslate->translate($choice->getText());
                    $choice->setText($translation);
                }
            }
        } catch (Exception $exception) {
            throw new TranslationException($exception->getMessage());
        }
    }
}

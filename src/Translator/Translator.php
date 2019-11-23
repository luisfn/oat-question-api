<?php declare(strict_types=1);

namespace Lfn\Oat\QuestionApi\Translator;

use Exception;
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
     * @param string $text
     * @param string $lang
     *
     * @return string
     * @throws TranslationException
     */
    public function translate(string $text, string $lang): string
    {
        try {
            return $this->googleTranslate->setTarget($lang)->translate($text);
        } catch (Exception $exception) {
            throw new TranslationException($exception->getMessage());
        }
    }
}
<?php declare(strict_types=1);

namespace Lfn\Oat\QuestionApi\Controller;

use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\QueryParam;
use FOS\RestBundle\View\View;
use Lfn\Oat\QuestionApi\Exception\CsvParseException;
use Lfn\Oat\QuestionApi\Exception\InputFileNotFoundException;
use Lfn\Oat\QuestionApi\Exception\InvalidInputTypeException;
use Lfn\Oat\QuestionApi\Exception\JsonParseException;
use Lfn\Oat\QuestionApi\Exception\TranslationException;
use Lfn\Oat\QuestionApi\Parser\QuestionInputParser;
use Lfn\Oat\QuestionApi\Translator\Translator;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class QuestionController
 *
 * @package Lfn\Oat\QuestionApi\Controller
 */
class QuestionController extends AbstractFOSRestController
{
    /** @var QuestionInputParser */
    private $questionInputParser;

    /** @var Translator */
    private $translator;

    /**
     * QuestionController constructor.
     *
     * @param QuestionInputParser $questionInputParser
     * @param Translator          $translator
     */
    public function __construct(QuestionInputParser $questionInputParser, Translator $translator)
    {
        $this->questionInputParser = $questionInputParser;
        $this->translator          = $translator;
    }

    /**
     * @return View
     *
     * @throws CsvParseException
     * @throws InputFileNotFoundException
     * @throws InvalidInputTypeException
     * @throws JsonParseException
     * @throws TranslationException
     *
     * @Get("/questions")
     * @QueryParam(name="lang", description="Language (ISO-639-1 code) in which the questions and choices should be translated", nullable=true, strict=true)
     */
    public function index(?string $lang)
    {
        $collection = $this->questionInputParser->parse();

        if ($lang) {
            $newText = $this->translator->translate("I'm the best", $lang);
            exit($newText);
        }

        return View::create($collection, Response::HTTP_OK);
    }
}

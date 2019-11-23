<?php declare(strict_types=1);

namespace Lfn\Oat\QuestionApi\Controller;

use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\View\View;
use Lfn\Oat\QuestionApi\Exception\CsvParseException;
use Lfn\Oat\QuestionApi\Exception\InputFileNotFoundException;
use Lfn\Oat\QuestionApi\Exception\InvalidInputTypeException;
use Lfn\Oat\QuestionApi\Exception\JsonParseException;
use Lfn\Oat\QuestionApi\Parser\QuestionInputParser;
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

    /**
     * QuestionController constructor.
     *
     * @param QuestionInputParser $questionInputParser
     */
    public function __construct(QuestionInputParser $questionInputParser)
    {
        $this->questionInputParser = $questionInputParser;
    }

    /**
     * @return View
     *
     * @throws CsvParseException
     * @throws InputFileNotFoundException
     * @throws InvalidInputTypeException
     * @throws JsonParseException
     *
     * @Get("/questions")
     */
    public function index()
    {
        $collection = $this->questionInputParser->parse();

        return View::create($collection, Response::HTTP_OK);
    }
}

<?php declare(strict_types=1);

namespace Lfn\Oat\QuestionApi\Controller;

use Exception;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\QueryParam;
use FOS\RestBundle\View\View;
use Lfn\Oat\QuestionApi\Exception\CsvParseException;
use Lfn\Oat\QuestionApi\Exception\InputFileNotFoundException;
use Lfn\Oat\QuestionApi\Exception\InvalidInputTypeException;
use Lfn\Oat\QuestionApi\Exception\JsonParseException;
use Lfn\Oat\QuestionApi\Exception\TranslationException;
use Lfn\Oat\QuestionApi\Service\QuestionService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

/**
 * Class QuestionController
 *
 * @package Lfn\Oat\QuestionApi\Controller
 */
class QuestionController extends AbstractFOSRestController
{
    /** @var QuestionService */
    private $questionService;

    /**
     * QuestionController constructor.
     *
     * @param QuestionService $questionService
     */
    public function __construct(QuestionService $questionService)
    {
        $this->questionService = $questionService;
    }

    /**
     * @Get("/questions")
     * @QueryParam(
     *     name="lang",
     *     description="Language (ISO-639-1 code) in which the questions and choices should be translated",
     *     nullable=true
     * )
     *
     * @param string|null $lang
     *
     * @return View
     */
    public function index(?string $lang)
    {
        try {
            $collection = $this->questionService->getQuestions($lang);

            return View::create($collection, Response::HTTP_OK);
        } catch (Exception $exception) {
            throw new HttpException(400, $exception->getMessage());
        }
    }
}

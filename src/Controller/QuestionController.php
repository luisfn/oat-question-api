<?php declare(strict_types=1);

namespace Lfn\Oat\QuestionApi\Controller;

use Lfn\Oat\QuestionApi\Parser\QuestionInputParser;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class QuestionController
 *
 * @package Lfn\Oat\QuestionApi\Controller
 */
class QuestionController
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
     * @return Response
     */
    public function index()
    {
        $this->questionInputParser->parse();


        return new Response('OAT Question API');
    }
}

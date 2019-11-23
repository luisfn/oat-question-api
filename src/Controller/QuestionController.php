<?php declare(strict_types=1);

namespace Lfn\Oat\QuestionApi\Controller;

use Lfn\Oat\QuestionApi\Parser\InputParser;
use Symfony\Component\HttpFoundation\Response;

class QuestionController
{
    /** @var InputParser */
    private $inputParser;

    /**
     * QuestionController constructor.
     *
     * @param InputParser $inputParser
     */
    public function __construct(InputParser $inputParser)
    {
        $this->inputParser = $inputParser;
    }

    /**
     * @return Response
     */
    public function index()
    {
        $this->inputParser->parse();


        return new Response('OAT Question API');
    }
}
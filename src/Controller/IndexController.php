<?php declare(strict_types=1);

namespace Lfn\Oat\QuestionApi\Controller;

use Symfony\Component\HttpFoundation\Response;

/**
 * Class IndexController
 *
 * @package Lfn\Oat\QuestionApi\Controller
 */
class IndexController
{
    /**
     * @return Response
     */
    public function index()
    {
        return new Response('OAT Question API');
    }
}

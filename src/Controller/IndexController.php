<?php declare(strict_types=1);

namespace Lfn\Oat\QuestionApi\Controller;

use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class IndexController
 *
 * @package Lfn\Oat\QuestionApi\Controller
 */
class IndexController
{
    /**
     * @return View
     *
     * @Get("/")
     */
    public function index()
    {
        return View::create(['OAT Question API'], Response::HTTP_OK);
    }
}

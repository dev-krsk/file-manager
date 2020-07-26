<?php

namespace Dev\Krsk\FileManager\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    public const MODULE = 'DEV_KRSK_FILE_MANAGER_';
    public const VIEW = self::MODULE . '%s_VIEW';
    public const EDIT = self::MODULE . '%s_EDIT';

    /**
     * @param string $project
     * @return Response
     *
     * @Route("/", name="index_default")
     * @Route("/{project}/", name="index_project")
     */
    public function indexAction($project = 'default'): Response
    {
        //$this->denyAccessUnlessGranted(sprintf(self::VIEW, $project));

        return $this->render('@DevKrskFileManager/index.html.twig');
    }
}
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
        $projects = $this->getDoctrine()
            ->getManager($this->getParameter('dev_krsk_file_manager.em'))
            ->getRepository($this->getParameter('dev_krsk_file_manager.directory_class'))
            ->findAll();

        return $this->render('@DevKrskFileManager/index.html.twig');
    }
}
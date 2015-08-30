<?php
/**
 * Created by PhpStorm.
 * User: arabesque
 * Date: 30/08/15
 * Time: 19:58
 */

namespace SimpleIT\ClaireExerciseBundle\Service\Exercise\Annotate;

use SimpleIT\ClaireExerciseBundle\Repository\Exercise\Annotate\AnnotateRepository;
use SimpleIT\ClaireExerciseBundle\Repository\Exercise\Annotate\AnnotateTagRepository;
use SimpleIT\ClaireExerciseBundle\Service\TransactionalService;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class AnnotateTagService extends TransactionalService
{
    /*
     * @var AnnotateTagRepository
     */
    protected $annotateTagRepository;

    /**
     * @var AnnotateService
     */
    protected $annotateService;

    /**
     * Set annotateRepository
     *
     * @param AnnotateTagRepository $annotateTagRepository
     */
    public function setAnnotateTagRepository($annotateTagRepository)
    {
        $this->annotateTagRepository = $annotateTagRepository;
    }

    /**
     * Set list annotate service
     *
     * @param AnnotateService $annotateService
     */
    public function setAnnotateTagService($annotateService)
    {
        $this->annotateService = $annotateService;
    }

}
<?php
/**
 * Created by PhpStorm.
 * User: arabesque
 * Date: 29/07/15
 * Time: 16:37
 */

namespace SimpleIT\ClaireExerciseBundle\Service\Exercise\Annotate;

use SimpleIT\ClaireExerciseBundle\Entity\Annotate\Annotate;
use SimpleIT\ClaireExerciseBundle\Entity\ExerciseResource\ExerciseResource;
use SimpleIT\ClaireExerciseBundle\Entity\SharedEntity\SharedEntity;
use SimpleIT\ClaireExerciseBundle\Model\Resources\AnnotateResource;
use SimpleIT\ClaireExerciseBundle\Repository\Exercise\Annotate\AnnotateRepository;
use SimpleIT\ClaireExerciseBundle\Service\Exercise\ExerciseResource\ExerciseResourceService;
use SimpleIT\ClaireExerciseBundle\Service\Exercise\ExerciseResource\ExerciseResourceServiceInterface;
use SimpleIT\ClaireExerciseBundle\Service\TransactionalService;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class AnnotateService extends TransactionalService
{
    /**
     * @var AnnotateRepository
     */
    protected $annotateRepository;

    /**
     * @var ListAnnotateService
     */
    protected $listAnnotateService;

    /**
     * @var AnnotateTagService
     */
    private $annotateTagService;

    /**
     * Set annotateRepository
     *
     * @param AnnotateRepository $annotateRepository
     */
    public function setAnnotateRepository($annotateRepository)
    {
        $this->annotateRepository = $annotateRepository;
    }

    /**
     * Set list annotate service
     *
     * @param ListAnnotateService $listAnnotate
     */
    public function setListAnnotateService($listAnnotateService)
    {
        $this->listAnnotateService = $listAnnotateService;
    }

    /**
     * Set annotateTagService
     *
     * @param \SimpleIT\ClaireExerciseBundle\Service\Exercise\Annotate\AnnotateTagService $annotateTagService
     */
    public function setAnnotateTagService($annotateTagService)
    {
        $this->annotateTagService = $annotateTagService;
    }


    /**
     * Get all the annotate
     *
     * @param CollectionInformation $collectionInformation
     * @param int                   $listAnnotateId
     * @param int                   $userId
     *
     * @throws AccessDeniedException
     * @return array
     */
    public function getAll(
        $resourceId = null,
        $listAnnotateId = null,
        $userId = null
    )
    {
        $listAnnotate = null;
        if (!is_null($listAnnotateId)) {
            $listAnnotate = $this->listAnnotateService->getAll($resourceId,$userId);
            /*if (!$listAnnotate->getPublic() && $listAnnotate->getOwner()->getId() !== $userId) {
                throw new AccessDeniedException();
            }*/
        }

        return $this->annotateRepository->findAllBy(
            $listAnnotate[0]
        );
    }

    /**
     * Delete all the annotate for an owner resource
     *
     * @param ExerciseResource $resource
     */
    public function deleteAllByEntity($resource)
    {
        $this->annotateTagService->deleteAllByEntity($resource);
        $this->annotateRepository->deleteAllByEntity($resource);
        $this->em->flush();
    }
}
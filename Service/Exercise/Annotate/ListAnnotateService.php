<?php
/**
 * Created by PhpStorm.
 * User: arabesque
 * Date: 24/08/15
 * Time: 13:29
 */


namespace SimpleIT\ClaireExerciseBundle\Service\Exercise\Annotate;

use SimpleIT\ClaireExerciseBundle\Entity\Annotate\ListAnnotate;
use SimpleIT\ClaireExerciseBundle\Entity\ExerciseResource\ExerciseResource;
use SimpleIT\ClaireExerciseBundle\Repository\Exercise\Annotate\ListAnnotateRepository;
use SimpleIT\ClaireExerciseBundle\Service\Exercise\ExerciseResource\ExerciseResourceService;
use SimpleIT\ClaireExerciseBundle\Service\Exercise\ExerciseResource\ExerciseResourceServiceInterface;
use SimpleIT\ClaireExerciseBundle\Service\TransactionalService;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class ListAnnotateService extends TransactionalService
{
    /**
     * @var ListAnnotateRepository
     */
    protected $listAnnotateRepository;

    /**
     * @var ExerciseResourceService
     */
    protected $resourceService;

    /**
     * @var AnnotateService
     */
    private $annotateService;

    /**
     * Set listAnnotateRepository
     *
     * @param ListAnnotateRepository $listAnnotateRepository
     */
    public function setListAnnotateRepository($listAnnotateRepository)
    {
        $this->listAnnotateRepository = $listAnnotateRepository;
    }

    /**
     * Set resource service
     *
     * @param ExerciseResourceServiceInterface $resourceService
     */
    public function setResourceService($resourceService)
    {
        $this->resourceService = $resourceService;
    }

    /**
     * Set annotateService
     *
     * @param \SimpleIT\ClaireExerciseBundle\Service\Exercise\Annotate\AnnotateService $annotateService
     */
    public function setAnnotateService($annotateService)
    {
        $this->annotateService = $annotateService;
    }


    /**
     * Get all the list annotate
     *
     * @param CollectionInformation $collectionInformation
     * @param int                   $entityId
     * @param int                   $userId
     *
     * @throws AccessDeniedException
     * @return array
     */
    public function getAll(
        $entityId = null,
        $userId = null
    )
    {
        $entity = null;
        if (!is_null($entityId)) {
            $entity = $this->resourceService->get($entityId);
            if (!$entity->getPublic() && $entity->getOwner()->getId() !== $userId) {
                throw new AccessDeniedException();
            }
        }

        return $this->listAnnotateRepository->findAllBy(
            $entity
        );
    }

    /**
     * Delete all the list annotate for an owner resource
     *
     * @param ExerciseResource $resource
     */
    public function deleteAllByEntity($resource)
    {
        $this->annotateService->deleteAllByEntity($resource);
        $this->listAnnotateRepository->deleteAllByEntity($resource);
        $this->em->flush();
    }

}
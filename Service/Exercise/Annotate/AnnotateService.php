<?php
/**
 * Created by PhpStorm.
 * User: arabesque
 * Date: 29/07/15
 * Time: 16:37
 */

namespace SimpleIT\ClaireExerciseBundle\Service\Exercise\Annotate;

use SimpleIT\ClaireExerciseBundle\Entity\Annotate\Annotate;
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
     * @var ExerciseResourceService
     */
    protected $resourceService;

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
     * Set resource service
     *
     * @param ExerciseResourceServiceInterface $resourceService
     */
    public function setResourceService($resourceService)
    {
        $this->resourceService = $resourceService;
    }


    /**
     * Get all the annotate
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

        return $this->annotateRepository->findAllBy(
            $entity
        );
    }

}
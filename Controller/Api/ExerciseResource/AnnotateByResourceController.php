<?php
/**
 * Created by PhpStorm.
 * User: arabesque
 * Date: 22/08/15
 * Time: 18:47
 */

namespace SimpleIT\ClaireExerciseBundle\Controller\Api\ExerciseResource;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\DBAL\DBALException;
use SimpleIT\ClaireExerciseBundle\Controller\BaseController;
use SimpleIT\ClaireExerciseBundle\Entity\Annotate\Annotate;
use SimpleIT\ClaireExerciseBundle\Entity\AnnotateFactory;
use SimpleIT\ClaireExerciseBundle\Exception\Api\ApiBadRequestException;
use SimpleIT\ClaireExerciseBundle\Exception\Api\ApiConflictException;
use SimpleIT\ClaireExerciseBundle\Exception\Api\ApiNotFoundException;
use SimpleIT\ClaireExerciseBundle\Exception\NonExistingObjectException;
use SimpleIT\ClaireExerciseBundle\Model\Api\ApiCreatedResponse;
use SimpleIT\ClaireExerciseBundle\Model\Api\ApiDeletedResponse;
use SimpleIT\ClaireExerciseBundle\Model\Api\ApiEditedResponse;
use SimpleIT\ClaireExerciseBundle\Model\Api\ApiGotResponse;
use SimpleIT\ClaireExerciseBundle\Model\Collection\CollectionInformation;
use SimpleIT\ClaireExerciseBundle\Model\Resources\AnnotateResource;
use SimpleIT\ClaireExerciseBundle\Model\Resources\AnnotateResourceFactory;
use Symfony\Component\HttpFoundation\Request;

class AnnotateByResourceController extends BaseController
{
    /**
     * Get all annotate
     *
     * @param mixed                 $resourceId
     * @param CollectionInformation $collectionInformation
     *
     * @throws ApiNotFoundException
     * @return ApiGotResponse
     */
    public function listAction(
        $resourceId,
        CollectionInformation $collectionInformation
    )
    {
        try {
            $annotates = $this->get('simple_it.exercise.annotate')->getAll(
                $collectionInformation,
                $resourceId,
                $this->getUserId()
            );

            //$annotateResources = AnnotateResourceFactory::createCollection($annotates);
            $annotateResources = "ok";

            return new ApiGotResponse($annotateResources);
        } catch (NonExistingObjectException $neoe) {
            throw new ApiNotFoundException(AnnotateResource::RESOURCE_NAME);
        }
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: arabesque
 * Date: 24/08/15
 * Time: 15:53
 */

namespace SimpleIT\ClaireExerciseBundle\Controller\Api\ExerciseResource;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\DBAL\DBALException;
use SimpleIT\ClaireExerciseBundle\Controller\BaseController;
use SimpleIT\ClaireExerciseBundle\Entity\Annotate\ListAnnotate;
use SimpleIT\ClaireExerciseBundle\Entity\ListAnnotateFactory;
use SimpleIT\ClaireExerciseBundle\Exception\Api\ApiBadRequestException;
use SimpleIT\ClaireExerciseBundle\Exception\Api\ApiConflictException;
use SimpleIT\ClaireExerciseBundle\Exception\Api\ApiNotFoundException;
use SimpleIT\ClaireExerciseBundle\Exception\NonExistingObjectException;
use SimpleIT\ClaireExerciseBundle\Model\Api\ApiCreatedResponse;
use SimpleIT\ClaireExerciseBundle\Model\Api\ApiDeletedResponse;
use SimpleIT\ClaireExerciseBundle\Model\Api\ApiEditedResponse;
use SimpleIT\ClaireExerciseBundle\Model\Api\ApiGotResponse;
use SimpleIT\ClaireExerciseBundle\Model\Collection\CollectionInformation;
use SimpleIT\ClaireExerciseBundle\Model\Resources\ListAnnotateResource;
use SimpleIT\ClaireExerciseBundle\Model\Resources\ListAnnotateResourceFactory;
use Symfony\Component\HttpFoundation\Request;

class ListAnnotateByResourceController extends BaseController
{
    /**
     * Get all list annotate
     *
     * @param mixed                 $resourceId
     * @param CollectionInformation $collectionInformation
     *
     * @throws ApiNotFoundException
     * @return ApiGotResponse
     */
    public function listAction(
        $resourceId
    )
    {
        try {
            $annotates = $this->get('simple_it.exercise.list_annotate')->getAll(
                $resourceId,
                $this->getUserId()
            );

            $listAnnotateResources = ListAnnotateResourceFactory::createCollection($annotates);

            return new ApiGotResponse($listAnnotateResources);
        } catch (NonExistingObjectException $neoe) {
            throw new ApiNotFoundException(ListAnnotateResource::RESOURCE_NAME);
        }
    }
}
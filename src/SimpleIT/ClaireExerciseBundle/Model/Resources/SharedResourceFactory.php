<?php
namespace SimpleIT\ClaireExerciseBundle\Model\Resources;

use JMS\Serializer\Annotation as Serializer;
use JMS\Serializer\Handler\HandlerRegistry;
use JMS\Serializer\SerializerBuilder;
use SimpleIT\ClaireExerciseBundle\Entity\DomainKnowledge\Knowledge;
use SimpleIT\ClaireExerciseBundle\Entity\ExerciseModel\ExerciseModel;
use SimpleIT\ClaireExerciseBundle\Entity\ExerciseResource\ExerciseResource;
use SimpleIT\ClaireExerciseBundle\Entity\SharedEntity\Metadata;
use SimpleIT\ClaireExerciseBundle\Entity\SharedEntity\SharedEntity;
use SimpleIT\ClaireExerciseBundle\Exception\InvalidTypeException;
use SimpleIT\ClaireExerciseBundle\Model\Resources\DomainKnowledge\CommonKnowledge;
use SimpleIT\ClaireExerciseBundle\Serializer\Handler\AbstractClassForExerciseHandler;
use SimpleIT\Utils\Collection\PaginatorInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class SharableResourceFactory
 *
 * @author Baptiste Cablé <baptiste.cable@liris.cnrs.fr>
 */
abstract class SharedResourceFactory
{
    const KNOWLEDGE = 'knowledge';

    const EXERCISE_MODEL = 'exerciseModel';

    const RESOURCE = 'resource';

    /**
     * @param SharedResource $resource
     * @param SharedEntity   $entity
     */
    protected static function fill(&$resource, $entity)
    {
        $resource->setId($entity->getId());
        $resource->setType($entity->getType());
        $resource->setTitle($entity->getTitle());
        $resource->setAuthor($entity->getAuthor()->getId());
        $resource->setPublic($entity->getPublic());
        $resource->setArchived($entity->getArchived());
        $resource->setOwner($entity->getOwner()->getId());
        $resource->setDraft($entity->getDraft());
        $resource->setComplete($entity->getComplete());

        // Parent and fork from
        if (!is_null($entity->getParent())) {
            $resource->setParent($entity->getParent()->getId());
        }
        if (!is_null($entity->getForkFrom())) {
            $resource->setForkFrom($entity->getForkFrom()->getId());
        }

        // metadata
        $metadataArray = array();
        foreach ($entity->getMetadata() as $md) {
            /** @var Metadata $md */
            $metadataArray[$md->getKey()] = $md->getValue();
        }
        $resource->setMetadata($metadataArray);

        // content
        if ($entity->getContent() !== null) {
            $serializer = SerializerBuilder::create()
                ->addDefaultHandlers()
                ->configureHandlers(
                    function (HandlerRegistry $registry) {
                        $registry->registerSubscribingHandler(
                            new AbstractClassForExerciseHandler()
                        );
                    }
                )
                ->build();
            $content = $serializer->deserialize(
                $entity->getContent(),
                $resource->getClass(),
                'json'
            );
            $resource->setContent($content);
        }
    }

    /**
     * Create a resource from an entity and the type of the entity
     *
     * @param SharedEntity $entity
     * @param string       $type
     *
     * @return SharedResource
     * @throws \SimpleIT\ClaireExerciseBundle\Exception\InvalidTypeException
     */
    public static function createFromEntity($entity, $type)
    {
        switch ($type) {
            case self::EXERCISE_MODEL:
                /** @var ExerciseModel $entity */
                $resource = ExerciseModelResourceFactory::create($entity);
                break;
            case self::RESOURCE:
                /** @var ExerciseResource $entity */
                $resource = ResourceResourceFactory::create($entity);
                break;
            case self::KNOWLEDGE:
                /** @var Knowledge $entity */
                $resource = KnowledgeResourceFactory::create($entity);
                break;
            default:
                throw new InvalidTypeException('Unknown type:' . $type);
        }

        return $resource;
    }

    /**
     * Create a collection of resources from a collection of entities and the type of the entity
     *
     * @param PaginatorInterface $entities
     * @param string             $type
     *
     * @return array
     * @throws \SimpleIT\ClaireExerciseBundle\Exception\InvalidTypeException
     */
    public static function createFromEntityCollection(PaginatorInterface $entities, $type)
    {
        switch ($type) {
            case self::EXERCISE_MODEL:
                $resources = ExerciseModelResourceFactory::createCollection($entities);
                break;
            case self::RESOURCE:
                $resources = ResourceResourceFactory::createCollection($entities);
                break;
            case self::KNOWLEDGE:
                $resources = KnowledgeResourceFactory::createCollection($entities);
                break;
            default:
                throw new InvalidTypeException('Unknown type:' . $type);
        }

        return $resources;
    }
}
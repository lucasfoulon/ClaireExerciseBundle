<?php
/*
 * This file is part of CLAIRE.
 *
 * CLAIRE is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * CLAIRE is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with CLAIRE. If not, see <http://www.gnu.org/licenses/>
 */

namespace SimpleIT\ClaireExerciseBundle\Repository\Exercise\Annotate;

use SimpleIT\ClaireExerciseBundle\Entity\Annotate\ListAnnotate;
use SimpleIT\ClaireExerciseBundle\Entity\ExerciseResource\ExerciseResource;
use SimpleIT\ClaireExerciseBundle\Repository\Exercise\SharedEntity\SharedMetadataRepository;

/**
 * List Annotate Metadata repository
 *
 * @author Baptiste Cablé <baptiste.cable@liris.cnrs.fr>
 */
class MetadataRepository extends SharedMetadataRepository
{
    const METADATA_TABLE = 'claire_exercise_resource_list_annotate_metadata';

    const ENTITY_ID_FIELD_NAME = 'resource_id';

    const ENTITY_NAME = 'resource';


    /**
     * Delete all the metadata for an entity
     *
     * @param ExerciseResource $entity
     */
    public function deleteAllByResource($entity)
    {
        if (count($entity->getListAnnotate()) > 0) {
            //foreach($entity->getListAnnotate() as $list_annotate) {
                //$this->deleteAllByListAnnotate($entity,$list_annotate);
            //}
            $this->deleteAllByListAnnotate($entity);
        }
    }

    /**
     * Delete all the annotate for an list annotate
     *
     * @param ExerciseResource $entity
     * @param ListAnnotate $list_annotate
     */
    public function deleteAllByListAnnotate($entity)
    {
        $list_annotate = $entity->getListAnnotate()[0];
        if (count($list_annotate->getMetadata()) > 0) {
            $qb = $this->createQueryBuilder('a');
            $qb->delete(get_class($list_annotate->getMetadata()[0]), 'a');
            $qb->where($qb->expr()->eq('a.resource', $entity->getId()));
            //$qb->andWhere($qb->expr()->eq('a.list_annotate', '\''.$list_annotate->getName().'\''));
            $qb->getQuery()->getResult();
        }
    }
}

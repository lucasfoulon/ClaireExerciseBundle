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

namespace SimpleIT\ClaireExerciseBundle\Model\Resources\ExerciseResource;

use JMS\Serializer\Annotation as Serializer;
use SimpleIT\ClaireExerciseBundle\Exception\InvalidExerciseResourceException;
use SimpleIT\ClaireExerciseBundle\Model\Resources\AnnotateResource;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class TextResource
 *
 * @author Baptiste Cablé <baptiste.cable@liris.cnrs.fr>
 */
class TextResource extends CommonResource
{
    /**
     * @var string $text The text
     * @Serializer\Type("string")
     * @Serializer\Groups({"details", "resource_storage"})
     */
    private $text;

    /**
     * @var array $list_annotate An array of ListAnnotate
     * @Serializer\Type("array<SimpleIT\ClaireExerciseBundle\Model\Resources\ExerciseResource\Text\ListAnnotateResource>")
     * @Serializer\Groups({"details", "resource_storage"})
     */
    private $list_annotate = array();

    /**
     * Get text
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set text
     *
     * @param string $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * Set list annotate
     *
     * @param array $list_annotate
     */
    public function setListAnnotate($list_annotate)
    {
        $this->list_annotate = $list_annotate;
    }

    /**
     * Get list annotate
     *
     * @return array
     */
    public function getListAnnotate()
    {
        return $this->list_annotate;
    }

    /**
     * Add list annotate
     *
     * @param <SimpleIT\ClaireExerciseBundle\Model\Resources\ExerciseResource\Text\ListAnnotateResource> $list_annotate
     */
    public function addListAnnotate($list_annotate)
    {
        $this->list_annotate[] = $list_annotate;
    }

    /**
     * Validate text resource
     *
     * @throws InvalidExerciseResourceException
     */
    public function  validate($param = null)
    {
        if (is_null($this->text) || $this->text == '') {
            throw new InvalidExerciseResourceException('Invalid Text resource');
        }
    }
}

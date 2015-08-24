<?php
/**
 * Created by PhpStorm.
 * User: arabesque
 * Date: 29/07/15
 * Time: 12:02
 */
namespace SimpleIT\ClaireExerciseBundle\Entity\Annotate;


class Annotate
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var ListAnnotate
     */
    private $list_annotate;

    /**
     * @var string
     */
    private $value;
    /**
     * @var int
     */
    private $start;
    /**
     * @var int
     */
    private $end;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set id
     *
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Set list_annotate
     *
     * @param ListAnnotate $list_annotate
     */
    public function setListAnnotate($list_annotate)
    {
        $this->list_annotate = $list_annotate;
    }

    /**
     * Get list_annotate
     *
     * @return ListAnnotate
     */
    public function getListAnnotate()
    {
        return $this->list_annotate;
    }

    /**
     * Get value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set value
     *
     * @param string $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * Get start
     *
     * @return int
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Set start
     *
     * @param int $start
     */
    public function setStart($start)
    {
        $this->start = $start;
    }

    /**
     * Get end
     *
     * @return int
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * Set end
     *
     * @param int $end
     */
    public function setEnd($end)
    {
        $this->end = $end;
    }
}

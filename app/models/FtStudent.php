<?php

class FtStudent extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(column="id", type="integer", length=10, nullable=false)
     */
    public $id;

    /**
     *
     * @var string
     * @Column(column="name", type="string", length=30, nullable=false)
     */
    public $name;

    /**
     *
     * @var string
     * @Column(column="thumb", type="string", nullable=false)
     */
    public $thumb;

    /**
     *
     * @var integer
     * @Column(column="ranking", type="integer", length=10, nullable=false)
     */
    public $ranking;

    /**
     *
     * @var integer
     * @Column(column="score", type="integer", length=10, nullable=false)
     */
    public $score;

    /**
     *
     * @var integer
     * @Column(column="gradeid", type="integer", length=10, nullable=true)
     */
    public $gradeid;

    /**
     *
     * @var integer
     * @Column(column="inputtime", type="integer", length=10, nullable=false)
     */
    public $inputtime;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("week");
        $this->setSource("ft_student");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'ft_student';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return FtStudent[]|FtStudent|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return FtStudent|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}

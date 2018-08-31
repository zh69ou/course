<?php

class FtClazz extends \Phalcon\Mvc\Model
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
     * @Column(column="name", type="string", length=50, nullable=true)
     */
    public $name;

    /**
     *
     * @var integer
     * @Column(column="edu_id", type="integer", length=10, nullable=false)
     */
    public $edu_id;

    /**
     *
     * @var string
     * @Column(column="edu_name", type="string", length=100, nullable=false)
     */
    public $edu_name;

    /**
     *
     * @var integer
     * @Column(column="grade_id", type="integer", length=10, nullable=false)
     */
    public $grade_id;

    /**
     *
     * @var string
     * @Column(column="grade_name", type="string", length=50, nullable=false)
     */
    public $grade_name;

    /**
     *
     * @var integer
     * @Column(column="school_id", type="integer", length=10, nullable=false)
     */
    public $school_id;

    /**
     *
     * @var string
     * @Column(column="school_name", type="string", length=50, nullable=false)
     */
    public $school_name;

    /**
     *
     * @var integer
     * @Column(column="type", type="integer", length=1, nullable=true)
     */
    public $type;

    /**
     *
     * @var integer
     * @Column(column="typenum", type="integer", length=3, nullable=true)
     */
    public $typenum;

    /**
     *
     * @var integer
     * @Column(column="inputtime", type="integer", length=10, nullable=false)
     */
    public $inputtime;

    /**
     *
     * @var integer
     * @Column(column="updatetime", type="integer", length=10, nullable=false)
     */
    public $updatetime;

    /**
     *
     * @var integer
     * @Column(column="status", type="integer", length=1, nullable=false)
     */
    public $status;

    /**
     *
     * @var integer
     * @Column(column="week", type="integer", length=1, nullable=true)
     */
    public $week;

    /**
     *
     * @var integer
     * @Column(column="times", type="integer", length=1, nullable=true)
     */
    public $times;

    /**
     *
     * @var integer
     * @Column(column="term", type="integer", length=1, nullable=true)
     */
    public $term;

    /**
     *
     * @var integer
     * @Column(column="tid", type="integer", length=10, nullable=true)
     */
    public $tid;

    /**
     *
     * @var string
     * @Column(column="tname", type="string", length=50, nullable=true)
     */
    public $tname;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("week");
        $this->setSource("ft_clazz");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'ft_clazz';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return FtClazz[]|FtClazz|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return FtClazz|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}

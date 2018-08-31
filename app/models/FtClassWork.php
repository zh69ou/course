<?php

class FtClassWork extends \Phalcon\Mvc\Model
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
     * @var integer
     * @Column(column="classid", type="integer", length=10, nullable=false)
     */
    public $classid;

    /**
     *
     * @var integer
     * @Column(column="catid", type="integer", length=1, nullable=false)
     */
    public $catid;

    /**
     *
     * @var string
     * @Column(column="title", type="string", nullable=false)
     */
    public $title;

    /**
     *
     * @var string
     * @Column(column="options", type="string", nullable=false)
     */
    public $options;

    /**
     *
     * @var string
     * @Column(column="correct_option", type="string", nullable=false)
     */
    public $correct_option;

    /**
     *
     * @var string
     * @Column(column="analysis", type="string", nullable=true)
     */
    public $analysis;

    /**
     *
     * @var integer
     * @Column(column="status", type="integer", length=1, nullable=false)
     */
    public $status;

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
        $this->setSource("ft_class_work");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'ft_class_work';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return FtClassWork[]|FtClassWork|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return FtClassWork|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}

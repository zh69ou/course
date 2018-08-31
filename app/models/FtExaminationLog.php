<?php

class FtExaminationLog extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(column="id", type="integer", length=11, nullable=false)
     */
    public $id;

    /**
     *
     * @var integer
     * @Column(column="uid", type="integer", length=10, nullable=false)
     */
    public $uid;

    /**
     *
     * @var string
     * @Column(column="grade", type="string", length=100, nullable=false)
     */
    public $grade;

    /**
     *
     * @var string
     * @Column(column="clazz", type="string", length=100, nullable=false)
     */
    public $clazz;

    /**
     *
     * @var string
     * @Column(column="subject", type="string", length=20, nullable=true)
     */
    public $subject;

    /**
     *
     * @var integer
     * @Column(column="score", type="integer", length=3, nullable=true)
     */
    public $score;

    /**
     *
     * @var integer
     * @Column(column="inputtime", type="integer", length=10, nullable=false)
     */
    public $inputtime;

    /**
     *
     * @var integer
     * @Column(column="status", type="integer", length=1, nullable=true)
     */
    public $status;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("week");
        $this->setSource("ft_examination_log");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'ft_examination_log';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return FtExaminationLog[]|FtExaminationLog|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return FtExaminationLog|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}

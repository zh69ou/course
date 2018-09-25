<?php

class FtEvaluationLog extends \Phalcon\Mvc\Model
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
     * @Column(column="uid", type="integer", length=10, nullable=true)
     */
    public $uid;

    /**
     *
     * @var integer
     * @Column(column="clazzid", type="integer", length=5, nullable=true)
     */
    public $clazzid;

    /**
     *
     * @var integer
     * @Column(column="subjectid", type="integer", length=5, nullable=true)
     */
    public $subjectid;

    /**
     *
     * @var integer
     * @Column(column="score", type="integer", length=3, nullable=true)
     */
    public $score;

    /**
     *
     * @var double
     * @Column(column="level", type="double", length=2, nullable=true)
     */
    public $level;

    /**
     *
     * @var integer
     * @Column(column="status", type="integer", length=1, nullable=true)
     */
    public $status;

    /**
     *
     * @var integer
     * @Column(column="inputtime", type="integer", length=10, nullable=true)
     */
    public $inputtime;

    /**
     *
     * @var integer
     * @Column(column="submittime", type="integer", length=10, nullable=true)
     */
    public $submittime;

    /**
     *
     * @var integer
     * @Column(column="type", type="integer", length=1, nullable=true)
     */
    public $type;

    /**
     *
     * @var integer
     * @Column(column="gradeid", type="integer", length=1, nullable=true)
     */
    public $gradeid;

    /**
     *
     * @var integer
     * @Column(column="term", type="integer", length=1, nullable=true)
     */
    public $term;

    /**
     *
     * @var integer
     * @Column(column="school_id", type="integer", length=10, nullable=true)
     */
    public $school_id;

    /**
     *
     * @var integer
     * @Column(column="test_id", type="integer", length=10, nullable=true)
     */
    public $test_id;

    /**
     *
     * @var string
     * @Column(column="content", type="string", length=100, nullable=true)
     */
    public $content;

    /**
     *
     * @var integer
     * @Column(column="math_1", type="integer", length=1, nullable=true)
     */
    public $math_1;

    /**
     *
     * @var integer
     * @Column(column="math_2", type="integer", length=1, nullable=true)
     */
    public $math_2;

    /**
     *
     * @var integer
     * @Column(column="math_3", type="integer", length=1, nullable=true)
     */
    public $math_3;

    /**
     *
     * @var integer
     * @Column(column="math_4", type="integer", length=1, nullable=true)
     */
    public $math_4;

    /**
     *
     * @var integer
     * @Column(column="math_5", type="integer", length=1, nullable=true)
     */
    public $math_5;

    /**
     *
     * @var integer
     * @Column(column="correct_rate", type="integer", length=10, nullable=true)
     */
    public $correct_rate;

    /**
     *
     * @var integer
     * @Column(column="correct", type="integer", length=10, nullable=false)
     */
    public $correct;

    /**
     *
     * @var integer
     * @Column(column="wrong", type="integer", length=10, nullable=true)
     */
    public $wrong;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("week");
        $this->setSource("ft_evaluation_log");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'ft_evaluation_log';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return FtEvaluationLog[]|FtEvaluationLog|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return FtEvaluationLog|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}

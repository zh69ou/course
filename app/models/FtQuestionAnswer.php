<?php

class FtQuestionAnswer extends \Phalcon\Mvc\Model
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
     * @Column(column="eid", type="integer", length=10, nullable=true)
     */
    public $eid;

    /**
     *
     * @var integer
     * @Column(column="qid", type="integer", length=10, nullable=true)
     */
    public $qid;

    /**
     *
     * @var integer
     * @Column(column="uid", type="integer", length=10, nullable=true)
     */
    public $uid;

    /**
     *
     * @var double
     * @Column(column="level", type="double", length=3, nullable=true)
     */
    public $level;

    /**
     *
     * @var integer
     * @Column(column="stars", type="integer", length=1, nullable=true)
     */
    public $stars;

    /**
     *
     * @var double
     * @Column(column="score", type="double", length=10, nullable=true)
     */
    public $score;

    /**
     *
     * @var integer
     * @Column(column="math_ability", type="integer", length=1, nullable=true)
     */
    public $math_ability;

    /**
     *
     * @var integer
     * @Column(column="status", type="integer", length=1, nullable=true)
     */
    public $status;

    /**
     *
     * @var string
     * @Column(column="answer", type="string", length=50, nullable=true)
     */
    public $answer;

    /**
     *
     * @var integer
     * @Column(column="inputtime", type="integer", length=10, nullable=true)
     */
    public $inputtime;

    /**
     *
     * @var integer
     * @Column(column="eva_id", type="integer", length=10, nullable=true)
     */
    public $eva_id;

    /**
     *
     * @var integer
     * @Column(column="test_id", type="integer", length=10, nullable=true)
     */
    public $test_id;

    /**
     *
     * @var integer
     * @Column(column="answer_time", type="integer", length=10, nullable=true)
     */
    public $answer_time;

    /**
     *
     * @var integer
     * @Column(column="point_id", type="integer", length=10, nullable=true)
     */
    public $point_id;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("week");
        $this->setSource("ft_question_answer");
        $this->belongsTo('qid','FtQuestion','id');
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'ft_question_answer';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return FtQuestionAnswer[]|FtQuestionAnswer|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return FtQuestionAnswer|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}

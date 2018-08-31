<?php

class FtQuestion extends \Phalcon\Mvc\Model
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
     * @Column(column="tid", type="integer", length=10, nullable=true)
     */
    public $tid;

    /**
     *
     * @var string
     * @Column(column="title", type="string", nullable=false)
     */
    public $title;

    /**
     *
     * @var string
     * @Column(column="options", type="string", length=255, nullable=true)
     */
    public $options;

    /**
     *
     * @var string
     * @Column(column="correct", type="string", length=255, nullable=true)
     */
    public $correct;

    /**
     *
     * @var integer
     * @Column(column="score", type="integer", length=5, nullable=true)
     */
    public $score;

    /**
     *
     * @var string
     * @Column(column="analysis", type="string", nullable=true)
     */
    public $analysis;

    /**
     *
     * @var string
     * @Column(column="level", type="string", length=10, nullable=true)
     */
    public $level;

    /**
     *
     * @var double
     * @Column(column="stars", type="double", length=10, nullable=true)
     */
    public $stars;

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
     * @Column(column="chapterid", type="integer", length=5, nullable=true)
     */
    public $chapterid;

    /**
     *
     * @var integer
     * @Column(column="point_id", type="integer", length=10, nullable=true)
     */
    public $point_id;

    /**
     *
     * @var integer
     * @Column(column="burlid", type="integer", length=5, nullable=true)
     */
    public $burlid;

    /**
     *
     * @var integer
     * @Column(column="type", type="integer", length=1, nullable=true)
     */
    public $type;

    /**
     *
     * @var integer
     * @Column(column="math_ability", type="integer", length=1, nullable=false)
     */
    public $math_ability;

    /**
     *
     * @var integer
     * @Column(column="term", type="integer", length=1, nullable=true)
     */
    public $term;

    /**
     *
     * @var integer
     * @Column(column="finish_time", type="integer", length=10, nullable=true)
     */
    public $finish_time;

    /**
     *
     * @var integer
     * @Column(column="inputtime", type="integer", length=10, nullable=true)
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
        $this->setSource("ft_question");
        $this->hasMany('id','FtQuestionAnswer','qid');
        $this->hasMany('id','FtQuestionErrorLog','qid');
        $this->belongsTo('tid','FtMemberTeacher','uid');
        $this->belongsTo('chapterid','FtChapter','id');
        $this->belongsTo('burlid','FtBurl','id');
        $this->belongsTo('point_id','FtKnowledgePointer','id');
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'ft_question';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return FtQuestion[]|FtQuestion|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return FtQuestion|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}

<?php

class FtTestPaper extends \Phalcon\Mvc\Model
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
     * @Column(column="uid", type="integer", length=10, nullable=false)
     */
    public $uid;

    /**
     *
     * @var string
     * @Column(column="title", type="string", length=100, nullable=true)
     */
    public $title;

    /**
     *
     * @var string
     * @Column(column="gradeid", type="string", length=10, nullable=true)
     */
    public $gradeid;

    /**
     *
     * @var string
     * @Column(column="clazzid", type="string", length=10, nullable=true)
     */
    public $clazzid;

    /**
     *
     * @var integer
     * @Column(column="term", type="integer", length=10, nullable=true)
     */
    public $term;

    /**
     *
     * @var integer
     * @Column(column="subjectid", type="integer", length=10, nullable=true)
     */
    public $subjectid;

    /**
     *
     * @var integer
     * @Column(column="finish_time", type="integer", length=10, nullable=true)
     */
    public $finish_time;

    /**
     *
     * @var string
     * @Column(column="content", type="string", nullable=false)
     */
    public $content;

    /**
     *
     * @var integer
     * @Column(column="inputtime", type="integer", length=10, nullable=true)
     */
    public $inputtime;

    /**
     *
     * @var integer
     * @Column(column="endtime", type="integer", length=10, nullable=true)
     */
    public $endtime;

    /**
     *
     * @var integer
     * @Column(column="type", type="integer", length=1, nullable=true)
     */
    public $type;

    /**
     *
     * @var integer
     * @Column(column="status", type="integer", length=1, nullable=true)
     */
    public $status;

    /**
     *
     * @var string
     * @Column(column="note", type="string", nullable=true)
     */
    public $note;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("week");
        $this->setSource("ft_test_paper");
        $this->belongsTo('gradeid','FtGrade','id');
        $this->belongsTo('uid','FtMemberTeacher','uid');
        $this->hasMany('id','FtTestPaperPushlog','testid');
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'ft_test_paper';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return FtTestPaper[]|FtTestPaper|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return FtTestPaper|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}

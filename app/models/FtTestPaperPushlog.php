<?php

class FtTestPaperPushlog extends \Phalcon\Mvc\Model
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
     * @var string
     * @Column(column="title", type="string", length=100, nullable=true)
     */
    public $title;

    /**
     *
     * @var integer
     * @Column(column="tid", type="integer", length=10, nullable=true)
     */
    public $tid;

    /**
     *
     * @var integer
     * @Column(column="sid", type="integer", length=10, nullable=true)
     */
    public $sid;

    /**
     *
     * @var integer
     * @Column(column="testid", type="integer", length=10, nullable=true)
     */
    public $testid;

    /**
     *
     * @var integer
     * @Column(column="clazzid", type="integer", length=10, nullable=true)
     */
    public $clazzid;

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
     * @var string
     * @Column(column="note", type="string", length=255, nullable=true)
     */
    public $note;

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
        $this->setSource("ft_test_paper_pushlog");
        $this->belongsTo('testid','FtTestPaper','id');
        $this->belongsTo('uid','FtMemberStudent','sid');
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'ft_test_paper_pushlog';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return FtTestPaperPushlog[]|FtTestPaperPushlog|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return FtTestPaperPushlog|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}

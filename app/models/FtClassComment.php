<?php

class FtClassComment extends \Phalcon\Mvc\Model
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
     * @var integer
     * @Column(column="cid", type="integer", length=10, nullable=false)
     */
    public $cid;

    /**
     *
     * @var string
     * @Column(column="comment", type="string", nullable=false)
     */
    public $comment;

    /**
     *
     * @var integer
     * @Column(column="teacherstar", type="integer", length=2, nullable=false)
     */
    public $teacherstar;

    /**
     *
     * @var integer
     * @Column(column="classstar", type="integer", length=2, nullable=false)
     */
    public $classstar;

    /**
     *
     * @var integer
     * @Column(column="inputtime", type="integer", length=10, nullable=false)
     */
    public $inputtime;

    /**
     *
     * @var integer
     * @Column(column="zan", type="integer", length=10, nullable=true)
     */
    public $zan;

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
        $this->setSource("ft_class_comment");
        $this->belongsTo('uid','FtMemberStudent','uid');
        $this->belongsTo('pid','FtClassComment','id');
        $this->hasMany('id','FtClassComment','pid');
        $this->hasMany('id','FtClassCommentPraise','commentid');
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'ft_class_comment';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return FtClassComment[]|FtClassComment|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return FtClassComment|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}

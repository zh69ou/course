<?php

class FtTeacherComment extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(column="id", type="integer", length=20, nullable=false)
     */
    public $id;

    /**
     *
     * @var integer
     * @Column(column="pid", type="integer", length=20, nullable=true)
     */
    public $pid;

    /**
     *
     * @var integer
     * @Column(column="tid", type="integer", length=20, nullable=true)
     */
    public $tid;

    /**
     *
     * @var integer
     * @Column(column="sid", type="integer", length=20, nullable=true)
     */
    public $sid;

    /**
     *
     * @var string
     * @Column(column="content", type="string", length=255, nullable=true)
     */
    public $content;

    /**
     *
     * @var string
     * @Column(column="addtime", type="string", length=30, nullable=true)
     */
    public $addtime;

    /**
     *
     * @var integer
     * @Column(column="state", type="integer", length=2, nullable=true)
     */
    public $state;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("week");
        $this->setSource("ft_teacher_comment");
        $this->belongsTo('tid','FtMemberTeacher','uid');
        $this->belongsTo('pid','FtTeacherComment','id');
        $this->hasMany('id','FtTeacherComment','pid');
        $this->hasMany('id','FtTeacherCommentPraise','commentid');
        $this->belongsTo('sid','FtMemberStudent','uid');
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'ft_teacher_comment';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return FtTeacherComment[]|FtTeacherComment|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return FtTeacherComment|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}

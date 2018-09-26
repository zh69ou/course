<?php

class FtMemberStudent extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Column(column="uid", type="integer", length=10, nullable=false)
     */
    public $uid;

    /**
     *
     * @var string
     * @Column(column="username", type="string", length=50, nullable=false)
     */
    public $username;

    /**
     *
     * @var string
     * @Column(column="name", type="string", length=30, nullable=true)
     */
    public $name;

    /**
     *
     * @var string
     * @Column(column="phone", type="string", length=50, nullable=false)
     */
    public $phone;

    /**
     *
     * @var integer
     * @Column(column="sex", type="integer", length=1, nullable=true)
     */
    public $sex;

    /**
     *
     * @var integer
     * @Column(column="birth", type="integer", length=10, nullable=true)
     */
    public $birth;

    /**
     *
     * @var integer
     * @Column(column="inschool", type="integer", length=10, nullable=true)
     */
    public $inschool;

    /**
     *
     * @var integer
     * @Column(column="clazz", type="integer", length=10, nullable=true)
     */
    public $clazz;

    /**
     *
     * @var double
     * @Column(column="score", type="double", nullable=true)
     */
    public $score;

    /**
     *
     * @var integer
     * @Column(column="level", type="integer", length=2, nullable=true)
     */
    public $level;

    /**
     *
     * @var integer
     * @Column(column="experience", type="integer", length=10, nullable=true)
     */
    public $experience;

    /**
     *
     * @var string
     * @Column(column="avatar", type="string", nullable=true)
     */
    public $avatar;

    /**
     *
     * @var integer
     * @Column(column="status", type="integer", length=1, nullable=true)
     */
    public $status;

    /**
     *
     * @var integer
     * @Column(column="del_status", type="integer", length=1, nullable=true)
     */
    public $del_status;

    /**
     *
     * @var integer
     * @Column(column="logintime", type="integer", length=10, nullable=true)
     */
    public $logintime;

    /**
     *
     * @var integer
     * @Column(column="inputtime", type="integer", length=10, nullable=true)
     */
    public $inputtime;

    /**
     *
     * @var integer
     * @Column(column="page_status", type="integer", length=1, nullable=true)
     */
    public $page_status;

    /**
     *
     * @var integer
     * @Column(column="page_score", type="integer", length=5, nullable=true)
     */
    public $page_score;

    /**
     *
     * @var integer
     * @Column(column="clazzid", type="integer", length=10, nullable=true)
     */
    public $clazzid;

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
     * @var string
     * @Column(column="school_desc", type="string", length=50, nullable=true)
     */
    public $school_desc;

    /**
     *
     * @var integer
     * @Column(column="clazz_type", type="integer", length=1, nullable=true)
     */
    public $clazz_type;

    /**
     *
     * @var string
     * @Column(column="study_day", type="string", length=20, nullable=true)
     */
    public $study_day;

    /**
     *
     * @var integer
     * @Column(column="week", type="integer", length=1, nullable=true)
     */
    public $week;

    /**
     *
     * @var string
     * @Column(column="study_time", type="string", length=20, nullable=true)
     */
    public $study_time;

    /**
     *
     * @var integer
     * @Column(column="times", type="integer", length=1, nullable=true)
     */
    public $times;

    /**
     *
     * @var string
     * @Column(column="public_school", type="string", length=100, nullable=true)
     */
    public $public_school;

    /**
     *
     * @var integer
     * @Column(column="vip_time", type="integer", length=10, nullable=true)
     */
    public $vip_time;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("week");
        $this->setSource("ft_member_student");
        $this->belongsTo('clazz','FtGrade','id');
        $this->hasMany('uid','FtTeacherComment','sid');
        $this->hasMany('uid','FtClassComment','uid');
        $this->hasMany('uid','FtTestPaperPushlog','sid');
        $this->hasMany('uid','FtQuestion','tid');
        $this->hasMany('uid','FtOrder','uid');
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'ft_member_student';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return FtMemberStudent[]|FtMemberStudent|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return FtMemberStudent|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}

<?php

class FtMemberTeacher extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(column="uid", type="integer", length=10, nullable=false)
     */
    public $uid;

    /**
     *
     * @var string
     * @Column(column="phone", type="string", length=20, nullable=false)
     */
    public $phone;

    /**
     *
     * @var integer
     * @Column(column="status", type="integer", length=1, nullable=false)
     */
    public $status;

    /**
     *
     * @var string
     * @Column(column="name", type="string", length=20, nullable=true)
     */
    public $name;

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
     * @var string
     * @Column(column="label", type="string", nullable=true)
     */
    public $label;

    /**
     *
     * @var string
     * @Column(column="teachdesc", type="string", nullable=true)
     */
    public $teachdesc;

    /**
     *
     * @var string
     * @Column(column="infodesc", type="string", nullable=true)
     */
    public $infodesc;

    /**
     *
     * @var double
     * @Column(column="money", type="double", length=10, nullable=false)
     */
    public $money;

    /**
     *
     * @var string
     * @Column(column="avatar", type="string", nullable=true)
     */
    public $avatar;

    /**
     *
     * @var integer
     * @Column(column="subscribe", type="integer", length=10, nullable=true)
     */
    public $subscribe;

    /**
     *
     * @var integer
     * @Column(column="total", type="integer", length=10, nullable=true)
     */
    public $total;

    /**
     *
     * @var integer
     * @Column(column="audit_state", type="integer", length=1, nullable=false)
     */
    public $audit_state;

    /**
     *
     * @var integer
     * @Column(column="del_status", type="integer", length=1, nullable=false)
     */
    public $del_status;

    /**
     *
     * @var integer
     * @Column(column="logintime", type="integer", length=10, nullable=false)
     */
    public $logintime;

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
        $this->setSource("ft_member_teacher");
        $this->hasMany('uid','FtClass','uid');
        $this->hasMany('uid','FtTestPaper','uid');
        $this->hasMany('uid','FtFavoriteTeacher','tid');
        $this->hasMany('uid','FtRelations','tid');
        $this->hasOne('uid','FtMemberTeacherForm','uid');
        $this->hasMany('uid','FtTeacherComment','tid');
        $this->hasMany('uid','FtQuestion','tid');
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'ft_member_teacher';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return FtMemberTeacher[]|FtMemberTeacher|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return FtMemberTeacher|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}

<?php

class FtMemberEducational extends \Phalcon\Mvc\Model
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
     * @Column(column="name", type="string", length=50, nullable=false)
     */
    public $name;

    /**
     *
     * @var string
     * @Column(column="phone", type="string", length=30, nullable=false)
     */
    public $phone;

    /**
     *
     * @var string
     * @Column(column="avatar", type="string", length=100, nullable=false)
     */
    public $avatar;

    /**
     *
     * @var integer
     * @Column(column="money", type="integer", length=10, nullable=false)
     */
    public $money;

    /**
     *
     * @var integer
     * @Column(column="status", type="integer", length=1, nullable=false)
     */
    public $status;

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
        $this->setSource("ft_member_educational");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'ft_member_educational';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return FtMemberEducational[]|FtMemberEducational|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return FtMemberEducational|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}

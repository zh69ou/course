<?php

class FtMemberTeachingStewards extends \Phalcon\Mvc\Model
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
     * @var string
     * @Column(column="name", type="string", length=50, nullable=true)
     */
    public $name;

    /**
     *
     * @var string
     * @Column(column="phone", type="string", length=20, nullable=true)
     */
    public $phone;

    /**
     *
     * @var string
     * @Column(column="avatar", type="string", length=255, nullable=true)
     */
    public $avatar;

    /**
     *
     * @var integer
     * @Column(column="sex", type="integer", length=1, nullable=true)
     */
    public $sex;

    /**
     *
     * @var string
     * @Column(column="id_number", type="string", length=18, nullable=true)
     */
    public $id_number;

    /**
     *
     * @var string
     * @Column(column="id_zm", type="string", length=255, nullable=true)
     */
    public $id_zm;

    /**
     *
     * @var string
     * @Column(column="id_fm", type="string", length=255, nullable=true)
     */
    public $id_fm;

    /**
     *
     * @var integer
     * @Column(column="edu_id", type="integer", length=10, nullable=true)
     */
    public $edu_id;

    /**
     *
     * @var integer
     * @Column(column="school_id", type="integer", length=10, nullable=true)
     */
    public $school_id;

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
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("week");
        $this->setSource("ft_member_teaching_stewards");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'ft_member_teaching_stewards';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return FtMemberTeachingStewards[]|FtMemberTeachingStewards|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return FtMemberTeachingStewards|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}

<?php

class FtMemberStudentClazz extends \Phalcon\Mvc\Model
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
     * @Column(column="clazzid", type="integer", length=10, nullable=false)
     */
    public $clazzid;

    /**
     *
     * @var integer
     * @Column(column="tid", type="integer", length=10, nullable=false)
     */
    public $tid;

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
        $this->setSource("ft_member_student_clazz");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'ft_member_student_clazz';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return FtMemberStudentClazz[]|FtMemberStudentClazz|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return FtMemberStudentClazz|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}

<?php

class FtCoupon extends \Phalcon\Mvc\Model
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
     * @var string
     * @Column(column="name", type="string", length=50, nullable=true)
     */
    public $name;

    /**
     *
     * @var double
     * @Column(column="money", type="double", length=10, nullable=false)
     */
    public $money;

    /**
     *
     * @var integer
     * @Column(column="num", type="integer", length=10, nullable=false)
     */
    public $num;

    /**
     *
     * @var string
     * @Column(column="subject", type="string", length=100, nullable=false)
     */
    public $subject;

    /**
     *
     * @var string
     * @Column(column="grade", type="string", length=100, nullable=false)
     */
    public $grade;

    /**
     *
     * @var integer
     * @Column(column="educational", type="integer", length=10, nullable=false)
     */
    public $educational;

    /**
     *
     * @var integer
     * @Column(column="starttime", type="integer", length=10, nullable=false)
     */
    public $starttime;

    /**
     *
     * @var integer
     * @Column(column="endtime", type="integer", length=10, nullable=false)
     */
    public $endtime;

    /**
     *
     * @var integer
     * @Column(column="status", type="integer", length=1, nullable=false)
     */
    public $status;

    /**
     *
     * @var integer
     * @Column(column="inputtime", type="integer", length=10, nullable=false)
     */
    public $inputtime;

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
        $this->setSource("ft_coupon");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'ft_coupon';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return FtCoupon[]|FtCoupon|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return FtCoupon|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}

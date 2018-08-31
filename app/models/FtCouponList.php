<?php

class FtCouponList extends \Phalcon\Mvc\Model
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
     * @Column(column="uid", type="integer", length=10, nullable=false)
     */
    public $uid;

    /**
     *
     * @var integer
     * @Column(column="couponid", type="integer", length=10, nullable=false)
     */
    public $couponid;

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
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("week");
        $this->setSource("ft_coupon_list");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'ft_coupon_list';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return FtCouponList[]|FtCouponList|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return FtCouponList|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}

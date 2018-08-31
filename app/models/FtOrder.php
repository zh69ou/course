<?php

class FtOrder extends \Phalcon\Mvc\Model
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
     * @Column(column="sn", type="string", length=50, nullable=true)
     */
    public $sn;

    /**
     *
     * @var integer
     * @Column(column="buy_uid", type="integer", length=10, nullable=false)
     */
    public $buy_uid;

    /**
     *
     * @var string
     * @Column(column="buy_username", type="string", length=50, nullable=true)
     */
    public $buy_username;

    /**
     *
     * @var integer
     * @Column(column="type", type="integer", length=2, nullable=true)
     */
    public $type;

    /**
     *
     * @var integer
     * @Column(column="sid", type="integer", length=10, nullable=true)
     */
    public $sid;

    /**
     *
     * @var integer
     * @Column(column="cid", type="integer", length=10, nullable=true)
     */
    public $cid;

    /**
     *
     * @var integer
     * @Column(column="tid", type="integer", length=10, nullable=false)
     */
    public $tid;

    /**
     *
     * @var integer
     * @Column(column="order_time", type="integer", length=10, nullable=false)
     */
    public $order_time;

    /**
     *
     * @var integer
     * @Column(column="order_status", type="integer", length=1, nullable=false)
     */
    public $order_status;

    /**
     *
     * @var double
     * @Column(column="order_price", type="double", length=10, nullable=true)
     */
    public $order_price;

    /**
     *
     * @var integer
     * @Column(column="coupon_price", type="integer", length=10, nullable=true)
     */
    public $coupon_price;

    /**
     *
     * @var integer
     * @Column(column="coupon_id", type="integer", length=10, nullable=true)
     */
    public $coupon_id;

    /**
     *
     * @var integer
     * @Column(column="pay_type", type="integer", length=2, nullable=true)
     */
    public $pay_type;

    /**
     *
     * @var integer
     * @Column(column="pay_status", type="integer", length=1, nullable=true)
     */
    public $pay_status;

    /**
     *
     * @var integer
     * @Column(column="pay_time", type="integer", length=10, nullable=true)
     */
    public $pay_time;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("week");
        $this->setSource("ft_order");
        $this->belongsTo('uid','FtMemberStudent','uid');
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'ft_order';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return FtOrder[]|FtOrder|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return FtOrder|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}

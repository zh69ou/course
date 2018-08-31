<?php

class FtRedemptionCode extends \Phalcon\Mvc\Model
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
     * @var string
     * @Column(column="code", type="string", length=50, nullable=true)
     */
    public $code;

    /**
     *
     * @var integer
     * @Column(column="exchange_time", type="integer", length=10, nullable=true)
     */
    public $exchange_time;

    /**
     *
     * @var integer
     * @Column(column="status", type="integer", length=1, nullable=true)
     */
    public $status;

    /**
     *
     * @var integer
     * @Column(column="uid", type="integer", length=10, nullable=true)
     */
    public $uid;

    /**
     *
     * @var integer
     * @Column(column="inputtime", type="integer", length=10, nullable=true)
     */
    public $inputtime;

    /**
     *
     * @var integer
     * @Column(column="endtime", type="integer", length=10, nullable=true)
     */
    public $endtime;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("week");
        $this->setSource("ft_redemption_code");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'ft_redemption_code';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return FtRedemptionCode[]|FtRedemptionCode|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return FtRedemptionCode|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}

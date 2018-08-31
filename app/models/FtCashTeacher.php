<?php

class FtCashTeacher extends \Phalcon\Mvc\Model
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
     * @Column(column="money", type="integer", length=10, nullable=false)
     */
    public $money;

    /**
     *
     * @var string
     * @Column(column="account", type="string", length=50, nullable=false)
     */
    public $account;

    /**
     *
     * @var string
     * @Column(column="account_name", type="string", length=50, nullable=false)
     */
    public $account_name;

    /**
     *
     * @var string
     * @Column(column="account_bank", type="string", length=50, nullable=false)
     */
    public $account_bank;

    /**
     *
     * @var integer
     * @Column(column="status", type="integer", length=1, nullable=false)
     */
    public $status;

    /**
     *
     * @var string
     * @Column(column="note", type="string", nullable=true)
     */
    public $note;

    /**
     *
     * @var integer
     * @Column(column="inputtime", type="integer", length=10, nullable=false)
     */
    public $inputtime;

    /**
     *
     * @var integer
     * @Column(column="edu_id", type="integer", length=10, nullable=false)
     */
    public $edu_id;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("week");
        $this->setSource("ft_cash_teacher");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'ft_cash_teacher';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return FtCashTeacher[]|FtCashTeacher|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return FtCashTeacher|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}

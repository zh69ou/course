<?php

class FtSigninLog extends \Phalcon\Mvc\Model
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
     * @var integer
     * @Column(column="inputtime", type="integer", length=10, nullable=true)
     */
    public $inputtime;

    /**
     *
     * @var integer
     * @Column(column="year", type="integer", length=10, nullable=true)
     */
    public $year;

    /**
     *
     * @var integer
     * @Column(column="month", type="integer", length=8, nullable=true)
     */
    public $month;

    /**
     *
     * @var integer
     * @Column(column="day", type="integer", length=8, nullable=true)
     */
    public $day;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("week");
        $this->setSource("ft_signin_log");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'ft_signin_log';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return FtSigninLog[]|FtSigninLog|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return FtSigninLog|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}

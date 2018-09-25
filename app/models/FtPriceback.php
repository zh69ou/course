<?php

class FtPriceback extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var integer
     */
    public $orderid;

    /**
     *
     * @var integer
     */
    public $uid;

    /**
     *
     * @var string
     */
    public $username;

    /**
     *
     * @var string
     */
    public $backcontent;

    /**
     *
     * @var integer
     */
    public $acttime;

    /**
     *
     * @var integer
     */
    public $paytime;

    /**
     *
     * @var string
     */
    public $payprice;

    /**
     *
     * @var integer
     */
    public $paytype;

    /**
     *
     * @var integer
     */
    public $status;

    /**
     *
     * @var string
     */
    public $note;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("week");
        $this->setSource("ft_priceback");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'ft_priceback';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return FtPriceback[]|FtPriceback|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return FtPriceback|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}

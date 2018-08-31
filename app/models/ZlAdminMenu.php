<?php

class ZlAdminMenu extends \Phalcon\Mvc\Model
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
    public $pid;

    /**
     *
     * @var string
     */
    public $name;

    /**
     *
     * @var string
     */
    public $code;

    /**
     *
     * @var string
     */
    public $type;

    /**
     *
     * @var string
     */
    public $url;

    /**
     *
     * @var string
     */
    public $ajaxurl;

    /**
     *
     * @var string
     */
    public $ico;

    /**
     *
     * @var integer
     */
    public $place;

    /**
     *
     * @var string
     */
    public $power;

    /**
     *
     * @var integer
     */
    public $isnew;

    /**
     *
     * @var integer
     */
    public $sort;

    /**
     *
     * @var integer
     */
    public $isshow;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("week");
        $this->setSource("zl_admin_menu");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'zl_admin_menu';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return ZlAdminMenu[]|ZlAdminMenu|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return ZlAdminMenu|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}

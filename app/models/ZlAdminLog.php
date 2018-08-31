<?php

class ZlAdminLog extends \Phalcon\Mvc\Model
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
    public $aid;

    /**
     *
     * @var string
     */
    public $acttype;

    /**
     *
     * @var string
     */
    public $actdesc;

    /**
     *
     * @var string
     */
    public $actdata;

    /**
     *
     * @var integer
     */
    public $acttime;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("week");
        $this->setSource("zl_admin_log");
        $this->belongsTo('aid','ZlAdmin','id');
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'zl_admin_log';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return ZlAdminLog[]|ZlAdminLog|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return ZlAdminLog|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}

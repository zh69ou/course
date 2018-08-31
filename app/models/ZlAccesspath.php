<?php

class ZlAccesspath extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var string
     */
    public $ipone;

    /**
     *
     * @var string
     */
    public $iptwo;

    /**
     *
     * @var string
     */
    public $path;

    /**
     *
     * @var string
     */
    public $source;

    /**
     *
     * @var string
     */
    public $device;

    /**
     *
     * @var string
     */
    public $type;

    /**
     *
     * @var integer
     */
    public $addtime;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("admin");
        $this->setSource("zl_accesspath");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'zl_accesspath';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return ZlAccesspath[]|ZlAccesspath|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return ZlAccesspath|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}

<?php

class FtLookLog extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(column="id", type="integer", length=16, nullable=false)
     */
    public $id;

    /**
     *
     * @var integer
     * @Column(column="uid", type="integer", length=12, nullable=true)
     */
    public $uid;

    /**
     *
     * @var integer
     * @Column(column="cid", type="integer", length=12, nullable=true)
     */
    public $cid;

    /**
     *
     * @var integer
     * @Column(column="betime", type="integer", length=16, nullable=true)
     */
    public $betime;

    /**
     *
     * @var integer
     * @Column(column="entime", type="integer", length=16, nullable=true)
     */
    public $entime;

    /**
     *
     * @var string
     * @Column(column="device", type="string", length=20, nullable=true)
     */
    public $device;

    /**
     *
     * @var string
     * @Column(column="type", type="string", length=20, nullable=true)
     */
    public $type;

    /**
     *
     * @var string
     * @Column(column="versions", type="string", length=20, nullable=true)
     */
    public $versions;

    /**
     *
     * @var string
     * @Column(column="ip", type="string", length=15, nullable=true)
     */
    public $ip;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("week");
        $this->setSource("ft_look_log");
        $this->belongsTo('cid','FtClass','id');
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'ft_look_log';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return FtLookLog[]|FtLookLog|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return FtLookLog|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}

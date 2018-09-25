<?php

class FtLinkageData extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(column="id", type="integer", length=8, nullable=false)
     */
    public $id;

    /**
     *
     * @var integer
     * @Column(column="site", type="integer", length=5, nullable=false)
     */
    public $site;

    /**
     *
     * @var integer
     * @Column(column="pid", type="integer", length=8, nullable=false)
     */
    public $pid;

    /**
     *
     * @var string
     * @Column(column="pids", type="string", length=255, nullable=true)
     */
    public $pids;

    /**
     *
     * @var string
     * @Column(column="name", type="string", length=30, nullable=false)
     */
    public $name;

    /**
     *
     * @var string
     * @Column(column="cname", type="string", length=30, nullable=false)
     */
    public $cname;

    /**
     *
     * @var integer
     * @Column(column="child", type="integer", length=1, nullable=true)
     */
    public $child;

    /**
     *
     * @var integer
     * @Column(column="hidden", type="integer", length=1, nullable=true)
     */
    public $hidden;

    /**
     *
     * @var string
     * @Column(column="childids", type="string", nullable=true)
     */
    public $childids;

    /**
     *
     * @var integer
     * @Column(column="displayorder", type="integer", length=3, nullable=true)
     */
    public $displayorder;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("week");
        $this->setSource("ft_linkage_data");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'ft_linkage_data';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return FtLinkageData[]|FtLinkageData|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return FtLinkageData|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}

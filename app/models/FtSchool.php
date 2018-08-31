<?php

class FtSchool extends \Phalcon\Mvc\Model
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
     * @Column(column="name", type="string", length=100, nullable=false)
     */
    public $name;

    /**
     *
     * @var integer
     * @Column(column="edu_id", type="integer", length=10, nullable=true)
     */
    public $edu_id;

    /**
     *
     * @var integer
     * @Column(column="province", type="integer", length=10, nullable=false)
     */
    public $province;

    /**
     *
     * @var string
     * @Column(column="province_name", type="string", length=50, nullable=true)
     */
    public $province_name;

    /**
     *
     * @var integer
     * @Column(column="area", type="integer", length=10, nullable=false)
     */
    public $area;

    /**
     *
     * @var string
     * @Column(column="area_name", type="string", length=50, nullable=false)
     */
    public $area_name;

    /**
     *
     * @var integer
     * @Column(column="inputtime", type="integer", length=10, nullable=false)
     */
    public $inputtime;

    /**
     *
     * @var integer
     * @Column(column="updatetime", type="integer", length=10, nullable=false)
     */
    public $updatetime;

    /**
     *
     * @var integer
     * @Column(column="status", type="integer", length=1, nullable=true)
     */
    public $status;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("week");
        $this->setSource("ft_school");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'ft_school';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return FtSchool[]|FtSchool|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return FtSchool|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}

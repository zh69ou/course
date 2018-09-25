<?php

class FtLecturer extends \Phalcon\Mvc\Model
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
     * @var string
     * @Column(column="name", type="string", length=50, nullable=false)
     */
    public $name;

    /**
     *
     * @var string
     * @Column(column="avatar", type="string", nullable=true)
     */
    public $avatar;

    /**
     *
     * @var string
     * @Column(column="introduce", type="string", nullable=false)
     */
    public $introduce;

    /**
     *
     * @var integer
     * @Column(column="subject", type="integer", length=10, nullable=false)
     */
    public $subject;

    /**
     *
     * @var string
     * @Column(column="url", type="string", nullable=true)
     */
    public $url;

    /**
     *
     * @var integer
     * @Column(column="displayorder", type="integer", length=10, nullable=false)
     */
    public $displayorder;

    /**
     *
     * @var integer
     * @Column(column="inputtime", type="integer", length=10, nullable=false)
     */
    public $inputtime;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("week");
        $this->setSource("ft_lecturer");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'ft_lecturer';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return FtLecturer[]|FtLecturer|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return FtLecturer|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}

<?php

class FtSeriesCourse extends \Phalcon\Mvc\Model
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
     * @var string
     * @Column(column="name", type="string", length=255, nullable=false)
     */
    public $name;

    /**
     *
     * @var string
     * @Column(column="thumb", type="string", nullable=true)
     */
    public $thumb;

    /**
     *
     * @var integer
     * @Column(column="tid", type="integer", length=10, nullable=false)
     */
    public $tid;

    /**
     *
     * @var double
     * @Column(column="live_price", type="double", length=10, nullable=false)
     */
    public $live_price;

    /**
     *
     * @var double
     * @Column(column="recording_price", type="double", length=10, nullable=false)
     */
    public $recording_price;

    /**
     *
     * @var integer
     * @Column(column="course_num", type="integer", length=10, nullable=false)
     */
    public $course_num;

    /**
     *
     * @var integer
     * @Column(column="status", type="integer", length=1, nullable=false)
     */
    public $status;

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
        $this->setSource("ft_series_course");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'ft_series_course';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return FtSeriesCourse[]|FtSeriesCourse|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return FtSeriesCourse|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}

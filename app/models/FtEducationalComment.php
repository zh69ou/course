<?php

class FtEducationalComment extends \Phalcon\Mvc\Model
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
     * @var integer
     * @Column(column="edu_id", type="integer", length=10, nullable=false)
     */
    public $edu_id;

    /**
     *
     * @var string
     * @Column(column="comment", type="string", nullable=false)
     */
    public $comment;

    /**
     *
     * @var integer
     * @Column(column="inputtime", type="integer", length=10, nullable=false)
     */
    public $inputtime;

    /**
     *
     * @var integer
     * @Column(column="zan", type="integer", length=10, nullable=false)
     */
    public $zan;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("week");
        $this->setSource("ft_educational_comment");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'ft_educational_comment';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return FtEducationalComment[]|FtEducationalComment|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return FtEducationalComment|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}

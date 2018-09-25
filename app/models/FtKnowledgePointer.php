<?php

class FtKnowledgePointer extends \Phalcon\Mvc\Model
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
     * @Column(column="gradeid", type="integer", length=10, nullable=false)
     */
    public $gradeid;

    /**
     *
     * @var integer
     * @Column(column="subjectid", type="integer", length=10, nullable=false)
     */
    public $subjectid;

    /**
     *
     * @var integer
     * @Column(column="chapid", type="integer", length=10, nullable=false)
     */
    public $chapid;

    /**
     *
     * @var integer
     * @Column(column="burlid", type="integer", length=10, nullable=false)
     */
    public $burlid;

    /**
     *
     * @var integer
     * @Column(column="status", type="integer", length=1, nullable=true)
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
        $this->setSource("ft_knowledge_pointer");
        $this->belongsTo('burlid','FtBurl','id');
        $this->belongsTo('chapid','FtChapter','id');
        $this->belongsTo('gradeid','FtGrade','id');
        $this->hasMany('id','FtQuestion','point_id');
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'ft_knowledge_pointer';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return FtKnowledgePointer[]|FtKnowledgePointer|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return FtKnowledgePointer|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}

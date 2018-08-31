<?php

class FtGrade extends \Phalcon\Mvc\Model
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
     * @Column(column="name", type="string", length=30, nullable=false)
     */
    public $name;

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
        $this->setSource("ft_grade");
        $this->hasMany('id','FtClass','gradeid');
        $this->hasMany('id','FtTestPaper','gradeid');
        $this->hasMany('id','FtMemberStudent','clazz');
        $this->hasMany('id','FtKnowledgePointer','gradeid');
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'ft_grade';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return FtGrade[]|FtGrade|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return FtGrade|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}

<?php

class FtTeacherFavoriteQuestions extends \Phalcon\Mvc\Model
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
     * @var integer
     * @Column(column="tid", type="integer", length=10, nullable=true)
     */
    public $tid;

    /**
     *
     * @var integer
     * @Column(column="qid", type="integer", length=10, nullable=true)
     */
    public $qid;

    /**
     *
     * @var integer
     * @Column(column="clazzid", type="integer", length=5, nullable=true)
     */
    public $clazzid;

    /**
     *
     * @var integer
     * @Column(column="subjectid", type="integer", length=5, nullable=true)
     */
    public $subjectid;

    /**
     *
     * @var integer
     * @Column(column="chapterid", type="integer", length=5, nullable=true)
     */
    public $chapterid;

    /**
     *
     * @var integer
     * @Column(column="burlid", type="integer", length=5, nullable=true)
     */
    public $burlid;

    /**
     *
     * @var integer
     * @Column(column="point_id", type="integer", length=5, nullable=false)
     */
    public $point_id;

    /**
     *
     * @var integer
     * @Column(column="type", type="integer", length=1, nullable=true)
     */
    public $type;

    /**
     *
     * @var integer
     * @Column(column="math_ability", type="integer", length=1, nullable=true)
     */
    public $math_ability;

    /**
     *
     * @var integer
     * @Column(column="term", type="integer", length=1, nullable=true)
     */
    public $term;

    /**
     *
     * @var integer
     * @Column(column="stars", type="integer", length=1, nullable=true)
     */
    public $stars;

    /**
     *
     * @var integer
     * @Column(column="level", type="integer", length=2, nullable=true)
     */
    public $level;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("week");
        $this->setSource("ft_teacher_favorite_questions");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'ft_teacher_favorite_questions';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return FtTeacherFavoriteQuestions[]|FtTeacherFavoriteQuestions|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return FtTeacherFavoriteQuestions|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}

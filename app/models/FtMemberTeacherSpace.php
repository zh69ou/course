<?php

class FtMemberTeacherSpace extends \Phalcon\Mvc\Model
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
     * @Column(column="video", type="string", nullable=true)
     */
    public $video;

    /**
     *
     * @var string
     * @Column(column="name", type="string", length=100, nullable=true)
     */
    public $name;

    /**
     *
     * @var string
     * @Column(column="pet_phrase", type="string", length=255, nullable=true)
     */
    public $pet_phrase;

    /**
     *
     * @var string
     * @Column(column="profile", type="string", nullable=true)
     */
    public $profile;

    /**
     *
     * @var string
     * @Column(column="photo", type="string", nullable=true)
     */
    public $photo;

    /**
     *
     * @var string
     * @Column(column="background", type="string", length=255, nullable=true)
     */
    public $background;

    /**
     *
     * @var string
     * @Column(column="story_title", type="string", length=255, nullable=true)
     */
    public $story_title;

    /**
     *
     * @var string
     * @Column(column="story_title_english", type="string", length=255, nullable=true)
     */
    public $story_title_english;

    /**
     *
     * @var string
     * @Column(column="story_content", type="string", nullable=true)
     */
    public $story_content;

    /**
     *
     * @var string
     * @Column(column="story_img", type="string", length=255, nullable=true)
     */
    public $story_img;

    /**
     *
     * @var string
     * @Column(column="content", type="string", nullable=true)
     */
    public $content;

    /**
     *
     * @var string
     * @Column(column="student_evaluate", type="string", nullable=true)
     */
    public $student_evaluate;

    /**
     *
     * @var string
     * @Column(column="feedback_background", type="string", length=255, nullable=true)
     */
    public $feedback_background;

    /**
     *
     * @var string
     * @Column(column="feedback", type="string", nullable=true)
     */
    public $feedback;

    /**
     *
     * @var string
     * @Column(column="work_photo", type="string", length=255, nullable=true)
     */
    public $work_photo;

    /**
     *
     * @var integer
     * @Column(column="inputtime", type="integer", length=10, nullable=true)
     */
    public $inputtime;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("week");
        $this->setSource("ft_member_teacher_space");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'ft_member_teacher_space';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return FtMemberTeacherSpace[]|FtMemberTeacherSpace|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return FtMemberTeacherSpace|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}

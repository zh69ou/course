<?php

use Phalcon\Validation;
use Phalcon\Validation\Validator\Email as EmailValidator;

class FtMemberTeacherForm extends \Phalcon\Mvc\Model
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
     * @Column(column="name", type="string", length=30, nullable=false)
     */
    public $name;

    /**
     *
     * @var integer
     * @Column(column="sex", type="integer", length=1, nullable=false)
     */
    public $sex;

    /**
     *
     * @var integer
     * @Column(column="birth", type="integer", length=10, nullable=true)
     */
    public $birth;

    /**
     *
     * @var integer
     * @Column(column="study", type="integer", length=10, nullable=true)
     */
    public $study;

    /**
     *
     * @var string
     * @Column(column="school", type="string", length=50, nullable=true)
     */
    public $school;

    /**
     *
     * @var integer
     * @Column(column="subject", type="integer", length=10, nullable=true)
     */
    public $subject;

    /**
     *
     * @var string
     * @Column(column="title", type="string", length=255, nullable=true)
     */
    public $title;

    /**
     *
     * @var string
     * @Column(column="title_number", type="string", length=255, nullable=true)
     */
    public $title_number;

    /**
     *
     * @var string
     * @Column(column="title_photo", type="string", nullable=true)
     */
    public $title_photo;

    /**
     *
     * @var string
     * @Column(column="register_photo", type="string", nullable=true)
     */
    public $register_photo;

    /**
     *
     * @var string
     * @Column(column="email", type="string", length=30, nullable=true)
     */
    public $email;

    /**
     *
     * @var string
     * @Column(column="phone", type="string", length=30, nullable=false)
     */
    public $phone;

    /**
     *
     * @var string
     * @Column(column="label", type="string", nullable=false)
     */
    public $label;

    /**
     *
     * @var string
     * @Column(column="display", type="string", nullable=true)
     */
    public $display;

    /**
     *
     * @var string
     * @Column(column="id_number", type="string", length=50, nullable=false)
     */
    public $id_number;

    /**
     *
     * @var string
     * @Column(column="id_zphoto", type="string", nullable=false)
     */
    public $id_zphoto;

    /**
     *
     * @var string
     * @Column(column="id_fphoto", type="string", nullable=false)
     */
    public $id_fphoto;

    /**
     *
     * @var string
     * @Column(column="certificate", type="string", nullable=false)
     */
    public $certificate;

    /**
     *
     * @var integer
     * @Column(column="edu_id", type="integer", length=10, nullable=false)
     */
    public $edu_id;

    /**
     *
     * @var integer
     * @Column(column="teach_age", type="integer", length=10, nullable=true)
     */
    public $teach_age;

    /**
     *
     * @var string
     * @Column(column="experience", type="string", nullable=false)
     */
    public $experience;

    /**
     *
     * @var string
     * @Column(column="reward", type="string", nullable=true)
     */
    public $reward;

    /**
     *
     * @var integer
     * @Column(column="edu_status", type="integer", length=10, nullable=false)
     */
    public $edu_status;

    /**
     *
     * @var string
     * @Column(column="edu_note", type="string", nullable=true)
     */
    public $edu_note;

    /**
     *
     * @var integer
     * @Column(column="audit_status", type="integer", length=1, nullable=false)
     */
    public $audit_status;

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
     * @var string
     * @Column(column="note", type="string", nullable=true)
     */
    public $note;

    /**
     * Validations and business logic
     *
     * @return boolean
     */
    public function validation()
    {
        $validator = new Validation();

        $validator->add(
            'email',
            new EmailValidator(
                [
                    'model'   => $this,
                    'message' => 'Please enter a correct email address',
                ]
            )
        );

        return $this->validate($validator);
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("week");
        $this->setSource("ft_member_teacher_form");
        $this->belongsTo('uid','FtMemberTeacher','uid');
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'ft_member_teacher_form';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return FtMemberTeacherForm[]|FtMemberTeacherForm|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return FtMemberTeacherForm|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}

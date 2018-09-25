<?php

class FtMemberEducationalForm extends \Phalcon\Mvc\Model
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
     * @Column(column="display", type="string", nullable=true)
     */
    public $display;

    /**
     *
     * @var string
     * @Column(column="phone", type="string", length=30, nullable=false)
     */
    public $phone;

    /**
     *
     * @var string
     * @Column(column="license_id", type="string", length=100, nullable=false)
     */
    public $license_id;

    /**
     *
     * @var string
     * @Column(column="license_photo", type="string", nullable=false)
     */
    public $license_photo;

    /**
     *
     * @var string
     * @Column(column="area", type="string", length=100, nullable=false)
     */
    public $area;

    /**
     *
     * @var string
     * @Column(column="business", type="string", nullable=false)
     */
    public $business;

    /**
     *
     * @var string
     * @Column(column="permit_photo", type="string", nullable=false)
     */
    public $permit_photo;

    /**
     *
     * @var string
     * @Column(column="legal", type="string", length=30, nullable=false)
     */
    public $legal;

    /**
     *
     * @var string
     * @Column(column="legal_phone", type="string", length=30, nullable=false)
     */
    public $legal_phone;

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
     * @Column(column="account_name", type="string", length=50, nullable=false)
     */
    public $account_name;

    /**
     *
     * @var string
     * @Column(column="account", type="string", length=50, nullable=false)
     */
    public $account;

    /**
     *
     * @var string
     * @Column(column="account_area", type="string", length=50, nullable=false)
     */
    public $account_area;

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
     * @var string
     * @Column(column="note", type="string", nullable=true)
     */
    public $note;

    /**
     *
     * @var integer
     * @Column(column="updatetime", type="integer", length=10, nullable=false)
     */
    public $updatetime;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("week");
        $this->setSource("ft_member_educational_form");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'ft_member_educational_form';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return FtMemberEducationalForm[]|FtMemberEducationalForm|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return FtMemberEducationalForm|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}

<?php

use Phalcon\Validation;
use Phalcon\Validation\Validator\Email as EmailValidator;

class ZlAdmin extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var string
     */
    public $name;

    /**
     *
     * @var string
     */
    public $psw;

    /**
     *
     * @var string
     */
    public $pswcode;

    /**
     *
     * @var integer
     */
    public $type;

    /**
     *
     * @var string
     */
    public $himg;

    /**
     *
     * @var string
     */
    public $phone;

    /**
     *
     * @var string
     */
    public $email;

    /**
     *
     * @var string
     */
    public $power;

    /**
     *
     * @var integer
     */
    public $addtime;

    /**
     *
     * @var integer
     */
    public $status;

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
        $this->setSource("zl_admin");
        $this->hasMany('id','ZlAdminLog','aid');
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'zl_admin';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return ZlAdmin[]|ZlAdmin|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return ZlAdmin|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    public function beforeSave()
    {
        $this->power = json_encode($this->power);
    }

    public function afterFetch()
    {
        $this->power = json_decode($this->power);
    }

}

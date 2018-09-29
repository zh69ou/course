<?php

class FtClass extends \Phalcon\Mvc\Model
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
     * @Column(column="title", type="string", length=255, nullable=false)
     */
    public $title;

    /**
     *
     * @var integer
     * @Column(column="catid", type="integer", length=10, nullable=true)
     */
    public $catid;

    /**
     *
     * @var string
     * @Column(column="thumb", type="string", nullable=true)
     */
    public $thumb;

    /**
     *
     * @var integer
     * @Column(column="subjectid", type="integer", length=10, nullable=true)
     */
    public $subjectid;

    /**
     *
     * @var integer
     * @Column(column="areaid", type="integer", length=10, nullable=true)
     */
    public $areaid;

    /**
     *
     * @var integer
     * @Column(column="gradeid", type="integer", length=10, nullable=true)
     */
    public $gradeid;

    /**
     *
     * @var integer
     * @Column(column="edu_id", type="integer", length=10, nullable=false)
     */
    public $edu_id;

    /**
     *
     * @var string
     * @Column(column="vid", type="string", nullable=true)
     */
    public $vid;


    /**
     *
     * @var string
     * @Column(column="url", type="string", nullable=true)
     */
    public $url;

    /**
     *
     * @var integer
     * @Column(column="starttime", type="integer", length=10, nullable=false)
     */
    public $starttime;

    /**
     *
     * @var integer
     * @Column(column="endtime", type="integer", length=10, nullable=false)
     */
    public $endtime;

    /**
     *
     * @var string
     * @Column(column="classfile", type="string", nullable=true)
     */
    public $classfile;

    /**
     *
     * @var string
     * @Column(column="teachfile", type="string", nullable=true)
     */
    public $teachfile;

    /**
     *
     * @var double
     * @Column(column="play_price", type="double", length=10, nullable=false)
     */
    public $play_price;

    /**
     *
     * @var double
     * @Column(column="playback_price", type="double", length=10, nullable=true)
     */
    public $playback_price;

    /**
     *
     * @var string
     * @Column(column="introduce", type="string", nullable=true)
     */
    public $introduce;

    /**
     *
     * @var integer
     * @Column(column="type", type="integer", length=1, nullable=true)
     */
    public $type;

    /**
     *
     * @var integer
     * @Column(column="play_status", type="integer", length=1, nullable=true)
     */
    public $play_status;

    /**
     *
     * @var integer
     * @Column(column="edu_status", type="integer", length=1, nullable=true)
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
     * @var string
     * @Column(column="note", type="string", nullable=true)
     */
    public $note;

    /**
     *
     * @var integer
     * @Column(column="hot_status", type="integer", length=1, nullable=true)
     */
    public $hot_status;

    /**
     *
     * @var string
     * @Column(column="series", type="string", length=10, nullable=true)
     */
    public $series;

    /**
     *
     * @var integer
     * @Column(column="displayorder", type="integer", length=10, nullable=true)
     */
    public $displayorder;

    /**
     *
     * @var integer
     * @Column(column="inputtime", type="integer", length=10, nullable=true)
     */
    public $inputtime;

    /**
     *
     * @var integer
     * @Column(column="updatetime", type="integer", length=10, nullable=true)
     */
    public $updatetime;

    /**
     *
     * @var string
     * @Column(column="live_url", type="string", nullable=true)
     */
    public $live_url;

    /**
     *
     * @var string
     * @Column(column="playsize", type="string", length=20, nullable=true)
     */
    public $playsize;

    /**
     *
     * @var integer
     * @Column(column="buy_num", type="integer", length=10, nullable=true)
     */
    public $buy_num;

    /**
     *
     * @var integer
     * @Column(column="play_num", type="integer", length=10, nullable=true)
     */
    public $play_num;

    /**
     *
     * @var integer
     * @Column(column="del_status", type="integer", length=1, nullable=true)
     */
    public $del_status;

    /**
     *
     * @var string
     * @Column(column="stime", type="string", length=50, nullable=true)
     */
    public $stime;

    /**
     *
     * @var string
     * @Column(column="etime", type="string", length=50, nullable=true)
     */
    public $etime;

    /**
     *
     * @var integer
     * @Column(column="term", type="integer", length=1, nullable=true)
     */
    public $term;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("week");
        $this->setSource("ft_class");
        $this->belongsTo('gradeid','FtGrade','id');
        $this->belongsTo('uid','FtMemberTeacher','uid');
        $this->hasMany('id','FtFavoriteClass','cid');
        $this->hasMany('id','FtLookLog','cid');
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'ft_class';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return FtClass[]|FtClass|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return FtClass|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}

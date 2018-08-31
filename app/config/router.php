<?php

$router = $di->getRouter(false);

// 首页
$router->addGet('/',
    [
        'controller' => 'index',
        'action'     => 'index',
        'adlogin'    => 'is',
        'name'       => 'adindex'
    ]
);

// 后台登录
$router->add('/api/login',
    [
        'controller' => 'index',
        'action'     => 'login'
    ]
);

// 后台退出
$router->add('/api/logout',
    [
        'controller' => 'index',
        'action'     => 'logout',
        'adlogin'    => 'is'
    ]
);

// 个人中心
$router->addGet('/api/myinfo',
    [
        'controller' => 'index',
        'action'     => 'myinfo',
        'adlogin'    => 'is',
        'name'       => 'admyinfo'
    ]
);

// 数据统计总汇
$router->addGet('/api/statistics',
    [
        'controller' => 'index',
        'action'     => 'statistics',
        'adlogin'    => 'is',
        'power'      => 'adstatistics',
        'name'       => 'adstatistics'
    ]
);

// 用户访问网站路径统计
$router->addPost('/api/statistics/accesspath',
    [
        'controller' => 'index',
        'action'     => 'accesspath',
        'adlogin'    => 'is',
        'power'      => 'adstatistics'
    ]
);

// 用户访问浏览器统计
$router->addPost('/api/statistics/browser',
    [
        'controller' => 'index',
        'action'     => 'browser',
        'adlogin'    => 'is',
        'power'      => 'adstatistics'
    ]
);

// 用户访问浏览器统计
$router->addPost('/api/statistics/plate',
    [
        'controller' => 'index',
        'action'     => 'plate',
        'adlogin'    => 'is',
        'power'      => 'adstatistics'
    ]
);

// 每日用户增量统计
$router->addPost('/api/statistics/addnum',
    [
        'controller' => 'index',
        'action'     => 'addnum',
        'adlogin'    => 'is',
        'power'      => 'adstatistics'
    ]
);

// 登录时间统计
$router->addPost('/api/statistics/landtime',
    [
        'controller' => 'index',
        'action'     => 'landtime',
        'adlogin'    => 'is',
        'power'      => 'adstatistics'
    ]
);

// 每个时间段视频播放量统计
$router->addPost('/api/statistics/datevedio',
    [
        'controller' => 'index',
        'action'     => 'datevedio',
        'adlogin'    => 'is',
        'power'      => 'adstatistics'
    ]
);

// 每个段视频播放时间统计
$router->addPost('/statistics/datevedio/:int',
    [
        'controller' => 'index',
        'action'     => 'datevedioinfo',
        'adlogin'    => 'is',
        'id'         => 1,
        'power'      => 'adstatistics'
    ]
);

// 每个时间段视频播放量统计
$router->addPost('/api/statistics/dayvedio',
    [
        'controller' => 'index',
        'action'     => 'dayvedio',
        'adlogin'    => 'is',
        'power'      => 'adstatistics'
    ]
);

// 每个视频拖拽量统计
$router->addPost('/api/statistics/jumpvedio/:int',
    [
        'controller' => 'index',
        'action'     => 'jumpvedio',
        'adlogin'    => 'is',
        'id'         => 1,
        'power'      => 'adstatistics'
    ]
);

// 每个视频每个年级播放量统计
$router->addPost('/api/statistics/gradevedio/:int',
    [
        'controller' => 'index',
        'action'     => 'gradevedio',
        'adlogin'    => 'is',
        'id'         => 1,
        'power'      => 'adstatistics'
    ]
);

// 视频播放列表
$router->addPost('/api/playvediolist',
    [
        'controller' => 'index',
        'action'     => 'playvediolist',
        'adlogin'    => 'is',
        'power'      => 'playvediolist'
    ]
);

// 视频数据统计
$router->addGet('/api/statistics/vedio',
    [
        'controller' => 'index',
        'action'     => 'statisticsvedio',
        'adlogin'    => 'is',
        'power'      => 'adstatistics',
        'name'       => 'adstatisticsvedio'
    ]
);

// 视频数据统计
$router->addGet('/api/statistics/vedio/:int',
    [
        'controller' => 'index',
        'action'     => 'statisticsvedioinfo',
        'adlogin'    => 'is',
        'power'      => 'adstatistics',
        'id'         => 1,
        'name'       => 'adstatisticsvedioinfo'
    ]
);

// 个人登录时间统计
$router->addPost('/api/statistics/userland/:int',
    [
        'controller' => 'index',
        'action'     => 'userland',
        'adlogin'    => 'is',
        'power'      => 'adstatistics',
        'id'         => 1
    ]
);

// 用户观看时间统计
$router->addPost('/api/statistics/userview/:int',
    [
        'controller' => 'index',
        'action'     => 'userview',
        'adlogin'    => 'is',
        'power'      => 'adstatistics',
        'id'         => 1
    ]
);

// 获取账户列表
$router->addPost('/api/userlist',
    [
        'controller' => 'user',
        'action'     => 'userlist',
        'adlogin'    => 'is',
        'name'       => 'adulist'
    ]
);

// 获取账户信息

$router->add('/api/userlist/:int',
    [
        'controller' => 'user',
        'action'     => 'userinfo',
        'adlogin'    => 'is',
        'name'       => 'adulist'
    ]
);

// 教师列表
$router->addGet('/api/userlist/teacher',
    [
        'controller' => 'user',
        'action'     => 'teacher',
        'adlogin'    => 'is',
        'power'      => 'adulistteacher',
        'name'       => 'adulistteacher'
    ]
);

// 教师编辑
$router->addGet('/api/userinfo/teacher/:int',
    [
        'controller' => 'user',
        'action'     => 'info',
        'adlogin'    => 'is',
        'power'      => 'aduinfoteacher',
        'id'         => 1,
        'name'       => 'adulistteacher'
    ]
);

// 机构列表
$router->addGet('/api/userlist/organ',
    [
        'controller' => 'user',
        'action'     => 'organ',
        'adlogin'    => 'is',
        'power'      => 'adulistorgan',
        'name'       => 'adulistorgan'
    ]
);

// 机构编辑
$router->addGet('/api/userinfo/organ/:int',
    [
        'controller' => 'user',
        'action'     => 'info',
        'adlogin'    => 'is',
        'power'      => 'aduinfoorgan',
        'id'         => 1,
        'name'       => 'adulistorgan'
    ]
);

// 教学管家
$router->addGet('/api/userlist/steward',
    [
        'controller' => 'user',
        'action'     => 'steward',
        'adlogin'    => 'is',
        'power'      => 'aduliststeward',
        'name'       => 'aduliststeward'
    ]
);

// 教学管家编辑
$router->addGet('/api/userinfo/steward/:int',
    [
        'controller' => 'user',
        'action'     => 'info',
        'adlogin'    => 'is',
        'power'      => 'aduinfosteward',
        'id'         => 1,
        'name'       => 'aduliststeward'
    ]
);

// 用户列表
$router->addGet('/api/userlist/student',
    [
        'controller' => 'user',
        'action'     => 'student',
        'adlogin'    => 'is',
        'power'      => 'aduliststudent',
        'name'       => 'aduliststudent'
    ]
);

// 用户编辑
$router->addGet('/api/userinfo/student/:int',
    [
        'controller' => 'user',
        'action'     => 'info',
        'adlogin'    => 'is',
        'power'      => 'aduinfostudent',
        'id'         => 1,
        'name'       => 'aduliststudent'
    ]
);

// 管理员列表
$router->addGet('/api/userlist/manage',
    [
        'controller' => 'user',
        'action'     => 'manage',
        'adlogin'    => 'is',
        'power'      => 'adulistmanage',
        'name'       => 'adulistmanage'
    ]
);

// 管理员日志
$router->addPost('/api/adminlog',
    [
        'controller' => 'user',
        'action'     => 'adminlog',
        'adlogin'    => 'is',
        'power'      => 'adulistmanage',
        'name'       => 'adulistmanage'
    ]
);

// 用户编辑
$router->addGet('/api/userinfo/manage/:int',
    [
        'controller' => 'user',
        'action'     => 'manageinfo',
        'adlogin'    => 'is',
        'power'      => 'aduinfomanage',
        'id'         => 1,
        'name'       => 'adulistmanage'
    ]
);

// 账户操作日志
$router->addGet('/api/useractlog',
    [
        'controller' => 'user',
        'action'     => 'actlog',
        'adlogin'    => 'is',
        'power'      => 'aduseractlog',
        'name'       => 'aduseractlog'
    ]
);

// 兑换码管理
$router->addGet('/api/redeemcode',
    [
        'controller' => 'activity',
        'action'     => 'redeemcode',
        'adlogin'    => 'is',
        'power'      => 'adredeemcode',
        'name'       => 'adredeemcode'
    ]
);

// 优惠劵管理
$router->addGet('/api/couponcode',
    [
        'controller' => 'activity',
        'action'     => 'couponcode',
        'adlogin'    => 'is',
        'power'      => 'adcouponcode',
        'name'       => 'adcouponcode'
    ]
);


// 优惠劵管理
$router->addGet('/api/redeemcode',
    [
        'controller' => 'activity',
        'action'     => 'redeemcodelist',
        'adlogin'    => 'is',
        'power'      => 'adredeemcode',
        'name'       => 'adredeemcode'
    ]
);

// 添加优惠劵
$router->addPost('/api/redeemcode/add',
    [
        'controller' => 'activity',
        'action'     => 'redeemcodeadd',
        'adlogin'    => 'is',
        'power'      => 'adredeemcode',
        'name'       => 'adredeemcode'
    ]
);

// 删除优惠劵
$router->addPost('/api/redeemcode/del',
    [
        'controller' => 'activity',
        'action'     => 'redeemcodedel',
        'adlogin'    => 'is',
        'power'      => 'adredeemcode'
    ]
);

// 试题章
$router->addGet('/api/testtype/chapter',
    [
        'controller' => 'test',
        'action'     => 'chapter',
        'adlogin'    => 'is',
        'power'      => 'adtestchapter',
        'name'       => 'adtestchapter'
    ]
);

// 获取试题章/节
$router->addPost('/api/testtypedata',
    [
        'controller' => 'test',
        'action'     => 'testtypedata',
        'adlogin'    => 'is',
        'power'      => 'adtestchapter',
        'name'       => 'adtestchapter'
    ]
);

// 获取试题章/节详细
$router->addPost('/api/testtypedata/info',
    [
        'controller' => 'test',
        'action'     => 'testtypeinfo',
        'adlogin'    => 'is',
        'power'      => 'adtestchapter',
        'name'       => 'adtestchapter'
    ]
);

// 添加试题章/节详细
$router->addPost('/api/testtypedata/add',
    [
        'controller' => 'test',
        'action'     => 'testtypeadd',
        'adlogin'    => 'is',
        'power'      => 'adtestchapter',
        'name'       => 'adtestchapter'
    ]
);

// 编辑试题章/节详细
$router->addPost('/api/testtypedata/edit',
    [
        'controller' => 'test',
        'action'     => 'testtypeedit',
        'adlogin'    => 'is',
        'power'      => 'adtestchapter',
        'name'       => 'adtestchapter'
    ]
);

// 删除试题章/节详细
$router->addPost('/api/testtypedata/del',
    [
        'controller' => 'test',
        'action'     => 'testtypedel',
        'adlogin'    => 'is',
        'power'      => 'adtestchapter',
        'name'       => 'adtestchapter'
    ]
);

// 获取年级
$router->addPost('/api/gradedata',
    [
        'controller' => 'test',
        'action'     => 'gradedata',
        'adlogin'    => 'is'
    ]
);

// 获取试题类型
$router->addPost('/api/testtype',
    [
        'controller' => 'test',
        'action'     => 'testtype',
        'adlogin'    => 'is'
    ]
);

// 试题章
$router->addGet('/api/testtype/chapter/:int',
    [
        'controller' => 'test',
        'action'     => 'chapterinfo',
        'adlogin'    => 'is',
        'power'      => 'adtestchapter',
        'id'         => 1,
        'name'       => 'adtestchapter'
    ]
);

// 试题节
$router->addGet('/api/testtype/joint',
    [
        'controller' => 'test',
        'action'     => 'joint',
        'adlogin'    => 'is',
        'power'      => 'adtestjoint',
        'name'       => 'adtestjoint'
    ]
);

// 试题节
$router->addGet('/api/testtype/joint/:int',
    [
        'controller' => 'test',
        'action'     => 'jointinfo',
        'adlogin'    => 'is',
        'power'      => 'adtestjoint',
        'id'         => 1,
        'name'       => 'adtestjoint'
    ]
);

// 试题知识点
$router->addGet('/api/testtype/knowledge',
    [
        'controller' => 'test',
        'action'     => 'knowledge',
        'adlogin'    => 'is',
        'power'      => 'adtestknowledge',
        'name'       => 'adtestknowledge'
    ]
);

// 试题知识点
$router->addPost('/api/knowledgedata',
    [
        'controller' => 'test',
        'action'     => 'knowledgedata',
        'adlogin'    => 'is'
    ]
);

$router->addGet('/api/testtype/knowledge/:int',
    [
        'controller' => 'test',
        'action'     => 'knowledgeinfo',
        'adlogin'    => 'is',
        'power'      => 'adtestknowledge',
        'id'         => 1,
        'name'       => 'adtestknowledge'
    ]
);

// 试卷管理
$router->addGet('/api/testpaper',
    [
        'controller' => 'test',
        'action'     => 'testpaper',
        'adlogin'    => 'is',
        'power'      => 'adtestpaper',
        'name'       => 'adtestpaper'
    ]
);

// 试卷列表数据
$router->addPost('/api/testdata',
    [
        'controller' => 'test',
        'action'     => 'testdata',
        'adlogin'    => 'is',
        'power'      => 'adtestpaper'
    ]
);

// 试卷信息数据
$router->addPost('/api/testinfodata/:int',
    [
        'controller' => 'test',
        'action'     => 'testinfodata',
        'adlogin'    => 'is',
        'id'    => 1,
        'power'      => 'adtestpaper'
    ]
);

// 试卷信息编辑
$router->addPost('/api/testinfoedit/:int',
    [
        'controller' => 'test',
        'action'     => 'testinfoedit',
        'adlogin'    => 'is',
        'id'    => 1,
        'power'      => 'adtestpaper'
    ]
);

// 试卷信息删除
$router->addPost('/api/testinfodel/:int',
    [
        'controller' => 'test',
        'action'     => 'testinfodel',
        'adlogin'    => 'is',
        'id'    => 1,
        'power'      => 'adtestpaper'
    ]
);

// 试卷答题列表
$router->addPost('/api/usetest/:int',
    [
        'controller' => 'test',
        'action'     => 'usetest',
        'adlogin'    => 'is',
        'id'    => 1,
        'power'      => 'adtestpaper'
    ]
);

// 试卷编辑
$router->addGet('/api/testpaper/:int',
    [
        'controller' => 'test',
        'action'     => 'testpaperinfo',
        'adlogin'    => 'is',
        'power'      => 'adtestpaper',
        'id'         => 1,
        'name'       => 'adtestpaper'
    ]
);

// 试题管理
$router->addGet('/api/testlist',
    [
        'controller' => 'test',
        'action'     => 'testlist',
        'adlogin'    => 'is',
        'power'      => 'adtestlist',
        'name'       => 'adtestlist'
    ]
);

// 试题列表
$router->addPost('/api/questions',
    [
        'controller' => 'test',
        'action'     => 'questions',
        'adlogin'    => 'is',
        'power'      => 'adtestlist'
    ]
);

// 试题详细
$router->addPost('/api/questions/:int',
    [
        'controller' => 'test',
        'action'     => 'questionsinfo',
        'adlogin'    => 'is',
        'id'    => 1,
        'power'      => 'adtestlist'
    ]
);

// 试题详细编辑
$router->addPost('/api/questions/edit/:int',
    [
        'controller' => 'test',
        'action'     => 'questionsedit',
        'adlogin'    => 'is',
        'id'    => 1,
        'power'      => 'adtestlist'
    ]
);

// 添加试题
$router->addPost('/api/questions/add',
    [
        'controller' => 'test',
        'action'     => 'questionsadd',
        'adlogin'    => 'is',
        'id'    => 1,
        'power'      => 'adtestlist'
    ]
);

// 错误试题
$router->addPost('/api/errorquestions',
    [
        'controller' => 'test',
        'action'     => 'errorquestions',
        'adlogin'    => 'is',
        'power'      => 'adtestlist'
    ]
);

// 个人试题列表
$router->addPost('/api/usertest',
    [
        'controller' => 'test',
        'action'     => 'usertest',
        'adlogin'    => 'is',
        'power'      => 'adtestlist',
        'name'       => 'adtestlist'
    ]
);

// 试题编辑
$router->addGet('/api/testlist/:int',
    [
        'controller' => 'test',
        'action'     => 'testlistinfo',
        'adlogin'    => 'is',
        'power'      => 'adtestlist',
        'id'         => 1,
        'name'       => 'adtestlistinfo'
    ]
);

// 试题纠错
$router->addGet('/api/testrecovery',
    [
        'controller' => 'test',
        'action'     => 'testrecovery',
        'adlogin'    => 'is',
        'power'      => 'adtestrecovery',
        'name'       => 'adtestrecovery'
    ]
);

// 课程管理
$router->addGet('/api/course',
    [
        'controller' => 'test',
        'action'     => 'course',
        'adlogin'    => 'is',
        'power'      => 'adcourse',
        'name'       => 'adcourse'
    ]
);

// 课程管理
$router->addPost('/api/coursedata',
    [
        'controller' => 'test',
        'action'     => 'coursedata',
        'adlogin'    => 'is',
        'power'      => 'adcourse',
        'name'       => 'adcourse'
    ]
);

// 课程编辑
$router->addGet('/api/course/:int',
    [
        'controller' => 'test',
        'action'     => 'courseinfo',
        'adlogin'    => 'is',
        'power'      => 'adcourse',
        'id'         => 1,
        'name'       => 'adcourseinfo'
    ]
);

// 课程详情信息
$router->addPost('/api/course/:int',
    [
        'controller' => 'test',
        'action'     => 'courseinfodata',
        'adlogin'    => 'is',
        'power'      => 'adcourse',
        'id'         => 1
    ]
);

// 课程详情编辑提交
$router->addPost('/api/course/edit/:int',
    [
        'controller' => 'test',
        'action'     => 'courseedit',
        'adlogin'    => 'is',
        'power'      => 'adcourse',
        'id'         => 1
    ]
);

// 课程详情添加提交
$router->addPost('/api/course/add',
    [
        'controller' => 'test',
        'action'     => 'courseadd',
        'adlogin'    => 'is',
        'power'      => 'adcourse'
    ]
);

// 课程详情删除
$router->addPost('/api/course/del/:int',
    [
        'controller' => 'test',
        'action'     => 'coursedel',
        'id'         => 1,
        'adlogin'    => 'is',
        'power'      => 'adcourse'
    ]
);

// banner
$router->addGet('/api/banner',
    [
        'controller' => 'index',
        'action'     => 'banner',
        'adlogin'    => 'is',
        'power'      => 'adbanner',
        'name'       => 'adbanner'
    ]
);

// banner
$router->addGet('/api/banner/:int',
    [
        'controller' => 'index',
        'action'     => 'bannerinfo',
        'adlogin'    => 'is',
        'power'      => 'adbanner',
        'id'         => 1,
        'name'       => 'adbannerinfo'
    ]
);

// 老师管理
$router->addGet('/api/absteacher',
    [
        'controller' => 'user',
        'action'     => 'absteacher',
        'adlogin'    => 'is',
        'power'      => 'adteacher',
        'name'       => 'adteacher'
    ]
);

// 老师编辑
$router->addGet('/api/absteacher/:int',
    [
        'controller' => 'user',
        'action'     => 'absteacherinfo',
        'adlogin'    => 'is',
        'power'      => 'adteacher',
        'id'         => 1,
        'name'       => 'adteacherinfo'
    ]
);

// 评论管理
$router->addGet('/api/comment',
    [
        'controller' => 'user',
        'action'     => 'comment',
        'adlogin'    => 'is',
        'power'      => 'adcomment',
        'name'       => 'adcomment'
    ]
);

// 资金vip管理
$router->addGet('/api/fund/vip',
    [
        'controller' => 'user',
        'action'     => 'fundvip',
        'adlogin'    => 'is',
        'power'      => 'adfund',
        'name'       => 'adfunvip'
    ]
);

// 资金数据管理
$router->addPost('/api/fund/list',
    [
        'controller' => 'user',
        'action'     => 'fundlist',
        'adlogin'    => 'is',
        'power'      => 'adfund'
    ]
);

// 资金退款数据管理
$router->addPost('/api/priceback',
    [
        'controller' => 'user',
        'action'     => 'priceback',
        'adlogin'    => 'is',
        'power'      => 'adfund'
    ]
);

// 资金退款申请
$router->addPost('/api/pricedata/back/:int',
    [
        'controller' => 'user',
        'action'     => 'pricedataback',
        'adlogin'    => 'is',
        'power'      => 'adfund'
    ]
);

// 资金课程管理
$router->addGet('/api/fund/class',
    [
        'controller' => 'user',
        'action'     => 'fundclass',
        'adlogin'    => 'is',
        'power'      => 'adfund',
        'name'       => ''
    ]
);

// 退款管理
$router->addGet('/api/refund',
    [
        'controller' => 'user',
        'action'     => 'refund',
        'adlogin'    => 'is',
        'power'      => 'adrefund',
        'name'       => 'adrefund'
    ]
);

// 系统设置
$router->addGet('/api/sysset',
    [
        'controller' => 'index',
        'action'     => 'sysset',
        'adlogin'    => 'is',
        'power'      => 'adsysset',
        'name'       => 'adsysset'
    ]
);

// 系统设置数据获取提交
$router->addPost('/api/syssetdata',
    [
        'controller' => 'index',
        'action'     => 'syssetdata',
        'adlogin'    => 'is',
        'power'      => 'adsysset'
    ]
);

// 活动管理
$router->addGet('/api/api/activity',
    [
        'controller' => 'activity',
        'action'     => 'activity',
        'adlogin'    => 'is',
        'power'      => 'adactivity',
        'name'       => 'adactivity'
    ]
);

// 活动管理
$router->addGet('/api/activitydata',
    [
        'controller' => 'activity',
        'action'     => 'activitydata',
        'adlogin'    => 'is',
        'power'      => 'adactivity'
    ]
);

// 活动编辑管理
$router->addGet('/api/activity/edit/:int',
    [
        'controller' => 'activity',
        'action'     => 'activityedit',
        'adlogin'    => 'is',
        'id'    => 1,
        'power'      => 'adactivity'
    ]
);

// 活动删除管理
$router->addGet('/api/activity/del/:int',
    [
        'controller' => 'activity',
        'action'     => 'activitydel',
        'adlogin'    => 'is',
        'id'    => 1,
        'power'      => 'adactivity'
    ]
);

// 活动添加管理
$router->addGet('/api/activity/add',
    [
        'controller' => 'activity',
        'action'     => 'activityadd',
        'adlogin'    => 'is',
        'power'      => 'adactivity'
    ]
);

// 校区管理
$router->addGet('/api/school',
    [
        'controller' => 'test',
        'action'     => 'school',
        'adlogin'    => 'is',
        'power'      => 'adschool',
        'name'       => 'adschool'
    ]
);

// 校区管理
$router->addGet('/api/school/:int',
    [
        'controller' => 'test',
        'action'     => 'schoolinfo',
        'adlogin'    => 'is',
        'power'      => 'adschool',
        'id'         => 1,
        'name'       => 'adschoolinfo'
    ]
);

// 学区管理
$router->addGet('/api/class',
    [
        'controller' => 'test',
        'action'     => 'class',
        'adlogin'    => 'is',
        'power'      => 'adschool',
        'name'       => 'adclass'
    ]
);

// 学区管理
$router->addGet('/api/class/:int',
    [
        'controller' => 'test',
        'action'     => 'classinfo',
        'adlogin'    => 'is',
        'power'      => 'adschool',
        'id'         => 1,
        'name'       => 'adclassinfo'
    ]
);

// 添加管理员
$router->addGet('/api/badmin',
    [
        'controller' => 'index',
        'action'     => 'badmin',
        'adlogin'    => 'is',
        // 'power'      => 'adaddmanage',
        'name'       => 'adaddmanage'
    ]
);

// 获取后台左侧菜单
$router->addPost('/api/getleftmenu',
    [
        'controller' => 'index',
        'action'     => 'getleftmenu',
        'adlogin'    => 'is'
    ]
);

// 获取后台菜单
$router->addPost('/api/getheadmenu',
    [
        'controller' => 'index',
        'action'     => 'getheadmenu',
        'adlogin'    => 'is'
    ]
);

// 获取管理员个人信息
$router->addPost('/api/myinfodata',
    [
        'controller' => 'user',
        'action'     => 'myinfodata',
        'adlogin'    => 'is',
    ]
);

// 修改管理员个人信息
$router->addPost('/api/myinfodataup',
    [
        'controller' => 'user',
        'action'     => 'myinfodataup',
        'adlogin'    => 'is',
    ]
);

// 修改管理员个人密码
$router->addPost('/api/myinfopswup',
    [
        'controller' => 'user',
        'action'     => 'myinfopswup',
        'adlogin'    => 'is',
    ]
);

// 没有权限显示页面
$router->add('/api/nopower',
    [
        'controller' => 'index',
        'action'     => 'nopower'
    ]
);

// 没有链接显示页面
$router->notFound(
    [
        'controller' => 'index',
        'action'     => 'notFound'
    ]
);

$router->handle();
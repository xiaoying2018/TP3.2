<?php

return array(
	//'配置项'=>'配置值'
    'SHOW_PAGE_TRACE' => env('SHOW_PAGE_TRACE',false),
    'SITE_URL'        => env('SITE_URL'),

    /* 应用设定 */
    'APP_USE_NAMESPACE'     =>  env('APP_USE_NAMESPACE',true),    // 应用类库是否使用命名空间
    'APP_SUB_DOMAIN_DEPLOY' =>  env('APP_SUB_DOMAIN_DEPLOY',false),   // 是否开启子域名部署
    'APP_SUB_DOMAIN_RULES'  =>  str2array( env('APP_SUB_DOMAIN_RULES','') ) , // 子域名部署规则
    'APP_DOMAIN_SUFFIX'     =>  env('APP_DOMAIN_SUFFIX',''), // 域名后缀 如果是com.cn net.cn 之类的后缀必须设置
    'ACTION_SUFFIX'         =>  env('ACTION_SUFFIX',''), // 操作方法后缀
    'MULTI_MODULE'          =>  env('MULTI_MODULE',false), // 是否允许多模块 如果为false 则必须设置 DEFAULT_MODULE
    'MODULE_DENY_LIST'      =>  ['Common','Runtime'],
    'CONTROLLER_LEVEL'      =>  env('CONTROLLER_LEVEL',1),
    'APP_AUTOLOAD_LAYER'    =>  'Controller,Model', // 自动加载的应用类库层 关闭APP_USE_NAMESPACE后有效
    'APP_AUTOLOAD_PATH'     =>  '', // 自动加载的路径 关闭APP_USE_NAMESPACE后有效

    /* Cookie设置 */
    'COOKIE_EXPIRE'         =>  env('COOKIE_EXPIRE',0),       // Cookie有效期
    'COOKIE_DOMAIN'         =>  env('COOKIE_DOMAIN',''),      // Cookie有效域名
    'COOKIE_PATH'           =>  env('COOKIE_PATH','/'),     // Cookie路径
    'COOKIE_PREFIX'         =>  env('COOKIE_PREFIX',''),      // Cookie前缀 避免冲突
    'COOKIE_SECURE'         =>  env('COOKIE_SECURE',false),   // Cookie安全传输
    'COOKIE_HTTPONLY'       =>  env('COOKIE_HTTPONLY',''),      // Cookie httponly设置

    /* 默认设定 */
    'DEFAULT_M_LAYER'       =>  'Model', // 默认的模型层名称
    'DEFAULT_C_LAYER'       =>  'Controller', // 默认的控制器层名称
    'DEFAULT_V_LAYER'       =>  'View', // 默认的视图层名称
    'DEFAULT_LANG'          =>  'zh-cn', // 默认语言
    'DEFAULT_THEME'         =>  '',	// 默认模板主题名称
    'DEFAULT_MODULE'        =>  env('DEFAULT_MODULE','Home'),  // 默认模块
    'DEFAULT_CONTROLLER'    =>  env('DEFAULT_CONTROLLER','Index'), // 默认控制器名称
    'DEFAULT_ACTION'        =>  env('DEFAULT_ACTION','index'), // 默认操作名称
    'DEFAULT_CHARSET'       =>  'utf-8', // 默认输出编码
    'DEFAULT_TIMEZONE'      =>  'PRC',	// 默认时区
    'DEFAULT_AJAX_RETURN'   =>  'JSON',  // 默认AJAX 数据返回格式,可选JSON XML ...
    'DEFAULT_JSONP_HANDLER' =>  'jsonpReturn', // 默认JSONP格式返回的处理方法
    'DEFAULT_FILTER'        =>  'htmlspecialchars', // 默认参数过滤方法 用于I函数...

    /* 错误设置 */
    'ERROR_MESSAGE'         =>  env('ERROR_MESSAGE','页面错误！请稍后再试～'),//错误显示信息,非调试模式有效
    'ERROR_PAGE'            =>  env('ERROR_PAGE',''),	// 错误定向页面
    'SHOW_ERROR_MSG'        =>  env('SHOW_ERROR_MSG',false),    // 显示错误信息
    'TRACE_MAX_RECORD'      =>  env('TRACE_MAX_RECORD',100),    // 每个级别的错误信息 最大记录数

    /* 日志设置 */
    'LOG_RECORD'            =>  env('LOG_RECORD',false),   // 默认不记录日志
    'LOG_TYPE'              =>  env('LOG_TYPE','File'), // 日志记录类型 默认为文件方式
    'LOG_LEVEL'             =>  env('LOG_LEVEL','EMERG,ALERT,CRIT,ERR'),// 允许记录的日志级别
    'LOG_FILE_SIZE'         =>  env('LOG_FILE_SIZE',2097152),	// 日志文件大小限制
    'LOG_EXCEPTION_RECORD'  =>  env('LOG_EXCEPTION_RECORD',false),    // 是否记录异常信息日志

    /* SESSION设置 */
    'SESSION_AUTO_START'    =>  env('SESSION_AUTO_START',true),    // 是否自动开启Session
    'SESSION_OPTIONS'       =>  array(), // session 配置数组 支持type name id path expire domain 等参数
    'SESSION_TYPE'          =>  env('SESSION_TYPE',''), // session hander类型 默认无需设置 除非扩展了session hander驱动
    'SESSION_PREFIX'        =>  env('SESSION_PREFIX',''), // session 前缀
    //'VAR_SESSION_ID'      =>  'session_id',     //sessionID的提交变量

    /* 模板引擎设置 */
    'TMPL_PATH'             =>  env('TMPL_PATH',null),
    'TMPL_CONTENT_TYPE'     =>  'text/html', // 默认模板输出类型
    'TMPL_ACTION_ERROR'     =>  env('TMPL_ACTION_ERROR',THINK_PATH.'Tpl/dispatch_jump.tpl'), // 默认错误跳转对应的模板文件
    'TMPL_ACTION_SUCCESS'   =>  env('TMPL_ACTION_SUCCESS',THINK_PATH.'Tpl/dispatch_jump.tpl'), // 默认成功跳转对应的模板文件
    'TMPL_EXCEPTION_FILE'   =>  env('TMPL_EXCEPTION_FILE',THINK_PATH.'Tpl/think_exception.tpl'),// 异常页面的模板文件
    'TMPL_DETECT_THEME'     =>  false,       // 自动侦测模板主题
    'TMPL_TEMPLATE_SUFFIX'  =>  '.html',     // 默认模板文件后缀
    'TMPL_FILE_DEPR'        =>  env('TMPL_FILE_DEPR','/'), //模板文件CONTROLLER_NAME与ACTION_NAME之间的分割符

    // 布局设置
    'TMPL_ENGINE_TYPE'      =>  'Think',     // 默认模板引擎 以下设置仅对使用Think模板引擎有效
    'TMPL_CACHFILE_SUFFIX'  =>  env('TMPL_CACHFILE_SUFFIX','.php'),      // 默认模板缓存后缀
    'TMPL_DENY_FUNC_LIST'   =>  env('TMPL_DENY_FUNC_LIST','echo,exit'),    // 模板引擎禁用函数
    'TMPL_DENY_PHP'         =>  env('TMPL_DENY_PHP',false), // 默认模板引擎是否禁用PHP原生代码
    'TMPL_L_DELIM'          =>  '{',            // 模板引擎普通标签开始标记
    'TMPL_R_DELIM'          =>  '}',            // 模板引擎普通标签结束标记
    'TMPL_VAR_IDENTIFY'     =>  'array',     // 模板变量识别。留空自动判断,参数为'obj'则表示对象
    'TMPL_STRIP_SPACE'      =>  env('TMPL_STRIP_SPACE',true),       // 是否去除模板文件里面的html空格与换行
    'TMPL_CACHE_ON'         =>  env('TMPL_CACHE_ON'),        // 是否开启模板编译缓存,设为false则每次都会重新编译
    'TMPL_CACHE_PREFIX'     =>  '',         // 模板缓存前缀标识，可以动态改变
    'TMPL_CACHE_TIME'       =>  env('TMPL_CACHE_TIME',0),         // 模板缓存有效期 0 为永久，(以数字为值，单位:秒)
    'TMPL_LAYOUT_ITEM'      =>  '{__CONTENT__}', // 布局模板的内容替换标识
    'LAYOUT_ON'             =>  false, // 是否启用布局
    'LAYOUT_NAME'           =>  'layout', // 当前布局名称 默认为layout

    // Think模板引擎标签库相关设定
    'TAGLIB_BEGIN'          =>  '<',  // 标签库标签开始标记
    'TAGLIB_END'            =>  '>',  // 标签库标签结束标记
    'TAGLIB_LOAD'           =>  true, // 是否使用内置标签库之外的其它标签库，默认自动检测
    'TAGLIB_BUILD_IN'       =>  'cx', // 内置标签库名称(标签使用不必指定标签库名称),以逗号分隔 注意解析顺序
    'TAGLIB_PRE_LOAD'       =>  '',   // 需要额外加载的标签库(须指定标签库名称)，多个以逗号分隔

    /* URL设置 */
    'URL_ROUTER_ON'         =>  env('URL_ROUTER_ON',false),   // 是否开启URL路由
    'URL_HTML_SUFFIX'       =>  env('URL_HTML_SUFFIX','html'),  // URL伪静态后缀设置
    'URL_CASE_INSENSITIVE'  =>  env('URL_CASE_INSENSITIVE',false),   // 默认false 表示URL区分大小写 true则表示不区分大小写
    'URL_MODEL'             =>  env('URL_MODEL',3),       // URL访问模式,可选参数0、1、2、3,代表以下四种模式：
    'URL_PATHINFO_DEPR'     =>  '/',	// PATHINFO模式下，各参数之间的分割符号
    'URL_PATHINFO_FETCH'    =>  'ORIG_PATH_INFO,REDIRECT_PATH_INFO,REDIRECT_URL', // 用于兼容判断PATH_INFO 参数的SERVER替代变量列表
    'URL_REQUEST_URI'       =>  'REQUEST_URI', // 获取当前页面地址的系统变量 默认为REQUEST_URI
    'URL_DENY_SUFFIX'       =>  'ico|png|gif|jpg', // URL禁止访问的后缀设置
    'URL_PARAMS_BIND'       =>  env('URL_PARAMS_BIND',false), // URL变量绑定到Action方法参数
    'URL_PARAMS_BIND_TYPE'  =>  env('URL_PARAMS_BIND_TYPE',0), // URL变量绑定的类型 0 按变量名绑定 1 按变量顺序绑定
    'URL_PARAMS_FILTER'     =>  env('URL_PARAMS_FILTER',false), // URL变量绑定过滤
    'URL_PARAMS_FILTER_TYPE'=>  env('URL_PARAMS_FILTER_TYPE',''), // URL变量绑定过滤方法 如果为空 调用DEFAULT_FILTER

    /* token配置 */
    'TOKEN_ON'      =>    env('TOKEN_ON',false),  // 是否开启令牌验证 默认关闭
    'TOKEN_NAME'    =>    env('TOKEN_NAME','__hash__'),    // 令牌验证的表单隐藏字段名称，默认为__hash__
    'TOKEN_TYPE'    =>    env('TOKEN_TYPE','md5'),  //令牌哈希验证规则 默认为MD5
    'TOKEN_RESET'   =>    env('TOKEN_RESET',false),  //令牌验证出错后是否重置令牌 默认为true

    /* 系统变量名称设置 */
    'VAR_MODULE'            =>  'm',     // 默认模块获取变量
    'VAR_ADDON'             =>  'addon',     // 默认的插件控制器命名空间变量
    'VAR_CONTROLLER'        =>  'c',    // 默认控制器获取变量
    'VAR_ACTION'            =>  'a',    // 默认操作获取变量
    'VAR_AJAX_SUBMIT'       =>  'ajax',  // 默认的AJAX提交变量
    'VAR_JSONP_HANDLER'     =>  'callback',
    'VAR_PATHINFO'          =>  's',    // 兼容模式PATHINFO获取变量例如 ?s=/module/action/id/1 后面的参数取决于URL_PATHINFO_DEPR
    'VAR_TEMPLATE'          =>  't',    // 默认模板切换变量
    'VAR_AUTO_STRING'		=>	false,	// 输入变量是否自动强制转换为字符串 如果开启则数组变量需要手动传入变量修饰符获取变量

    'HTTP_CACHE_CONTROL'    =>  'private',  // 网页缓存控制
    'CHECK_APP_DIR'         =>  true,       // 是否检查应用目录是否创建
    'FILE_UPLOAD_TYPE'      =>  'Local',    // 文件上传方式
    'DATA_CRYPT_TYPE'       =>  'Think',    // 数据加密方式



    // 扩展配置
    'LOAD_EXT_CONFIG'       =>  env('LOAD_EXT_CONFIG','route,database,mail'),


    // TODO 自定义参数
    'CRM_DOMAIN'            =>  env('CRM_DOMAIN','http://crm.xiaoying.net'),

    
);
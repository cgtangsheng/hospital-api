<?php

return [
    '用户中心' => [
        'icon' => 'search',
        'menus' => [
            '基本信息' => [
                'icon' => 'check',
                'url' =>'/user/index'
            ],
            '就诊记录' => [
                'icon' => 'check',
                'url' =>''
            ],
            '健康自测' => [
                'icon' => 'check',
                'url' =>'/check-record/index'
            ],

        ],
    ],
   '病人管理' => [
        'icon' => 'edit',
        'menus' => [
            '病人检索' => [
                'icon' => 'check',
                'url' => '',
            ],
            '就诊记录' => [
                'icon' => 'check',
                'url' => '',
            ],
            '异常监控' => [
                'icon' => 'check',
                'url' => '',
            ],
        ],
    ],

    '医生管理' => [
        'icon' => 'cogs',
        'menus' => [
            '基础信息' => [
                'icon' => 'sitemap',
                // 'icon' => 'desktop',
                'url' => ''
            ],
        ],
    ],
    '医院管理' => [
        'icon' => 'file-word-o',
        // 'icon' => 'hdd-o',
        'menus' => [
            '基础信息' => [
                'icon' => 'sitemap',
                // 'icon' => 'desktop',
                'url' => ''
            ],
        ],
    ],

    '数据服务' => [
        'icon' => 'line-chart',
        'menus' => [

        ],
    ],
    '权限管理' => [
        'icon' => 'wrench',
        'menus' => [
            '用户权限' => [
                'icon' => 'th-large',
                'url' => '',
            ],
            '医生权限'=>[
                'icon' => 'th-large',
                'url' => '',
            ],
        ],
    ],
    '其他板块' => [
        'icon' => 'wrench',
        'menus' => [
            '医患论坛' => [
                'icon' => 'th-large',
                'url' => '',
            ],
        ],
    ],
];

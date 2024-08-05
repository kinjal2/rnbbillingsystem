<?php
return [
    'superadmin' => [
        'Dashboard' => [
            'title' => 'menus.dashboard',
            'icon' => 'img/menu-icon/dashboard.svg',
            'permission_route' => 'dashboard',
            'route' => [
                'dashboard'
            ],
            'link' => 'dashboard',
            'submenu' => []
        ],
		'Connection' => [
            'title' => 'menus.connection',
            'icon' => '/img/menu-icon/8.svg',
            'permission_route' => 'dashboard',
            'route' => [
                'dashboard'
            ],
            'link' => '#',
            'submenu' => [
				'New Connection' => [
                    'title' => 'menus.new connection',
                    
                    'permission_route' => 'newtconnection',
                    'route' => [
                        'newtconnection'
                    ],
                    'link' => 'newtconnection',
                ],
                'Name Change Request' => [
                    'title' => 'menus.name change',
                    
                    'permission_route' => 'namechangerequest',
                    'route' => [
                        'namechangerequest'
                    ],
                    'link' => 'namechangerequest',
                ],
				'Customer List' => [
                    'title' => 'menus.customerlist',
                    'permission_route' => 'getcustomerlist',
                    'route' => [
                        'getcustomerlist'
                    ],
                    'link' => 'getcustomerlist',
                ],
			
			]
        ],
		'Bill Generate' => [
            'title' => 'menus.bill generate',
            'icon' => 'img/menu-icon/7.svg',
            'permission_route' => 'generatenewbill',
            'route' => [
                'generatenewbill'
            ],
            'link' => 'generatenewbill',
            'submenu' => []
        ],
		'Bill Collection' => [
            'title' => 'menus.bill collection',
            'icon' => 'img/menu-icon/7.svg',
            'permission_route' => 'billcollection',
            'route' => [
                'billcollection'
            ],
            'link' => 'billcollection',
            'submenu' => []
        ],
		'Generate Ragister' => [
            'title' => 'menus.generateRagister',
            'icon' => 'img/menu-icon/9.svg',
            'permission_route' => 'generateragister',
            'route' => [
                'generateragister'
            ],
            'link' => 'generateragister',
            'submenu' => []
        ],
    ],
	
];

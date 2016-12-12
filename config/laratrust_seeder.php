<?php

return [
    'role_structure' => [
        'superuser' => [
            'users' => 'c,r,u,d',
            'transactions' => 'c,r,u,d'
        ],
        'administrator' => [
            'users' => 'c,r,u,d',
            'transactions' => 'c,r'
        ],
        'user' => [
            'users' => 'c,r,u,d',
            'transactions' => 'c'
        ],
    ],
    'permission_structure' => [
    ],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];

<?php

return [
    'role_structure' => [
        'superuser' => [
            'users' => 'r,u,d',
            'transactions' => 'c,r,u,d',
            'accounts' => 'c,r,u,d',
            'groups' => 'c,r,u,d',
        ],
        'administrator' => [
            'users' => 'r,u',
            'transactions' => 'c,r,u',
            'accounts' => 'c,r,u,d',
            'groups' => 'c,r,u,d',
        ],
        'moderator' => [
            'users' => 'r',
            'transactions' => 'r',
            'accounts' => 'c,r,u',
            'groups' => 'c,r,u',
        ],
        'user' => [
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

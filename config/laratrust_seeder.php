<?php

return [
    'role_structure' => [
        'administrator' => [
            'users' => 'i,s,e,c,r,u,d',
            'profile' => 'r,u',
        ],
        'public' => [
            'profile' => 'r,u',
        ],
    ],
    'permissions_map' => [
        'i' => 'index',
        's' => 'show',
        'e' => 'edit',
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete',
    ],
];

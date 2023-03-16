<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => true,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'admin' => [
            'dashboard' => 'r',
            'setting' => 'r,c,u,d,s',
            'brand' => 'r,c,u,d,s',
            'category' => 'r,c,u,d,s',
            'slider' => 'r,c,u,d,s',
            'user' => 'r,c,u,d,s',
            'role' => 'r,c,u,d,s',
            'permission' => 'r,c,u,d,s',
            'menu' => 'r,c,u,d,s',
            'post' => 'r,c,u,d,s',
            'link' => 'r,c,u,d,s',
            'product' => 'r,c,u,d,s',
            'article' => 'r,c,u,d,s',
            'reseller' => 'r,c,u,d,s',
            'page' => 'r,c,u,d,s',
            'feedback' => 'r,c,u,d,s',
            'testimony' => 'r,c,u,d,s',
        ],
        'user' => [
            'dashboard' => 'r',
            // 'setting' => 'r,c,u,d,s',
            'brand' => 'r',
            'category' => 'r',
            'slider' => 'r',
            // 'user' => 'r,c,u,d,s',
            // 'role' => 'r,c,u,d,s',
            // 'permission' => 'r,c,u,d,s',
            // 'menu' => 'r,c,u,d,s',
            'post' => 'r,s',
            'link' => 'r,s',
            'product' => 'r,s',
            'article' => 'r,s',
            'reseller' => 'r,s',
            'page' => 'r,s',
            'feedback' => 'r,s',
            'testimony' => 'r,s',
        ]
    ],

    'permissions_map' => [
        'r' => 'read',
        'c' => 'create',
        'u' => 'update',
        'd' => 'delete',
        's' => 'show',
    ],

];

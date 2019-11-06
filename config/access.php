<?php
return [
    // Vai trò mặc định
    'roles' => [
        'admin' => 'administrator',
        'censor' => 'censor',
        'hr' => 'hr',
        'editor' => 'editor',
        'accountant' => 'accountant',
    ],

    //Quyền mặc định
    'permissions' => [
        'edit-product' => 'edit-product',
        'edit-user' => 'edit-user',
        'export' => 'export',
        'view-product' => 'view-product',
        'view-user' => 'view-user',
        'create-user'=>'create-user',
        'delete-user'=>'delete-user',
        'view-customer'=>'view-customer',
        'create-customer'=>'create-customer',
        'edit-customer'=>'edit-customer',
        'delete-customer'=>'delete-customer',
        'create-product'=>'create-product',
        'delete-product'=>'delete-product',
        'view-category'=>'view-category',
        'create-category'=>'create-category',
        'edit-category'=>'edit-category',
        'delete-category'=>'delete-category',
        'view-role'=>'view-role',
        'create-role'=>'create-role',
        'edit-role'=>'edit-role',
        'delete-role'=>'delete-role',
        'view-rate'=>'view-rate',
        'create-rate'=>'create-rate',
        'edit-rate'=>'edit-rate',
        'delete-rate'=>'delete-rate',
    ],

    //Định dạng ảnh
    'format_image' => [
        'image/jpeg',
        'image/png'
    ],

    //Blacklist name user
    'blacklist_user' => [
        'all' => [
            'admin',
            'administrator',
            'manager',
            'editor'
        ]
    ],

    'default' =>[
        'avatar' => 'avatars/default-user.png',
        'email' => 'admin@vn.vn'
    ]


];

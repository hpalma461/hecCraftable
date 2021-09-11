<?php

return [
    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => 'ID',
            'last_login_at' => 'Last login',
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'email' => 'Email',
            'password' => 'Password',
            'password_repeat' => 'Password Confirmation',
            'activated' => 'Activated',
            'forbidden' => 'Forbidden',
            'language' => 'Language',
                
            //Belongs to many relations
            'roles' => 'Roles',
                
        ],
    ],

    'adscipciones1' => [
        'title' => 'Adscipciones1',

        'actions' => [
            'index' => 'Adscipciones1',
            'create' => 'New Adscipciones1',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    'adscripciones1' => [
        'title' => 'Adscripciones1',

        'actions' => [
            'index' => 'Adscripciones1',
            'create' => 'New Adscripciones1',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'Nombre' => 'Nombre',
            
        ],
    ],

    'adscripciones2' => [
        'title' => 'Adscripciones2',

        'actions' => [
            'index' => 'Adscripciones2',
            'create' => 'New Adscripciones2',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'Nombre' => 'Nombre',
            
        ],
    ],

    'grado' => [
        'title' => 'Grados',

        'actions' => [
            'index' => 'Grados',
            'create' => 'New Grado',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'Nombre' => 'Nombre',
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];
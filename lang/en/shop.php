<?php

return [



    'table_columns' =>[
        'actions' => 'Actions',
        'action_options' => [
            'show' => 'Show',
            'edit' => 'Edit',
            'delete' => 'Delete'
        ]
    ],

    'product' => [

        'product_with_id' => 'Product: :id',
        'edit_product_with_id' => 'Edit product: :id',

        'products' => 'Products:',

        'create_product_title' => 'Create product',
        'edit_product_title' => 'Edit product: ',


        'save_button' => 'Save',


        'fields' => [
            'name' => 'Name',
            'description' => 'Description',
            'amount' => 'Amount',
            'price' => 'Price',
            'image' => 'Image',
            'id' => 'ID',
        ],

    ],

    'users' => [

        'user_with_id' => 'User: :id',
        'edit_user_with_id' => 'Edit user: :id',

        'users' => 'Users:',

        'create_user_title' => 'Create user',
        'edit_user_title' => 'Edit user: ',

        'fields' => [
            'name' => 'Name',
            'surname' => 'Surname',
            'email' => 'Email address',
            'phone_number' => 'Phone number',
            'id' => 'ID',
        ],

        'save_button' => 'Save',

    ]

];

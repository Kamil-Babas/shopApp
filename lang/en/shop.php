<?php

return [


    'table_columns' =>[
        'actions' => 'Actions',
        'has_image' => 'hasImage',
        'action_options' => [
            'show' => 'Show',
            'edit' => 'Edit',
            'delete' => 'Delete'
        ]
    ],

    'product' => [

        // in index
        'showing' => 'Showing ',
        'price' => 'PRICE',
        'filter_products' => 'Filter products',
        // index end

        'product_with_id' => 'Product: :id',
        'edit_product_with_id' => 'Edit product: :id',

        'products' => 'Products',
        'products:' => 'Products:',
        'categories' => 'Categories',

        'create_product_title' => 'Create product',
        'edit_product_title' => 'Edit product: ',


        'save_button' => 'Save',
        'select_category' => 'Select product category',


        'fields' => [
            'name' => 'Name',
            'description' => 'Description',
            'category' => 'Category',
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

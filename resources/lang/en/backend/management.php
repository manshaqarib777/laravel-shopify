<?php

return [

    'title' => 'Management',

    'products' => [
        'title' => 'Products',

        'unlimited' => 'Unlimited',
        'sold_out' => 'Sold Out',

        'show_product' => 'Show Product',

        'weight' => 'Weight in Stock',
        'weightchar' => 'Weight Unit (g, kg, lb, ...)',
        'weight_available' => ':weight:char',
        'images' => 'Product Images',
        'add' => [
            'title' => 'Create Product',
            'submit_button' => 'Create',
            'options' => 'Options',
            'drop_needed' => 'Enable Drop Function',
            'unlimited_available' => 'Unlimited Availability',
            'normal_stock_management' => 'Enable Stock Management',
            'as_weight' => 'Weight (grams, kilos, liters, ...)',
        ],

        'edit' => [
            'title' => 'Edit Product',
            'submit_button' => 'Edit',
            'database' => 'Database Management',
            'options' => 'Options',
            'drop_needed' => 'Enable Drop Function',
            'unlimited_available' => 'Unlimited Availability',
            'normal_stock_management' => 'Enable Stock Management',
            'as_weight' => 'Weight (grams, kilos, liters, ...)',
        ],

        'database' => [
            'title' => 'Database',
            'title2' => 'Database (:count)',

            'widget1' => [
                'title' => 'Records',
            ],

            'import' => [
                'successfully' => 'Imported :count records.',
                'one_successfully' => 'Imported 1 record.',

                'options' => 'Options',
                'line_by_line' => 'Line by Line',
                'with_seperator' => 'With Separator:',

                'txt' => [
                    'seperator_required' => 'Separator is required.',
                    'title' => 'Input Import',
                    'input' => 'Input',
                ],

                'one' => [
                    'title' => 'One Import',
                    'content' => 'Content',
                ],

                'submit_button' => 'Import',
            ],
        ],

        'categories' => [
            'title' => 'Categories',

            'add' => [
                'title' => 'Add Category',
                'submit_button' => 'Add',
            ],

            'edit' => [
                'title' => 'Edit Category',
                'submit_button' => 'Edit',
            ],

            'id' => 'ID',
            'name' => 'Name',
            'slug' => 'Slug',
            'keywords' => 'Keywords',
            'meta_tags_desc' => 'META Description',
            'actions' => 'Actions',
        ],

        'id' => 'ID',
        'name' => 'Product',
        'content' => 'Content',
        'description' => 'Description',
        'short_description' => 'Short Description',
        'stock_management' => 'Stock Management',
        'price' => 'Price',
        'price_in_cent' => 'Price without decimals',
        'price_in_cent_example' => '100 (equals €1.00)',
        'old_price' => 'Regular Price',
        'old_price_in_cent' => 'Regular Price without decimals (OPTIONAL)',
        'old_price_in_cent_example' => '100 (equals €1.00)',
        'category' => 'Category',
        'stock_status' => 'Stock Status',
        'sells' => 'Sales',
        'actions' => 'Actions',
    ],

    'faqs' => [
        'title' => 'FAQs',

        'categories' => [
            'title' => 'Categories',

            'add' => [
                'title' => 'Add Category',
                'submit_button' => 'Add',
            ],

            'edit' => [
                'title' => 'Edit Category',
                'submit_button' => 'Edit',
            ],

            'id' => 'ID',
            'name' => 'Name',
            'actions' => 'Actions',
        ],

        'add' => [
            'title' => 'Create Entry',
            'submit_button' => 'Create',
        ],

        'edit' => [
            'title' => 'Edit Entry',
            'submit_button' => 'Edit',
        ],

        'id' => 'ID',
        'question' => 'Question',
        'answer' => 'Answer',
        'category' => 'Category',
        'actions' => 'Actions',
    ],

    'users' => [
        'title' => 'Users',

        'edit' => [
            'title' => 'Edit User',
            'submit_button' => 'Edit',
            'save_button' => 'Save',

            'permissions' => [
                'title' => 'Edit Permissions',
            ],
        ],

        'widget1' => [
            'title' => 'Transactions',
        ],

        'widget2' => [
            'title' => 'Tickets',
        ],

        'widget3' => [
            'title' => 'Orders',
        ],

        'widget4' => [
            'title' => 'Permissions',
        ],

        'id' => 'ID',
        'name' => 'Display Name',
        'username' => 'Username',
        'jabber' => 'Jabber ID',
        'newsletter_enabled' => 'Newsletter',
        'balance' => 'Balance',
        'balance_in_cent' => 'Balance in Euro',
        'enabled' => 'Enabled',
        'disabled' => 'Disabled',
        'date' => 'Date',
        'actions' => 'Actions',
    ],
    'coupons' => [
        'title' => 'Coupons',

        'add' => [
            'title' => 'Add Coupon',
            'submit_button' => 'Add',
            'unlimited' => 'Unlimited availability (once per user)',
            'options' => 'Options',
        ],

        'edit' => [
            'title' => 'Edit Coupon',
            'submit_button' => 'Edit',
            'unlimited' => 'Unlimited availability (once per user)',
            'options' => 'Options',
        ],

        'id' => 'ID',
        'code' => 'Code',
        'usage' => 'Availability',
        'amount' => 'Amount',
        'date' => 'Date',
        'max_usable' => 'Maximum Availability (-1 unlimited, once per user)',
        'actions' => 'Actions',
    ],

    'delivery_methods' => [
        'title' => 'Delivery Methods',

        'add' => [
            'title' => 'Add Delivery Method',
            'submit_button' => 'Add',
            'options' => 'Options',
        ],

        'edit' => [
            'title' => 'Edit Delivery Method',
            'submit_button' => 'Edit',
            'options' => 'Options',
        ],

        'id' => 'ID',
        'name' => 'Name',
        'price' => 'Price',
        'min_amount' => 'Minimum Order Amount in Cents',
        'max_amount' => 'Maximum Order Amount in Cents (0 = not specified)',
        'date' => 'Date',
        'actions' => 'Actions',
    ],

    'articles' => [
        'title' => 'News',

        'add' => [
            'title' => 'Create Article',
            'submit_button' => 'Create',
            'anonym' => 'Hide Author (Anonymous)',
            'options' => 'Options',
        ],

        'edit' => [
            'title' => 'Edit Article',
            'submit_button' => 'Edit',
            'anonym' => 'Hide Author (Anonymous)',
            'options' => 'Options',
        ],

        'id' => 'ID',
        'article_title' => 'Title',
        'content' => 'Content',
        'date' => 'Date',
        'author' => 'Author',
        'actions' => 'Actions',
    ],

    'tickets' => [
        'title' => 'Tickets',
        'go_to_shop' => 'Go to Shop',

        'edit' => [
            'title' => 'Edit Ticket',
            'submit_button' => 'Edit',
            'subject' => 'Subject:',
            'category' => 'Category:',
            'message' => 'Message',
            'move_category' => 'Move Category',
            'title_reply' => 'Compose Reply',
            'close' => 'Close',
            'open' => 'Open',
            'move' => 'Move',
            'submit_button' => 'Send',
            'answered' => 'answered'
        ],

        'categories' => [
            'title' => 'Categories',

            'add' => [
                'title' => 'Add Category',
                'submit_button' => 'Add',
            ],

            'edit' => [
                'title' => 'Edit Category',
                'submit_button' => 'Edit',
            ],

            'id' => 'ID',
            'name' => 'Name',
            'actions' => 'Actions',
        ],

        'status_data' => [
            'open' => 'Open',
            'closed' => 'Closed',
            'replied' => 'Replied',
        ],

        'id' => 'ID',
        'subject' => 'Subject',
        'category' => 'Category',
        'status' => 'Status',
        'user' => 'User',
        'date' => 'Date',
        'actions' => 'Actions',
    ],

];


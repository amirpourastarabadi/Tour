<?php

return [
    'layout' => [
        'profile'        => 'Profile',
        'sidebar_title'  => 'Super admin panel',
        'admins_list'    => 'Admins list',
        'add'            => 'Add New Admin',
        'edit'           => 'Edit Profile',
        'logout'         => 'Log out',
        'nav_title'      => 'Super Admin Dashboard',
    ],
    'list' => [
        'first_name'     => 'First Name',
        'last_name'      => 'Last Name',
        'mobile_number'  => 'Mobile Number',
        'admins_count'  => 'Number of Admins',
        'actions'        => 'Actions',
        'info'           => 'show info',
        'key'            => 'key generate',
        'edit'           => 'edit admin',
        'delete'         => 'delete admin',
        'cancel'         => 'Cancel',
        'back'         => 'Back',
        'confirm_delete' => 'Are you sure you want to delete :first_name :last_name ?',
    ],
    'edit' => [
        'submit'         => 'Submit',
    ],
    'alerts' => [
        'forbidden'      => ':message is Forbidden',
        'admin' => [
            'delete'            => 'Delete Admin | Admin <strong>:first_name</strong> <strong>:last_name</strong> removed successfully.',
            'update'            => 'Update Admin | Admin <strong>:first_name</strong> <strong>:last_name</strong> updated successfully.',
            'update_superAdmin' => 'Update Super Admin | <strong>:first_name</strong> <strong>:last_name</strong> updated successfully.',
            'create'            => 'Create Admin | Admin <strong>:first_name</strong> <strong>:last_name</strong> Created successfully. <br/> Password is <strong>:password</strong>',
            'confirm_key'       => 'Are you sure you want to reset password of :first_name :last_name ?',
            'confirm_edit'      => 'Are you sure you want to update details of :first_name :last_name ?',
            'confirm_create'    => 'Are you sure you want to create an admin with this details? Password will generate automatically.',
            'confirm_back'      => 'Are you sure you want to go to admins list?',
            'cancel_edit'       => 'Are you sure you want to cancel edit?',
            'cancel_create'     => 'Are you sure you want to cancel create admin?',
            'reset_password'    => 'Key Generate | New Password is <strong>:password</strong>',
        ],
    ]

];

<?php

return [
    'list' => [
        'first_name' => 'First Name',
        'last_name' => 'Last Name',
        'mobile_number' => 'Mobile Number',
        'actions' => 'Actions',
        'info' => 'show info',
        'edit' => 'edit',
        'delete' => 'delete',
        'cancel' => 'Cancel',
        'back' => 'Back',
        'confirm_delete' => 'Are you sure you want to delete :first_name :last_name ?',
    ],
    'edit' => [
        'submit' => 'Submit',
    ],
    'alerts' => [
        'completion' => [
            'confirm_completion' => 'Are you sure about details',
            'cancel_completion' => 'Are you sure you want to cancel register completion',
        ],
        'forbidden' => ':message is Forbidden',
        'admin' => [
            'delete' => 'Delete Admin | Admin <strong>:first_name</strong> <strong>:last_name</strong> removed successfully.',
            'update' => 'Update Admin | Admin <strong>:first_name</strong> <strong>:last_name</strong> updated successfully.',
            'update_admin' => 'Update Admin | <strong>:first_name</strong> <strong>:last_name</strong> updated successfully.',
            'create' => 'Create Admin | Admin <strong>:first_name</strong> <strong>:last_name</strong> Created successfully. <br/> Password is <strong>:password</strong>',
            'confirm_key' => 'Are you sure you want to reset password of :first_name :last_name ?',
            'confirm_edit' => 'Are you sure you want to update details of :first_name :last_name ?',
            'confirm_create' => 'Are you sure you want to create an admin with this details? Password will generate automatically.',
            'confirm_back' => 'Are you sure you want to go to admins list?',
            'cancel_edit' => 'Are you sure you want to cancel edit?',
            'cancel_create' => 'Are you sure you want to cancel create admin?',
            'reset_password' => 'New Password is <strong>:password</strong>',
        ],
        'passenger' => [
            'create' => 'Passenger <strong>:first_name</strong> <strong>:last_name</strong> Created successfully. <br/> Password is <strong>:password</strong>',
            'delete' => 'Passenger <strong>:first_name</strong> <strong>:last_name</strong> removed successfully.',
            'update' => 'Passenger <strong>:first_name</strong> <strong>:last_name</strong> updated successfully.',
        ],
    ],
    'register_completion' => [
        'completion' => 'Register Completion',
        'agency' => 'Agency',
        'start_at' => 'Start working at',
        'guild_code' => 'Guild Code Number',
        'email' => 'Email',
        'telephone_number' => 'Telephone Numbers',
        'telephone_number_description' => 'Separate Telephone Numbers with comma(,)',
    ],
];

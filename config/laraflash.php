<?php
/**
 * This file is part of LaraFlash,
 * a powerful and flexible flash notifications system.
 *
 * @license MIT
 * @package LaraFlash
 */
return [
    /*
    |--------------------------------------------------------------------------
    | Enable Notification Views (COMING SOON)
    |--------------------------------------------------------------------------
    |
    | If true, the package will handle displaying the notifications in the view
    | otherwise a false value indicates that you only want LaraFlash to manage
    | the Notification flash object, with you handling the display to users yourself
    |
    */
    'enable_views' => false,
    /*
    |--------------------------------------------------------------------------
    | Default Notification Values
    |--------------------------------------------------------------------------
    |
    | These are the default values that will be set for each notification attribute
    | if you do not explicitly define
    | to have a different name, you can do it here.
    |
    */
    'defaults' => [
        /**
         * Notification Type
				 *  (ex: danger, success, info, warning, light, dark)
         */
        'type' => 'info',
				/**
         * Notification Priority
				 *  This is an arbitrary integer to indicate priority over other
				 *  notifications. A higher number is considered higher priority.
         */
        'priority' => 5,
        /**
         * Notification Title
				 *  (ie. "Success: ", "Warning: ", "Notice: ", null)
         */
        'title' => 'Notice: ',
        /**
         * Notification Content
				 *  This will probably never revert to this default,
				 *  but is set just in case
         */
        'content' => 'Your last request experienced a problem',
    ],
    /*
    |--------------------------------------------------------------------------
    | Alert Classes
    |--------------------------------------------------------------------------
    |
    | This allows you to customize which CSS classes to use for different
    | types of Notifications. Defaults are for Bootstrap framework.
    |
    */
    'classes' => [
				/**
				 * Used for important and critical notices or errors.
				 */
				'success' => 'alert-success',
        /**
         * Used for informational notices.
         */
        'info' => 'alert-info',
        /**
         * Used for important and critical notices or errors.
         */
        'warning' => 'alert-warning',
				/**
				 * Used for important and critical notices or errors.
				 */
				'danger' => 'alert-danger',
    ],
];

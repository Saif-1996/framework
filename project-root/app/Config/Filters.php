<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\SecureHeaders;
use CodeIgniter\Shield\Filters\AuthRates;
use CodeIgniter\Shield\Filters\ChainAuth;
use CodeIgniter\Shield\Filters\ForcePasswordResetFilter;
use CodeIgniter\Shield\Filters\GroupFilter;
use CodeIgniter\Shield\Filters\PermissionFilter;
use CodeIgniter\Shield\Filters\SessionAuth;
use CodeIgniter\Shield\Filters\TokenAuth;

class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     */
    public array $aliases = [
        'csrf' => CSRF::class,
        'toolbar' => DebugToolbar::class,
        'honeypot' => Honeypot::class,
        'invalidchars' => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'session' => SessionAuth::class,
        'tokens' => TokenAuth::class,
        'chain' => ChainAuth::class,
        'auth-rates' => AuthRates::class,
        'group' => GroupFilter::class,
        'permission' => PermissionFilter::class,
        'force-reset' => ForcePasswordResetFilter::class,
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     */
    public array $globals = [
        'before' => [
            // 'honeypot',
            // 'csrf',
            // 'invalidchars',

            'session' => ['except' => ['login*', 'register', 'auth/a/*']],
            'force-reset' => ['except' => ['login*', 'register', 'auth/a/*', 'change-password', 'logout']]

        ],
        'after' => [
            'toolbar',
            // 'honeypot',
            // 'secureheaders',
        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['foo', 'bar']
     *
     * If you use this, you should disable auto-routing because auto-routing
     * permits any HTTP method to access a controller. Accessing the controller
     * with a method you don’t expect could bypass the filter.
     */
    public array $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     */
//    public array $filters = [];
    public $filters = [
        'auth-rates' => [
            'before' => [
                'login*', 'register', 'auth/*'
            ]
        ]
    ];
}

<?php return array (
  'merodiro/friendships' => 
  array (
    'providers' => 
    array (
      0 => 'Merodiro\\Friendships\\FriendshipsServiceProvider',
    ),
  ),
  'laravel/tinker' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Tinker\\TinkerServiceProvider',
    ),
  ),
  'laravel/passport' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Passport\\PassportServiceProvider',
    ),
  ),
  'sentry/sentry-laravel' => 
  array (
    'providers' => 
    array (
      0 => 'Sentry\\SentryLaravel\\SentryLaravelServiceProvider',
    ),
    'aliases' => 
    array (
      'Sentry' => 'Sentry\\SentryLaravel\\SentryFacade',
    ),
  ),
  'barryvdh/laravel-debugbar' => 
  array (
    'providers' => 
    array (
      0 => 'Barryvdh\\Debugbar\\ServiceProvider',
    ),
    'aliases' => 
    array (
      'Debugbar' => 'Barryvdh\\Debugbar\\Facade',
    ),
  ),
  'tamayo/laravel-scout-elastic' => 
  array (
    'providers' => 
    array (
      0 => 'ScoutEngines\\Elasticsearch\\ElasticsearchProvider',
    ),
  ),
  'laravel/horizon' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Horizon\\HorizonServiceProvider',
    ),
    'aliases' => 
    array (
      'Horizon' => 'Laravel\\Horizon\\Horizon',
    ),
  ),
  'laravel/scout' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Scout\\ScoutServiceProvider',
    ),
  ),
  'fideloper/proxy' => 
  array (
    'providers' => 
    array (
      0 => 'Fideloper\\Proxy\\TrustedProxyServiceProvider',
    ),
  ),
);
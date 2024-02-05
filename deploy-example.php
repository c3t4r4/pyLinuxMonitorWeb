<?php
namespace Deployer;

require 'recipe/laravel.php';

// Config
set('repository', 'https://github.com/c3t4r4/pyLinuxMonitorWeb.git');

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

// Hosts
// Production
set('branch', 'main');

host('root@127.0.0.1')
    ->set('deploy_path', '/var/www/pyLinuxMonitorWeb');

// Hooks

task('build', function () {
    run('cd {{release_path}} && build');
});

task('deploy:composer_install', function() {
    run('cd {{release_path}} && composer install && composer dump-autoload');
});

task('deploy:npm_install', function() {
    run('cd {{release_path}} && npm install && npm run build');
});

task('deploy:optimize', function() {
    run('cd {{release_path}} && php artisan optimize');
});

task('deploy:restart_nginx', function() {
    run('systemctl restart nginx');
});

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.
before('deploy:symlink', 'artisan:migrate');

// Custom Tasks
after('deploy:success',  'deploy:composer_install');
after('deploy:success',  'deploy:npm_install');
after('deploy:success',  'deploy:optimize');
after('deploy:success',  'deploy:restart_nginx');

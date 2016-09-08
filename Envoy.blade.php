@servers(['web' => 'ubuntu@52.89.250.145:8080'])

@task('composer-update')
    composer self-update
    composer update
@endtask

@task('refresh')
    php artisan migrate:refresh --seed
@endtask

@task('remove-clone')
    sudo rm -r -f betteram
    git clone https://github.com/amon293/betteram
@endtask

<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Aquí puedes especificar el disco de sistema de archivos predeterminado
    | que debe ser utilizado por el framework. El disco "local", así como
    | una variedad de discos basados en la nube están disponibles para
    | almacenamiento de archivos en tu aplicación.
    |
    */

    'default' => env('FILESYSTEM_DISK', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | A continuación, puedes configurar tantos discos de sistema de archivos
    | como sea necesario, e incluso puedes configurar múltiples discos para
    | el mismo controlador. Los ejemplos de la mayoría de los controladores
    | soportados están configurados aquí como referencia.
    |
    | Controladores soportados: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
            'throw' => false,
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
            'throw' => false,
        ],

        'attachments' => [ // Disco adicional para los archivos adjuntos, si es necesario
            'driver' => 'local',
            'root' => storage_path('app/public/attachments'),
            'url' => env('APP_URL').'/storage/attachments',
            'visibility' => 'public',
            'throw' => false,
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
            'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false),
            'throw' => false,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Aquí puedes configurar los enlaces simbólicos que se crearán cuando se
    | ejecute el comando `storage:link` de Artisan. Las claves del array
    | deben ser las ubicaciones de los enlaces y los valores deben ser sus
    | destinos.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],

];

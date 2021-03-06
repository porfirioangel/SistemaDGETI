## Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

## Official Documentation

Documentation for the framework can be found on the [Laravel website](http://laravel.com/docs).

## Instrucciones

### Después de clonar el proyecto
```
composer install
```

### Generar nueva clave para el archivo .env
```
php artisan key:generate
```

### Correr el proyecto y que pueda ser accedido desde la red local
```
php artisan serve --host 0.0.0.0
```

### Crear las migraciones y correr los seeders

```
php artisan migrate:refresh --seed
```

### Si marca error de seeder
```
composer dump-autoload
```

### Crear un seeder
```
php artisan make:seeder AspectoEvaluacionTableSeeder
```

### Correr un seeder específico
```
php artisan db:seed --class=UserTableSeeder
```

## Generar migraciones a partir de una base de datos existente

### Instalar dependencias
```
composer require --dev "xethron/migrations-generator"
```

### Agregar al archivo ```config/app.php``` en la sección de providers
```
Way\Generators\GeneratorsServiceProvider::class,
Xethron\MigrationsGenerator\MigrationsGeneratorServiceProvider::class,
```

### Generar las migraciones

```
php artisan migrate:generate
```

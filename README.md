# VABOact3_t4 - CRUD de cursos en Laravel

Proyecto realizado para la actividad 3 del tema 4. Consiste en un CRUD completo en Laravel 12 conectado a MySQL, usando Eloquent, migraciones, seeders, factories, paginacion y relaciones entre modelos.

## Objetivo del proyecto

El sistema permite administrar un catalogo de cursos. Cada curso pertenece a una categoria y puede tener varios alumnos inscritos. La aplicacion esta pensada para demostrar el uso de Laravel con MVC, Eloquent ORM y despliegue en un VPS con Nginx, PHP-FPM y MySQL.

## Entidad principal

La entidad principal del CRUD es `Curso`.

Campos principales:

- `id`
- `categoria_id`
- `titulo`
- `descripcion`
- `instructor`
- `duracion_horas`
- `precio`
- `fecha_inicio`

Operaciones implementadas:

- Crear cursos
- Listar cursos con paginacion
- Ver detalle de un curso
- Editar cursos
- Eliminar cursos

## Relaciones Eloquent

### Relacion uno a muchos

Una `Categoria` tiene muchos `Cursos`.

Ejemplo:

```php
// Categoria.php
public function cursos()
{
    return $this->hasMany(Curso::class);
}
```

Cada curso pertenece a una sola categoria:

```php
// Curso.php
public function categoria()
{
    return $this->belongsTo(Categoria::class);
}
```

Esta relacion se muestra en la tabla principal del CRUD, en la columna `Categoria`.

### Relacion muchos a muchos

Un `Curso` puede tener muchos `Alumnos`, y un `Alumno` puede estar inscrito en muchos cursos.

Esta relacion se maneja con la tabla pivote:

```text
alumno_curso
```

Ejemplo:

```php
// Curso.php
public function alumnos()
{
    return $this->belongsToMany(Alumno::class)->withTimestamps();
}
```

La relacion se muestra en el listado con el numero de alumnos inscritos y en la vista de detalle del curso.

## Seeder y Factory

El proyecto usa factories y seeders para llenar la base de datos con informacion de prueba.

Datos generados:

- 5 categorias
- 30 alumnos
- 24 cursos
- relaciones entre alumnos y cursos

Esto permite probar la paginacion y visualizar las relaciones desde el inicio.

Comando usado:

```bash
php artisan migrate:fresh --seed
```

## Paginacion

El listado de cursos usa paginacion de Laravel:

```php
Curso::with(['categoria', 'alumnos'])->latest()->paginate(8);
```

La vista muestra controles de paginacion con Bootstrap:

```text
Anterior | 1 | 2 | 3 | Siguiente
```

## Tecnologias utilizadas

- Laravel 12
- PHP 8.3
- MySQL
- Eloquent ORM
- Bootstrap 5
- Nginx
- PHP-FPM
- Composer

## Instalacion local

Clonar el repositorio:

```bash
git clone https://github.com/omarferxoo/VABOact3_t4-.git
cd VABOact3_t4-
```

Instalar dependencias:

```bash
composer install
```

Crear el archivo `.env`:

```bash
cp .env.example .env
```

Configurar los datos de la base de datos en `.env` y generar la llave:

```bash
php artisan key:generate
```

Ejecutar migraciones y seeders:

```bash
php artisan migrate:fresh --seed
```

Levantar el servidor local:

```bash
php artisan serve
```

## Despliegue en VPS

El proyecto fue clonado en el VPS y configurado para funcionar con Nginx apuntando a la carpeta `public/`, como requiere Laravel.

Ruta del proyecto en el VPS:

```text
/var/www/html/VABOact3t4/
```

Ruta publica:

```text
/var/www/html/VABOact3t4/public/
```

URL funcionando:

```text
http://168.231.75.27/VABOact3t4/
```

## Enlaces de entrega

Repositorio:

```text
https://github.com/omarferxoo/VABOact3_t4-
```

Proyecto en VPS:

```text
http://168.231.75.27/VABOact3t4/
```

## Nota de seguridad

El archivo `.env` no se sube al repositorio porque contiene credenciales de la base de datos y configuracion sensible del servidor. La carpeta `vendor/` tampoco se sube, ya que las dependencias se instalan con Composer.

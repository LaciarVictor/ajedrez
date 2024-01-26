# Tablero de Ajedrez API

Esta API en Laravel genera un tablero de ajedrez en formato JSON, con casilleros coloreados alternativamente, según las reglas del juego de ajedrez.

## Requisitos

- PHP 7.4 o superior
- Composer
- Laravel 8

## Instalación

1. Clona el repositorio:

    ```bash
    git clone https://github.com/tu-usuario/tu-proyecto.git
    ```

2. Instala las dependencias:

    ```bash
    cd tu-proyecto
    composer install
    ```


3. Genera la clave de la aplicación:

    ```bash
    php artisan key:generate
    ```



## Uso

La API proporciona una única ruta:

- `GET /api/tableros?totalFilas=<n>`: Genera un tablero de ajedrez con el número especificado de filas (y columnas). El valor sólo puede ser 8, 64 o 1000. No admite otros valores

## Ejemplo de solicitud

```bash
curl http://127.0.0.1:8000/api/tableros?totalFilas=8

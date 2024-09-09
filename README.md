# Comunidades Artesanales Web

Este repositorio contiene el proyecto **Comunidades Artesanales Web**, desarrollado para gestionar las ventas y compras. El proyecto está dividido en diferentes módulos que corresponden a distintas ramas de trabajo.

## Ramas del Repositorio

El repositorio cuenta con seis ramas principales, cada una asignada a un módulo específico del proyecto. Para acceder a ellas, sigue los siguientes pasos:

### Ramas disponibles:

- `main`: Rama principal donde se encuentra la versión estable del proyecto.
- `admin`: Modulo de administración.
- `compra`: Módulo de compra.
- `delivery`: Módulo de entregas.
- `productos`: Módulo de gestión de productos.
- `usuario`: Módulo para los usuarios del sistema.

## Cómo trabajar con las ramas

### 1. Clonar el repositorio:

Primero, clona el repositorio en tu máquina local:

```bash
git clone https://github.com/JosCraft/Comunidades_Artesanales_web.git
```

### 2. Clonar el repositorio:

Cada uno debe trabajar en la rama asignada a su módulo. Para cambiar de rama, usa el siguiente comando:

```bash
git checkout nombre_rama
```

Ejemplo 

```bash
git checkout admin
```

### 3. Actualizar la rama local:

Antes de comenzar a trabajar, es importante tener la última versión del código. Actualiza tu rama con:

```bash
git pull origin nombre_rama
```

### 4. Subir los cambios:

Una vez que hayas realizado tus cambios, sigue estos pasos para subirlos al repositorio:

1. Agrega todos los cambios:

```bash
git add .
```

2. Crea un commit describiendo los cambios realizados:

```bash
git commit -m "Descripción breve de los cambios realizados"
```

3. Sube los cambios a la rama correspondiente:

```bash
git push origin nombre_rama
```

## Configuración del Proyecto

### 1. Archivo .env
El archivo .env es necesario para la configuración del entorno. Sigue estos pasos para configurarlo:

a. Copia el archivo .env.example y pégalo en la misma ubicación.
b. Renombra el archivo copiado a .env.

#### 2. Instalación de dependencias
Para instalar las dependencias del proyecto, ejecuta los siguientes comandos:

```bash
composer install
npm install
``` 

## Ejecutar el Proyecto
Para iniciar el servidor local y compilar los recursos estáticos, utiliza los siguientes comandos:

1. Levantar el servidor backend (PHP Laravel):

```bash
php artisan serve
```

2. Compilar los assets del frontend:

```bash
npm run dev
```

### Notas adicionales:

- Utiliza el `commit` con mensajes descriptivos y concisos.
- Asegúrate de trabajar siempre en la rama correcta antes de empezar cualquier tarea.
- Es buena práctica realizar `pull` antes de hacer cambios para asegurarte de que tienes la versión más actualizada del proyecto.

---

# QUE COMIENCEN LOS JUEGOS 


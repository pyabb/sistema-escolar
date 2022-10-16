## Sistema Escolar
Control de Asistencias

1. English details
2. Spanish details
3. Xampp installation
4. User Access (original database)
5. Owner

## 1. English | Inglés
I will support this project a few hours a month.
The core of the project will be the native PHP code, adding basic and simple scripts to complement some actions like:
* Generate a custom autoload to classes and namespaces.
* Generate automatic loading of environment variables.
* Create a basic `.env` file.

The objective is fix any problem but this task could take a many weeks.
<br>
If you need a business application with native PHP then consider using PHP composer for packages deployment like:
* Dotenv
* Composer autoload
* Symfony Yaml
* ORM (Eloquent or Doctrine)

You can see all changelogs [here](changelogs/en.md)


## 2. Spanish | Español
Apoyaré este proyecto unas horas al mes.
El núcleo del proyecto será el código PHP nativo, agregando scripts básicos y simples para complementar algunas acciones como:
* Generar una carga personalizada para clases y nombres de espacios(namespace).
* Generar la carga automática de variables de entorno.
* Crear un archivo `.env` básico.

El objetivo es solucionar cualquier problema, pero esta tarea puede llevar varias semanas.
<br>
Si necesita una aplicación comercial con PHP nativo, considere usar PHP composer para la implementación de paquetes como:
* Dotenv
* Composer autoload
* Symfony Yaml
* ORM (Eloquent or Doctrine)

Puede ver todos los registros de cambios [aquí](changelogs/es.md)

## 3. User Access (original database)

| User   | Pass   |
|--------|--------|
| admin  | root   |
| editor | editor |

## 4. Owner

Support this project with a `like` or `subscription` [here](https://www.youtube.com/watch?v=8h14L21eJsg)

| Project          | Version | Link                 |
|------------------|---------|----------------------|
| Original version | v1.0.0  | http://mysoftup.com  |
| New version      | vx.0.0  |                      |

## 5. Installation for XAMPP
1. Download .zip file or clone this repository. If you download zip file then rename the directory, for this example the directory name will be `sistema-escolar`.
2. Migrate database from `sistema-cursos/db/db_school.sql` in your personal database like phpmyadmin.
3. Edit `.env` file with your credentials.

| Variable       | Example Value                    | Description                    |
|----------------|----------------------------------|--------------------------------|
| APP_PATH       | http://localhost/sistema-escolar | Your domain path               |
| DIRECTORY_PATH |                                  | Not necessary                  |
| DB_HOST        | localhost                        | Database server                |
| DB_NAME        | db_school                        | Database name                  |
| DB_USER        | root                             | Database user                  |
| DB_PASS        |                                  | Database pass (empty password) |
| TIME_ZONE      | America/Mexico_City              | Set your locale time zone      |
    
If you need deployment this project in shared hosting then replace APP_PATH value with your domain `https://mydomain.com` and copy all content from `sistema-escolar` directory in your root path of your hosting.

If you need deployment this project in custom xampp directory then change the APP_PATH value with localhost and the directory file that contain this project.

4. Copy `sistema-escolar` directory into htdocs and the result will be: `htdocs/sistema-escolar/<project-content>`
5. Additionally, edit `sistema-escolar/js/controls/unsetnotif.js` file. Search line 26 and replace `http://localhost/sistema-escolar` for your domain or your localhost directory. 
6. In browser search `http://localhost/sistema-escolar`
7. Don't forget set permission for `users` and `old` directories from `sistema-escolar/images/<...>` to upload files.


![image](https://user-images.githubusercontent.com/43613125/160877647-2228e861-b991-419a-85cd-326550f49c50.png)

![image](https://user-images.githubusercontent.com/43613125/160877412-0c69c15e-c034-410d-bb00-7cd71bff8d6f.png)

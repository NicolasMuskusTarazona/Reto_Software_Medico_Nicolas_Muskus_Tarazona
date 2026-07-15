# Reto Software Medico Nicolas Muskus Tarazona

Aplicación desarrollada en **Symfony 1.4** como parte de un reto tecnico.

## Tecnologias

- Symfony 1.4
- sfGuard.
- MySQL (XAMPP)
- Bootstrap 5
- DataTables
- Open Library API

## Funcionalidades

- Autenticación de usuarios con **sfGuard**.
- CRUD de **Pacientes**.
- CRUD de **Doctores**.
- CRUD de **Citas**.
- Consulta de libros mediante **Open Library API** con busqueda y usando DataTables.

## Acceso

**URL principal**

```text
http://localhost/reto_symfony/web/frontend_dev.php/
```

**Usuario administrador**
```bash
php symfony doctrine:build --all --and-load
php symfony guard:create-user --is-super-admin admin@softwaremedico.com SoftwareMedico medico123
```
```text
Usuario: SoftwareMedico
Contraseña: medico123
```

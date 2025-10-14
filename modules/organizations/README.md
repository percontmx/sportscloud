# SportsCloud - Módulo de Organizaciones.

## Namespace

**Percontmx\SportsCloud\Organizations**

## Descripción

Este módulo se encarga de gestionar las organizaciones de la aplicación.

Las organizaciones hacen referencias a federaciones, asociaciones deportivas, clubes y demás organismos que gestionan ligas deportivas.

## Modelo de datos

```mermaid
erDiagram
    o[ORGANIZATIONS] {
        INT id PK 
        VARCHAR full_name UK 
        VARCHAR short_name UK 
        DATETIME created_at 
        DATETIME updated_at 
        DATETIME deleted_at 
    }
```

## Dependencias

Este módulo no depende, al momento, de ningun otro módulo.

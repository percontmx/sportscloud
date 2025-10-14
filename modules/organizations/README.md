# SportsCloud - Módulo de Organizaciones.

## Namespace

**Percontmx\SportsCloud\Organizations**

## Descripción

Este módulo se encarga de gestionar las organizaciones de la aplicación.

Las organizaciones hacen referencias a federaciones, asociaciones deportivas, clubes y demás organismos que gestionan ligas deportivas.

## Modelo de datos

```mermaid
erDiagram
    ORGANIZATIONS {
        INT id PK
        VARCHAR full_name UNIQUE
        VARCHAR short_name UNIQUE
        DATETIME created_at
        DATETIME updated_at
        DATETIME deleted_at
    }
```
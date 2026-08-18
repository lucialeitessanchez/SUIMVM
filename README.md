# RUFEM — Sistema de Registro Único de Femicidios

Sistema web para el registro, sistematización y análisis de información vinculada a la muerte violenta de mujeres, desarrollado con el objetivo de establecer la ruta crítica del caso a través de los distintos organismos intervinientes.

## Objetivo

Centralizar y estandarizar la carga de información sobre casos de muerte violenta de mujeres, permitiendo su seguimiento, análisis y la generación de reportes que aporten a la toma de decisiones en política pública.

## Alcance

El sistema es utilizado por la **Secretaría de Mujeres, Género y Diversidad(SMGyD)** y por otros organismos vinculados a la temática, entre ellos:

- **MPA** — Ministerio Público de la Acusación
- **CAJ** — Colegio de Abogados / Cuerpo de Abogados (según corresponda)
- **PGCSJ** — Procuración General / Corte Suprema de Justicia

Cada organismo accede con personal designado a tal efecto, con permisos acotados a su rol dentro del proceso.

## Usuarios

El acceso está restringido al personal designado por cada organismo participante. La autenticación se realiza contra el **Sistema de Single Sign-On (SSO/CAS) del Gobierno de Santa Fe** — no existen usuarios ni contraseñas propias de la aplicación.

## Arquitectura

El sistema sigue una arquitectura de despliegue de 4 componentes (ver diagrama de despliegue en `doc/`):

| Componente | Detalle |
|---|---|
| Cliente Web | Navegador (Chrome, Firefox, Edge) — acceso vía HTTPS |
| Servidor de Aplicaciones | Apache + PHP, aplicación Symfony (controladores, servicios, entidades Doctrine, vistas Twig) |
| Servidor de Base de Datos | MySQL — base `migyd_rufem` |
| Servidor de Archivos | Almacenamiento de archivos adjuntos (documentos, imágenes) |
| Servidor de Autenticación | CAS institucional (`sso.santafe.gob.ar`) |

## Stack tecnológico

- **PHP** ≥ 8.1
- **Symfony** 6.4 (LTS)
- **Doctrine ORM / DBAL** — persistencia y migraciones
- **MySQL** — base de datos (`migyd_rufem`)
- **Symfony AssetMapper** + Stimulus/Turbo — assets del frontend (sin build con npm/webpack)
- **stgbundle/cas-bundle** — autenticación contra el SSO de Santa Fe
- **Symfony Mailer** — envío de notificaciones por correo
- **Symfony Messenger** — cola de mensajería (transporte vía Doctrine)
- **Twig** — motor de plantillas

## Requisitos para desarrollo local

- PHP >= 8.1 con extensiones `ctype`, `iconv`
- Composer 2.x
- MySQL 5.7+ / 8.0 accesible (o el motor configurado en `DATABASE_URL`)
- Symfony CLI (opcional, recomendado)
- Docker (opcional — el repo incluye `compose.yaml` / `compose.override.yaml` con Postgres + Mailpit para entorno local; no reflejan el motor usado en testing/producción, que es MySQL)

## Instalación en desarrollo

```bash
git clone https://github.com/lucialeitessanchez/SUIMVM.git rufem
cd rufem
composer install
```

Configurar variables de entorno locales creando `.env.local` (no versionado) a partir de `.env`, y ajustando al menos `DATABASE_URL`.

```bash
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
symfony server:start
# o bien
php -S 127.0.0.1:8000 -t public
```

## Variables de entorno

La aplicación se configura exclusivamente por variables de entorno (estándar Symfony `.env`). Las variables relevantes son:

| Variable | Uso |
|---|---|
| `APP_ENV` | Entorno de ejecución (`dev`, `test`, `prod`) |
| `APP_SECRET` | Secreto interno de Symfony (CSRF, firmas, etc.) |
| `TRUSTED_PROXIES` | Rangos de IP de proxies/balanceadores confiables |
| `DATABASE_URL` | Cadena de conexión a MySQL |
| `MESSENGER_TRANSPORT_DSN` | Transporte de Symfony Messenger |
| `MAILER_DSN` | Servidor SMTP para el envío de correos |


## Autenticación

La autenticación de usuarios se realiza contra el SSO institucional (CAS) configurado en `config/packages/cas.yaml`. No hay registro de usuarios dentro de la aplicación; el acceso depende de que la cuenta institucional del usuario esté habilitada en el organismo correspondiente.

## Documentación adicional

- `doc/` — diagramas de arquitectura y despliegue
- `doc/Instructivo_Despliegue_RUFEM.docx` — instructivo de despliegue a producción

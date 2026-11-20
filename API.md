# Documentación Oficial - API de Transparencia

Bienvenido a la documentación técnica de la **API de Transparencia y Acceso a la Información Pública**. Esta API RESTful centraliza los servicios de consulta ciudadana de obligaciones de transparencia, catálogo normativo, gestión documental de enlaces (`datoslinks`), estrados y notificaciones oficiales, así como el módulo de autenticación y gestión de usuarios.

---

## Tabla de Contenidos

1. [Información General y Arquitectura](#1-información-general-y-arquitectura)
2. [Convenciones HTTP y Manejo de Errores](#2-convenciones-http-y-manejo-de-errores)
3. [Seguridad y Autenticación](#3-seguridad-y-autenticación)
4. [Especificación de Endpoints](#4-especificación-de-endpoints)
   - [Sistema](#sistema)
   - [Catálogos Normativos](#catálogos-normativos)
   - [Búsqueda y Consultas](#búsqueda-y-consultas)
   - [Enlaces y Gestión Documental](#enlaces-y-gestión-documental)
   - [Estrados y Notificaciones](#estrados-y-notificaciones)
   - [Autenticación y Cuentas de Usuario](#autenticación-y-cuentas-de-usuario)
5. [Ejemplos de Integración Multilenguaje](#5-ejemplos-de-integración-multilenguaje)
6. [Diccionario de Datos](#6-diccionario-de-datos)
7. [Archivos de Integración (OpenAPI y Postman)](#7-archivos-de-integración-openapi-y-postman)

---

## 1. Información General y Arquitectura

- **Framework**: Laravel 11.x (PHP 8.2+)
- **Base de Datos**: MySQL / MariaDB (`dbarchivostransparencia`)
- **Estilo de Arquitectura**: RESTful / JSON API con separación por contextos de dominio.
- **Ruta Base Local**:
  ```text
  http://127.0.0.1:8000/api
  ```
- **Cabeceras Obligatorias**:
  Todas las peticiones que envíen o consuman datos deben incluir los siguientes encabezados HTTP:
  ```http
  Content-Type: application/json
  Accept: application/json
  ```

---

## 2. Convenciones HTTP y Manejo de Errores

La API utiliza códigos de estado HTTP estándar para comunicar el resultado de cada solicitud:

| Código HTTP | Significado | Descripción |
|---|---|---|
| `200 OK` | Operación exitosa | Consultas GET y validaciones exitosas. |
| `201 Created` | Recurso creado | Nuevos registros creados en `datoslinks`, `estrados` o `usuarios`. |
| `401 Unauthorized` | No autorizado | Credenciales de usuario inválidas o token Sanctum ausente. |
| `422 Unprocessable Entity` | Error de validación | Criterios o parámetros requeridos faltantes o con formato incorrecto. |
| `500 Internal Server Error` | Error de servidor | Excepción no controlada en la capa de persistencia o base de datos. |

### Esquema de Respuestas de Éxito al Crear Recursos
```json
{
  "success": true,
  "message": "Se ha guardado correctamente",
  "id": 105
}
```

### Esquema de Error de Validación (`422`)
```json
{
  "message": "Los datos proporcionados no son válidos.",
  "errors": {
    "Usuario": [
      "El campo Usuario es obligatorio.",
      "El campo Usuario ya ha sido tomado."
    ],
    "Pasword": [
      "El campo Pasword debe tener al menos 8 caracteres."
    ]
  }
}
```

### Esquema de Error de Servidor (`500`)
```json
{
  "success": false,
  "message": "Error al guardar el registro",
  "error": "Detalle técnico disponible únicamente cuando APP_DEBUG=true"
}
```

---

## 3. Seguridad y Autenticación

1. **Gestión de Contraseñas**:
   - Las contraseñas de usuario se almacenan con cifrado hash unidireccional utilizando **Bcrypt** (`Hash::make()`).
   - El sistema es retrocompatible con contraseñas heredadas mediante verificación criptográfica segura `Hash::check()` o `hash_equals()`.
   - **Privacidad**: Todos los campos de contraseña (`Pasword`, `Password`, `password`) son automáticamente ocultos o eliminados de las respuestas del servidor.
2. **Tokens de Sesión (Laravel Sanctum)**:
   - El endpoint protegido `GET /api/user` requiere autenticación mediante token Bearer:
     ```http
     Authorization: Bearer <tu_token_aqui>
     ```

---

## 4. Especificación de Endpoints

### Sistema

#### `GET /test`
Comprueba la disponibilidad del servicio.

- **Respuesta `200 OK`**:
  ```json
  {
    "msg": "Mi primer Respuesta de API"
  }
  ```

---

### Catálogos Normativos

#### `GET /fracciones`
Devuelve la lista completa de las fracciones normativas registradas en la tabla `fraccions`.

- **Respuesta `200 OK`**:
  ```json
  [
    {
      "Id": 1,
      "Nombre": "Fracción I - Marco Normativo",
      "Consecutivo": 1
    },
    {
      "Id": 2,
      "Nombre": "Fracción II - Estructura Orgánica",
      "Consecutivo": 2
    }
  ]
  ```

#### `GET /articulos`
Devuelve la lista completa de artículos normativos (tabla `articulos`).

- **Respuesta `200 OK`**:
  ```json
  [
    {
      "Id": 1,
      "Nombre": "Artículo 70"
    },
    {
      "Id": 2,
      "Nombre": "Artículo 71"
    }
  ]
  ```

#### `GET /elementos` *(o alias `GET /generaelemento`)*
Devuelve el catálogo de elementos y clasificaciones de la tabla `elementos`.

- **Respuesta `200 OK`**:
  ```json
  [
    {
      "Id": 1,
      "NombreElemento": "Articulo"
    },
    {
      "Id": 8,
      "NombreElemento": "Leyes"
    }
  ]
  ```

#### `POST /generaelemento` *(o alias `POST /elementos`)*
Registra un nuevo elemento o clasificación en la tabla `elementos`. Valida que el nombre sea obligatorio, no supere 100 caracteres y sea único en la tabla para evitar duplicados.

- **Cuerpo de la Solicitud (JSON)**:
  | Campo | Tipo | Requerido | Reglas |
  |---|---|---|---|
  | `NombreElemento` | string | **Sí** | Obligatorio, máx. 100 caracteres, único en `elementos`. |
  | `nombre` | string | No | Alias aceptado para `NombreElemento`. |

  *Ejemplo de solicitud:*
  ```json
  {
    "NombreElemento": "Auditorías Externas"
  }
  ```

- **Respuesta `201 Created`**:
  ```json
  {
    "success": true,
    "message": "Elemento creado correctamente",
    "elemento": {
      "Id": 13,
      "NombreElemento": "Auditorías Externas"
    }
  }
  ```

- **Respuesta `422 Unprocessable Entity` (Error de Validación)**:
  ```json
  {
    "message": "Los datos proporcionados no son válidos.",
    "errors": {
      "NombreElemento": [
        "El campo NombreElemento ya ha sido tomado."
      ]
    }
  }
  ```

#### `GET /elementosclase`
Devuelve la lista completa de clases de elementos registradas en la tabla `elementosclase`.

- **Respuesta `200 OK`**:
  ```json
  [
    {
      "Id": 1,
      "Clase": "A"
    },
    {
      "Id": 2,
      "Clase": "B"
    },
    {
      "Id": 3,
      "Clase": "C"
    }
  ]
  ```

---

### Búsqueda y Consultas

#### `GET /consulta`
Punto de entrada base para consultas genéricas. Retorna un arreglo vacío por defecto.

- **Respuesta `200 OK`**:
  ```json
  []
  ```

#### `POST /getconsulta`
Permite buscar documentos e hipervínculos cruzando `datoslinks`, `fraccions` y `trimestre`.

> [!NOTE]
> **Regla de Filtro Comodín**: Enviar el valor numérico `0` en cualquiera de los filtros desactiva dicha condición (equivale a seleccionar "todos").

- **Cuerpo de la Solicitud (JSON)**:
  | Campo | Tipo | Requerido | Descripción |
  |---|---|---|---|
  | `annio` | entero | No | Año fiscal (ej. `2024` o `0` para todos). |
  | `idarticulo` | entero | No | ID del artículo (ej. `1` o `0` para todos). |
  | `idfraccion` | entero | No | ID de la fracción (ej. `2` o `0` para todas). |
  | `idtrimestre` | entero | No | ID del trimestre (ej. `1` o `0` para todos). |

  *Ejemplo de solicitud:*
  ```json
  {
    "annio": 2024,
    "idarticulo": 1,
    "idfraccion": 1,
    "idtrimestre": 1
  }
  ```

- **Respuesta `200 OK`**:
  ```json
  [
    {
      "ID": 105,
      "Link": "https://transparencia.gob.mx/doctos/acta2024.pdf",
      "NombreArchivo": "acta2024.pdf",
      "Annio": 2024,
      "idArticulo": 1,
      "Fraccion": "Fracción I",
      "NombreCorto": "1er Trim",
      "Trimestre": 1,
      "Consecutivo": 1
    }
  ]
  ```

#### `GET /getleyes`
Devuelve los documentos de la tabla `datoslinks` clasificados con el identificador `8` (Leyes y Reglamentos).

- **Respuesta `200 OK`**:
  ```json
  [
    {
      "ID": 34,
      "Link": "https://transparencia.gob.mx/leyes/ley_transparencia.pdf",
      "Documento": "Ley General de Transparencia",
      "Annio": 2024
    }
  ]
  ```

---

### Enlaces y Gestión Documental

#### `POST /registrar`
Registra un nuevo hipervínculo o documento en la tabla `datoslinks`. Admite nombres de parámetros tanto en minúsculas como en formato PascalCase.

- **Cuerpo de la Solicitud (JSON)**:
  | Campo | Tipo | Requerido | Descripción |
  |---|---|---|---|
  | `link` o `Link` | string | **Sí** | URL del documento (máx. 600 car.). |
  | `nombrearchivo` o `NombreArchivo` | string | No | Nombre del archivo descargable (máx. 255 car.). |
  | `annio` o `Annio` | entero | No | Año fiscal (ej. `2026`). |
  | `idarticulo` o `idArticulo` | entero | No | ID del artículo normativo. |
  | `idfraccion` o `IdFraccion` | entero | No | ID de la fracción. |
  | `idtrimestre` o `idTrimestre` | entero | No | ID del trimestre (1 a 4). |
  | `clasificacion` o `Clasificacion` | entero | No | Clasificación documental (ej. `1`). |
  | `urlcarpeta` | string | No | Ruta o carpeta física (máx. 500 car.). |
  | `linkhtml` o `LinklHtml` | string | No | Contenido HTML o hipervínculo alternativo. |
  | `idponencia` | entero | No | ID de la ponencia asignada. |
  | `idtipoestrado` | entero | No | ID del tipo de estrado si aplica. |

  *Ejemplo de solicitud:*
  ```json
  {
    "Link": "https://transparencia.gob.mx/doctos/cuenta_publica_2026.pdf",
    "NombreArchivo": "cuenta_publica_2026.pdf",
    "Annio": 2026,
    "idArticulo": 1,
    "IdFraccion": 2,
    "idTrimestre": 1,
    "Clasificacion": 1
  }
  ```

- **Respuesta `201 Created`**:
  ```json
  {
    "success": true,
    "message": "Se ha guardado correctamente",
    "id": 7832
  }
  ```

---

### Estrados y Notificaciones

#### `GET /getestrados`
Obtiene las notificaciones de estrados cruzando la tabla `estrados` con `tipoestrados` y `ponencia`.

- **Respuesta `200 OK`**:
  ```json
  [
    {
      "Id": 1,
      "Annio": 2024,
      "NombreArchivo": "cedula_notificacion_01.pdf",
      "IdTipoEstrado": 1,
      "Link": "https://transparencia.gob.mx/estrados/cedula_01.pdf",
      "IdPonencia": 1,
      "Fecha": "2024-01-01 10:00:00",
      "Estrado": "Estrado Digital",
      "ponencia": "Ponencia Primera"
    }
  ]
  ```

#### `POST /registrarestrado`
Registra una nueva notificación o estrado en la base de datos.

- **Cuerpo de la Solicitud (JSON)**:
  | Campo | Tipo | Requerido | Descripción |
  |---|---|---|---|
  | `idtipoestrado` o `IdTipoEstrado` | entero | **Sí** | ID del tipo de estrado. |
  | `idponencia` o `IdPonencia` | entero | **Sí** | ID de la ponencia. |
  | `fecha` o `Fecha` | string | **Sí** | Fecha del estrado (`YYYY-MM-DD`). |
  | `nombrearchivo` o `NombreArchivo` | string | **Sí** | Nombre del archivo (máx. 255 car.). |
  | `link` o `Link` | string | No | Enlace al archivo publicado. |
  | `annio` o `Annio` | entero | No | Año correspondiente. |

  *Ejemplo de solicitud:*
  ```json
  {
    "idtipoestrado": 1,
    "idponencia": 1,
    "fecha": "2026-11-13",
    "nombrearchivo": "notificacion_acuerdo_133.pdf",
    "link": "https://transparencia.gob.mx/estrados/notificacion_133.pdf",
    "annio": 2026
  }
  ```

- **Respuesta `201 Created`**:
  ```json
  {
    "success": true,
    "message": "Se ha guardado correctamente",
    "id": 133
  }
  ```

---

### Autenticación y Cuentas de Usuario

#### `POST /login`
Inicia sesión validando credenciales contra la tabla `usuarios`. Admite `Pasword` o `password` para compatibilidad.

- **Cuerpo de la Solicitud (JSON)**:
  ```json
  {
    "Usuario": "admin",
    "Pasword": "password123"
  }
  ```

- **Respuesta `200 OK`**:
  ```json
  {
    "message": "Login correcto",
    "usuario": {
      "id": 1,
      "Usuario": "admin",
      "Nombre": "Administrador",
      "ApellidoP": "Sistema",
      "Amaterno": "Central",
      "CorreoElectronico": "admin@transparencia.gob.mx"
    }
  }
  ```

- **Respuesta `401 Unauthorized`**:
  ```json
  {
    "message": "Usuario o password incorrecto"
  }
  ```

#### `POST /validarusuario`
Valida de forma directa si un par de usuario y contraseña son auténticos.

- **Cuerpo de la Solicitud (JSON)**:
  ```json
  {
    "Usuario": "admin",
    "Pasword": "password123"
  }
  ```

- **Respuesta `200 OK`**:
  ```json
  {
    "message": "Usuario validado correctamente",
    "usuario": {
      "id": 1,
      "Usuario": "admin",
      "Nombre": "Administrador",
      "ApellidoP": "Sistema",
      "Amaterno": "Central",
      "CorreoElectronico": "admin@transparencia.gob.mx"
    },
    "Success": true
  }
  ```

- **Respuesta `401 Unauthorized`**:
  ```json
  {
    "message": "Usuario o password incorrecto",
    "Success": false
  }
  ```

#### `POST /registrarusuario` *(o `POST /usuarios`)*
Crea una cuenta de usuario nueva con contraseña protegida mediante hash Bcrypt. Valida unicidad de usuario y correo.

- **Cuerpo de la Solicitud (JSON)**:
  | Campo | Tipo | Requerido | Reglas |
  |---|---|---|---|
  | `Usuario` | string | **Sí** | Único en tabla `usuarios`, máx. 255. |
  | `Nombre` | string | **Sí** | Máx. 255 car. |
  | `ApellidoP` | string | **Sí** | Apellido paterno, máx. 255 car. |
  | `Amaterno` | string | **Sí** | Apellido materno, máx. 255 car. |
  | `Pasword` | string | **Sí** | Mínimo 8 caracteres. |
  | `CorreoElectronico` | string | **Sí** | Email válido, único en tabla `usuarios`. |

  *Ejemplo de solicitud:*
  ```json
  {
    "Usuario": "carlos_perez",
    "Nombre": "Carlos",
    "ApellidoP": "Pérez",
    "Amaterno": "Gómez",
    "Pasword": "ClaveSegura2026!",
    "CorreoElectronico": "carlos.perez@transparencia.gob.mx"
  }
  ```

- **Respuesta `201 Created`**:
  ```json
  {
    "message": "Usuario creado correctamente",
    "usuario": {
      "id": 5,
      "Usuario": "carlos_perez"
    }
  }
  ```

#### `GET /user`
Retorna el perfil del usuario autenticado mediante Laravel Sanctum.

- **Cabeceras**:
  ```http
  Authorization: Bearer <token_sanctum>
  ```
- **Respuesta `200 OK`**:
  ```json
  {
    "id": 1,
    "name": "Administrador",
    "email": "admin@transparencia.gob.mx"
  }
  ```

---

## 5. Ejemplos de Integración Multilenguaje

### cURL

```bash
# Registrar un enlace de transparencia
curl -X POST "http://127.0.0.1:8000/api/registrar" \
     -H "Content-Type: application/json" \
     -H "Accept: application/json" \
     -d '{
       "link": "https://transparencia.gob.mx/doctos/informe.pdf",
       "nombrearchivo": "informe.pdf",
       "annio": 2026,
       "idarticulo": 1,
       "idfraccion": 1,
       "idtrimestre": 1,
       "clasificacion": 1
     }'
```

### JavaScript / TypeScript (Fetch API)

```typescript
interface RegistrarEnlacePayload {
  link: string;
  nombrearchivo: string;
  annio: number;
  idarticulo: number;
  idfraccion: number;
  idtrimestre: number;
  clasificacion: number;
}

async function registrarEnlace(datos: RegistrarEnlacePayload) {
  const response = await fetch("http://127.0.0.1:8000/api/registrar", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
      "Accept": "application/json"
    },
    body: JSON.stringify(datos)
  });

  if (!response.ok) {
    const errorData = await response.json();
    throw new Error(errorData.message || "Error al registrar");
  }

  return await response.json();
}
```

### Python (Requests)

```python
import requests

url = "http://127.0.0.1:8000/api/getconsulta"
headers = {
    "Content-Type": "application/json",
    "Accept": "application/json"
}
payload = {
    "annio": 2024,
    "idarticulo": 1,
    "idfraccion": 1,
    "idtrimestre": 1
}

response = requests.post(url, json=payload, headers=headers)
if response.status_code == 200:
    documentos = response.json()
    print(f"Se encontraron {len(documentos)} documentos.")
else:
    print(f"Error {response.status_code}: {response.text}")
```

### PHP (Guzzle)

```php
use GuzzleHttp\Client;

$client = new Client(['base_uri' => 'http://127.0.0.1:8000/api/']);

$response = $client->post('login', [
    'json' => [
        'Usuario' => 'admin',
        'Pasword' => 'password123',
    ],
    'headers' => [
        'Accept' => 'application/json',
    ]
]);

$datos = json_decode($response->getBody()->getContents(), true);
echo "Bienvenido: " . $datos['usuario']['Nombre'];
```

---

## 6. Diccionario de Datos

| Tabla | Clave Primaria | Propósito | Columnas Principales |
|---|---|---|---|
| `datoslinks` | `ID` (bigint) | Enlaces y metadatos de documentos | `Link`, `NombreArchivo`, `Annio`, `idArticulo`, `IdFraccion`, `idTrimestre`, `Clasificacion`, `FechaCreacion`, `PesoKb` |
| `estrados` | `Id` (int) | Publicación de estrados y cédulas | `Annio`, `NombreArchivo`, `IdTipoEstrado`, `Link`, `IdPonencia`, `Fecha`, `created_at`, `updated_at` |
| `usuarios` | `id` (smallint) | Cuentas de acceso | `Usuario`, `Nombre`, `ApellidoP`, `Amaterno`, `Pasword`, `CorreoElectronico` |
| `articulos` | `Id` (int) | Catálogo de artículos | `Id`, `Nombre` |
| `fraccions` | `Id` (int) | Catálogo de fracciones | `Id`, `Nombre`, `Consecutivo` |
| `ponencia` | `Id` (int) | Catálogo de ponencias | `Id`, `Nombre` |
| `tipoestrados` | `Id` (int) | Catálogo de tipos de estrados | `Id`, `Nombre` |
| `trimestre` | `Id` (int) | Periodos trimestrales | `Id`, `Nombre`, `NombreCorto` |
| `elementos` | `Id` (smallint) | Catálogo de elementos y secciones | `Id`, `NombreElemento` |
| `elementosclase` | `Id` (smallint) | Catálogo de clases de elementos | `Id`, `Clase` |

---

## 7. Archivos de Integración (OpenAPI y Postman)

El repositorio incluye herramientas para pruebas interactivas e importación directa en entornos de desarrollo:

1. **Especificación OpenAPI 3.1.0**:
   - Archivo: [openapi.yaml](file:///E:/Proyectos/TransparenciaPHP/proyectolaravel/apitransparencia/openapi.yaml)
   - Compatible con **Swagger Editor**, **Swagger UI**, **Redoc**, **Stoplight Studio** y **Scalar**.
2. **Colección de Postman v2.1.0**:
   - Archivo: [postman_collection.json](file:///E:/Proyectos/TransparenciaPHP/proyectolaravel/apitransparencia/postman_collection.json)
   - Listo para importar en **Postman** o **Insomnia** con variables de entorno (`{{baseUrl}}`, `{{token}}`) y payloads precargados.

# API de Transparencia

## Información general

URL base local:

```text
http://127.0.0.1:8000/api
```

Todas las solicitudes que envían datos deben utilizar:

```http
Content-Type: application/json
Accept: application/json
```

## Endpoints

### Probar la API

```http
GET /test
```

Respuesta `200`:

```json
{
  "msg": "Mi primer Respuesta de API"
}
```

### Listar fracciones

```http
GET /fracciones
```

Devuelve todas las fracciones registradas.

### Listar artículos

```http
GET /articulos
```

Devuelve todos los artículos registrados.

### Consultar enlaces

```http
GET /consulta
```

Devuelve la consulta general de enlaces. Actualmente devuelve una lista vacía.

### Obtener hipervínculos filtrados

```http
POST /getconsulta
```

Parámetros JSON. El valor `0` omite el filtro:

```json
{
  "annio": 2024,
  "idarticulo": 1,
  "idfraccion": 1,
  "idtrimestre": 1
}
```

Todos los parámetros son opcionales y numéricos. La respuesta contiene `ID`, `Link`, `NombreArchivo`, `Annio`, artículo, fracción y trimestre.

### Registrar un enlace

```http
POST /registrar
```

Ejemplo:

```json
{
  "link": "https://example.com/documento.pdf",
  "nombrearchivo": "documento.pdf",
  "annio": 2024,
  "idarticulo": 1,
  "idfraccion": 1,
  "idtrimestre": 1,
  "clasificacion": 1
}
```

Respuesta `200`:

```json
{
  "message": "Se ha guardado correctamente"
}
```

### Obtener leyes

```http
GET /getleyes
```

Devuelve los documentos cuya clasificación es `8`.

### Obtener estrados

```http
GET /getestrados
```

Devuelve los estrados junto con el nombre del tipo de estrado y la ponencia.

### Registrar un estrado

```http
POST /registrarestrado
```

Ejemplo:

```json
{
  "idtipoestrado": 1,
  "idponencia": 1,
  "fecha": "2024-01-01",
  "nombrearchivo": "archivo.pdf"
}
```

Respuesta `200`:

```json
{
  "message": "Se ha guardado correctamente"
}
```

## Autenticación y usuarios

### Iniciar sesión

```http
POST /login
```

El controlador acepta `Pasword` o `password` para facilitar la compatibilidad con usuarios existentes.

Ejemplo:

```json
{
  "Usuario": "juan123",
  "Pasword": "password-seguro"
}
```

Respuesta exitosa `200`:

```json
{
  "message": "Login correcto",
  "usuario": {
    "id": 1,
    "Usuario": "juan123",
    "Nombre": "Juan"
  }
}
```

Las contraseñas no se incluyen en la respuesta. Si las credenciales son incorrectas, responde `401`:

```json
{
  "message": "Usuario o password incorrecto"
}
```

### Validar usuario

```http
POST /validarusuario
```

Valida directamente `Usuario` y `Pasword` contra la tabla `Usuarios`.

Ejemplo:

```json
{
  "Usuario": "juan123",
  "Pasword": "password-seguro"
}
```

Respuesta exitosa `200`:

```json
{
  "message": "Usuario validado correctamente",
  "usuario": {
    "id": 1,
    "Usuario": "juan123"
  }
}
```

Si las credenciales no coinciden, responde `401`.

### Registrar usuario

```http
POST /registrarusuario
```

También está disponible como `POST /usuarios`.

Campos requeridos:

| Campo | Tipo | Descripción |
|---|---|---|
| `Usuario` | string | Nombre de usuario único. |
| `Nombre` | string | Nombre del usuario. |
| `ApellidoP` | string | Apellido paterno. |
| `Amaterno` | string | Apellido materno. |
| `Pasword` | string | Contraseña de mínimo 8 caracteres. |
| `CorreoElectronico` | string | Correo electrónico único. |

Ejemplo:

```json
{
  "Usuario": "juan123",
  "Nombre": "Juan",
  "ApellidoP": "Pérez",
  "Amaterno": "López",
  "Pasword": "password-seguro",
  "CorreoElectronico": "juan@example.com"
}
```

Respuesta `201`:

```json
{
  "message": "Usuario creado correctamente",
  "usuario": {
    "id": 1,
    "Usuario": "juan123"
  }
}
```

La contraseña se almacena cifrada y nunca se devuelve en la respuesta.

Errores de validación: `422 Unprocessable Entity`.

### Usuario autenticado

```http
GET /user
```

Requiere autenticación mediante `auth:sanctum`.

## Códigos HTTP utilizados

| Código | Significado |
|---|---|
| `200` | Solicitud procesada correctamente. |
| `201` | Usuario creado correctamente. |
| `401` | Credenciales incorrectas. |
| `422` | Error de validación. |

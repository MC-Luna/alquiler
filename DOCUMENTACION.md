# MotoTrabajo — Documentación del Sistema (KAIROS v1.5)

> Aplicación web de gestión integral de alquiler de motos. Permite administrar contratos, clientes, motos, pagos, caja, sedes y usuarios, con control de acceso por roles.

---

## Tabla de Contenidos

1. [Stack Tecnológico](#1-stack-tecnológico)
2. [Estructura de Archivos](#2-estructura-de-archivos)
3. [Flujo de Autenticación](#3-flujo-de-autenticación)
4. [Sistema de Roles y Permisos](#4-sistema-de-roles-y-permisos)
5. [Arquitectura General](#5-arquitectura-general)
6. [Módulos del Sistema](#6-módulos-del-sistema)
7. [Esquema de Base de Datos](#7-esquema-de-base-de-datos)
8. [Clases PHP Principales](#8-clases-php-principales)
9. [Comunicación AJAX](#9-comunicación-ajax)
10. [Integraciones Externas](#10-integraciones-externas)
11. [Flujos de Trabajo Completos](#11-flujos-de-trabajo-completos)
12. [Seguridad](#12-seguridad)

---

## 1. Stack Tecnológico

| Capa | Tecnología |
|------|-----------|
| Frontend | HTML5, jQuery 3.x, Bootstrap 4, SCSS |
| Backend | PHP (sin framework) |
| Base de Datos | MySQL (mysqli) |
| Servidor | Hosting compartido (cPanel) |
| SMS | Elibom API |
| PDF | Servicio externo `pdf.mototrabajo.com` |
| Gráficos | Chart.js |
| Calendario | FullCalendar |
| Notificaciones UI | jQuery Growl |
| Tablas | DataTables |

---

## 2. Estructura de Archivos

```
/
├── login.html                  # Página de inicio de sesión
├── index.php                   # Shell principal de la app (post-login)
├── logout.php                  # Cierre de sesión
├── router.php                  # Enrutador simple de vistas
├── seg.php                     # Validación de sesión activa
├── cbd.php                     # Conexión directa a BD (modo legacy)
├── rol_1.php                   # Vista dashboard rol Administrador
├── conexion.example.php        # Plantilla de conexión (sin credenciales)
│
├── conexion/
│   └── conexion.php            # Clase conexion_db (credenciales reales)
│
├── php/                        # Clases de negocio
│   ├── usuarios.php            # Autenticación y registro de usuarios
│   ├── registros.php           # Guardado genérico de registros
│   ├── cuentas.php             # Gestión de cuentas de acceso
│   ├── notificaciones.php      # Envío de emails con plantillas
│   ├── cobros.php              # Lógica de cobros + SMS (Elibom)
│   ├── upload.php              # Carga de archivos
│   ├── include/                # Sub-módulos de lógica
│   │   ├── usuarios.php
│   │   ├── sedes.php
│   │   ├── documentacion.php
│   │   ├── congelamientos.php
│   │   └── lead.php
│   ├── elibom/                 # SDK SMS Elibom
│   └── plantillas/             # Templates HTML para emails
│       ├── notificacion_usuario_nuevo.html
│       ├── notificacion_contrato_nuevo.html
│       ├── notificacion_sede_nueva.html
│       ├── notificacion_servicio_nuevo.html
│       ├── notificacion_congelamiento.html
│       └── notificacion_descongelar.html
│
├── ajax/                       # Endpoints AJAX (POST → JSON)
│   ├── login.php
│   ├── registro_cliente.php
│   ├── registro_contrato.php
│   ├── pago_contrato.php
│   ├── actualizar_pago.php
│   ├── actualizar_pago2.php
│   ├── reversar_pago.php
│   ├── listado.php
│   ├── listado_consulta.php
│   ├── listado_consulta2.php
│   ├── listado_consulta3.php
│   ├── listado_consulta4.php
│   ├── listado_select.php
│   ├── consultar_campo.php
│   ├── json_consulta.php
│   ├── cargar_opciones.php
│   ├── subir_documento.php
│   ├── eliminar_documento.php
│   ├── eliminar_cobro.php
│   ├── infomodal_WEBSERVICE.php
│   ├── registro_guardar.php
│   ├── registro_editar.php
│   ├── registro_deposito.php
│   ├── registro_erogacion.php
│   ├── registrar_usuarios.php
│   ├── registrar_deposito.php
│   ├── agregar_empresa.php
│   ├── restablecer_contrasenia.php
│   ├── descongelar.php
│   ├── cargar_opciones.php
│   ├── chart_movimientos.php
│   ├── mov_total_caja_menor.php
│   ├── mov_transferencia.php
│   ├── total_caja_menor.php
│   ├── servicio_facturas.php
│   └── zonapago.php
│
├── views/                      # Vistas cargadas dinámicamente en index.php
│   ├── rol_1.php               # Dashboard principal (cobros y clientes)
│   ├── rol_2.php               # Calendario
│   ├── rol_3.php               # Reportes y análisis
│   ├── rol_3b.php
│   ├── rol_4.php
│   ├── rol_56.php
│   ├── rol_6.php
│   ├── contratos.php
│   ├── contratos2.php
│   ├── contratos3.php
│   ├── clientes.php
│   ├── clientes2.php
│   ├── motos.php
│   ├── motos2.php
│   ├── caja_mayor.php
│   ├── caja_menor.php
│   ├── mov_caja_menor.php
│   ├── movimientos.php
│   ├── movimiento_cuentas.php
│   ├── cartera.php
│   ├── cobro_extras.php
│   ├── congelamientos.php
│   ├── documentacion.php
│   ├── usuarios.php
│   ├── sedes.php
│   ├── servicios.php
│   ├── erogaciones.php
│   ├── cuentas.php
│   ├── estado_general.php
│   ├── configuracion.php
│   ├── calendario.php
│   ├── logs.php
│   ├── modulo_leads.php
│   ├── formularios_leads.php
│   ├── exportar.php
│   └── formulario-crear.php / formulario-editar.php
│
├── js/
│   ├── mototrabajo.js          # Funciones globales de la app
│   ├── formApp.js              # Manejo de formularios y modales
│   └── jquery.growl.js         # Notificaciones toast
│
├── config/
│   ├── events.php              # AJAX de eventos de calendario
│   ├── fullcalendar/           # Librería FullCalendar
│   └── tabs/                   # Componente de pestañas
│
├── css/                        # Estilos
├── scss/                       # Fuente SCSS
├── img/                        # Imágenes de la app
├── docs/                       # Documentos de ejemplo / prueba
├── vendor/                     # Dependencias (FontAwesome, Bootstrap, jQuery)
└── archivos_cargados/          # Documentos subidos por usuarios
```

---

## 3. Flujo de Autenticación

```
[login.html]
  └─ Usuario ingresa email + contraseña
  └─ Click "Ingresar" → iniciar_sesion()
       └─ AJAX POST → ajax/login.php
            └─ new usuarios() → login($email, $pass)
                 └─ MD5($pass) → compara con tbl_usuarios.pass
                      ├─ Falla → JSON {resultado: 0, mensaje: "Error..."}
                      │    └─ growl.error() en pantalla
                      └─ OK → $_SESSION[codigo_rol, codigo_sede, email, codigo_usuario]
                           └─ JSON {resultado: 1}
                                └─ location.href = "index.php"

[index.php]
  └─ Verifica $_SESSION → si no existe, redirect a login.html
  └─ Carga datos del usuario desde BD
  └─ Renderiza shell (topbar + sidebar + content)
  └─ cargar_view('views/rol_' + codigo_rol + '.php')
       └─ Vista del dashboard según el rol del usuario

[logout.php]
  └─ session_unset() + session_destroy()
  └─ redirect a login.html
```

**Variables de sesión activas:**

| Variable | Contenido |
|----------|-----------|
| `$_SESSION["codigo_usuario"]` | ID del usuario |
| `$_SESSION["codigo_rol"]` | ID del rol |
| `$_SESSION["codigo_sede"]` | ID de la sede |
| `$_SESSION["email"]` | Email del usuario |

---

## 4. Sistema de Roles y Permisos

### Roles disponibles

| codigo_rol | Nombre | Descripción |
|-----------|--------|-------------|
| 1 | SuperAdministrador | Acceso total |
| 2 | Administrador | Gestión operativa completa |
| 3 | Empleado | Acceso operativo básico |
| 4 | Desarrollo | Rol técnico |
| 5 | Abogado | Módulos legales/contratos |
| 6 | Turismo Bogotá | Módulo de turismo |
| 7 | Contabilidad | Módulo financiero |

### Cómo funciona el control de acceso

1. Al cargar `index.php`, se llama a `ajax/cargar_opciones.php`
2. Ese endpoint consulta `tbl_rol_accesos` para el rol de la sesión
3. Retorna las opciones de menú disponibles (nombre, ruta, formulario, icono)
4. El menú se construye dinámicamente en el sidebar
5. Al hacer click en una opción, se carga la vista con `cargar_view(formulario)`

```sql
SELECT ac.* FROM tbl_rol_accesos rac
INNER JOIN tbl_accesos ac ON ac.codigo_acceso = rac.codigo_acceso
WHERE rac.codigo_rol = [codigo_rol_sesion]
```

### Vista de inicio por rol

```javascript
cargar_view('views/rol_' + codigo_rol + '.php')
// Ej: rol 1 → views/rol_1.php (dashboard de cobros y clientes)
//     rol 2 → views/rol_2.php (calendario)
//     rol 3 → views/rol_3.php (reportes)
```

---

## 5. Arquitectura General

```
┌─────────────────────────────────────────────────────┐
│                    NAVEGADOR                        │
│                                                     │
│  login.html ──────────────────► index.php           │
│                                     │               │
│  ┌──────────────────────────────────┼────────────┐  │
│  │            index.php Shell       │            │  │
│  │  ┌──────────┐  ┌────────────────▼──────────┐ │  │
│  │  │ Sidebar  │  │   #div_principal_form      │ │  │
│  │  │ (menú    │  │                            │ │  │
│  │  │  dinám.) │  │  views/rol_X.php           │ │  │
│  │  │          │  │  views/contratos.php       │ │  │
│  │  │          │  │  views/clientes.php  ...   │ │  │
│  │  └──────────┘  └────────────────────────────┘ │  │
│  └────────────────────────────────────────────────┘  │
│                         │ AJAX POST                  │
└─────────────────────────┼───────────────────────────┘
                          │
┌─────────────────────────▼───────────────────────────┐
│                   SERVIDOR PHP                      │
│                                                     │
│  ajax/*.php  ──►  php/*.php  ──►  conexion/         │
│  (endpoints)      (clases)        conexion.php      │
│                                       │             │
└───────────────────────────────────────┼─────────────┘
                                        │
┌───────────────────────────────────────▼─────────────┐
│                  MySQL (pruebaag_app)               │
│                  68 tablas                          │
└─────────────────────────────────────────────────────┘
```

### Patrón de comunicación AJAX

```
Frontend (jQuery)
  $.ajax({ type:'POST', url:'ajax/endpoint.php', data:{...} })
    └─► PHP endpoint
          └─► Clase PHP (php/*.php)
                └─► conexion_db (conexion/conexion.php)
                      └─► MySQL
                ◄─── Resultado (array)
          ◄─── JSON encode
    ◄─── JSON response
  success: function(data){ /* actualizar DOM */ }
```

---

## 6. Módulos del Sistema

### A. Contratos (`views/contratos.php`)

Núcleo del negocio. Gestiona los contratos de alquiler de motos.

**Tipos de contrato:**
- Alquiler (`t=alquiler`)
- Alquiler OC / Ocupación Código (`t=alquileroc`)
- Turismo (`t=turismo`)
- Corporativo (`t=corporativo`)

**Datos del contrato:**

| Campo | Descripción |
|-------|-------------|
| fecha_inicio / fecha_final | Vigencia del contrato |
| frecuencia_cobro | Cada cuántos días se cobra |
| fecha_proximo_cobro | Próxima fecha de pago |
| valor_pagar | Valor del canon |
| mora | Mora acumulada |
| deposito / extras | Valores adicionales |
| kim_inicial / kim_final | Kilometraje inicial y final |
| activo | 1 = activo, 0 = cerrado |
| congelado | 1 = congelado temporalmente |

**Flujo de creación:**
1. Usuario llena formulario → modal en `views/contratos.php`
2. POST a `ajax/registro_contrato.php`
3. INSERT en `tbl_contratos`
4. Estado de moto → cambia a "alquilada" (`estado_moto=1`)
5. Se registran documentos adjuntos
6. Se envía email de notificación (`notificacion_contrato_nuevo.html`)
7. Se genera link a PDF del contrato

**PDF del contrato:**
```
https://pdf.mototrabajo.com/?t=[tipo]&id=[codigo_contrato]
```

---

### B. Clientes (`views/clientes.php`)

Registro completo de clientes con información personal, contacto y documentación.

**Datos capturados:**
- Documento: tipo, número, lugar de expedición
- Personales: nombres, apellidos, fecha de nacimiento
- Contacto: celular, teléfono, correo
- Redes: Facebook, Twitter, Instagram, TikTok
- Dirección: tipo vía, número, barrio
- Vivienda: tipo (propia/arriendo) y tiempo
- Uso de moto: laboral / turismo
- Origen del lead

**Estados del cliente (`codigo_estado`):**
- 0: Sin estado
- 4: Convertido desde lead

---

### C. Motos (`views/motos.php`)

Inventario de motos con datos técnicos, documentos y estado de disponibilidad.

**Datos clave:**

| Campo | Descripción |
|-------|-------------|
| placa | Única en el sistema |
| marca / linea / modelo | Especificación técnica |
| chasis / propietario | Datos legales |
| fecha_soat / fecha_tecno | Vencimiento de documentos |
| costo / precio | Valor compra y alquiler |
| estado_moto | 0=disponible, 1=alquilada |
| codigo_sede | Sede donde está la moto |

---

### D. Pagos / Cobros

#### Vista de cobros pendientes (`rol_1.php`)
- Lista contratos con `pendiente_pago = 1`
- Muestra cliente, moto, valor, fecha y mora
- Permite registrar el pago directamente

#### Procesamiento de pago (`ajax/pago_contrato.php`)

```
Usuario registra pago
  └─► Verifica si valor > total pendiente
        ├─ Sí → genera saldo positivo en tbl_saldo_positivo
        └─ No → pago normal
  └─► INSERT en tbl_contrato_pagos
  └─► UPDATE tbl_contratos: pendiente_pago=0, fecha_proximo_cobro += frecuencia
  └─► En próximo cobro: aplica saldo positivo si existe
```

**Formas de pago aceptadas:**
- Efectivo
- Tarjeta de crédito
- Consignación
- Transferencia
- PayPal
- Otro

**Campos del pago:**

| Campo | Descripción |
|-------|-------------|
| valor | Monto pagado |
| numero_soporte | Número de referencia |
| forma_pago | Medio de pago |
| codigo_banco | Banco involucrado |
| saldo_positivo | Excedente aplicado |
| pago_realizado | Fecha del pago |
| codigo_usuario | Quién registró |

---

### E. Congelamientos (`views/congelamientos.php`)

Permite pausar temporalmente un contrato activo.

**Flujo:**
1. Administrador selecciona contrato → indica motivo y fecha de cierre
2. `tbl_contratos.congelado = 1` → el contrato no genera cobros
3. Notificación por email al cliente
4. Al descongelar (`ajax/descongelar.php`): `congelado = 0`, recalcula próxima fecha de cobro
5. Se registra en `tbl_congelamientos` con fecha y motivo

---

### F. Caja (`views/caja_mayor.php`, `caja_menor.php`)

**Caja Mayor:** Caja principal que recibe todos los ingresos por cobros.

**Caja Menor:** Caja operacional para gastos del día a día.

**Movimientos (`views/movimientos.php`):**

| Campo | Descripción |
|-------|-------------|
| codigo_cuenta | Cuenta bancaria asociada |
| codigo_concepto | Concepto del movimiento |
| codigo_origen | Origen (cobro, erogación, etc.) |
| valor | Monto |
| observaciones | Detalle libre |
| codigo_sede | Sede del movimiento |

**Transferencias:** Se pueden mover fondos entre caja mayor y caja menor.

---

### G. Erogaciones (`views/erogaciones.php`)

Registro de gastos y egresos del negocio.

| Campo | Descripción |
|-------|-------------|
| tipo | Tipo de erogación |
| nombre / identificacion | Proveedor o persona |
| concepto | Descripción del gasto |
| nofactura | Número de factura |
| valor | Monto del egreso |
| archivo | Soporte del gasto (imagen/PDF) |

---

### H. Sedes (`views/sedes.php`)

Cada sede es un punto de operación del negocio.

| Campo | Descripción |
|-------|-------------|
| empresa | Empresa a la que pertenece |
| nombre | Código/nombre de sede |
| direccion | Dirección física |
| telefono / celular | Contacto |
| codigo_ciudad | Ciudad de la sede |

---

### I. Usuarios (`views/usuarios.php`)

Gestión de usuarios del sistema (no confundir con clientes).

**Creación de usuario:**
1. Administrador llena formulario
2. POST a `ajax/registrar_usuarios.php`
3. Sistema genera contraseña aleatoria (8 caracteres)
4. Contraseña se guarda como `MD5(contraseña)`
5. Se envía email con credenciales al nuevo usuario

---

### J. Leads (`views/modulo_leads.php`)

CRM básico para captura y seguimiento de prospectos.

**Estados del lead:**
- Nuevo
- Contactado
- Convertido a cliente
- Rechazado

**Formularios de captura:** Configurables en `views/formularios_leads.php`.

---

### K. Documentación (`views/documentacion.php`)

Gestión de documentos adjuntos a clientes y contratos.

- Tipos de documentos configurables en `tbl_conf_docs`
- Archivos subidos a `/archivos_cargados/`
- Nombres de archivo generados automáticamente (no nombre original)
- Se pueden eliminar con registro en `tbl_conf_docs_eliminados`

---

### L. Reportes (`views/rol_3.php`)

Módulo de análisis disponible para el rol Analista.

- Gráficos de movimientos por período (Chart.js)
- Filtros por fecha, cuenta y sede
- Exportación a Excel
- Exportación a PDF

---

### M. Calendario (`views/calendario.php`)

Agenda de eventos usando FullCalendar.

- Crea, mueve y edita eventos
- Eventos almacenados en `calendario_eventos`
- AJAX en `config/events.php`

---

### N. Logs de Auditoría (`views/logs.php`)

Tabla `tbl_logs` registra acciones de usuarios.

| Campo | Contenido |
|-------|-----------|
| codigo_usuario | Quién realizó la acción |
| accion | Qué hizo |
| tabla | En qué tabla |
| codigo | ID del registro afectado |

---

## 7. Esquema de Base de Datos

### Tablas principales

#### `tbl_contratos`
```
codigo_contrato       INT PK AUTO
codigo_tipo_contrato  TINYINT
fecha_inicio_contrato DATE
fecha_final_contrato  DATE
frecuencia_cobro      INT          ← días entre cobros
fecha_proximo_cobro   DATE
pendiente_pago        TINYINT      ← 1=cobro pendiente
valor_pagar           DECIMAL(10,3)
mora                  DECIMAL(10,3)
activo                TINYINT      ← 1=activo
congelado             TINYINT      ← 1=congelado
codigo_moto           INT FK
codigo_cliente        INT FK
deposito / extras     DOUBLE
kim_inicial / kim_final INT
banco_entrada/salida  VARCHAR
fecha_generacion      TIMESTAMP
```

#### `tbl_clientes`
```
codigo_cliente        INT PK AUTO
tipo_documento        VARCHAR(3)
identificacion        VARCHAR(20)
nombres / apellidos   VARCHAR(45)
celular / telefono    VARCHAR(50)
correo                VARCHAR(50)
facebook/twitter/instagram/tiktok VARCHAR(200)
vivienda_tipo/tiempo  VARCHAR(20)
uso_moto              CHAR(255)
codigo_estado         TINYINT
origen_lead           TINYINT
fecha_ingreso         TIMESTAMP
```

#### `tbl_motos`
```
codigo_moto     INT PK AUTO
placa           VARCHAR(10) UNIQUE
marca / linea   VARCHAR(20)
modelo          VARCHAR(20)
chasis          VARCHAR(20)
color           VARCHAR(20)
fecha_soat      DATE         ← vence SOAT
fecha_tecno     DATE         ← vence tecnomecánica
costo / precio  DOUBLE
estado_moto     INT          ← 0=disponible, 1=alquilada
codigo_sede     INT FK
codigo_estado   INT
```

#### `tbl_contrato_pagos`
```
codigo_contrato_pago  INT PK AUTO
codigo_contrato       INT FK
codigo_cobro          INT
valor                 DOUBLE
numero_soporte        VARCHAR(80)
forma_pago            VARCHAR(20)
codigo_banco          SMALLINT
saldo_positivo        INT(20)
validado              TINYINT
codigo_usuario        INT FK
fecha_registro        TIMESTAMP
observaciones         VARCHAR(255)
```

#### `tbl_usuarios`
```
codigo_usuario   INT PK AUTO
codigo_rol       TINYINT FK → tbl_roles
codigo_sede      INT FK → tbl_sedes
identificacion   VARCHAR(11)
nombres/apellidos VARCHAR(45)
email            VARCHAR(45)
pass             TEXT         ← MD5
activo           TINYINT      ← 1=activo
fecha_ingreso    TIMESTAMP
```

#### `tbl_sedes`
```
codigo_sede     SMALLINT PK AUTO
empresa         VARCHAR(20)
nombre          VARCHAR(50)
direccion       VARCHAR(150)
telefono/celular/correo VARCHAR
codigo_ciudad   INT FK
codigo_empresa  TINYINT
```

#### `tbl_movimientos`
```
codigo_movimiento  INT PK AUTO
codigo_cuenta      SMALLINT FK
codigo_proveedor   INT FK
codigo_concepto    INT FK
codigo_origen      TINYINT     ← origen del movimiento
origen_id          INT         ← ID del origen (ej: codigo_contrato)
referencia         VARCHAR(255)
valor              DOUBLE
codigo_usuario     INT FK
codigo_sede        INT FK
codigo_estado      TINYINT     ← 2=confirmado
fecha_creacion     TIMESTAMP
```

#### `tbl_erogaciones`
```
codigo_egorar    INT PK AUTO
tipo             VARCHAR(255)
identificacion   VARCHAR(20)
nombre           VARCHAR(300)
concepto         VARCHAR(300)
nofactura        VARCHAR(20)
valor            DOUBLE
archivo          VARCHAR(50)
codigo_sede      SMALLINT FK
codigo_usuario   INT FK
fecha_registro   TIMESTAMP
```

#### `tbl_congelamientos`
```
codigo_congelar  INT PK AUTO
codigo_contrato  INT FK
codigo_cliente   INT FK
codigo_usuario   INT FK
motivo           TEXT
finalizado       TINYINT    ← 0=activo, 1=descongelado
fecha_registro   TIMESTAMP
fecha_cierre     DATE
```

### Tablas de configuración y permisos

| Tabla | Propósito |
|-------|-----------|
| `tbl_roles` | Roles del sistema |
| `tbl_accesos` | Opciones del menú (nombre, ruta, formulario) |
| `tbl_rol_accesos` | Relación rol ↔ opciones de menú |
| `tbl_conf_consultas` | Consultas SQL dinámicas para listados |
| `tbl_conf_consultas_opciones` | Columnas y opciones de los listados |
| `tbl_conf_docs` | Tipos de documentos |
| `tbl_conf_docs_padres` | Categorías de documentos |
| `tbl_conf_docs_tipos` | Subtipos de documentos |

### Tablas de soporte

| Tabla | Propósito |
|-------|-----------|
| `tbl_logs` | Auditoría de acciones |
| `tbl_bancos` | Catálogo de bancos colombianos |
| `tbl_ciudades` | Ciudades |
| `tbl_paises` | Países |
| `tbl_idiomas` | Idiomas |
| `tbl_movimiento_conceptos` | Conceptos de movimiento |
| `tbl_movimiento_estados` | Estados de movimiento |
| `tbl_movimiento_origen` | Orígenes de movimiento |
| `tbl_saldo_positivo` | Saldos a favor por cliente |
| `tbl_seguimientos` | Seguimiento de clientes/contratos |
| `tbl_cartera_cobros` | Gestión de cartera |
| `tbl_moto_sucesos` | Historial de eventos de moto |
| `calendario_eventos` | Eventos del calendario |

---

## 8. Clases PHP Principales

### `conexion_db` (`conexion/conexion.php`)

Clase de acceso a datos. Toda la app la usa a través de esta clase.

```php
__construct()                                      // Abre conexión MySQL
ejecutar_sql($sql)                                 // Ejecuta cualquier SQL
buscar($tabla, $condicion)                         // SELECT * WHERE → array ASSOC
insertar($tabla, $datos)                           // INSERT → devuelve insert_id
actualizar($tabla, $campos, $condicion)            // UPDATE → bool
borrar($tabla, $condicion)                         // DELETE → bool
listado_select($tabla, $valor, $etiqueta, $filtro) // Para llenar <select>
consultar_campo($tabla, $nombre_campo, $filtro)    // Obtiene un campo específico
cambiar_estado_moto($idmoto, $estado)             // UPDATE estado de moto
cambiar_estado_cliente($idcliente, $estado)       // UPDATE estado de cliente
close()                                            // Cierra conexión
```

### `usuarios` (`php/usuarios.php`)

```php
login($email, $pass)        // MD5($pass) → busca en tbl_usuarios → inicia sesión
registrar(array $data)      // Crea usuario, genera clave aleatoria, envía email
forgetPassword($email)      // Genera nueva clave, actualiza BD, envía email
logout()                    // Destruye sesión, redirige a login
```

### `notificaciones` (`php/notificaciones.php`)

```php
consulta($email, $nombre_consulta, $filtro)
// Busca template en tbl_conf_consultas
// Reemplaza variables en la plantilla HTML
// Envía email vía mail()
```

**Plantillas de email disponibles:**
- `notificacion_usuario_nuevo`
- `notificacion_contrato_nuevo`
- `notificacion_sede_nueva` / `nuevo`
- `notificacion_servicio_nuevo`
- `notificacion_congelamiento`
- `notificacion_descongelar`

---

## 9. Comunicación AJAX

### Funciones globales (`js/mototrabajo.js`)

```javascript
// Carga una vista en el área principal
cargar_view(formulario)
  → $("#div_principal_form").load(formulario)

// Genera una tabla HTML desde BD (configurable)
listado_consulta(div, consulta, filtro, opcion)
  → POST ajax/listado_consulta.php

// Llena un <select> dinámicamente
rellenar_select(tabla, valor, etiqueta, filtro, id_select)
  → POST ajax/listado_select.php

// Consulta un campo puntual de BD
consultar_campo(tabla, nombre_campo, filtro)
  → POST ajax/consultar_campo.php

// Copia texto al portapapeles (zona de pagos)
copyToClipboard(text)
```

### Endpoints AJAX por área

| Área | Archivo | Acción |
|------|---------|--------|
| Auth | `ajax/login.php` | Valida credenciales |
| Clientes | `ajax/registro_cliente.php` | Crea cliente |
| Contratos | `ajax/registro_contrato.php` | Crea contrato |
| Pagos | `ajax/pago_contrato.php` | Procesa pago |
| Pagos | `ajax/actualizar_pago.php` | Actualiza pago |
| Pagos | `ajax/reversar_pago.php` | Revierte pago |
| Listados | `ajax/listado_consulta.php` | Tabla dinámica |
| Selects | `ajax/listado_select.php` | Opciones de select |
| Docs | `ajax/subir_documento.php` | Sube archivo |
| Docs | `ajax/eliminar_documento.php` | Elimina archivo |
| Caja | `ajax/mov_total_caja_menor.php` | Movimientos caja |
| Menú | `ajax/cargar_opciones.php` | Menú según rol |
| Congelamientos | `ajax/descongelar.php` | Descongela contrato |
| Usuarios | `ajax/registrar_usuarios.php` | Crea usuario |
| Reportes | `ajax/chart_movimientos.php` | Datos de gráficos |

---

## 10. Integraciones Externas

### SMS — Elibom

- **SDK:** `/php/elibom/`
- **Uso:** `php/cobros.php`
- **Propósito:** Envío automático de SMS al cliente cuando hay cobro pendiente
- **Credenciales:** Definidas en `php/cobros.php`

### PDF de Contratos

- **URL:** `https://pdf.mototrabajo.com/`
- **Parámetros:** `?t=[tipo_contrato]&id=[codigo_contrato]`
- **Tipos:** `alquiler`, `alquileroc`, `turismo`, `corporativo`

### Zona de Pagos (Cliente)

- **URL:** `https://mototrabajo.com/zona-de-pagos/`
- **Parámetros:** `?t=[tipo_doc]&n=[identificacion]`
- Permite al cliente ver su estado de cuenta
- El administrador puede copiar y enviar el link

### Email

- Vía función PHP `mail()`
- Remitente: `info@app.mototrabajo.com`
- Templates HTML en `/php/plantillas/`

---

## 11. Flujos de Trabajo Completos

### Flujo 1: Ingreso de nuevo cliente y contrato

```
1. Registro del cliente
   views/clientes.php → modal "Nuevo Cliente"
     └─► POST ajax/registro_cliente.php
           └─► INSERT tbl_clientes
           └─► Notificación email (opcional)

2. Asignación de moto
   views/motos.php → verificar disponibles (estado_moto=0)

3. Creación del contrato
   views/contratos.php → modal "Nuevo Contrato"
     └─► Selecciona cliente + moto + tipo + fechas + valor
     └─► POST ajax/registro_contrato.php
           └─► INSERT tbl_contratos
           └─► UPDATE tbl_motos SET estado_moto=1
           └─► Carga documentos → /archivos_cargados/
           └─► Email notificación contrato
           └─► Retorna link PDF del contrato
```

### Flujo 2: Cobro periódico

```
Sistema (o cron) detecta: tbl_contratos WHERE fecha_proximo_cobro <= HOY
                                            AND pendiente_pago=1
                                            AND activo=1
                                            AND congelado=0
  └─► Se muestra en dashboard rol_1.php (lista de cobros pendientes)

Administrador registra pago:
  └─► POST ajax/pago_contrato.php
        └─► Verifica saldo positivo previo
        └─► Calcula total (valor_pagar + mora - saldo_positivo)
        └─► Si pago > total → genera saldo positivo en tbl_saldo_positivo
        └─► INSERT tbl_contrato_pagos
        └─► UPDATE tbl_contratos:
              pendiente_pago = 0
              fecha_proximo_cobro += frecuencia_cobro días
        └─► INSERT tbl_movimientos (registro financiero)
```

### Flujo 3: Congelamiento de contrato

```
views/congelamientos.php → "Congelar contrato"
  └─► POST ajax/registro_guardar.php
        └─► INSERT tbl_congelamientos (motivo, fecha_cierre)
        └─► UPDATE tbl_contratos SET congelado=1
        └─► Email notificación congelamiento al cliente

[Cuando termina el congelamiento]
views/congelamientos.php → "Descongelar"
  └─► POST ajax/descongelar.php
        └─► UPDATE tbl_congelamientos SET finalizado=1
        └─► UPDATE tbl_contratos:
              congelado = 0
              fecha_proximo_cobro = FECHA_ACTUAL + frecuencia_cobro
        └─► Email notificación descongelamiento
```

---

## 12. Seguridad

### Autenticación
- Contraseñas almacenadas como `MD5(contraseña)` — hash simple, sin salt
- Sesión PHP estándar (`session_start()`)
- Verificación de sesión en `seg.php` (incluido en vistas protegidas)

### Control de acceso
- Menú dinámico según rol (no se puede navegar a módulos sin permiso de menú)
- Verificación de `$_SESSION["codigo_rol"]` en endpoints críticos

### Archivos subidos
- Almacenados en `/archivos_cargados/` (excluido del repositorio git)
- Nombre de archivo generado por el sistema, no el nombre original
- Procesados por `php/upload.php`

### Puntos a mejorar (deuda técnica)
- MD5 sin salt es vulnerable a rainbow tables — se recomienda `password_hash()` / `bcrypt`
- Las queries SQL usan concatenación directa (riesgo de SQL Injection) — se recomienda `prepared statements`
- `$GLOBALS` como patrón de inyección de dependencias ya fue corregido (era error en PHP 8.1+)

---

## Datos de conexión (Entorno de pruebas)

| Parámetro | Valor |
|-----------|-------|
| Host | localhost (interno) / pruebagencia.online (remoto) |
| Base de datos | pruebaag_app |
| Usuario BD | pruebaag_app |
| FTP Host | ftp.pruebagencia.online |
| FTP Usuario | app@pruebagencia.online |
| URL App | https://pruebagencia.online/app/ |

> ⚠️ No subir credenciales reales al repositorio. Usar `conexion.example.php` como referencia.

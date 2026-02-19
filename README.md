# Bienes-Raices-MVC
Sistema de gestión de propiedades inmobiliarias con arquitectura MVC, implementado con PHP orientado a objetos.

## 🚀 Tecnologías Utilizadas

### Backend
- **PHP 8+** - Lenguaje de programación del lado del servidor
- **MySQL** - Base de datos relacional
- **mysqli** - Extensión de PHP para conectar con MySQL
- **Composer** - Gestor de dependencias de PHP
- **Namespaces & PSR-4** - Autoloading automático de clases
- **PHPMailer 7.0** - Envío de correos electrónicos SMTP
- **Intervention Image 3.11** - Procesamiento y manipulación de imágenes
- **PHP dotenv 5.6** - Gestión de variables de entorno

### Frontend
- **HTML5** - Estructura de las páginas
- **CSS3 / SASS** - Estilos y preprocesador CSS
- **JavaScript** - Interactividad del lado del cliente
- **Modernizr** - Detección de características del navegador

### Herramientas de Desarrollo
- **Gulp 4** - Automatización de tareas
  - Compilación de SASS a CSS
  - Minificación de CSS y JavaScript
  - Optimización de imágenes
  - Conversión a WebP
  - Autoprefixer para compatibilidad
  - Sourcemaps para debugging
- **npm** - Gestor de paquetes
- **Git** - Control de versiones

## 📚 Aprendizajes del Proyecto

### PHP y Base de Datos
- ✅ Conexión a base de datos MySQL con mysqli
- ✅ Operaciones CRUD (Create, Read, Update, Delete)
- ✅ Uso de variables de entorno (.env) para proteger credenciales
- ✅ Autenticación y manejo de sesiones
- ✅ Hasheo de contraseñas con `password_hash()`
- ✅ Validación de formularios del lado del servidor
- ✅ Separación de código con includes y templates
- ✅ Envío de correos electrónicos con PHPMailer
- ✅ Procesamiento de imágenes con Intervention Image

### Frontend
- ✅ Diseño responsive con CSS
- ✅ Uso de SASS para estilos modulares y mantenibles
- ✅ Organización de archivos CSS con arquitectura BEM/modular
- ✅ Manipulación del DOM con JavaScript

### DevOps y Buenas Prácticas
- ✅ Control de versiones con Git
- ✅ Protección de credenciales con .env y .gitignore
- ✅ Automatización de tareas repetitivas con Gulp
- ✅ Optimización de assets (imágenes, CSS, JS)
- ✅ Estructura de proyecto organizada y escalable
- ✅ Uso de Composer para gestión de dependencias

### Programación Orientada a Objetos (POO) y Patrones de Diseño
- ✅ Patrón **MVC** (Model-View-Controller)
- ✅ Implementación del patrón **Active Record**
- ✅ Uso de **namespaces** para organizar el código
- ✅ **Autoloading** con Composer (PSR-4)
- ✅ Creación de clase base `ActiveRecord` con funcionalidad compartida
- ✅ **Herencia**: Clases `Propiedad`, `Vendedor` y `Admin` extienden de `ActiveRecord`
- ✅ **Encapsulamiento**: Propiedades protegidas y públicas según necesidad
- ✅ **Router personalizado** para manejo de rutas
- ✅ Métodos CRUD reutilizables:
  - `crear()` - Inserta nuevos registros
  - `actualizar()` - Actualiza registros existentes
  - `eliminar()` - Elimina registros
  - `guardar()` - Decide entre crear o actualizar
  - `all()` - Obtiene todos los registros
  - `find()` - Busca registro por ID
- ✅ Validación de datos en cada modelo
- ✅ Sanitización de atributos para prevenir inyección SQL
- ✅ Manejo de errores centralizado
- ✅ Uso de **propiedades estáticas** para configuración de BD
- ✅ **Controllers** para lógica de negocio:
  - `LoginController` - Autenticación de usuarios
  - `PropiedadController` - Gestión de propiedades
  - `VendedorController` - Gestión de vendedores
  - `PaginasController` - Páginas públicas

#### Estructura de Clases
```
models/
├── ActiveRecord.php    # Clase base con patrón Active Record
├── Propiedad.php       # Modelo para propiedades inmobiliarias
├── Vendedor.php        # Modelo para vendedores
└── Admin.php           # Modelo para administradores

controllers/
├── LoginController.php      # Autenticación
├── PropiedadController.php  # Gestión de propiedades
├── VendedorController.php   # Gestión de vendedores
└── PaginasController.php    # Páginas estáticas
```

## ⚙️ Configuración del Proyecto

1. **Clonar el repositorio**
   ```bash
   git clone [url-del-repo]
   cd Bienes-Raices-MVC
   ```

2. **Instalar dependencias de PHP**
   ```bash
   composer install
   ```

3. **Instalar dependencias de Node**
   ```bash
   npm install
   ```

4. **Configurar base de datos**
   - Crea un archivo `.env` en la raíz del proyecto
   - Configura tus credenciales de base de datos y usuario:
     ```
     DB_HOST=localhost
     DB_USER=tu_usuario
     DB_PASS=tu_contraseña
     DB_NAME=bienesraices_mvc
     EMAIL=tu_email@ejemplo.com
     PASSWORD=tu_password_email
     ```

5. **Crear usuario inicial de administrador**
   ```bash
   php usuario.php
   ```

6. **Compilar assets**
   ```bash
   npm run dev
   ```

7. **Iniciar servidor local**
   ```bash
   php -S localhost:8000
   ```

8. **Acceder al proyecto**
   - Frontend: `http://localhost:8000`
   - Admin: `http://localhost:8000/admin`

## 📁 Estructura del Proyecto

```
Bienes-Raices-MVC/
├── controllers/       # Controladores MVC
├── models/           # Modelos con patrón Active Record
├── views/            # Vistas del proyecto
├── includes/         # Librerías y configuración
├── public/           # Directorio público (index.php)
├── src/              # Fuentes de SCSS y JS
├── vendor/           # Dependencias de Composer
├── package.json      # Dependencias de npm
├── composer.json     # Dependencias de PHP
├── gulpfile.js       # Configuración de Gulp
└── Router.php        # Enrutador personalizado
```

## 🔐 Seguridad

- Las credenciales se protegen con variables de entorno
- Las contraseñas se hashean con `password_hash()`
- Protección contra inyección SQL con prepared statements
- Validación y sanitización de entrada de datos
- Manejo de sesiones para autenticación segura

## 📧 Características

- 📝 Gestión completa de propiedades (CRUD)
- 👥 Gestión de vendedores
- 🔐 Sistema de autenticación seguro
- 📧 Envío de correos de contacto
- 🖼️ Procesamiento y optimización de imágenes
- 📱 Diseño responsive
- ♿ Sitio accesible y semántico
- 🎨 Interfaz administrativa intuitiva

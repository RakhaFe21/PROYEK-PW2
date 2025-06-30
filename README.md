# CI Artikel Feedback

Aplikasi web untuk manajemen artikel dan sistem feedback yang dibangun dengan CodeIgniter 4.

## 🚀 Fitur Utama

- **Manajemen Artikel**: CRUD lengkap untuk artikel dengan status draft/published
- **Sistem Feedback**: Form feedback untuk pengguna dan panel admin
- **Dashboard Admin**: Statistik dan monitoring data real-time
- **Validasi Input**: Validasi form yang ketat dengan pesan error custom
- **Keamanan**: CSRF protection, XSS prevention, SQL injection protection
- **Responsive Design**: Interface yang responsif dengan Bootstrap 5

## 📋 Prerequisites

- PHP 8.1 atau lebih tinggi
- MySQL 8.0+ / MariaDB 10.5+
- Composer 2.0+
- Web server (Apache/Nginx)

## 🛠️ Instalasi

1. **Clone repository**
   ```bash
   git clone [repository-url]
   cd ci_artikel_feedback
   ```

2. **Install dependencies**
   ```bash
   composer install
   ```

3. **Setup environment**
   ```bash
   cp env .env
   # Edit file .env sesuai konfigurasi database
   ```

4. **Konfigurasi database**
   ```env
   database.default.hostname = localhost
   database.default.database = ci_artikel_feedback
   database.default.username = root
   database.default.password = 
   database.default.DBDriver = MySQLi
   ```

5. **Jalankan migrasi**
   ```bash
   php spark migrate
   ```

6. **Set permissions**
   ```bash
   chmod -R 755 writable/
   ```

7. **Jalankan aplikasi**
   ```bash
   php spark serve
   ```

## 📁 Struktur Proyek

```
ci_artikel_feedback/
├── app/
│   ├── Controllers/          # Business logic
│   │   ├── ArtikelController.php
│   │   └── FeedbackController.php
│   ├── Models/               # Data models
│   │   ├── ArticleModel.php
│   │   └── FeedbackModel.php
│   ├── Views/                # Templates
│   │   ├── artikel/
│   │   ├── feedback/
│   │   └── layout/
│   └── Database/
│       └── Migrations/       # Database schema
├── public/                   # Public assets
├── system/                   # CodeIgniter core
└── writable/                 # Cache, logs, uploads
```

## 🗄️ Database Schema

### Tabel Articles
| Field      | Type         | Description           |
|------------|--------------|----------------------|
| id         | int(11)      | Primary key          |
| title      | varchar(255) | Judul artikel        |
| content    | text         | Konten artikel       |
| status     | enum         | draft/published      |
| created_at | datetime     | Waktu pembuatan      |
| updated_at | datetime     | Waktu update         |

### Tabel Feedback
| Field      | Type         | Description           |
|------------|--------------|----------------------|
| id         | int(11)      | Primary key          |
| name       | varchar(100) | Nama pengirim        |
| email      | varchar(100) | Email pengirim       |
| message    | text         | Pesan feedback       |
| created_at | datetime     | Waktu pengiriman     |

## 🔧 Penggunaan

### Manajemen Artikel
- **Dashboard**: `/` - Halaman utama dengan statistik
- **Daftar Artikel**: `/artikel` - Melihat semua artikel
- **Tambah Artikel**: `/artikel/create` - Form tambah artikel baru
- **Edit Artikel**: `/artikel/edit/{id}` - Edit artikel existing
- **Hapus Artikel**: `/artikel/delete/{id}` - Hapus artikel

### Sistem Feedback
- **Form Feedback**: `/feedback/form` - Form untuk user mengirim feedback
- **Admin Panel**: `/feedback` - Panel admin untuk melihat semua feedback
- **Hapus Feedback**: `/feedback/delete/{id}` - Hapus feedback

## 🔒 Keamanan

- **CSRF Protection**: Automatic CSRF token validation
- **Input Validation**: Comprehensive form validation
- **XSS Prevention**: Output escaping di semua view
- **SQL Injection Protection**: Query Builder dengan prepared statements
- **Session Security**: Secure session handling

## 🧪 Testing

```bash
# Jalankan semua test
php spark test

# Test unit tertentu
php spark test --filter=ArticleTest

# Test dengan coverage
php spark test --coverage
```

## 📊 Monitoring

### Log Files
- **Application Logs**: `writable/logs/`
- **Error Logs**: `writable/logs/log-YYYY-MM-DD.log`

### Performance
- Database queries dioptimasi dengan indexing
- Caching untuk data yang sering diakses
- Frontend assets dioptimasi

## 🚀 Deployment

### Production Setup
1. Set environment ke production
2. Konfigurasi database production
3. Set file permissions
4. Konfigurasi web server
5. Setup SSL certificate

### Environment Variables
```env
CI_ENVIRONMENT = production
app.baseURL = 'https://yourdomain.com'
database.default.hostname = your-db-host
database.default.database = your-db-name
database.default.username = your-db-user
database.default.password = your-db-password
encryption.key = your-32-char-key


**Dibuat dengan ❤️ menggunakan CodeIgniter 4**

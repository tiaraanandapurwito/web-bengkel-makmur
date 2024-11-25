<div align="center">
  <img src="{{ asset('assets/img/download.jpeg') }}" alt="Bengkel Makmur Logo" width="200">
</div>

## 🚀 Tentang Bengkel Makmur

Bengkel Makmur adalah solusi manajemen bengkel otomotif berbasis web yang komprehensif. Dirancang untuk mengoptimalkan operasional bengkel dengan mengintegrasikan berbagai aspek pengelolaan dalam satu platform terpadu.

### 💡 Mengapa Bengkel Makmur?

- **Efisiensi Operasional** - Otomatisasi proses manual dan pengurangan kesalahan administratif
- **Pelacakan Real-time** - Monitoring status pengerjaan kendaraan secara langsung
- **Manajemen Terpadu** - Pengelolaan pelanggan, inventory, dan SDM dalam satu sistem
- **Analisis Bisnis** - Laporan terperinci dan insights untuk pengambilan keputusan
- **Pengalaman Pelanggan** - Antarmuka yang user-friendly dengan fitur self-service

## ✨ Fitur

### 👥 Pelanggan
- Pendaftaran service online dengan pemilihan jadwal
- Tracking progress pengerjaan real-time
- Portal pelanggan untuk akses riwayat service
- Notifikasi otomatis via email/WhatsApp
- Konsultasi online dengan mekanik

### 👨‍💼 Admin/Pengelola
- Dashboard analytics komprehensif
- Manajemen inventory dengan alert stok minimum
- Sistem pengelolaan SDM dan penjadwalan
- Pelaporan keuangan otomatis
- CRM dan manajemen supplier

### 🔧 Mekanik
- Aplikasi mobile untuk update progress
- Digital checklist service
- Akses database manual teknis
- Sistem pelaporan kerja digital

## 🛠 Teknologi

- **Backend:** Laravel 11.x
- **Database:** MySQL 8.3
- **Frontend:** Bootstrap 5.2/5.3
- **API:** RESTful API
- **Real-time:** WebSocket (Pusher)
- **Payment:** Midtrans Integration
- **Mobile:** Progressive Web App (PWA)

## 📦 Instalasi

```bash
# Clone repository
git clone https://github.com/tiaraanandapurwito/web-bengkel-makmur.git

# Masuk ke direktori
cd sistem-bengkel

# Install dependencies
composer install
npm install

# Copy file environment
cp .env.example .env

# Generate key aplikasi
php artisan key:generate

# Migrasi database
php artisan migrate

# Jalankan seeder
php artisan db:seed

# Compile assets
npm run dev

# Jalankan server
php artisan serve
```

## 📌 Prasyarat

- PHP >= terbaru
- Composer>=terbaru
- Node.js >= terbaru
- MySQL >= terbaru

## 🔒 Keamanan

- Enkripsi data end-to-end
- Backup otomatis harian
- Role-based access control
- Activity logging
- SSL/TLS encryption

## 💬 Dukungan

Butuh bantuan? Hubungi tim support kami:

- 📧 Email: bengkelmakmur@gmail.com
- 📞 Telepon: (+62) 877-3505-4758
- 💬 WhatsApp: +62 877-3505-4758

## 📄 Lisensi

Hak Cipta © 2024 Bengkel Makmur. Seluruh hak dilindungi.

Perangkat lunak ini adalah properti Bengkel Makmur dan dilindungi oleh undang-undang hak cipta. Penggunaan, penggandaan, atau distribusi tanpa izin tertulis dilarang.

## 👥 Tim Pengembang

- Backend Developer - [Muhammad Fa'hriyansah]
- Frontend Developer - [Tiara Ananda Purwito]

---

<div align="center">
  Dibuat dengan ❤️ oleh Tim Bengkel Makmur
</div>

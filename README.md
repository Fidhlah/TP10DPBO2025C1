# TP10DPBO2025C1
Saya Muhammad Hafidh Fadhilah dengan NIM 2305672 mengerjakan Tugas Praktikum 10 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

# Desain Program 

1. **vehicles** (kendaraan)
   - id (primary key)
   - plate_number (nomor plat)
   - brand (merek)
   - model (model)
   - year (tahun)
   - owner_name (nama pemilik)
   - owner_phone (telepon pemilik)

2. **mechanics** (mekanik)
   - id (primary key)
   - name (nama)
   - specialization (spesialisasi)
   - phone (telepon)
   - experience_years (tahun pengalaman)

3. **services** (servis)
   - id (primary key)
   - vehicle_id (Foreign key ke kendaraan)
   - mechanic_id (Foreign key ke mekanik)
   - service_date (tanggal servis)
   - description (deskripsi)
   - cost (biaya)
   - status (pending/in_progress/completed)

# Alur Penjelasan
### 1. Manajemen Kendaraan
- Lihat daftar semua kendaraan
- Tambah kendaraan baru
- Edit detail kendaraan yang ada
- Hapus kendaraan
- Informasi yang dicatat: nomor plat, merek, model, tahun, detail pemilik

### 2. Manajemen Mekanik
- Lihat daftar semua mekanik
- Tambah mekanik baru
- Edit informasi mekanik
- Hapus mekanik
- Informasi yang dicatat: nama, spesialisasi, telepon, tahun pengalaman

### 3. Manajemen Servis
- Lihat semua catatan servis
- Buat entri servis baru
- Edit detail servis
- Hapus catatan servis
- Informasi yang dicatat: kendaraan, mekanik, tanggal servis, deskripsi, biaya, status

## Alur Aplikasi

1. **Akses Awal**
   - Pengguna mengunjungi `index.php`
   - Tampilan default menunjukkan daftar kendaraan
   - Menu navigasi menyediakan akses ke semua bagian

2. **Contoh Alur Data (Menambah Kendaraan)**
   ```
   Input Pengguna (Form) → index.php → VehicleViewModel → Model Vehicle → Database
   ```
   - Pengguna mengisi form kendaraan
   - Data dikirim ke index.php
   - VehicleViewModel memproses data
   - Model Vehicle melakukan operasi database

# Dokumentasi

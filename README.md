# Laravel Filament Project Management System

Modern ve güvenli bir Proje Yönetim Platformu.
Laravel 12, Filament v4, Livewire 3 ve Shield v4 kullanılarak geliştirilmiştir.

 ## 🚀 Özellikler

- ✅ Admin Panel (Filament v4)
- 🔐 Rol bazlı erişim kontrolü (Shield v4 + Spatie Permission)
- 👥 Client yönetimi
- 📁 Proje yönetimi (görsel yükleme, müşteri ve kategori ilişkisi)
- 🗂️ Category sistemi (Project / Task türleri)
- 📝 Task yönetimi (öncelik, durum, due date, kullanıcı atama)
- 🔗 Relation Managers
- Client → Projects
- Project → Tasks
- User → Tasks
- 📊 Dashboard widget’ları (System Overview, Recent Tasks, Recent Projects)
- ⚡ Livewire ile reactive frontend proje listesi
- 🎨 Responsive arayüz (Filament + Tailwind)

 ## 🛠️ Teknolojiler
-  Backend: Laravel 12
-  Admin Panel: Filament v4
-  Authorization: Shield v4, Spatie Permission
-  Frontend: Livewire 3, Tailwind CSS
-  Database: MySQL
-  PHP: 8.2+


  ## 📦 Kurulum
```bash
# Repository'yi klonlayın
git clone https://github.com/Emirhancapci/project-mgt-app.git

# Proje dizinine gidin
cd project-mgt-app

# Bağımlılıkları yükleyin
composer install
npm install

# .env dosyasını oluşturun
cp .env.example .env

# Uygulama anahtarı oluşturun
php artisan key:generate

# Veritabanını oluşturun ve migrate edin
php artisan migrate

# Filament v4 Kurulumu
composer require filament/filament:"^4.0"
php artisan filament:install --panels

# Shield v4 Kurulumu
composer require bezhansalleh/filament-shield:4.0.0-beta
php artisan vendor:publish --tag="filament-shield-config"
php artisan shield:super-admin
php artisan shield:generate

# Uygulamayı başlatın
php artisan serve
npm run dev
```

## 💾 Veritabanı Yapısı

-  `categories` - Kategoriler
-  `clients` - Müşteriler
-  `projects` - Projeler     
-  `tasks` - Görevler        
-  `users` - Kullanıcılar
-  `model_has_roles` - Spatie Permission İlişkileri

  ## 🎯 Kullanım

-  Admin paneline `/admin` adresinden giriş yap.
-  Clients bölümünden müşteri oluştur.
-  Categories bölümünden kategori oluştur.
-  Projects bölümünden projeleri oluştur ve client / category ilişkilendir.
-  Tasks bölümünden görev ekle, kullanıcı ata, öncelik ve bitiş tarihi belirle.
-  Dashboard üzerinden sistem özetini ve son eklenen projeleri ve görevleri takip et.
-  Canlı proje listesini ana sayfada Livewire ile görüntüle.

  ## 📸 Ekran Görüntüleri
   
  <table>
  <tr>
    <td colspan="2"><img width="1800" alt="Kategori Listesi" src="https://github.com/user-attachments/assets/8c4fef62-c973-473c-9819-cd6957637e30" /></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><b>Dashboard</b></td>
  </tr>
      <tr>
    <td><img width="900" alt="Kategori Listesi" src="https://github.com/user-attachments/assets/8b247efd-2f90-4bbc-9dd4-403efeedce1c" /></td>
    <td><img width="900" alt="Kategori Görüntüle" src="https://github.com/user-attachments/assets/b43a4aeb-f686-4d4b-9bbe-a34ba2fe3064" /></td>
  </tr>
  <tr>
    <td align="center"><b>Kategori Listesi</b></td>
    <td align="center"><b>Kategori Görüntüle</b></td>
  </tr>
       <tr>
    <td><img width="900" alt="Kategori Oluştur" src="https://github.com/user-attachments/assets/55df8da3-77d9-4932-b73e-f5af692c5e87" /></td>
    <td><img width="900" alt="Kategori Güncelle" src="https://github.com/user-attachments/assets/dd84f614-ee54-430c-8ad7-6bf17f72adf9" /></td>
  </tr>
  <tr>
    <td align="center"><b>Kategori Oluştur</b></td>
    <td align="center"><b>Kategori Güncelle</b></td>
  </tr> 
      <!-- <tr>
    <td><img width="900" alt="Müşteri Listesi" src="" /></td>
    <td><img width="900" alt="Müşteri Görüntüle" src="" /></td>
  </tr>
  <tr>
    <td align="center"><b>Müşteri Listesi</b></td>
    <td align="center"><b>Müşteri Görüntüle</b></td>
  </tr>
       <tr>
    <td><img width="900" alt="Müşteri Oluştur" src="" /></td>
    <td><img width="900" alt="Müşteri Güncelle" src="" /></td>
  </tr>
  <tr>
    <td align="center"><b>Müşteri Oluştur</b></td>
    <td align="center"><b>Müşteri Güncelle</b></td>
  </tr> -->
</table>



  

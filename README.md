# Laravel Filament Project Management System

Modern ve ölçeklenebilir proje yönetim platformu. Laravel 12, Filament v4, Livewire 3 ve Shield v4 ile geliştirilmiştir.

## Özellikler

- **Filament v4** - Schema-based modern architecture
- **Shield v4** - Role-based access control (Spatie Permission)
- **Dashboard Widgets** - Stats overview, recent projects/tasks
- **Relation Managers** - Client→Projects, Project→Tasks, User→Tasks
- **Full CRUD** - Categories, Clients, Projects, Tasks, Users
- **Livewire 3** - Reactive frontend with real-time search
- **Responsive UI** - Tailwind CSS

## Teknolojiler

- **Backend:** Laravel 12, PHP 8.2+
- **Admin Panel:** Filament v4, Shield v4
- **Frontend:** Livewire 3, Tailwind CSS
- **Database:** MySQL
- 
## Kurulum
```bash
# Repository'yi klonlayın
git clone https://github.com/Emirhancapci/project-mgt-app.git
cd project-mgt-app

# Bağımlılıkları yükleyin
composer install
npm install && npm run build

# .env dosyasını oluşturun
cp .env.example .env
php artisan key:generate

# Veritabanını migrate edin
php artisan migrate --seed
php artisan storage:link

# Shield setup
php artisan shield:generate --all
php artisan shield:super-admin

# Admin kullanıcısı oluşturun
php artisan make:filament-user

# Uygulamayı başlatın
php artisan serve
```

Admin panel: `http://localhost:8000/admin`

## Veritabanı Yapısı

**Ana Tablolar:**
- `categories` - Proje/Task kategorileri
- `clients` - Müşteri bilgileri
- `projects` - Proje detayları (client, category relations)
- `tasks` - Görev detayları (project, user, category relations)
- `users` - Kullanıcılar
- `roles & permissions` - Spatie Permission

**İlişkiler:**
- Client → Projects (One-to-Many)
- Project → Tasks (One-to-Many)
- User → Tasks (One-to-Many)

## Kullanım

1. Admin panelden Categories, Clients, Projects, Tasks ve Users modüllerini yönetin
2. Client sayfasından müşteriye ait projeleri görüntüleyin ve yeni proje ekleyin
3. Project sayfasından projeye ait taskları görüntüleyin ve yeni task ekleyin
4. User sayfasından kullanıcılara atanmış taskları görüntüleyin
5. Dashboard'da sistem istatistiklerini takip edin
6. Frontend'de proje listesini görüntüleyin ve arama yapın

## Ekran Görüntüleri

<table>
  <tr>
    <td colspan="2"><img width="1800" alt="Dashboard" src="https://github.com/user-attachments/assets/8c4fef62-c973-473c-9819-cd6957637e30" /></td>
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
</table>

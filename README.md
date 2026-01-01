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
    <td colspan="2"><img width="1800" alt="Dashboard" src="https://github.com/user-attachments/assets/43c52c09-9cf8-47b3-9d94-87ee71901f24" /></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><b>Dashboard Sistem Özeti</b></td>
  </tr>
  <tr>
    <td><img width="900" alt="Kategori Listesi" src="https://github.com/user-attachments/assets/4ee3e124-d8bc-493b-b46d-c63e11051191" /></td>
    <td><img width="900" alt="Kategori Görüntüle" src="https://github.com/user-attachments/assets/8d83fd50-5d72-457c-b46d-002e0d2325a1" /></td>
  </tr>
  <tr>
    <td align="center"><b>Proje Listesi</b></td>
    <td align="center"><b>Proje Görüntüle</b></td>
  </tr>
  <tr>
    <td><img width="900" alt="Task Oluştur" src="https://github.com/user-attachments/assets/f776e339-45d6-49f0-a790-a0831ac53761" /></td>
    <td><img width="900" alt="Task Güncelle" src="https://github.com/user-attachments/assets/e081fdee-30cf-4838-8208-37b2e8b82054" /></td>
  </tr>
  <tr>
    <td align="center"><b>Task Oluştur</b></td>
    <td align="center"><b>Task Güncelle</b></td>
  </tr>
     <tr>
    <td><img width="900" alt=" Müşteriye Ait Projeler" src="https://github.com/user-attachments/assets/ec146b10-4b85-49f7-bf1e-df7b4fbe150a" /></td>
    <td><img width="900" alt=" Kullanıcıya Ait Görevler" src="https://github.com/user-attachments/assets/861b26e3-db78-4257-bbb8-c58def42384e" /></td>
  </tr>
  <tr>
    <td align="center"><b>Müşteriye Ait Projeler</b></td>
    <td align="center"><b>Kullanıcıya Ait Görevler</b></td>
  </tr>
     <tr>
    <td><img width="900" alt=" Roller" src="https://github.com/user-attachments/assets/9ce58203-44c7-40f2-a333-90902a10fe14" /></td>
    <td><img width="900" alt=" Rol Yetkilendirme" src="https://github.com/user-attachments/assets/5dd6d58f-8f5e-4fe4-a9ce-ce9c224f5f72" /></td>
  </tr>
  <tr>
    <td align="center"><b> Roller </b></td>
    <td align="center"><b> Rol Yetkilendirme </b></td>
  </tr>
     <tr>
    <td><img width="900" alt=" Roller" src="https://github.com/user-attachments/assets/d7e43e16-189b-4579-8ff1-497c2e351770" /></td>
    <td><img width="900" alt=" Rol Yetkilendirme" src="https://github.com/user-attachments/assets/c87715c4-d26d-4494-ad06-cc4498136d07" /></td>
  </tr>
  <tr>
    <td align="center"><b> Livewire Proje Listesi </b></td>
    <td align="center"><b> Developer Rolü için Kısıtlanmış Görünüm </b></td>
  </tr>
</table>




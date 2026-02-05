# 📚 Library Management System

<p align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
</p>

<p align="center">
  <a href="https://github.com/AlyaaRana/library-app-bncc"><img src="https://img.shields.io/badge/version-1.0.0-blue.svg" alt="Version"></a>
  <a href="https://laravel.com"><img src="https://img.shields.io/badge/Laravel-11.x-red.svg" alt="Laravel Version"></a>
  <a href="https://opensource.org/licenses/MIT"><img src="https://img.shields.io/badge/license-MIT-green.svg" alt="License"></a>
</p>

## 📖 About Project

Library Management System is a web-based application built using **Laravel 11**. This application aims to help manage library data, including books, book categories, members, and book borrowing and return processes. The system implements **CRUD** (Create, Read, Update, Delete) concepts and uses a **relational database** to maintain data consistency and integrity.

### ✨ Key Features

- ✅ **Category Management** - CRUD for book categories with validation
- 📚 **Book Management** - CRUD for books, cover upload, search & filter
- 👥 **Member Management** - Auto-generate member code, active borrowing validation
- 📋 **Borrowing Management** - Multi-book borrowing, stock management, return process
- 🔍 **Search & Filter** - Search books by title/author and category
- 📄 **Pagination** - Data listing with pagination
- 🔒 **Data Validation** - Form validation & error handling
- 🗄️ **Database Relations** - One-to-Many relationships implementation

---

## 🗂️ Entity Relationship Diagram (ERD)

### Entities & Attributes

#### 1. **Categories** (Book Categories)
- `id` (PK)
- `name`
- `description`
- `created_at`, `updated_at`

#### 2. **Books**
- `id` (PK)
- `category_id` (FK)
- `title`, `author`, `isbn`
- `publisher`, `publication_year`
- `stock`, `cover_image`, `description`
- `created_at`, `updated_at`

#### 3. **Members**
- `id` (PK)
- `member_code` (unique)
- `name`, `email`, `phone`
- `address`, `join_date`
- `created_at`, `updated_at`

#### 4. **Borrowings**
- `id` (PK)
- `member_id` (FK)
- `borrow_date`, `return_date`
- `status` (borrowed/returned)
- `created_at`, `updated_at`

#### 5. **Borrowing_Details**
- `id` (PK)
- `borrowing_id` (FK)
- `book_id` (FK)
- `quantity`
- `created_at`, `updated_at`

### Database Relations
- **Categories → Books**: One-to-Many
- **Members → Borrowings**: One-to-Many
- **Borrowings → Borrowing_Details**: One-to-Many
- **Books → Borrowing_Details**: One-to-Many

## 🚀 Installation

### Prerequisites
- PHP >= 8.2
- Composer
- MySQL/MariaDB or SQLite
- Node.js & NPM (for frontend assets)

### Setup Instructions

1. **Clone Repository**
   ```bash
   git clone https://github.com/AlyaaRana/library-app-bncc.git
   cd library-app-bncc
   ```

2. **Install Dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Environment Configuration**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Database Setup**
   
   Edit `.env` file:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=library_system
   DB_USERNAME=root
   DB_PASSWORD=
   ```

   Create database & run migrations:
   ```bash
   php artisan migrate
   ```

5. **Storage Link**
   ```bash
   php artisan storage:link
   ```

6. **Run Development Server**
   ```bash
   php artisan serve
   ```

   Access: `http://localhost:8000`

---

## 📡 API Documentation

### Base URL
```
http://localhost:8000
```

### Postman Collection
Import collection from this link:
👉 [**Join Postman Workspace**](https://app.getpostman.com/join-team?invite_code=c1288bc61dce1c6fdd9af9677d10abd184a12dfc4b95d84de08236dda0b661d3&target_code=e5083ce7e42a28c9640c5df689d37d36)

### API Endpoints

#### 📚 Categories
| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | `/categories` | List all categories |
| GET | `/categories/{id}` | Show category detail |
| POST | `/categories` | Create new category |
| PUT | `/categories/{id}` | Update category |
| DELETE | `/categories/{id}` | Delete category |

#### 📖 Books
| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | `/books` | List all books (with search & filter) |
| GET | `/books/{id}` | Show book detail |
| POST | `/books` | Create new book |
| PUT | `/books/{id}` | Update book |
| DELETE | `/books/{id}` | Delete book |

#### 👥 Members
| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | `/members` | List all members |
| GET | `/members/{id}` | Show member detail |
| POST | `/members` | Create new member |
| PUT | `/members/{id}` | Update member |
| DELETE | `/members/{id}` | Delete member |

#### 📋 Borrowings
| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | `/borrowings` | List all borrowings |
| GET | `/borrowings/{id}` | Show borrowing detail with items |
| POST | `/borrowings` | Create new borrowing |
| PUT | `/borrowings/{id}` | Return books |
| DELETE | `/borrowings/{id}` | Delete borrowing |

---

## 📸 Screenshots

### Web Interface

#### 1. Books List Page
![Books List](screenshots/books-list.png)

#### 2. Create Book Form
![Create Book](screenshots/create-book.png)

#### 3. Borrowing Management
![Borrowing](screenshots/borrowing.png)

### API Testing (Postman)

#### GET - List Books
![GET Books](screenshots/api-get-books.png)

#### POST - Create Member
![POST Member](screenshots/api-post-member.png)

#### POST - Create Borrowing
![POST Borrowing](screenshots/api-post-borrowing.png)

#### GET - Borrowing Detail
![GET Borrowing Detail](screenshots/api-get-borrowing-detail.png)

---

## 🛠️ Tech Stack

- **Backend**: Laravel 11
- **Database**: MySQL / SQLite
- **Frontend**: Blade Templates, Bootstrap 5
- **Tools**: Composer, NPM, Git

---

## 📝 Usage Examples

### Create Borrowing (API)

**Request:**
```http
POST /borrowings
Content-Type: application/json

{
  "member_id": 1,
  "books": [
    {
      "book_id": 1,
      "quantity": 2
    },
    {
      "book_id": 3,
      "quantity": 1
    }
  ]
}
```

**Response:**
```json
{
  "message": "Borrowing successfully created."
}
```

### Search Books (Query Parameters)
```http
GET /books?search=Laravel&category_id=1
```

---

## 🧪 Testing

Run migrations with test data:
```bash
php artisan migrate:fresh --seed
```

---

## 👨‍💻 Author

**Alyaa Rana Raya & Joshua Genio Wiratama & Nathan Gabriel Pramellah**
- GitHub: [@AlyaaRana](https://github.com/AlyaaRana) | [@ExO96](https://github.com/ExO96) | [@UgandanNut] (https://github.com/UgandanNut)
- Repository: [library-app-bncc](https://github.com/AlyaaRana/library-app-bncc)

---

## 📄 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

---

## 🙏 Acknowledgments

- [Laravel Framework](https://laravel.com)
- [Bootstrap](https://getbootstrap.com)
- BNCC (Bina Nusantara Computer Club)

---

## 📞 Support

For questions or issues, please [open an issue](https://github.com/AlyaaRana/library-app-bncc/issues) on GitHub.

---

<p align="center">Made with ❤️ using Laravel</p>
```

---

## 📁 Folder Structure for Screenshots

soon

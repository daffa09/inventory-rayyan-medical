<!-- portfolio -->
<!-- slug: inventory-rayyan-medical -->
<!-- title: Rayyan Medical Inventory System -->
<!-- description: Comprehensive inventory management web application for Rayyan Medical to track medical supplies and equipment in real-time -->
<!-- image: https://github.com/user-attachments/assets/placeholder-inventory-rayyan -->
<!-- tags: laravel, php, mysql, inventory-management, medical, bootstrap -->

# Rayyan Medical Inventory Management System

A comprehensive web-based inventory management system developed specifically for Rayyan Medical, a medical equipment store. This applicationprovides real-time digital tracking of medical supplies and equipment, enabling efficient stock management and operational oversight.

## 📋 Overview

The Rayyan Medical Inventory System is a complete solution for managing medical equipment inventory. Built as a final project for industry certification, this application addresses the real-world needs of Rayyan Medical by providing a digital, real-time inventory tracking system that streamlines stock management operations.

## 🎯 Problem Statement

Medical equipment stores like Rayyan Medical face critical challenges in inventory management:
- **Stock Tracking**: Difficulty monitoring stock levels across multiple product categories
- **Shortage Detection**: Delayed awareness of low stock or out-of-stock items
- **Overstocking Issues**: Inability to identify excess inventory in real-time
- **Manual Processes**: Time-consuming manual inventory checks
- **Real-time Updates**: Need for instant visibility into current stock levels

This application was created to solve these challenges by providing an automated, digital inventory management system.

## ✨ Key Features

### For Employees/Staff
- **Dashboard Overview**: Real-time inventory statistics and alerts
- **Stock Management**: View current stock levels for all products
- **Low Stock Alerts**: Automatic notifications for items below threshold
- **Product Search**: Quick search and filter functionality
- **Stock Reports**: Generate inventory reports by category or date range
- **Transaction History**: Track all inventory movements

### For Administrators
- **Complete CRUD Operations**:
  - Add new medical equipment to inventory
  - Update product information and stock levels
  - Remove discontinued items
  - Bulk import/export capabilities

- **Category Management**:
  - Organize products by medical equipment categories
  - Manage product specifications
  - Set reorder points

- **User Management**:
  - Create and manage staff accounts
  - Set role-based permissions
  - Track user activities

- **Reporting Tools**:
  - Stock valuation reports
  - Movement history
  - Forecasting and analytics

## 🛠️ Technologies Used

| Technology | Purpose |
|------------|---------|
| **Laravel 8** | PHP backend framework |
| **PHP 8.0** | Server-side programming |
| **MySQL** | Relational database |
| **Bootstrap** | Responsive UI framework |
| **jQuery** | JavaScript interactions |
| **Chart.js** | Data visualization |
| **Webpack Mix** | Asset compilation |

## 📁 Project Structure

```
inventory-rayyan-medical/
├── app/
│   ├── Http/Controllers/      # Application logic
│   ├── Models/                # Database models
│   └── Requests/             # Form validation
├── database/
│   ├── migrations/            # Database schema
│   └── seeders/              # Sample data
├── resources/
│   ├── views/                # Blade templates
│   └── assets/               # CSS, JS files
├── public/
│   └── images/              # Product images
└── routes/
    └── web.php              # Application routes
```

## 🚀 Getting Started

### Prerequisites

- PHP 8.0 or higher
- Composer (latest version)
- MySQL 5.7+ or MariaDB
- XAMPP, WAMPP, or similar local server
- PHP MyAdmin (optional, for database management)

### Installation Steps

1. **Clone the Repository**
   ```bash
   git clone <repository-url>
   cd inventory-rayyan-medical
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

4. **Configure Database**
   
   Edit `.env` file:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=db_inventory
   DB_USERNAME=root
   DB_PASSWORD=your_password
   ```

5. **Create Database**
   - Open PHPMyAdmin
   - Create a new database named `db_inventory`

6. **Run Migrations and Seeders**
   ```bash
   php artisan migrate:fresh --seed
   ```

7. **Create Storage Link**
   ```bash
   php artisan storage:link
   ```

8. **Compile Assets**
   ```bash
   npm run dev
   ```

9. **Start Development Server**
   ```bash
   php artisan serve
   ```

10. **Access Application**
    - Open browser: `http://127.0.0.1:8000`
    - Login URL: `http://127.0.0.1:8000/login`

## 💻 Usage Guide

### Logging In

1. Navigate to the login page
2. Enter credentials:
   - **Admin Account**: 
     - Email: admin@rayyanmedical.com
     - Password: (set during seeding)
   - **Staff Account**:
     - Email: staff@rayyanmedical.com
     - Password: (set during seeding)

### Managing Inventory

#### Adding New Items
1. Navigate to "Products" section
2. Click "Add New Product"
3. Fill in product details:
   - Product name
   - Category
   - SKU/Product code
   - Stock quantity
   - Unit price
   - Description
   - Product image
4. Set reorder point (minimum stock level)
5. Click "Save"

#### Updating Stock
1. Go to "Inventory" dashboard
2. Find the product
3. Click "Update Stock"
4. Enter new quantity (add or subtract)
5. Add transaction note
6. System automatically records timestamp and user

#### Checking Stock Levels
1. View dashboard for real-time overview
2. Check "Low Stock" alerts section
3. Use search/filter to find specific items
4. Export stock reports as needed

### Generating Reports

1. Navigate to "Reports" section
2. Select report type:
   - Current stock levels
   - Stock movements
   - Low stock items
   - Stock valuation
3. Choose date range
4. Select format (PDF, Excel, Print)
5. Generate and download/print

## 🔧 Configuration

### Stock Alert Thresholds

Configure in `config/inventory.php`:
```php
return [
    'low_stock_threshold' => 10, // Alert when stock <= 10
    'critical_stock_threshold' => 5, // Critical when stock <= 5
];
```

### Categories Setup

Categories can be managed via the admin panel or database seeder.

## 🎨 UI/UX Features

- **Responsive Design**: Works on desktop, tablet, and mobile
- **Clean Interface**: Easy-to-navigate dashboard
- **Real-time Updates**: Instant stock level updates
- **Visual Indicators**: Color-coded stock levels (green: adequate, yellow: low, red: critical)
- **Search & Filter**: Quick product lookup
- **Data Tables**: Sortable and paginated product lists

## 📊 Database Schema

Key tables:
- `products` - Product information
- `categories` - Product categories
- `stock_transactions` - Stock movement history
- `users` - System users
- `roles` - User roles and permissions

## 🔒 Security Features

- Laravel authentication system
- Role-based access control
- CSRF protection
- SQL injection prevention
- XSS protection
- Secure password hashing

## 🐛 Troubleshooting

### Common Issues

1. **Database Connection Error**
   - Verify MySQL is running
   - Check `.env` credentials
   - Ensure database exists

2. **Storage Link Missing**
   - Run: `php artisan storage:link`

3. **Permission Denied**
   - Set proper permissions:
   ```bash
   chmod -R 775 storage bootstrap/cache
   ```

4. **Assets Not Loading**
   - Run: `npm run dev` or `npm run build`
   - Clear cache: `php artisan cache:clear`

## 🚀 Future Enhancements

Potential improvements:
- Barcode scanning integration
- Automated purchase orders
- Supplier management module
- Email notifications for low stock
- Mobile application
- Advanced analytics and forecasting
- Multi-warehouse support

## 📝 Development Process

### Challenges Faced
1. **Requirements Gathering**: Conducting thorough research and client interviews
2. **UI/UX Design**: Creating an intuitive interface for medical staff

### Solutions Implemented
1. **Client Collaboration**: Regular interviews with Rayyan Medical stakeholders
2. **Design-First Approach**: Created mockups and prototypes for client approval before coding
3. **Iterative Development**: Implemented feedback loops for continuous improvement

## 🤝 Contributing

This project was developed for Rayyan Medical's final project submission. Suggestions and improvements are welcome!

## 📄 License

This project is proprietary to Rayyan Medical. Use for educational reference only.

## 📞 Contact

For questions, suggestions, or corrections, please contact through the email available in my portfolio.

---

**Built for Rayyan Medical** 🏥  
Industry Certification Final Project 2022

**Thank you!** 🔥  
Thank you for checking out this project. Hope you find it useful! ❤️

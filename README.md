# SMTECHSOFT PHP Starter Template

A robust and lightweight PHP starter template designed for rapid development of modern web applications. It features a clean structure, environment configuration, database abstraction, and secure routing.

## Features

- **PSR-4 Autoloading**: Structured application logic using Composer's PSR-4 standard.
- **Environment Configuration**: Securely manage configuration using `.env` files (powered by `vlucas/phpdotenv`).
- **Database Abstraction**: Simple and secure database interaction with `App\Database\Database` and `App\Services\DbQuery`.
- **Secure Routing**:
    - **Frontend**: Automatic routing to `frontend/pages/`.
    - **Backend**: Dedicated admin routing mapped to `backend/admin/pages/`.
    - **Security**: URL sanitization to prevent directory traversal.
- **Error Handling**:
    - **Debug Mode**: Toggle detailed error reporting with `APP_DEBUG`.
    - **Custom Error Pages**: Production-ready error pages (404, 500, etc.) in the `error/` directory.
    - **Global Exception Handling**: Catches unhandled exceptions and renders user-friendly error pages in production.

## Installation

1.  **Clone the repository**:
    ```bash
    git clone <repository-url>
    cd SMTECHSOFT-PHP-Starter-Template
    ```

2.  **Install Dependencies**:
    ```bash
    composer install
    ```

3.  **Environment Setup**:
    - Copy the example environment file (if available) or create a new `.env` file:
      ```bash
      cp .env.example .env
      ```
    - Update the `.env` file with your configuration.

## Configuration

Configure your application in the `.env` file:

```ini
APP_NAME="My PHP App"
APP_ENV=local          # 'local' or 'production'
APP_DEBUG=true         # 'true' to show errors, 'false' to hide them

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=my_database
DB_USERNAME=root
DB_PASSWORD=secret
```

- **APP_ENV**: Set to `production` to suppress errors and show custom error pages.
- **APP_DEBUG**: Set to `true` for development to see detailed error messages.

## Usage

### Directory Structure

```
├── app/                # Core application logic (PSR-4)
│   ├── Config/         # Configuration classes
│   ├── Database/       # Database connection logic
│   └── Services/       # Service classes (e.g., DbQuery)
├── backend/            # Admin panel logic
│   └── admin/          # Admin routes
├── error/              # Custom error pages (404.php, 500.php, etc.)
├── frontend/           # Public facing pages
│   ├── assets/         # CSS, JS, Images
│   └── pages/          # Frontend routes
├── vendor/             # Composer dependencies
├── .env                # Environment variables
├── composer.json       # Composer configuration
└── index.php           # Entry point / Router
```

### Routing

The `index.php` file handles routing dynamically:

-   **Frontend**:
    -   `/` -> `frontend/index.php`
    -   `/about` -> `frontend/pages/about/index.php`
    -   `/contact` -> `frontend/pages/contact/index.php`

-   **Backend (Admin)**:
    -   `/admin` -> `backend/admin/index.php`
    -   `/admin/users` -> `backend/admin/pages/users/index.php`

### Database Access

Use the `App\Services\DbQuery` class for easy database interactions. It automatically connects using your `.env` credentials.

```php
use App\Services\DbQuery;

$db = new DbQuery();

// Fetch all rows
$users = $db->all('users');

// Find by ID
$user = $db->find('users', 1);

// Insert
$db->insert('users', [
    'name' => 'John Doe',
    'email' => 'john@example.com'
]);

// Update
$db->update('users', 1, [
    'name' => 'Jane Doe'
]);

// Delete
$db->delete('users', 1);

// Fetch Latest Record
$latestUser = $db->latest('users');
// or with custom column
$latestUser = $db->latest('users', 'created_at');
```

### Pagination

You can fetch paginated results using the `all` method by passing the limit and page number.

```php
// Fetch 10 users per page, for page 1
$result = $db->all('users', 10, 1);

$users = $result['rows'];
$totalPages = $result['totalPages'];
$currentPage = $result['currentPage'];

foreach ($users as $user) {
    echo $user->name;
}
?>

<!-- Pagination Links -->
<ul class="pagination">
    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
        <li class="<?= ($i == $currentPage) ? 'active' : '' ?>">
            <a href="?page=<?= $i ?>"><?= $i ?></a>
        </li>
    <?php endfor; ?>
</ul>
```

### HTML Display Examples

Below are examples of how to use each method and display the results in HTML.

#### 1. Fetch All Rows (`all`)

```php
<?php
$db = new App\Services\DbQuery();
$result = $db->all('users');
$users = $result['rows'];
?>

<h3>All Users</h3>
<ul>
    <?php foreach ($users as $user): ?>
        <li><?= htmlspecialchars($user->name) ?></li>
    <?php endforeach; ?>
</ul>
```

#### 2. Find Single Row (`find`)

```php
<?php
$db = new App\Services\DbQuery();
$result = $db->find('users', 1); // Find user with ID 1
$user = $result['row'];
?>

<h3>User Details</h3>
<?php if ($user): ?>
    <p>Name: <?= htmlspecialchars($user->name) ?></p>
    <p>Email: <?= htmlspecialchars($user->email) ?></p>
<?php else: ?>
    <p>User not found.</p>
<?php endif; ?>
```

#### 3. Fetch Latest Row (`latest`)

```php
<?php
$db = new App\Services\DbQuery();
$result = $db->latest('users'); // Get most recently added user
$latestUser = $result['row'];
?>

<h3>Newest Member</h3>
<?php if ($latestUser): ?>
    <div class="user-card">
        <h4><?= htmlspecialchars($latestUser->name) ?></h4>
        <p>Joined: <?= htmlspecialchars($latestUser->created_at ?? 'Just now') ?></p>
    </div>
<?php endif; ?>
```

#### 4. Insert Data (`insert`)

```php
<?php
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db = new App\Services\DbQuery();
    $status = $db->insert('users', [
        'name' => $_POST['name'],
        'email' => $_POST['email']
    ]);
    $message = ($status === 'data inserted') ? 'User created successfully!' : 'Error creating user.';
}
?>

<?php if ($message): ?>
    <div class="alert"><?= $message ?></div>
<?php endif; ?>

<form method="POST">
    <input type="text" name="name" placeholder="Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <button type="submit">Create User</button>
</form>
```

#### 5. Update Data (`update`)

```php
<?php
$db = new App\Services\DbQuery();
$id = 1; // ID of user to update
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $status = $db->update('users', $id, [
        'name' => $_POST['name']
    ]);
    $message = ($status === 'data updated') ? 'Updated successfully!' : 'Update failed.';
}

// Fetch current data to pre-fill form
$user = $db->find('users', $id)['row'];
?>

<?php if ($message): ?>
    <div class="alert"><?= $message ?></div>
<?php endif; ?>

<?php if ($user): ?>
    <form method="POST">
        <input type="text" name="name" value="<?= htmlspecialchars($user->name) ?>" required>
        <button type="submit">Update Name</button>
    </form>
<?php endif; ?>
```

#### 6. Delete Data (`delete`)

```php
<?php
$db = new App\Services\DbQuery();
$message = '';

if (isset($_POST['delete_id'])) {
    $status = $db->delete('users', $_POST['delete_id']);
    $message = ($status === 'data deleted') ? 'User deleted.' : 'Delete failed.';
}

$users = $db->all('users')['rows'];
?>

<?php if ($message): ?>
    <div class="alert"><?= $message ?></div>
<?php endif; ?>

<ul>
    <?php foreach ($users as $user): ?>
        <li>
            <?= htmlspecialchars($user->name) ?>
            <form method="POST" style="display:inline;">
                <input type="hidden" name="delete_id" value="<?= $user->id ?>">
                <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </li>
    <?php endforeach; ?>
</ul>
```

### Error Handling

-   **Development**: Set `APP_DEBUG=true` and `APP_ENV=local` in `.env` to see PHP errors and warnings directly in the browser.
-   **Production**: Set `APP_DEBUG=false` and `APP_ENV=production`. Errors will be logged (if configured) and the user will see a friendly error page from the `error/` directory (e.g., `error/500.php` for crashes, `error/404.php` for missing pages).

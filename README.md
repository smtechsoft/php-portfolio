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

### Dynamic Routing

You can create dynamic routes by using square brackets `[]` in directory names. The value inside the brackets will be available as a `$_GET` parameter.

**Example 1: Blog Post by Slug**
- **URL**: `/blog/my-first-post`
- **File**: `frontend/pages/blog/[slug]/index.php`
- **Access**: `$_GET['slug']` will contain `'my-first-post'`.

**Example 2: User Profile by ID**
- **URL**: `/user/123`
- **File**: `frontend/pages/user/[id]/index.php`
- **Access**: `$_GET['id']` will contain `'123'`.

**Example 3: Nested Dynamic Routes**
- **URL**: `/blog/123/my-post`
- **File**: `frontend/pages/blog/[id]/[slug]/index.php`
- **Access**:
    - `$_GET['id']` -> `'123'`
    - `$_GET['slug']` -> `'my-post'`

```php
<?php
// In frontend/pages/blog/[slug]/index.php
$slug = $_GET['slug'] ?? null;

if ($slug) {
    echo "Showing post: " . $slug;
} else {
    echo "Slug not found";
}
?>
```

### Request Handling

The application includes a dedicated `request/` directory for handling POST requests (e.g., form submissions).

-   **URL Pattern**: `/request/{filename}` maps to `request/{filename}.php`.
-   **Clean URLs**: Do **not** include the `.php` extension in the URL.
-   **Method**: Only `POST` requests are accepted. `GET` requests will return a 405 error.

**Example**:

1.  Create `request/contact.php`:
    ```php
    <?php
    // Handle form data
    $name = $_POST['name'] ?? '';
    // ... logic ...
    header('Location: /contact?success=1');
    ```

2.  Create a form in `frontend/pages/contact/index.php`:
    ```html
    <form action="/request/contact" method="POST">
        <input type="text" name="name">
        <button type="submit">Send</button>
    </form>
    ```

### Database Access

Use the `App\Services\DbQuery` class for easy database interactions. It automatically connects using your `.env` credentials.

```php
use App\Services\DbQuery;

$db = new DbQuery();

// Fetch all rows
$users = $db->all('users');

// Find by ID
$user = $db->find('users', 1);

// Find by Slug
$post = $db->findBySlug('posts', 'my-first-post');

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
// Fetch Latest Record
$latestUser = $db->latest('users');
// or with custom column
$latestUser = $db->latest('users', 'created_at');
```

### Authentication

The `App\Services\Auth` class provides a simple way to handle user authentication, similar to Laravel's Auth facade.

#### 1. Login (`attempt`)

```php
use App\Services\Auth;

$credentials = [
    'email' => 'user@example.com',
    'password' => 'secret'
];

// Basic Login
if (Auth::attempt($credentials)) {
    // Success
}

// Login with "Remember Me" (Persistent Cookie)
if (Auth::attempt($credentials, true)) {
    // User stays logged in for 30 days
}
```

#### 2. Check Authentication (`check`, `user`, `id`)

```php
use App\Services\Auth;

if (Auth::check()) {
    // User is logged in
    $user = Auth::user();
    echo "Hello, " . $user->name;
    
    $userId = Auth::id();
} else {
    // User is guest
}
```

#### 3. Logout (`logout`)

```php
use App\Services\Auth;

Auth::logout(); // Clears session and remember token
```

### Slug Generation

Use the `App\Services\SlugService` to generate unique URL-friendly slugs.

```php
use App\Services\SlugService;

$slugService = new SlugService();

// Create a slug from a string (e.g., post title)
// It automatically checks the 'posts' table for duplicates and appends a number if needed.
$slug = $slugService->generate('posts', 'My New Post Title');
// Result: 'my-new-post-title' (or 'my-new-post-title-1' if it exists)
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
        <li><?= $user->name ?></li>
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
    <p>Name: <?= $user->name ?></p>
    <p>Email: <?= $user->email ?></p>
<?php else: ?>
    <p>User not found.</p>
<?php endif; ?>
```

#### 3. Find Single Row by Slug (`findBySlug`)

```php
<?php
$db = new App\Services\DbQuery();
$result = $db->findBySlug('posts', 'hello-world'); // Find post with slug 'hello-world'
$post = $result['row'];
?>

<h3>Post Details</h3>
<?php if ($post): ?>
    <h1><?= $post->title ?></h1>
    <p><?= $post->content ?></p>
<?php else: ?>
    <p>Post not found.</p>
<?php endif; ?>
```

#### 4. Fetch Latest Row (`latest`)

```php
<?php
$db = new App\Services\DbQuery();
$result = $db->latest('users'); // Get most recently added user
$latestUser = $result['row'];
?>

<h3>Newest Member</h3>
<?php if ($latestUser): ?>
    <div class="user-card">
        <h4><?= $latestUser->name ?></h4>
        <p>Joined: <?= $latestUser->created_at ?? 'Just now' ?></p>
    </div>
<?php endif; ?>
```

#### 5. Join Tables (`join`)

```php
<?php
$db = new App\Services\DbQuery();

// Fetch users with their posts
$result = $db->join(
    'users',                        // Main table
    'users.name, posts.title',      // Columns
    [                               // Joins
        ['posts', 'users.id = posts.user_id']
    ],
    'users.active = 1',             // Where
    'users.created_at DESC',        // Order
    10                              // Limit
);

$rows = $result['rows'];
?>

<h3>Active Users & Posts</h3>
<ul>
    <?php foreach ($rows as $row): ?>
        <li><?= $row->name ?> - <?= $row->title ?></li>
    <?php endforeach; ?>
</ul>
```

**Select All Columns (`*`)**

```php
// Select all columns from both tables
$result = $db->join('users', '*', [
    ['posts', 'users.id = posts.user_id']
]);

// Select all columns from a specific table
$result = $db->join('users', 'users.*, posts.title', [
    ['posts', 'users.id = posts.user_id']
]);
```

#### 6. Insert Data (`insert`)

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

#### 7. Update Data (`update`)

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
        <input type="text" name="name" value="<?= $user->name ?>" required>
        <button type="submit">Update Name</button>
    </form>
<?php endif; ?>
```

#### 8. Delete Data (`delete`)

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
            <?= $user->name ?>
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

<?php
if (!isset($_SESSION['user_id'])) {
    header("Location: /admin/auth/login");
    exit();
}
?>
<ul>
    <li>
        <a href="/admin">Dashboard</a>
    </li>
    <li>
        <a href="/admin/blogs">Blogs</a>
    </li>
    <li>
        <a href="/admin/pricing">Pricing</a>
    </li>
    <li>
        <form action="/request/backend/auth/logout" method="post">
            <button type="submit">Logout</button>
        </form>
    </li>
</ul>
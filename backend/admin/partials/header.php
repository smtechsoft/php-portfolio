<?php
if (!isset($_SESSION['user_id'])) {
    header("Location: /admin/auth/login");
    exit();
}
?>
<ul>
    <li>
        <a href="">Dashboard</a>
    </li>
    <li>
        <a href="">Blogs</a>
    </li>
    <li>
        <form action="/request/backend/auth/logout" method="post">
            <button type="submit">Logout</button>
        </form>
    </li>
</ul>
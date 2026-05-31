<h1>BookFlow</h1>

<p>
    Добро пожаловать в систему автоматизации библиотеки.
</p>

<p>
    BookFlow позволяет:
</p>

<ul>
    <li>Просматривать книги</li>
    <li>Работать с заказами</li>
    <li>Управлять выдачей книг</li>
    <li>Формировать отчёты</li>
    <li>Выгружать XLSX и CSV</li>
</ul>

<?php if (!isset($_SESSION['user_id'])): ?>

    <p>
        Для продолжения работы выполните вход в систему.
    </p>

    <a class="btn" href="/bookflow/public/login">
        Войти
    </a>

<?php else: ?>

    <p>
        Вы успешно вошли в систему.
    </p>

    <a class="btn" href="/bookflow/public/books">
        Перейти к книгам
    </a>

<?php endif; ?>
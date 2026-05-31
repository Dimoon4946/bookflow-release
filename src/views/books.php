<h2>Книги</h2>

<form method="POST" action="/bookflow/public/books">
    <input name="title" placeholder="Название">
    <input name="author" placeholder="Автор">

    <button class="btn" type="submit">
        Добавить
    </button>
</form>

<table>
    <tr>
        <th>Название</th>
        <th>Автор</th>
        <th>Действие</th>
    </tr>

    <?php foreach ($books as $book): ?>
        <tr>
            <td><?= htmlspecialchars($book['title']) ?></td>
            <td><?= htmlspecialchars($book['author']) ?></td>

            <td>
                <a class="btn"
                   href="/bookflow/public/books/delete?id=<?= $book['id'] ?>">
                    Удалить
                </a>
            <td>

    <?php if (
        isset($_SESSION['role']) &&
        $_SESSION['role'] === 'admin'
    ): ?>

        <a class="btn"
           href="/bookflow/public/books/delete?id=<?= $book['id'] ?>">
            Удалить
        </a>

    <?php endif; ?>


    <?php if (
        isset($_SESSION['role']) &&
        $_SESSION['role'] === 'user'
    ): ?>

        <a class="btn"
           href="/bookflow/public/books/order?id=<?= $book['id'] ?>">
            Заказать
        </a>

    <?php endif; ?>

</td>
        </tr>
    <?php endforeach; ?>
</table>
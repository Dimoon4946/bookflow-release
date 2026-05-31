<h1>Отчёты</h1>

<!-- 1 -->
<h2>1. Отчёт по книгам</h2>

<a class="btn" href="/bookflow/public/reports/books/docx">
    DOCX
</a>

<a class="btn" href="/bookflow/public/reports/books/xlsx">
    XLSX
</a>

<table>
    <tr>
        <th>Книга</th>
        <th>Количество заказов</th>
    </tr>

    <?php foreach ($books as $book): ?>
        <tr>
            <td><?= htmlspecialchars($book['title']) ?></td>
            <td><?= htmlspecialchars($book['orders_count']) ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<hr>

<!-- 2 -->
<h2>2. Отчёт по пользователям</h2>

<a class="btn" href="/bookflow/public/reports/users/docx">
    DOCX
</a>

<a class="btn" href="/bookflow/public/reports/users/xlsx">
    XLSX
</a>

<table>
    <tr>
        <th>Пользователь</th>
        <th>Количество заказов</th>
    </tr>

    <?php foreach ($users as $user): ?>
        <tr>
            <td><?= htmlspecialchars($user['name']) ?></td>
            <td><?= htmlspecialchars($user['orders_count']) ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<hr>

<!-- 3 -->
<h2>3. Отчёт по заказам</h2>

<a class="btn" href="/bookflow/public/reports/orders/docx">
    DOCX
</a>

<a class="btn" href="/bookflow/public/reports/orders/xlsx">
    XLSX
</a>

<table>
    <tr>
        <th>ID</th>
        <th>Статус</th>
        <th>Дата</th>
    </tr>

    <?php foreach ($orders as $order): ?>
        <tr>
            <td><?= htmlspecialchars($order['id']) ?></td>
            <td><?= htmlspecialchars($order['status']) ?></td>
            <td><?= htmlspecialchars($order['created_at']) ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<hr>

<!-- 4 -->
<h2>4. Отчёт по выдачам</h2>

<a class="btn" href="/bookflow/public/reports/issues/docx">
    DOCX
</a>

<a class="btn" href="/bookflow/public/reports/issues/xlsx">
    XLSX
</a>

<table>
    <tr>
        <th>ID заказа</th>
        <th>Дата выдачи</th>
        <th>Дата возврата</th>
    </tr>

    <?php foreach ($issues as $issue): ?>
        <tr>
            <td><?= htmlspecialchars($issue['order_id']) ?></td>
            <td><?= htmlspecialchars($issue['issue_date']) ?></td>
            <td><?= htmlspecialchars($issue['return_date']) ?></td>
        </tr>
    <?php endforeach; ?>
</table>
<h2>Заказы</h2>

<table>
    <tr>
        <th>Пользователь</th>
        <th>Статус</th>
        <th>Дата</th>
    </tr>

    <?php foreach ($orders as $order): ?>
        <tr>
            <td><?= htmlspecialchars($order['name']) ?></td>
            <td><?= htmlspecialchars($order['status']) ?></td>
            <td><?= htmlspecialchars($order['created_at']) ?></td>
        </tr>
    <?php endforeach; ?>
</table>
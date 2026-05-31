<h2>Выдачи</h2>

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
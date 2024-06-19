<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nummers</title>
    <link rel="stylesheet" href="public/css/simple.css">
</head>
<body>
<h1>Nummers</h1>
<table border="1">
    <thead>
    <tr>
        <th>ID</th>
        <th>Album ID</th>
        <th>Titel</th>
        <th>Duur</th>
        <th>URL</th>
    </tr>
    </thead>
    <tbody>
    <?php if (!empty($nummers)): ?>
        <?php foreach ($nummers as $nummer): ?>
            <tr>
                <td><?= htmlspecialchars($nummer->getID()) ?></td>
                <td><?= htmlspecialchars($nummer->getAlbumID()) ?></td>
                <td><?= htmlspecialchars($nummer->getTitel()) ?></td>
                <td><?= htmlspecialchars($nummer->getDuur()) ?></td>
                <td>
                    <?php if ($nummer->getURL()): ?>
                        <a href="<?= htmlspecialchars($nummer->getURL()) ?>" target="_blank">Link</a>
                    <?php else: ?>
                        N/A
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="5">Geen nummers gevonden.</td>
        </tr>
    <?php endif; ?>
    </tbody>
</table>
</body>
</html>

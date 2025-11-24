<h1>About Me</h1>
<p><strong>Ім’я:</strong> <?= $name ?></p>
<p><strong>Вік:</strong> <?= $age ?></p>
<h3>Навички:</h3>
<ul>
<?php foreach ($skills as $skill): ?>
<li><?= $skill ?></li>
<?php endforeach; ?>
</ul>
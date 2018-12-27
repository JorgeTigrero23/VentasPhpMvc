<?php require APP_PATH . '/views/layouts/header.php'; ?>
<h1><?php echo $data['titulo']; ?></h1>
<h2><?php echo APP_PATH; ?></h2>

<ul>
    <?php foreach ($data['products'] as $key => $product): ?>
    <li> <?php echo $product->name; ?> </li>
    <?php endforeach; ?>
</ul>
<?php require APP_PATH . '/views/layouts/footer.php'; ?>
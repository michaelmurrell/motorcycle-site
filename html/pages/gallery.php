<section class="content-block content-block--gallery-intro">
    <h1>Curated Gallery Photos</h1>
</section>

<?php foreach ($data->gallery as $item) : ?>

<section 
    class="content-block content-block--image content-block--gallery"
    style="background-image: url('<?= $item->src; ?>');"    
>
    <a href="<?= $item->source; ?>" class="caption" target="_blank"><?= $item->caption; ?></a>
</section>

<?php endforeach; ?>

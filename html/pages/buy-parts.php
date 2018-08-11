<section class="content-block">
    <h1>Parts I Need to Buy</h1>
</section>

<section class="content-block">

    <div class="cards">

    <?php foreach ($data->parts as $item) : ?>

        <a 
            class="card card--image card--buy-parts" 
            style="background-image: url('<?= $item->src; ?>');" 
            href="<?= $item->source_url; ?>"
            target="_blank"
        >
            <h4><?= $item->title; ?></h4>
            <p><?= $item->description; ?> from <?= $item->source_name; ?></p>
        </a>

    <?php endforeach; ?>

    </div>

</section>



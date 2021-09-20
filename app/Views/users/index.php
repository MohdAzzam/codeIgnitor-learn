<?= $this->include('templates/header') ?>

    <div class="container mt-4">
        <h2>
            Welcome ,<?= session()->get('fname').' '.session()->get('fname') ?>
        </h2>
    </div>
<?= $this->include('templates/footer') ?>
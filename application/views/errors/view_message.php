<div class="container">
    <div class="row mt-5">
        <div>
            <h4><?= $this->session->flashdata('msg'); ?></h4>
            <p><?= $this->session->flashdata('properties'); ?></p>
            <button class="btn btn-success" onclick="history.back(-1)">Kembali</button>
        </div>
    </div>
</div>
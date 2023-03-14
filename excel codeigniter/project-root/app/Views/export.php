<?= $this->extend('layout/header') ?>
<?= $this->section('content') ?>


    <div class="container-fluid">
        <div class="row">

            <form method="GET" action="export">
                <input type="string" name="id">
                <input type="string" name="id2">
                <div class="mb-3">
                    <select  class="form-select" name="sel[]" multiple aria-label="multiple select example">
<!--                        <option selected>Open this select menu</option>-->
                        <option value="id">id</option>
                        <option value="name">name</option>
                        <option value="email">email</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>


    </div>


<?= $this->endSection() ?>
<?= $this->include('layout/footer') ?>
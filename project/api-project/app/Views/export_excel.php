<?= $this->extend('layout/header') ?>
<?= $this->section('content') ?>
<script>
    $(document).ready(function () {
        $.ajax({

            url: '<?= site_url('students') ?>',
            type: 'GET',
            success: function (products) {
                var o = JSON.stringify(products);
                var o = JSON.parse(o);
                var result = '';
                console.log(o);
                // for (var i = 0; i < products.data.length; i++) {
                //     result += '<tr><th scope="row">' + products.data[i].id + '</th>';
                //     result += '<td>' + products.data[i].name + '</td>';
                //     result += '<td>' + products.data[i].email + '</td>';
                //     result += '<td><a class="btn btn-primary" href="http://localhost:8000/edit/' + products.data[i].id + '" role="button">edit</a></td>';
                //     result += '<td><a class="btn btn-primary" href="http://localhost:8000/delete/' + products.data[i].id + '" role="button">delete</a></td>';
                // }
                // $("#table-body").append(result);
                // var o=products;
                // console.log(o.data[1].name);


            }
        });

    });
</script>

<div class="container-fluid">
    <div class="row">

        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
            </tr>
            </thead>
            <tbody>


            <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td colspan="2">Larry the Bird</td>
                <td>@twitter</td>
            </tr>
            </tbody>
        </table>

    </div>


</div>


<?= $this->endSection() ?>
<?= $this->include('layout/footer') ?>

<?php require_once 'app/view/admin_header.php';
?>
<style>
    .row {
        display: none;
    }

    body {
        font-family: Arial, sans-serif;
    }

    form {
        width: 100%;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid pink;
        border-radius: 10px;
        background-color: #f8f8f8;
    }

    .form-label {
        font-size: 18px;
        color: #333;
    }

    .form-control {
        width: 100%;
        padding: 10px;
        border: 1px solid pink;
        border-radius: 5px;
        margin-top: 5px;

    }

    .btn {
        display: block;
        width: 100%;
        padding: 10px;
        border: none;
        border-radius: 5px;
        color: #fff;
        background-color: pink;
        cursor: pointer;
        margin-top: 10px;
    }

    .btn:hover {
        background-color: #ffd5dd;
    }

    /* css thông báo */
    .success {
        border-radius: 4px;
        padding: 20px;
        color: white;
        opacity: 1;
        transition: opacity 0.6s;
        margin-bottom: 15px;
        background-color: #4CAF50;
        font-size: 15px;
        font-weight: 600;
    }

    .danger {
        border-radius: 4px;
        padding: 20px;
        color: white;
        opacity: 1;
        transition: opacity 0.6s;
        margin-bottom: 15px;
        background-color: #f44336;
        font-size: 15px;
        font-weight: 600;
    }

    .closebtn {
        margin-left: 15px;
        color: white;
        font-weight: bold;
        float: right;
        font-size: 22px;
        line-height: 20px;
        cursor: pointer;
        transition: 0.3s;
    }

    .closebtn:hover {
        color: black;
    }

    .error {
        color: red;
        font-weight: bold;
        font-size: 14px;
    }
</style>
<h2 class="mt-2">THÊM DANH MỤC</h2><br>
<?php if (isset($_SESSION['thongbao'])) : ?>
    <div class="success">
        <?= $_SESSION['thongbao'] ?>
    </div>
<?php endif;
unset($_SESSION['thongbao']); ?>

<?php if (isset($_SESSION['loi'])) : ?>
    <div class="danger">
        <?= $_SESSION['loi'] ?>
    </div>
<?php endif;
unset($_SESSION['loi']); ?>
<form action="" method="POST" id="form_addCategory">
    <div class="mb-3">
        <label for="TenDM" class="form-label">Tên danh mục</label>
        <input type="text" class="form-control" id="TenDM" name="TenDM" value="" oninput="generateSlug()">
    </div>
    <div class="mb-3">
        <label for="slug" class="form-label">Slug</label>
        <input type="text" class="form-control" id="slug" name="slug" value="">
    </div>
    <div class="mb-3">
        <label for="MaDMC" class="form-label">Mã danh mục con</label>
        <input type="text" class="form-control" id="MaDMC" name="MaDMC" value="">
    </div>
    <button type="submit" name="submit" class="btn btn-primary" value="submit">Xác nhận</button>
</form>
<script>
    function generateSlug() {
    var productName = document.getElementById('TenDM').value;
    
    // Normalize Unicode characters
    productName = productName.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
    
    // Convert to lowercase and remove non-word characters
    var productSlug = productName.toLowerCase().trim().replace(/\s+/g, '-').replace(/[^a-z0-9-]/g, '');
    
    document.getElementById('slug').value = productSlug;
    }

    function numericInputHandler(inputId) {
        $(inputId).on("keyup", function() {
            var value = $(this).val();
            value = value.replace(/[^0-9]/g, ""); // Loại bỏ các ký tự không phải số
            $(this).val(value);
        });
    }

    numericInputHandler("#MaDM");
    numericInputHandler("#MaDMC");


    $(document).ready(function() {
        $("#form_addCategory").validate({
            rules: {
                TenDM: {
                    required: true,
                },
                MaDMC: {
                    required: true,
                },
            },
            messages: {
                TenDM: {
                    required: "*Vui lòng nhập tên danh mục",
                },
                MaDMC: {
                    required: "*Vui lòng nhập mã danh mục con",
                },
            }
        })
    })
</script>
<?php require_once 'app/view/admin_footer.php'; ?>
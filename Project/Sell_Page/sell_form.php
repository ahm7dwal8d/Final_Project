<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sell Page</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,
100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
rel="stylesheet">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: #1e293b;">
        <div class="container py-2 d-flex justify-content-center align-items-center">
            <a class="navbar-brand text-capitalize text-white" href="home.html">motors</a>
        </div>
    </nav>
    <div class="page-head text-center pt-4 pb-2 fs-1 d-flex justify-content-center">
        <h2 class=" fs-3 fst-italic text-decoration-none text-danger">ادخل بيانات السيارة</h2>
    </div>
    <div class="container pb-3">
        <form class="p-4 rounded sell-form" id="multi-step-form" style="background-color: #1e293b;" method="post" action="sell.php" enctype="multipart/form-data">
                <div class="form-floating mb-3  w-100">
                    <input type="text" name="name" class="form-control" id="floatingInput" placeholder="ادخال الاسم" required>
                    <label for="floatingInput">ادخال الاسم</label>
                </div>
                <div class="form-floating mb-3  w-100">
                    <input type="number" name='phone' class="form-control" id="floatingInput" placeholder="رقم الهاتف" required>
                    <label for="floatingInput">رقم الهاتف</label>
                </div>
                    <div class="form-floating mb-3  w-100">
                        <input type="text" name='model' class="form-control" id="floatingInput" placeholder="ادخال الموديل" required>
                        <label for="floatingInput">ادخال الموديل</label>
                    </div>
                    <div class="form-floating mb-3  w-100">
                        <input type="text" name='distance' class="form-control" id="floatingInput" placeholder="الكيلوا مترات" required>
                        <label for="floatingInput">الكيلوا مترات</label>
                    </div>
                    <div class="form-floating mb-3  w-100">
                        <input type="number" name='price' class="form-control" id="floatingInput" placeholder="السعر المطلوب" required>
                        <label for="floatingInput">السعر المطلوب</label>
                    </div>
                    <div class="input-group w-100">
                        <span class="input-group-text">تحميل صوره السيارة</span>
                        <input type="file" name="img" aria-label="تحميل صورة السيارة" class="form-control">
                    </div>
                <button type="submit" class="btn btn-danger w-25 mt-2" style="cursor: pointer;">تسجيل السيارة</button>

            </form>
    </div>
    <script>
    window.onload = function () {
    let loading = document.createElement('div');
    loading.className = 'loading-overly d-flex justify-content-center align-items-center'
    loading.style.backgroundColor = '#fff';
    loading.style.position = 'fixed';
    loading.style.inset = 0;
    document.body.style.overflow = 'hidden'
    loading.style.transition = '0.5s linear'
    let icon = document.createElement('div')
    icon.className = 'loading-icon w-25';
    icon.innerHTML = `<img src='../img/Spinner-1s-200px.gif' alt='' />`;
    loading.appendChild(icon)
    document.body.appendChild(loading)
    setInterval(function () {
        loading.remove()
        document.body.style.overflow = 'auto'
    }, 2000)
}
    </script>
</body>
</html>
<?php
include "./connection.php"; 
?>
<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Insert Page page</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/main.css">
<style>
	.overly {
		position: fixed;
		inset: 0;
		width: 100%;
		height: 100%;
		background-color: rgba(0, 0, 0 ,0.5)
	}
	.overly .box {
		position: absolute;
    	top: 50%;
    	left: 50%;
    	transform: translate(-50%, -50%);
	}
	.overly #close-btn {
		position: absolute;
    	top: 30px;
    	right: 30px;
    	cursor: pointer;
    	font-weight: bold;
	}
</style>
</head>

<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: #1e293b;">
        <div class="container py-2 d-flex justify-content-center align-items-center">
            <a class="navbar-brand text-capitalize text-white" href="home.html">motors</a>
        </div>
    </nav>
    <div class="page-head text-center pt-4 pb-4 fs-1 d-flex justify-content-center">
        <h2 class=" fs-3 fst-italic text-decoration-none text-danger">السيارات المتاحه للبيع</h2>
    </div>
	<div class='container'>
	<div class='row pb-3'>
	<?php 
$q="SELECT * from sales ";
$add = $conn->query($q);
foreach($add as $r ){?>
			<div class="col-lg-4 col-md-6 col-sm-12">
				<div class="box p-3 rounded mt-4" style='background-color: #1e293b; text-align: right;'>
					<img class='w-100 mb-2' src="<?= $r["img"]?>" >
					<h6 class='text-capitalize'><?= $r["name"]?></h6>
					<h6 class='text-capitalize text-white-50'><?= $r["model"]?></h6>
					<!-- <h6 class='text-capitalize'>phone: <?= $r["phone"]?></h6> -->
					<div class='text-capitalize d-flex align-items-center justify-content-end'>
					<i class="fa-solid fa-gauge-high me-2"></i>
					<div class="info">
					<?= $r["distance"]?>
					<br/>
						الكيلو متر
					</div>
				</div>
				<div class='text-capitalize my-2'>السعر: <span class='text-danger fs-4'><?= $r["price"]?> جنيه مصري</span></div>
				<button class='contact btn btn-danger' onclick='contact(<?= $r["phone"]?>)'>طلب التواصل </button>
				</div>
			</div>
			<?php }?>
		</div>
	</div>
		<script>
			function contact(num) {
				let overly = document.createElement('div')
				document.body.style.overflow = 'hidden'
				overly.className = 'overly';
				overly.id = 'overly'
				document.body.appendChild(overly)
				let box = document.createElement('div')
				box.className = 'box p-4 rounded bg-white'
				overly.appendChild(box)
				let whatsLink = document.createElement('a')
				whatsLink.href = `https://api.whatsapp.com/send?phone=+20${num}`
				whatsLink.title = 'Whats App'
				whatsLink.innerHTML = '<i class="fa-brands fa-whatsapp text-danger fs-4"></i>'
				box.appendChild(whatsLink)
				let callLink = document.createElement('a')
				callLink.href = `tel:${num}`
				callLink.title = 'Phone'
				callLink.innerHTML = '<i class="fa-solid fa-square-phone  text-danger fs-4 ps-3"></i>'
				box.appendChild(callLink)
				let closeBtn = document.createElement('span')
				closeBtn.className = 'text-danger text-capitalize'
				closeBtn.id = 'close-btn'
				closeBtn.innerHTML = 'x'
				overly.appendChild(closeBtn);
				document.addEventListener('click', function (e) {
					if (e.target.id === 'close-btn' || e.target.id === 'overly') {
						overly.remove();
						document.body.style.overflow = 'auto'
					}
				})
			}
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
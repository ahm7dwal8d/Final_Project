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
    <link rel="stylesheet" href="../css/style.css">
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
<title>Sell Cars</title>
</head>

<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: #1e293b;">
        <div class="container py-2 d-flex justify-content-center align-items-center">
            <a class="navbar-brand text-capitalize text-white" href="../home.html">motors</a>
        </div>
    </nav>
    <div class="page-head text-center pt-4 pb-4 fs-1 d-flex justify-content-center">
        <h2 class=" fs-3 fst-italic text-decoration-none">السيارات المتاحه للبيع</h2>
    </div>
	<div class='container'>
	<div class='row pb-3 car-content'>
	<?php 
$q="SELECT * from sales ";
$add = $conn->query($q);
foreach($add as $r ){?>
			<div class="col-lg-4 col-md-6 col-sm-12">
				<div class="box p-3 rounded mt-4" style='background-color: #EEE; text-align: right;'>
					<img class='w-100 mb-2' src="<?= $r["img"]?>" >
					<!-- <img class='w-100 mb-2' src="../img/1.png" > -->
					<div class="box-info">
						<h6 class='text-capitalize'><?= $r["name"]?></h6>
						<h6 class='text-capitalize opacity-50'><?= $r["model"]?></h6>
						<!-- <h6 class='text-capitalize'>phone: <?= $r["phone"]?></h6> -->
						<div class='text-capitalize d-flex align-items-center justify-content-end'>
						<i class="fa-solid fa-gauge-high me-2"></i>
						<div class="info">
						<?= $r["distance"]?>
						<br/>
							كيلو متر
						</div>
					</div>
					<div class='text-capitalize my-2'>السعر: <span class='price fs-4'><?= $r["price"]?> جنيه مصري</span></div>
					<button class='contact btn text-white' onclick='contact(<?= $r["phone"]?>)'>طلب التواصل </button>
					</div>
				</div>
			</div>
			<?php }?>
		</div>
	</div>
	<div class="setting-box">
      <div class="icon text-black bg-white">
          <i class="fa-solid fa-gear"></i>
      </div>
          <div class="color box p-1 rounded text-center text-capitalize">
              <h6>change color</h6>
              <ul class="d-flex justify-content-center ps-0 m-0 pb-2">
                  <li class="active rounded" data-color="#dc3545"></li>
                  <li class="rounded" data-color="#F44336"></li>
                  <li class="rounded" data-color="#e91e63"></li>
                  <li class="rounded" data-color="#ff9800"></li>
                  <li class="rounded" data-color="#ff5722"></li>
              </ul>
          </div>
          <div class="bg box text-center pt-1 pb-2 rounded">
            <h6>change Theme</h6>
            <ul class="p-0 m-0 d-flex text-capitalize">
                <li class=" bg-danger border-danger text-white" data-bg="rgb(15,23,42)">dark</li>
                <li class="active bg-danger border-danger text-white" data-bg="#fff">light</li>
            </ul>
        </div>
          <div class="grid box text-center pt-1 pb-2 rounded">
			<h6 class="text-capitalize">change design</h6>
            <ul class="p-0 m-0 d-flex text-capitalize">
                <li class=" active bg-danger border-danger text-white" data-grid="grid">grid</li>
                <li class=" bg-danger border-danger text-white" data-grid="block">block</li>
            </ul>
        </div>
        <div class="box">
          <button class="btn btn-danger text-capitalize w-100">reset option</button>
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
				box.className = 'box p-4 rounded bg-white text-center'
				overly.appendChild(box)
				let head = document.createElement('h4')
				head.innerHTML = 'طلب التواصل';
				box.appendChild(head)
				let whatsLink = document.createElement('a')
				whatsLink.href = `https://api.whatsapp.com/send?phone=+2${num}`
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
	loading.style.zIndex = '99999999'
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
		<script src="../js/main.js"></script>
</body>
</html>
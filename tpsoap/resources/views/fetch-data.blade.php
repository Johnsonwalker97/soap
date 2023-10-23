
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SOAP</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="storage/assets/img/favicon.png" rel="icon">
  <link href="storage/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="storage/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="storage/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="storage/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="storage/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="storage/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="storage/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="storage/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="storage/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="storage/assets/css/style.css" rel="stylesheet">

</head>



  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.html"><span>Soap </span>projet</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      

    </div>
  </header><!-- End Header -->

  

  <section>
  <div class="card border-primary">
<?php   
           $i=1;
          $T = json_encode($result);
          $results = json_decode($T);
        ?>
  <div class="card-header border-dark text-center">
    <p class="fst-italic"> <h3>Modification du produit No {{ $results->product_code }}.</h3> </p>
  </div>
  <div class="card-body">
  <div class="card-body">
  <div class="container text-center">
   <div class="row">
          
   <div class="card ">
      <div class="card-header">
            <marquee behavior="scroll" width="100%" scrollamount="8" scrolldelay="25">
              <h2 color="success">Vous etes entrain de modifier les données d'un produit !!</h2>
            </marquee>
      </div>
      <div class="card-body">
      
       <p class="card-text">
           <form action="/update" method="post">
           @csrf
              <!-- Début card nouvelle configuration -->
              <div class="card">
                <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                    <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                   </div>
                   @endif
                 <p class="card-text">
                  <div class="row">
                    <div class="col">
                      <input type="integer" class="form-control" id="product_code" name="product_code" value="{{ $results->product_code }}" placeholder="Code du produit" aria-label="Code du produit" >
                    </div>
                    <div class="col">
                      <input type="Text" class="form-control" id="name" name="name" value="{{ $results->name }}" placeholder="designation du produit" aria-label="designation du produit" >
                    </div>
                    <div class="col">
                      <input type="integer" class="form-control" id="price" name="price" value="{{ $results->price }}" placeholder="Prix du produit" aria-label="Prix de produit" >
                    </div>
                  </div>  
                   
                </p>
                </div>
              </div>
              <!-- Fin card nouvelle config-->
              <br>
              <div class="text-center">
                <!-- Début button validation -->
                <a href="{{ url()->previous() }}" type="button" class="btn btn-danger">Retour</a>
                <button type="submit" class="btn btn-success">Valider</a>
                <!-- Fin button validation -->
              </div>
           </form>
       </p>
      </div>
     </div>
      
    </div>
  </div>
 </div>



</section><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>IBAM PROJECTS</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/company-free-html-bootstrap-template/ -->
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
      
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="storage/assets/vendor/aos/aos.js"></script>
  <script src="storage/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="storage/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="storage/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="storage/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="storage/assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="storage/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="storage/assets/js/main.js"></script>

</body>

</html>


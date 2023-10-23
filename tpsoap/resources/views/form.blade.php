






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
  
<?php   
           $i=1;
          $T = json_encode($result);
          $results = json_decode($T);
        ?>
<div class="card">
  <div class="card-header border-dark text-center">
    <p class="fst-italic"> <h3>Listes des produits</h3> </p>
  </div>
  <div class="card-body">
  <div class="card-body">
    <marquee behavior="scroll" width="100%" scrollamount="8" scrolldelay="25">
      <h2 color="success">Vous etes dans la liste des produits !!</h2>
    </marquee>
  <div class="container text-center">
   <div class="row">
   @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
         @endif
    <div class="col">
     <table class="table table-bordered">
      <thead>
       <tr>
        <th scope="col">Identifiant</th>
        <th scope="col">Code produit</th>
        <th scope="col">Désignation</th>
        <th scope="col">Prix</th>
        <th scope="col">Action</th>
       </tr>
      </thead>
      <tbody>
       
        @foreach ($results as $index => $result)
       <tr>
       
        <th scope="row">{{ $i++ }}</th>
         <td>{{ $result->product_code }}</td>
         <td>{{ $result->name }}</td>
         <td>{{ $result->price }}</td>
         <td>
          <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
           <div class="btn-group" role="group">
           <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            Actions
           </button>
          <ul class="dropdown-menu">
           <li><a class="dropdown-item" href="/fetch-data?param={{$result->product_code}}">Modifier</a></li>
           <li>
           <li>
            <form action="/Delete" method="post">
            @csrf
                <input type="hidden"  name="param" value="{{$result->product_code}}">
                <button class="dropdown-item" type="submit" href="">supprimer</button>
            </form>
           </li>
           </li>
         </ul>
        </div>
        </div>
         </td>
       </tr>
       @endforeach
      </tbody>
     </table>
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

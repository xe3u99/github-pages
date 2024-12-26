<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Larissa</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;800&display=swap" rel="stylesheet">
</head>
<body>

    <nav>
        <div class="wrapper">
            <div class="logo"><a href="#">Larissa</a></div>
            <ul class="menu">
                <li><a href="#home">Home</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#pricelist">Price List</a></li>
                <li><a href="#location">Location</a></li>
                <a href="booking.php" class="tbl-maroon">Booking Now</a>
                <a href="login.html" class="tbl-maroon">Login Admin</a>
            </ul>
        </div>
    </nav>

    <section id="home" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="https://img.freepik.com/free-photo/modern-beauty-salon-interior_23-2148910541.jpg?t=st=1732601963~exp=1732605563~hmac=314557fc86d3a64adfb6b04f415c7728be26a5b773cad3c3891a2f92eeef4cc2&w=826" class="d-block w-100" alt="Salon 1">
            <div class="carousel-caption">
              <h1>Discover Your Beauty</h1>
              <p>Professional care for all your styling needs.</p>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <img src="https://img.freepik.com/free-photo/table-stylist-studio_23-2147784015.jpg?t=st=1732602049~exp=1732605649~hmac=4b5c434ce4f134f5939fc766af072d64aac6b2aaf597285528208f6d7b3b690e&w=996" class="d-block w-100" alt="Salon 2">
          <div class="carousel-caption">
            <h1>Unwind & Relax</h1>
            <p>Your perfect escape awaits.</p>
          </div> 
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#home" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#home" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </section>
      
    <section id="services" class="services py-5">
        <div class="container">
            <div class="row text-center">
                <div class="col-12">
                    <h2 class="fw-bold mb-4">Services We Offer</h2>
                    <p class="text-muted">Our salon offers a variety of beauty services and hair and body treatments. All treatments are performed by experts using quality products.</p>
                </div>
            </div>
            <div class="row text-center justify-content-center">
                <!-- Service 1 -->
                <div class="col-md-3 col-sm-6 mb-4">
                    <div class="service-item">
                        <img src="https://img.freepik.com/premium-photo/hair-salon-concept-male-hairstylist-using-comb-grab-lock-hair-using-hair-dryer-drying-straightening_357951-864.jpg?w=826" alt="Hair care" class="img-fluid rounded-circle mb-3">
                        <h5>Hair Care</h5>
                        <p>Cut, coloring, styling</p>
                    </div>
                </div>
                
                <!-- Service 2 -->
                <div class="col-md-3 col-sm-6 mb-4">
                    <div class="service-item">
                        <img src="https://img.freepik.com/premium-photo/japanese-woman-undergoing-facial-treatment_1003686-58653.jpg?w=740" alt="Facial care" class="img-fluid rounded-circle mb-3">
                        <h5>Facial Care</h5>
                        <p>Facial, anti-aging treatment</p>
                    </div>
                </div>
                <!-- Service 3 -->
                <div class="col-md-3 col-sm-6 mb-4">
                    <div class="service-item">
                        <img src="https://img.freepik.com/free-photo/nail-care-manicure-process_23-2149130356.jpg?t=st=1732715061~exp=1732718661~hmac=f0ef2ce7bb3abf93434928aa96205f8fcc050e8e5af15c001e6bfe35ac8d885d&w=826" alt="Manicure and Pedicure" class="img-fluid rounded-circle mb-3">
                        <h5>Manicure & Pedicure</h5>
                        <p>Perfect nail treatment</p>
                    </div>
                </div>
                <!-- Service 4 -->
                <div class="col-md-3 col-sm-6 mb-4">
                    <div class="service-item">
                        <img src="https://img.freepik.com/premium-photo/smiling-woman-lying-massage-table-spa_1048944-10056506.jpg?w=826" alt="Body treatments" class="img-fluid rounded-circle mb-3">
                        <h5>Body Treatments</h5>
                        <p>Spa, relaxing massage</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section id="pricelist">
        <div class="kolom">
            <h1>Price List</h1>
            <p>Explore our affordable pricing for premium beauty services.</p>
        </div>
        
<div class="price-list">
    <table>
        <thead>
            <tr>
                <th>Service</th>
                <th>Price (IDR)</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Hair Cutting</td>
                <td>Rp50,000</td>
            </tr>
            <tr>
                <td>Hairstyle</td>
                <td>Rp80,000</td>
            </tr>
            <tr>
                <td>Hair Coloring</td>
                <td>Rp150,000</td>
            </tr>
            <tr>
                <td>Facial</td>
                <td>Rp120,000</td>
            </tr>
            <tr>
                <td>Anti-aging Treatment</td>
                <td>Rp130,000</td>
            </tr>
            <tr>
                <td>Manicure & Pedicure</td>
                <td>Rp100,000</td>
            </tr>
            <tr>
                <td>Perfect Nail Treatment</td>
                <td>Rp110,000</td>
            </tr>
            <tr>
                <td>Spa</td>
                <td>Rp150,000</td>
            </tr>
            <tr>
                <td>Relaxing Massage</td>
                <td>Rp130,000</td>
            </tr>
        </tbody>
    </table>
</div>
</section>
    
    <section id="location">
        <div class="kolom">
            <h2>Visit Us</h2>
            <p>Find us at our convenient location for all your beauty needs.</p>
        </div>
        <div class="location-map">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.5335838471133!2d110.320759!3d-7.7526657!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a58f6881d9121%3A0x729959d57a47a6e8!2sLarissa%20Aesthetic%20Center%20Jalan%20Magelang!5e0!3m2!1sen!2sid!4v1697000256002!5m2!1sen!2sid" 
                width="600" 
                height="450" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy">
            </iframe>
        </div>
    </section>

    <footer>
        <div class="footer">
            <div class="footer-section">
                <h3>Larissa</h3>
                <p>Experience luxury and professional care.</p>
            </div>
            <div class="footer-section">
                <h3>About</h3>
                <p>Your one-stop beauty destination.</p>
            </div>
            <div class="footer-section">
                <h3>Address</h3>
                <p>Larissa jl. Magelang</p>
                <p>Kode Pos: 55284</p>
            </div>
            <div class="footer-section">
                <h3>Social</h3>
                <p>Instagram: <b>@larissajogja</b></p>
                <p>TikTok:    <b>@larissajogja</b></p>
            </div>
        </div>
        <div class="footer-copyright">
            © 2024, Larissa. All Rights Reserved.
        </div>
    </footer>
</body>
</html>
    



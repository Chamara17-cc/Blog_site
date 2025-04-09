<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .main-footer {
            background-color: bisque;
            color: #1a1a1a;
            font-family: Arial, sans-serif;
            margin-top: 30px;

        }

        /* Image carousel section */
        .image-carousel-footer {
            width: 100%;
            background-color: #333;
            padding: 20px 0;
            overflow: hidden;
            border-bottom: 1px solid #444;
        }

        .carousel-container {
            width: 100%;
            overflow: hidden;
            position: relative;
        }

        .carousel-track {
            display: flex;
            transition: transform 1s ease-in-out;
            width: calc(200px * 14);
            /* 200px per image × 7 images × 2 for the loop */
        }

        .carousel-item {
            min-width: 200px;
            height: 120px;
            margin: 0 10px;
        }

        .carousel-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 5px;
        }

        /* Main footer content */
        .footer-content {
            padding: 50px 0 30px;
            display: flex;
            justify-content: space-between;
            max-width: 1200px;
            margin: 0 auto;
            flex-wrap: wrap;
        }

        .footer-section {
            flex: 1;
            min-width: 250px;
            margin: 0 20px;
            margin-bottom: 30px;
        }

        .footer-heading {
            color: #fff;
            font-size: 18px;
            margin-bottom: 20px;
            font-weight: 600;
            position: relative;
            padding-bottom: 10px;
        }

        .footer-heading:after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            height: 2px;
            width: 50px;
            background-color: #0d6efd;
        }

        .social-icons {
            margin-top: 20px;
            display: flex;
        }

        .social-icons a {
            display: inline-block;
            width: 35px;
            height: 35px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            text-align: center;
            line-height: 35px;
            margin-right: 10px;
            color: #fff;
            transition: all 0.3s;
        }

        .social-icons a:hover {
            background-color: #0d6efd;
        }

        .footer-links {
            list-style: none;
            padding: 0;
            margin: 0;
            color: #1a1a1a;
        }

        .footer-links li {
            margin-bottom: 10px;
        }

        .footer-links a {
            color: #ccc;
            text-decoration: none;
            transition: all 0.3s;
        }

        .footer-links a:hover {
            color: #0d6efd;
            padding-left: 5px;
        }

        .contact-info p {
            margin-bottom: 8px;
            color: #ccc;
        }

        .copyright-bar {
            background-color: #1a1a1a;
            padding: 15px 0;
            font-size: 14px;
        }

        .copyright-bar p {
            margin: 0;
            text-align: center;
        }

        /* Responsive designs */
        @media (max-width: 768px) {
            .footer-content {
                flex-direction: column;
                padding-left: 20px;
                padding-right: 20px;
            }

            .footer-section {
                margin-bottom: 30px;
                width: 100%;
            }
        }
    </style>
    <title>Document</title>
</head>

<body>
    <footer class="main-footer">

        <div class="image-carousel-footer">
            <div class="carousel-container">
                <div class="carousel-track">
                    <?php foreach ($photolink as $image): ?>
                        <div class="carousel-item">
                            <img src="<?= $image['photolink']; ?>" class="img-fluid rounded" alt="Footer Image">
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>


        <div class="footer-content">


            <div class="col-md-4">
                <h5>About Us</h5>
                <div class="footer-content">
                    <p>Your company description goes here.<br /> Share your story and mission with your visitors.</p>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>

            </div>


            <div class="col-md-3">
                <h5>Quick Links</h5>
                <div class="footer-content">
                    <ul class="footer-links">
                        <li><a href="<?= base_url(); ?>">Home</a></li>
                        <li><a href="<?= base_url('about'); ?>">About</a></li>
                        <li><a href="<?= base_url('services'); ?>">Services</a></li>
                        <li><a href="<?= base_url('contact'); ?>">Contact</a></li>
                    </ul>
                </div>

            </div>


            <div class="col-md-5">
                <h5>Contact Us</h5>
                <div class="footer-content">
                    <address>
                        <p><i class="fas fa-map-marker-alt"></i> 123 Street Name, City, Country</p>
                        <p><i class="fas fa-phone"></i> +1 (123) 456-7890</p>
                        <p><i class="fas fa-envelope"></i> info@yourcompany.com</p>
                    </address>
                </div>

            </div>

        </div>


        <div class="copyright-bar">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p>&copy; <?= date('Y'); ?> Your Company Name. All Rights Reserved.</p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <p>Designed by Your Name</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const track = document.querySelector('.carousel-track');
            const items = document.querySelectorAll('.carousel-item');
            let position = 0;


            items.forEach(item => {
                const clone = item.cloneNode(true);
                track.appendChild(clone);
            });


            function moveCarousel() {
                position -= 1;


                if (position <= -(items.length * 220)) {
                    position = 0;
                    track.style.transition = 'none';
                    track.style.transform = `translateX(${position}px)`;
                    setTimeout(() => {
                        track.style.transition = 'transform 1s ease-in-out';
                    }, 50);
                } else {
                    track.style.transform = `translateX(${position}px)`;
                }
            }


            setInterval(moveCarousel, 50);
        });
    </script>
</body>

</html>
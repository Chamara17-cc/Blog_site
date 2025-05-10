<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        .contact-icon {
            font-size: 1.5rem;
            color: #0d6efd;
            margin-right: 10px;
        }

        .map-container {
            height: 300px;
            background-color: #e9ecef;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .header-section {
            background-color: #f8f9fa;
            padding: 80px 0;
        }
    </style>
</head>

<body>

    <!-- Navigation bar -->
    <?php $this->load->view('header') ?>

    <!-- Header Section -->
    <header class="header-section">
 
        <div class="container text-center">
            <h1>Contact Us</h1>
            <p class="lead">We'd love to hear from you. Get in touch with our team.</p>
        </div>
    </header>

    <!-- Contact Section -->
    <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger">
            <?= $this->session->flashdata('error'); ?>
        </div>
    <?php endif; ?>
    <section class="py-5">
        <div class="container">
            <div class="row g-5">
                <!-- Contact Form -->
                <div class="col-lg-7">
                    <h2 class="mb-4">Send us a message</h2>
                    <form action="<?= base_url('contact_us/store_user_messages') ?>" method="post" enctype="multipart/form-data">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>

                            <div class="col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="col-md-6">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" id="phone" name="phone">
                            </div>
                            <div class="col-12">
                                <label for="subject" class="form-label">Subject</label>
                                <input type="text" class="form-control" id="subject" name="subject" required>
                            </div>
                            <div class="col-12">
                                <label for="message" class="form-label">Message</label>
                                <textarea class="form-control" id="message" rows="5" name="message" required></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Contact Information -->
                <div class="col-lg-5">
                    <h2 class="mb-4">Contact Information</h2>
                    <div class="card">
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">
                                <li class="mb-3">
                                    <div class="d-flex align-items-center">
                                        <span class="contact-icon"><i class="bi bi-geo-alt-fill"></i></span>
                                        <div>
                                            <h5 class="mb-0">Address</h5>
                                            <p class="mb-0">123 Business Avenue, Suite 100<br>San Francisco, CA 94107</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="mb-3">
                                    <div class="d-flex align-items-center">
                                        <span class="contact-icon"><i class="bi bi-telephone-fill"></i></span>
                                        <div>
                                            <h5 class="mb-0">Phone</h5>
                                            <p class="mb-0">(123) 456-7890</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="mb-3">
                                    <div class="d-flex align-items-center">
                                        <span class="contact-icon"><i class="bi bi-envelope-fill"></i></span>
                                        <div>
                                            <h5 class="mb-0">Email</h5>
                                            <p class="mb-0">info@company.com</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex align-items-center">
                                        <span class="contact-icon"><i class="bi bi-clock-fill"></i></span>
                                        <div>
                                            <h5 class="mb-0">Business Hours</h5>
                                            <p class="mb-0">Monday-Friday: 9am-5pm<br>Saturday-Sunday: Closed</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Social Media Icons -->
                    <div class="mt-4">
                        <h5>Connect With Us</h5>
                        <div class="d-flex gap-2 mt-3">
                            <a href="#" class="btn btn-outline-dark">
                                <i class="bi bi-facebook"></i>
                            </a>
                            <a href="#" class="btn btn-outline-dark">
                                <i class="bi bi-twitter"></i>
                            </a>
                            <a href="#" class="btn btn-outline-dark">
                                <i class="bi bi-instagram"></i>
                            </a>
                            <a href="#" class="btn btn-outline-dark">
                                <i class="bi bi-linkedin"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <!-- <section class="pb-5">
        <div class="container">
            <h2 class="mb-4">Find Us</h2>
            <div class="map-container border rounded">
               
                <div class="text-center">
                    <i class="bi bi-map fs-1 text-secondary"></i>
                    <p class="mt-2 text-muted">Map placeholder - Add your preferred map service here</p>
                </div>
            </div>
        </div>
    </section> -->

    <!-- FAQ Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5">Frequently Asked Questions</h2>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="accordion" id="faqAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                                    What are your response times?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    We typically respond to all inquiries within 24-48 business hours. For urgent matters, please call our customer service line directly.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                                    How can I schedule a consultation?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    You can schedule a consultation by filling out the contact form on this page, calling our office directly, or using our online scheduling tool available on our website.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
                                    Do you offer remote services?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Yes, we offer remote consultations and services for clients who prefer virtual meetings or are located outside our service area. Please mention your preference when contacting us.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="dashboard-footer">
        <?php $this->load->view('footer', ['photolink' => $photolink]); ?>
    </footer>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>
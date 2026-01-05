<?php
$pageTitle = "Our Story";
$baseUrl = "./";
include 'includes/header.php';
?>

<style>
    /* Page specific styles for About Us */
    .hero-about {
        padding: 10rem 8% 6rem;
        background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
        color: white;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .hero-about::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: url('assets/images/about.jpg');
        background-size: cover;
        background-position: center;
        opacity: 0.2;
        z-index: 0;
    }

    .hero-content { position: relative; z-index: 1; }
    .hero-about h1 { font-size: 4rem; margin-bottom: 1.5rem; }
    .hero-about p { font-size: 1.2rem; opacity: 0.8; max-width: 700px; margin: 0 auto; }

    .story-section {
        padding: 8rem 8%;
        display: grid;
        grid-template-columns: 1fr 1.2fr;
        gap: 5rem;
        align-items: center;
    }

    .story-img { position: relative; }
    .story-img img { width: 100%; border-radius: 40px; box-shadow: 0 30px 60px rgba(0, 0, 0, 0.1); }
    
    .experience-badge {
        position: absolute;
        bottom: -30px;
        right: -30px;
        background: var(--blue);
        color: white;
        padding: 2.5rem;
        border-radius: 30px;
        text-align: center;
        box-shadow: 0 20px 40px rgba(59, 130, 246, 0.3);
    }

    .experience-badge h3 { font-size: 2.5rem; line-height: 1; }
    .experience-badge p { font-weight: 700; text-transform: uppercase; font-size: 0.8rem; letter-spacing: 1px; }

    .story-content h2 { font-size: 3rem; margin-bottom: 2rem; line-height: 1.2; }
    .story-content p { font-size: 1.15rem; color: #64748b; margin-bottom: 2rem; line-height: 1.8; }

    .feature-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; }
    .feature-item { display: flex; gap: 1rem; align-items: flex-start; }
    .feature-item i { background: rgba(59, 130, 246, 0.1); color: var(--blue); padding: 0.8rem; border-radius: 12px; font-size: 1.5rem; }
    .feature-item h4 { margin-bottom: 0.5rem; }
    .feature-item p { font-size: 0.95rem; margin-bottom: 0; }

    @media (max-width: 1000px) {
        .story-section { grid-template-columns: 1fr; }
        .hero-about h1 { font-size: 3rem; }
    }
</style>

<section class="hero-about">
    <div class="hero-content">
        <h1>Building Trust in Real Estate</h1>
        <p>Your journey to the perfect property starts here. We are dedicated to providing the most transparent and efficient real estate experience in Sri Lanka.</p>
    </div>
</section>

<section class="story-section">
    <div class="story-img">
        <img src="assets/images/house2.jpg" alt="About Us">
        <div class="experience-badge">
            <h3>100%</h3>
            <p>Verified Listings</p>
        </div>
    </div>
    <div class="story-content">
        <h2>We're more than just a listing site</h2>
        <p>At Property Pro, we take pride in being a trusted platform for buying and selling properties and land. With a focus on making the real estate process as seamless as possible, we connect buyers with sellers, offering a wide range of residential, commercial, and land options.</p>

        <div class="feature-grid">
            <div class="feature-item">
                <i class='bx bx-shield-quarter'></i>
                <div>
                    <h4>Secured Platform</h4>
                    <p>We verify every single property to ensure your safety.</p>
                </div>
            </div>
            <div class="feature-item">
                <i class='bx bx-trending-up'></i>
                <div>
                    <h4>Expert Insights</h4>
                    <p>Market leading intelligence at your fingertips.</p>
                </div>
            </div>
        </div>

        <a href="contact.php" style="display: inline-block; margin-top: 3rem; background: var(--blue); color: white; padding: 1.2rem 2.5rem; border-radius: 15px; text-decoration: none; font-weight: 700;">Get In Touch</a>
    </div>
</section>

<?php include 'includes/footer.php'; ?>

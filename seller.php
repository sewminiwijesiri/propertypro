<?php
$pageTitle = "Become a Seller";
$baseUrl = "./";
include 'includes/header.php';
?>

<style>
    /* Seller Landing Page Styles */
    .seller-hero {
        height: 90vh;
        width: 100%;
        position: relative;
        background: linear-gradient(135deg, rgba(15, 23, 42, 0.95), rgba(59, 130, 246, 0.85)), url('assets/images/house.jpg');
        background-size: cover;
        background-position: center;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0 8%;
    }

    .hero-content {
        max-width: 1200px;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 4rem;
        align-items: center;
    }

    .hero-text h1 {
        font-size: 3.5rem;
        color: white;
        line-height: 1.2;
        margin-bottom: 1.5rem;
    }

    .hero-text h1 span {
        color: var(--blue);
        background: linear-gradient(135deg, #60a5fa, #3b82f6);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .hero-text p {
        font-size: 1.2rem;
        color: rgba(255, 255, 255, 0.9);
        margin-bottom: 2.5rem;
        line-height: 1.8;
    }

    .cta-buttons {
        display: flex;
        gap: 1.5rem;
    }

    .btn-primary {
        background: var(--blue);
        color: white;
        padding: 1.2rem 2.5rem;
        border-radius: 20px;
        text-decoration: none;
        font-weight: 700;
        font-size: 1.1rem;
        transition: 0.3s;
        display: inline-flex;
        align-items: center;
        gap: 0.8rem;
    }

    .btn-primary:hover {
        background: #2563eb;
        transform: translateY(-3px);
        box-shadow: 0 15px 30px rgba(59, 130, 246, 0.3);
    }

    .btn-secondary {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        color: white;
        padding: 1.2rem 2.5rem;
        border-radius: 20px;
        text-decoration: none;
        font-weight: 700;
        font-size: 1.1rem;
        transition: 0.3s;
        border: 2px solid rgba(255, 255, 255, 0.2);
    }

    .btn-secondary:hover {
        background: rgba(255, 255, 255, 0.2);
        border-color: white;
    }

    .hero-stats {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 2rem;
    }

    .stat-box {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(20px);
        padding: 2rem;
        border-radius: 25px;
        border: 1px solid rgba(255, 255, 255, 0.2);
        text-align: center;
    }

    .stat-box h3 {
        font-size: 2.5rem;
        color: white;
        margin-bottom: 0.5rem;
    }

    .stat-box p {
        color: rgba(255, 255, 255, 0.8);
        font-weight: 600;
    }

    /* Benefits Section */
    .benefits {
        padding: 6rem 8%;
        background: var(--bg);
    }

    .section-header {
        text-align: center;
        margin-bottom: 4rem;
    }

    .section-header span {
        color: var(--blue);
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-size: 0.9rem;
    }

    .section-header h2 {
        font-size: 2.8rem;
        color: var(--primary);
        margin-top: 1rem;
    }

    .benefits-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 2.5rem;
    }

    .benefit-card {
        background: white;
        padding: 3rem 2rem;
        border-radius: 30px;
        text-align: center;
        border: 1px solid #f1f5f9;
        transition: 0.4s;
    }

    .benefit-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(59, 130, 246, 0.1);
        border-color: var(--blue);
    }

    .benefit-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, rgba(59, 130, 246, 0.1), rgba(139, 92, 246, 0.1));
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
    }

    .benefit-icon i {
        font-size: 2.5rem;
        color: var(--blue);
    }

    .benefit-card h3 {
        font-size: 1.5rem;
        color: var(--primary);
        margin-bottom: 1rem;
    }

    .benefit-card p {
        color: var(--slate);
        line-height: 1.8;
    }

    /* How It Works */
    .how-it-works {
        padding: 6rem 8%;
        background: white;
    }

    .steps-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 2rem;
        margin-top: 3rem;
    }

    .step-card {
        position: relative;
        text-align: center;
        padding: 2rem 1.5rem;
    }

    .step-number {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, var(--blue), #8b5cf6);
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8rem;
        font-weight: 800;
        margin: 0 auto 1.5rem;
    }

    .step-card h4 {
        font-size: 1.2rem;
        color: var(--primary);
        margin-bottom: 0.8rem;
    }

    .step-card p {
        color: var(--slate);
        font-size: 0.95rem;
    }

    /* CTA Section */
    .cta-section {
        padding: 6rem 8%;
        background: linear-gradient(135deg, var(--primary), #1e293b);
        text-align: center;
        color: white;
    }

    .cta-section h2 {
        font-size: 3rem;
        margin-bottom: 1.5rem;
    }

    .cta-section p {
        font-size: 1.2rem;
        opacity: 0.9;
        margin-bottom: 3rem;
        max-width: 700px;
        margin-left: auto;
        margin-right: auto;
    }

    /* Testimonials */
    .testimonials {
        padding: 6rem 8%;
        background: var(--bg);
    }

    .testimonials-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 2.5rem;
        margin-top: 3rem;
    }

    .testimonial-card {
        background: white;
        padding: 2.5rem;
        border-radius: 30px;
        border: 1px solid #f1f5f9;
    }

    .testimonial-header {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 1.5rem;
    }

    .testimonial-avatar {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, var(--blue), #8b5cf6);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.5rem;
        font-weight: 700;
    }

    .testimonial-info h4 {
        color: var(--primary);
        margin-bottom: 0.3rem;
    }

    .testimonial-info p {
        color: var(--slate);
        font-size: 0.9rem;
    }

    .testimonial-text {
        color: var(--slate);
        line-height: 1.8;
        font-style: italic;
    }

    .rating {
        color: #fbbf24;
        margin-bottom: 1rem;
    }

    @media (max-width: 1100px) {
        .hero-content {
            grid-template-columns: 1fr;
            text-align: center;
        }

        .benefits-grid,
        .testimonials-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .steps-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 768px) {
        .hero-text h1 {
            font-size: 2.5rem;
        }

        .benefits-grid,
        .testimonials-grid,
        .steps-grid {
            grid-template-columns: 1fr;
        }

        .cta-buttons {
            flex-direction: column;
        }
    }
</style>

<section class="seller-hero">
    <div class="hero-content">
        <div class="hero-text">
            <h1>List Your Property & <span>Reach Thousands</span> of Buyers</h1>
            <p>Join PropertyPro's premium seller network. Get maximum exposure for your properties with our verified buyer base and expert marketing support.</p>
            <div class="cta-buttons">
                <a href="signup.php" class="btn-primary">
                    <i class='bx bx-user-plus'></i> Start Selling Now
                </a>
                <a href="login.php" class="btn-secondary">Already a Seller? Login</a>
            </div>
        </div>
        <div class="hero-stats">
            <div class="stat-box">
                <h3>800+</h3>
                <p>Active Sellers</p>
            </div>
            <div class="stat-box">
                <h3>1.5K+</h3>
                <p>Properties Sold</p>
            </div>
            <div class="stat-box">
                <h3>95%</h3>
                <p>Success Rate</p>
            </div>
            <div class="stat-box">
                <h3>24/7</h3>
                <p>Support Available</p>
            </div>
        </div>
    </div>
</section>

<section class="benefits">
    <div class="section-header">
        <span>Why Choose Us</span>
        <h2>Seller Benefits & Features</h2>
    </div>
    <div class="benefits-grid">
        <div class="benefit-card">
            <div class="benefit-icon">
                <i class='bx bxs-user-check'></i>
            </div>
            <h3>Verified Buyers</h3>
            <p>Connect with serious, pre-verified buyers who are actively looking for properties in your area.</p>
        </div>
        <div class="benefit-card">
            <div class="benefit-icon">
                <i class='bx bxs-rocket'></i>
            </div>
            <h3>Maximum Exposure</h3>
            <p>Your listings get featured across our platform, reaching thousands of potential buyers daily.</p>
        </div>
        <div class="benefit-card">
            <div class="benefit-icon">
                <i class='bx bxs-shield-alt-2'></i>
            </div>
            <h3>Secure Transactions</h3>
            <p>All transactions are monitored and secured with our advanced verification system.</p>
        </div>
        <div class="benefit-card">
            <div class="benefit-icon">
                <i class='bx bxs-dashboard'></i>
            </div>
            <h3>Easy Management</h3>
            <p>Manage all your listings from one powerful dashboard with real-time analytics.</p>
        </div>
        <div class="benefit-card">
            <div class="benefit-icon">
                <i class='bx bxs-message-dots'></i>
            </div>
            <h3>Direct Communication</h3>
            <p>Chat directly with interested buyers through our integrated messaging system.</p>
        </div>
        <div class="benefit-card">
            <div class="benefit-icon">
                <i class='bx bxs-badge-dollar'></i>
            </div>
            <h3>No Hidden Fees</h3>
            <p>Transparent pricing with no surprise charges. Pay only for successful transactions.</p>
        </div>
    </div>
</section>

<section class="how-it-works">
    <div class="section-header">
        <span>Simple Process</span>
        <h2>How It Works</h2>
    </div>
    <div class="steps-grid">
        <div class="step-card">
            <div class="step-number">1</div>
            <h4>Create Account</h4>
            <p>Sign up for free and complete your seller profile verification</p>
        </div>
        <div class="step-card">
            <div class="step-number">2</div>
            <h4>List Property</h4>
            <p>Add your property details, photos, and pricing information</p>
        </div>
        <div class="step-card">
            <div class="step-number">3</div>
            <h4>Get Inquiries</h4>
            <p>Receive messages from verified buyers interested in your property</p>
        </div>
        <div class="step-card">
            <div class="step-number">4</div>
            <h4>Close Deal</h4>
            <p>Connect with buyers and complete the transaction securely</p>
        </div>
    </div>
</section>

<section class="testimonials">
    <div class="section-header">
        <span>Success Stories</span>
        <h2>What Our Sellers Say</h2>
    </div>
    <div class="testimonials-grid">
        <div class="testimonial-card">
            <div class="testimonial-header">
                <div class="testimonial-avatar">RJ</div>
                <div class="testimonial-info">
                    <h4>Rajitha Jayawardena</h4>
                    <p>Property Developer</p>
                </div>
            </div>
            <div class="rating">★★★★★</div>
            <p class="testimonial-text">"PropertyPro helped me sell 3 luxury villas in just 2 months. The buyer quality is exceptional and the platform is incredibly easy to use."</p>
        </div>
        <div class="testimonial-card">
            <div class="testimonial-header">
                <div class="testimonial-avatar">SP</div>
                <div class="testimonial-info">
                    <h4>Samantha Perera</h4>
                    <p>Land Owner</p>
                </div>
            </div>
            <div class="rating">★★★★★</div>
            <p class="testimonial-text">"I was skeptical at first, but the verified buyer system really works. Sold my land plot within 3 weeks at my asking price!"</p>
        </div>
        <div class="testimonial-card">
            <div class="testimonial-header">
                <div class="testimonial-avatar">NK</div>
                <div class="testimonial-info">
                    <h4>Nimal Kumara</h4>
                    <p>Real Estate Agent</p>
                </div>
            </div>
            <div class="rating">★★★★★</div>
            <p class="testimonial-text">"Best platform for serious sellers. The dashboard analytics help me price my properties competitively and track performance."</p>
        </div>
    </div>
</section>

<section class="cta-section">
    <h2>Ready to Start Selling?</h2>
    <p>Join thousands of successful sellers on PropertyPro. List your first property today and connect with verified buyers across Sri Lanka.</p>
    <div class="cta-buttons" style="justify-content: center;">
        <a href="signup.php" class="btn-primary" style="background: white; color: var(--primary);">
            <i class='bx bx-rocket'></i> Get Started Free
        </a>
        <a href="contact.php" class="btn-secondary">Contact Sales Team</a>
    </div>
</section>

<?php include 'includes/footer.php'; ?>

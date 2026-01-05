<?php
$pageTitle = "Contact Us";
$baseUrl = "./";
include 'includes/header.php';
?>

<style>
    /* Page specific styles for Contact */
    .page-header {
        background: linear-gradient(135deg, #1e293b 0%, #334155 100%);
        padding: 10rem 8% 6rem;
        color: white;
        text-align: center;
    }

    .page-header h1 {
        font-size: 3.5rem;
        margin-bottom: 1rem;
    }

    .page-header p {
        opacity: 0.8;
        font-size: 1.1rem;
        max-width: 600px;
        margin: 0 auto;
    }

    .contact-container {
        padding: 5rem 8%;
        display: grid;
        grid-template-columns: 1fr 1.5fr;
        gap: 4rem;
        margin-top: -50px;
    }

    .info-panel {
        display: flex;
        flex-direction: column;
        gap: 2rem;
    }

    .info-card {
        background: white;
        padding: 2.5rem;
        border-radius: 30px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        border: 1px solid #f1f5f9;
        display: flex;
        gap: 1.5rem;
        align-items: center;
    }

    .info-icon {
        width: 60px;
        height: 60px;
        background: rgba(59, 130, 246, 0.1);
        color: var(--blue);
        border-radius: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8rem;
    }

    .info-text h3 {
        font-size: 1.1rem;
        margin-bottom: 0.3rem;
    }

    .info-text p {
        color: var(--slate);
        font-weight: 500;
    }

    .form-card {
        background: white;
        padding: 4rem;
        border-radius: 40px;
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.05);
        border: 1px solid #f1f5f9;
    }

    .form-card h2 {
        font-size: 2rem;
        margin-bottom: 1rem;
    }

    .form-card p {
        color: var(--slate);
        margin-bottom: 3rem;
    }

    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.5rem;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        gap: 0.6rem;
    }

    .form-group.full {
        grid-column: span 2;
    }

    .form-group label {
        font-weight: 700;
        font-size: 0.9rem;
        color: var(--primary);
        margin-left: 0.5rem;
    }

    @media (max-width: 1000px) {
        .contact-container { grid-template-columns: 1fr; }
        .form-card { padding: 2.5rem; }
    }

    @media (max-width: 768px) {
        .page-header h1 { font-size: 2.5rem; }
        .form-grid { grid-template-columns: 1fr; }
        .form-group.full { grid-column: auto; }
    }
</style>

<header class="page-header">
    <h1>Let's Connect</h1>
    <p>Have questions about a property or want to list your own? Our team is here to help you every step of the way.</p>
</header>

<div class="contact-container">
    <div class="info-panel">
        <div class="info-card">
            <div class="info-icon"><i class='bx bx-envelope'></i></div>
            <div class="info-text">
                <h3>Email Us</h3>
                <p>hello@propertypro.com</p>
            </div>
        </div>
        <div class="info-card">
            <div class="info-icon"><i class='bx bx-phone-call'></i></div>
            <div class="info-text">
                <h3>Call Us</h3>
                <p>+94 77 898 6338</p>
            </div>
        </div>
        <div class="info-card">
            <div class="info-icon"><i class='bx bx-map-pin'></i></div>
            <div class="info-text">
                <h3>Visit Us</h3>
                <p>123 Galle Road, Colombo 03</p>
            </div>
        </div>
    </div>

    <div class="form-card">
        <h2>Send a Message</h2>
        <p>Fill out the form below and we'll get back to you within 24 hours.</p>

        <form action="contact.php" method="POST">
            <div class="form-grid">
                <div class="form-group">
                    <label>Your Name</label>
                    <input type="text" placeholder="John Doe" required>
                </div>
                <div class="form-group">
                    <label>Email Address</label>
                    <input type="email" placeholder="john@example.com" required>
                </div>
                <div class="form-group full">
                    <label>Subject</label>
                    <input type="text" placeholder="Interested in a Property" required>
                </div>
                <div class="form-group full">
                    <label>Message</label>
                    <textarea rows="5" placeholder="Tell us how we can help..." required></textarea>
                </div>
            </div>
            <button type="submit" class="submit-btn">Send Message</button>
        </form>
    </div>
</div>

<?php include 'includes/footer.php'; ?>

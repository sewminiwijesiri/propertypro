<?php
$pageTitle = "Privacy Policy";
$baseUrl = "./";
include 'includes/header.php';
?>

<style>
    /* Specific styles for Policy Pages */
    body { padding-top: 100px; }
    .policy-container {
        max-width: 900px;
        margin: 0 auto;
        padding: 4rem 2rem;
        background: white;
        border-radius: 40px;
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.05);
        border: 1px solid #f1f5f9;
        margin-bottom: 5rem;
    }

    .policy-header { text-align: center; margin-bottom: 4rem; }
    .policy-header h1 { font-size: 3rem; color: var(--primary); }
    
    .policy-content h2 { font-size: 1.5rem; margin: 2rem 0 1rem; color: var(--blue); }
    .policy-content p { color: var(--slate); line-height: 1.8; margin-bottom: 1.5rem; font-size: 1.05rem; }
</style>

<section class="policy-container">
    <div class="policy-header">
        <h1>Privacy Policy</h1>
    </div>
    
    <div class="policy-content">
        <h2>Introduction</h2>
        <p>At Property Pro, we are committed to protecting your personal information and your right to privacy. This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you visit our website and use our services.</p>
        
        <h2>Information We Collect</h2>
        <p>We may collect personal information such as your name, email address, phone number, and other details you provide when using our site or services. We also collect non-personal data through cookies, web beacons, and other similar technologies.</p>

        <h2>How We Use Your Information</h2>
        <p>Your information helps us to provide and improve our services, communicate with you, ensure security, and comply with legal obligations.</p>

        <h2>Data Sharing</h2>
        <p>We do not share your personal information with third parties except to comply with the law, protect our rights, or facilitate the services you request.</p>

        <h2>Security of Your Information</h2>
        <p>We use technical and organizational security measures to protect your data. However, no method of transmission over the internet is 100% secure.</p>

        <h2>Changes to This Policy</h2>
        <p>We may update this Privacy Policy from time to time. Please review it periodically for changes. Your continued use of our services after any changes signifies your acceptance of the new terms.</p>
    </div>
</section>

<?php include 'includes/footer.php'; ?>

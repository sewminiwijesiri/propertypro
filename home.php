<?php
$pageTitle = "Home";
$baseUrl = "./";
include 'includes/header.php';
?>

<style>
    /* Page specific styles for Home */
    .hero {
        height: 100vh;
        width: 100%;
        position: relative;
        background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('assets/images/house.jpg');
        background-size: cover;
        background-position: center;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        text-align: center;
        color: var(--white);
        padding: 0 10%;
    }

    .hero h1 {
        font-size: 4.5rem;
        max-width: 900px;
        line-height: 1.1;
        margin-bottom: 2rem;
        animation: fadeInDown 1s ease;
    }

    .hero p {
        font-size: 1.2rem;
        max-width: 600px;
        margin-bottom: 3rem;
        opacity: 0.9;
    }

    .search-container {
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(20px);
        padding: 0.8rem;
        border-radius: 20px;
        display: flex;
        gap: 1rem;
        width: 100%;
        max-width: 700px;
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .search-container input {
        flex: 1;
        background: transparent;
        border: none;
        outline: none;
        color: white;
        padding: 0 1.5rem;
        font-size: 1.1rem;
    }

    .search-container input::placeholder {
        color: rgba(255, 255, 255, 0.7);
    }

    .search-btn {
        background: var(--blue);
        color: white;
        padding: 1rem 2.5rem;
        border: none;
        border-radius: 15px;
        font-weight: 700;
        cursor: pointer;
        transition: 0.3s;
    }

    .search-btn:hover {
        background: #2563eb;
        transform: scale(1.02);
    }

    .stats {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 2rem;
        padding: 0 8%;
        margin-top: -60px;
        position: relative;
        z-index: 10;
    }

    .stat-card {
        background: white;
        padding: 2.5rem;
        border-radius: 25px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        text-align: center;
        border: 1px solid #f1f5f9;
    }

    .stat-card h3 {
        font-size: 2.5rem;
        color: var(--primary);
        margin-bottom: 0.5rem;
    }

    .stat-card p {
        color: var(--slate);
        font-weight: 500;
    }

    .section-header {
        padding: 5rem 8% 3rem;
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
    }

    .section-title h2 {
        font-size: 2.5rem;
        margin-top: 0.5rem;
    }

    .section-title span {
        color: var(--blue);
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-size: 0.9rem;
    }

    .categories {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 2rem;
        padding: 0 8%;
    }

    .cat-card {
        background: white;
        padding: 3rem 2rem;
        border-radius: 30px;
        text-align: center;
        text-decoration: none;
        transition: 0.4s;
        border: 1px solid #f1f5f9;
    }

    .cat-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(59, 130, 246, 0.1);
        border-color: var(--blue);
    }

    .cat-card i {
        display: block;
        font-size: 3rem;
        margin-bottom: 1.5rem;
        color: var(--blue);
    }

    .cat-card h4 {
        font-size: 1.3rem;
        color: var(--primary);
        margin-bottom: 0.5rem;
    }

    .cat-card p {
        color: var(--slate);
        font-size: 0.9rem;
    }

    .properties-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 2.5rem;
        padding: 0 8% 5rem;
    }

    .prop-card {
        background: white;
        border-radius: 35px;
        overflow: hidden;
        border: 1px solid #f1f5f9;
        transition: 0.4s;
    }

    .prop-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
    }

    .prop-img-box {
        height: 250px;
        position: relative;
    }

    .prop-img-box img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .prop-tag {
        position: absolute;
        top: 1.5rem;
        left: 1.5rem;
        background: var(--blue);
        color: white;
        padding: 0.5rem 1.2rem;
        border-radius: 50px;
        font-weight: 700;
        font-size: 0.8rem;
    }

    .prop-content {
        padding: 2rem;
    }

    .prop-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1rem;
    }

    .prop-price {
        font-size: 1.5rem;
        font-weight: 800;
        color: var(--primary);
    }

    .prop-type {
        background: #f1f5f9;
        padding: 0.4rem 1rem;
        border-radius: 10px;
        font-weight: 700;
        font-size: 0.8rem;
        color: var(--blue);
    }

    .prop-content h3 {
        font-size: 1.4rem;
        margin-bottom: 0.5rem;
    }

    .prop-loc {
        color: var(--slate);
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin-bottom: 1.5rem;
    }

    .prop-features {
        display: flex;
        justify-content: space-between;
        padding-top: 1.5rem;
        border-top: 1px solid #f1f5f9;
    }

    .feat-item {
        text-align: center;
    }

    .feat-item i {
        font-size: 1.2rem;
        color: #cbd5e1;
        margin-bottom: 0.3rem;
        display: block;
    }

    .feat-item span {
        font-weight: 700;
        font-size: 0.8rem;
        color: var(--slate);
    }

    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @media (max-width: 1100px) {
        .stats { grid-template-columns: repeat(2, 1fr); }
        .categories { grid-template-columns: repeat(2, 1fr); }
        .properties-grid { grid-template-columns: repeat(2, 1fr); }
    }

    @media (max-width: 768px) {
        .hero h1 { font-size: 2.5rem; }
        .stats { grid-template-columns: 1fr; }
        .categories { grid-template-columns: 1fr; }
        .properties-grid { grid-template-columns: 1fr; }
    }
</style>

<section class="hero">
    <h1>Find Your <span style="color: var(--blue)">Perfect</span> Piece of Heaven</h1>
    <p>Luxury villas, modern apartments, and prime lands. We connect verified buyers and premium sellers across the island.</p>
    <form action="property.php" method="GET" class="search-container">
        <input type="text" name="search" id="searchInput" placeholder="Search location (e.g. Colombo 7, Kandy...)" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
        <button type="submit" class="search-btn">Find Your Home</button>
    </form>
</section>

<section class="stats">
    <div class="stat-card"><h3>1.5K+</h3><p>Properties Listed</p></div>
    <div class="stat-card"><h3>800+</h3><p>Verified Sellers</p></div>
    <div class="stat-card"><h3>1.2K+</h3><p>Happy Clients</p></div>
    <div class="stat-card"><h3>24/7</h3><p>Expert Support</p></div>
</section>

<section class="section-header">
    <div class="section-title">
        <span>Categories</span>
        <h2>Experience Luxury by Category</h2>
    </div>
</section>

<div class="categories">
    <a href="property.php" class="cat-card"><i class='bx bx-home-heart'></i><h4>Luxury Houses</h4><p>Premium family residencies</p></a>
    <a href="property.php" class="cat-card"><i class='bx bx-building-house'></i><h4>Modern Apartments</h4><p>Urban living at its best</p></a>
    <a href="property.php" class="cat-card"><i class='bx bx-map-alt'></i><h4>Prime Lands</h4><p>Strategic future investments</p></a>
    <a href="property.php" class="cat-card"><i class='bx bx-briefcase-alt-2'></i><h4>Commercial Spaces</h4><p>Foundation for your business</p></a>
</div>

<section class="section-header" style="margin-top: 3rem;">
    <div class="section-title">
        <span>Portfolio</span>
        <h2>Our Signature Listings</h2>
    </div>
</section>

<div class="properties-grid">
    <div class="prop-card">
        <div class="prop-img-box"><img src="assets/images/house.jpg" alt="House"><span class="prop-tag">For Sale</span></div>
        <div class="prop-content">
            <div class="prop-header"><span class="prop-type">Modern Villa</span><span class="prop-price">LKR 45M</span></div>
            <h3>The White Villa</h3>
            <p class="prop-loc"><i class='bx bx-map-pin'></i> Gregory's Road, Colombo 07</p>
            <div class="prop-features">
                <div class="feat-item"><i class='bx bx-bed'></i><span>4 Beds</span></div>
                <div class="feat-item"><i class='bx bx-bath'></i><span>3 Baths</span></div>
                <div class="feat-item"><i class='bx bx-area'></i><span>3200 sqft</span></div>
            </div>
        </div>
    </div>
    <div class="prop-card">
        <div class="prop-img-box"><img src="assets/images/land.jpg" alt="Land"><span class="prop-tag" style="background: var(--emerald)">Exclusive</span></div>
        <div class="prop-content">
            <div class="prop-header"><span class="prop-type" style="color: var(--emerald)">Residential Plot</span><span class="prop-price">LKR 30M</span></div>
            <h3>Gampaha Residential Plot</h3>
            <p class="prop-loc"><i class='bx bx-map-pin'></i> Near Highway, Gampaha</p>
            <div class="prop-features">
                <div class="feat-item"><i class='bx bx-landscape'></i><span>20 Perch</span></div>
                <div class="feat-item"><i class='bx bxs-bolt-circle'></i><span>Power</span></div>
                <div class="feat-item"><i class='bx bxs-droplet'></i><span>Water</span></div>
            </div>
        </div>
    </div>
    <div class="prop-card">
        <div class="prop-img-box"><img src="assets/images/apartment.jpg" alt="Apartment"><span class="prop-tag" style="background: #a855f7">Rent / Sale</span></div>
        <div class="prop-content">
            <div class="prop-header"><span class="prop-type" style="color: #a855f7">Luxury Apt</span><span class="prop-price">LKR 32M</span></div>
            <h3>Azure Ocean Residency</h3>
            <p class="prop-loc"><i class='bx bx-map-pin'></i> Galle Face, Colombo 03</p>
            <div class="prop-features">
                <div class="feat-item"><i class='bx bxs-building'></i><span>12th Flr</span></div>
                <div class="feat-item"><i class='bx bx-water'></i><span>Sea View</span></div>
                <div class="feat-item"><i class='bx bx-shield-quarter'></i><span>Security</span></div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>

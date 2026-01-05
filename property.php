<?php
require 'includes/config.php';

// Get search query if exists
$searchQuery = isset($_GET['search']) ? trim($_GET['search']) : '';

// Build SQL query with search filter
if (!empty($searchQuery)) {
    $searchTerm = '%' . $conn->real_escape_string($searchQuery) . '%';
    $query = "SELECT * FROM post WHERE status = 'Approved' AND (location LIKE '$searchTerm' OR type LIKE '$searchTerm' OR description LIKE '$searchTerm') ORDER BY postID DESC";
} else {
    $query = "SELECT * FROM post WHERE status = 'Approved' ORDER BY postID DESC";
}

$result = mysqli_query($conn, $query);

$pageTitle = "Properties";
$baseUrl = "./";
include 'includes/header.php';
?>

<style>
    /* Page specific styles for Properties */
    body { padding-top: 80px; }
    
    .page-header {
        background: linear-gradient(135deg, #1e293b 0%, #334155 100%);
        padding: 4rem 8%;
        color: white;
        text-align: center;
    }

    .page-header h1 {
        font-size: 3rem;
        margin-bottom: 1rem;
    }

    .page-header p {
        opacity: 0.8;
        font-size: 1.1rem;
    }

    .filters {
        padding: 2rem 8%;
        display: flex;
        justify-content: center;
        gap: 1.5rem;
        flex-wrap: wrap;
        margin-top: -30px;
    }

    .filter-btn {
        background: white;
        padding: 1rem 2rem;
        border-radius: 15px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
        border: 1px solid #f1f5f9;
        font-weight: 700;
        cursor: pointer;
        transition: 0.3s;
        color: var(--slate);
    }

    .filter-btn.active {
        background: var(--blue);
        color: white;
        border-color: var(--blue);
    }

    .properties-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 2.5rem;
        padding: 4rem 8%;
    }

    .prop-card {
        background: white;
        border-radius: 30px;
        overflow: hidden;
        border: 1px solid #f1f5f9;
        transition: 0.4s ease;
    }

    .prop-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    }

    .prop-img-box {
        height: 260px;
        position: relative;
    }

    .prop-img-box img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .prop-status {
        position: absolute;
        top: 1.5rem;
        right: 1.5rem;
        background: rgba(255, 255, 255, 0.9);
        padding: 0.5rem 1rem;
        border-radius: 12px;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-weight: 700;
        font-size: 0.8rem;
        color: var(--emerald);
    }

    .prop-content {
        padding: 2rem;
    }

    .prop-price {
        font-size: 1.8rem;
        font-weight: 800;
        color: var(--blue);
        margin-bottom: 0.5rem;
    }

    .prop-title {
        font-size: 1.4rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
        color: var(--primary);
    }

    .prop-loc {
        color: var(--slate);
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin-bottom: 1.5rem;
        font-size: 0.95rem;
    }

    .prop-details {
        display: flex;
        gap: 1.5rem;
        padding: 1.5rem 0;
        border-top: 1px solid #f1f5f9;
        margin-bottom: 1.5rem;
    }

    .detail-item {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: var(--slate);
        font-weight: 600;
        font-size: 0.9rem;
    }

    .detail-item i {
        font-size: 1.2rem;
        color: #cbd5e1;
    }

    .view-btn {
        display: block;
        width: 100%;
        text-align: center;
        background: var(--primary);
        color: white;
        padding: 1.2rem;
        border-radius: 15px;
        text-decoration: none;
        font-weight: 700;
        transition: 0.3s;
    }

    .view-btn:hover {
        background: var(--blue);
        box-shadow: 0 10px 20px rgba(59, 130, 246, 0.2);
    }

    .no-results {
        grid-column: 1 / -1;
        text-align: center;
        padding: 5rem;
        color: var(--slate);
    }

    .no-results i {
        font-size: 4rem;
        display: block;
        margin-bottom: 1rem;
        opacity: 0.3;
    }

    /* Search input styling */
    input[name="search"]::placeholder {
        color: rgba(255, 255, 255, 0.6);
    }

    @media (max-width: 768px) {
        .page-header h1 { font-size: 2.2rem; }
    }
</style>


<header class="page-header">
    <h1><?php echo !empty($searchQuery) ? 'Search Results' : 'Find Your Home'; ?></h1>
    <p><?php echo !empty($searchQuery) ? 'Showing results for "' . htmlspecialchars($searchQuery) . '"' : 'Explore verified property listings from top sellers across Sri Lanka'; ?></p>
    
    <form action="property.php" method="GET" style="max-width: 600px; margin: 2rem auto 0; display: flex; gap: 1rem; background: rgba(255,255,255,0.1); backdrop-filter: blur(10px); padding: 0.5rem; border-radius: 20px; border: 1px solid rgba(255,255,255,0.2);">
        <input type="text" name="search" placeholder="Search by location or property type..." value="<?php echo htmlspecialchars($searchQuery); ?>" style="flex: 1; background: transparent; border: none; outline: none; color: white; padding: 0.8rem 1.5rem; font-size: 1rem;">
        <button type="submit" style="background: var(--blue); color: white; padding: 0.8rem 2rem; border: none; border-radius: 15px; font-weight: 700; cursor: pointer;">Search</button>
        <?php if (!empty($searchQuery)): ?>
            <a href="property.php" style="background: rgba(255,255,255,0.2); color: white; padding: 0.8rem 1.5rem; border-radius: 15px; text-decoration: none; font-weight: 700;">Clear</a>
        <?php endif; ?>
    </form>
</header>


<div class="filters">
    <button class="filter-btn active">All Properties</button>
    <button class="filter-btn">House</button>
    <button class="filter-btn">Land</button>
    <button class="filter-btn">Apartment</button>
</div>

<div class="properties-grid">
    <?php
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="prop-card">
                <div class="prop-img-box">
                    <img src="<?php echo $row['img'] ? 'dashboard/seller/' . htmlspecialchars($row['img']) : 'assets/images/placeholder.jpg'; ?>" alt="Property">
                    <div class="prop-status"><i class='bx bxs-check-shield'></i> Verified</div>
                </div>
                <div class="prop-content">
                    <div class="prop-price">LKR <?php echo number_format($row['price'] / 1000000, 1); ?>M</div>
                    <h3 class="prop-title"><?php echo $row['type']; ?> in <?php echo $row['location']; ?></h3>
                    <p class="prop-loc"><i class='bx bx-map-pin'></i> <?php echo $row['location']; ?>, Sri Lanka</p>
                    <div class="prop-details">
                        <div class="detail-item"><i class='bx bx-bed'></i> <span>3+</span></div>
                        <div class="detail-item"><i class='bx bx-bath'></i> <span>2+</span></div>
                        <div class="detail-item"><i class='bx bx-area'></i> <span>2400 sqft</span></div>
                    </div>
                    <a href="contact.php" class="view-btn">Contact Seller</a>
                </div>
            </div>
            <?php
        }
    } else {
        if (!empty($searchQuery)) {
            echo '<div class="no-results"><i class="bx bx-search"></i><h3>No properties found for "' . htmlspecialchars($searchQuery) . '"</h3><p>Try searching with different keywords or <a href="property.php" style="color: var(--blue); font-weight: 700;">browse all properties</a>.</p></div>';
        } else {
            echo '<div class="no-results"><i class="bx bx-search"></i><h3>No properties found</h3><p>Check back soon for new listings.</p></div>';
        }
    }
    ?>
</div>

<script>
    // Handle filter buttons
    const filterBtns = document.querySelectorAll('.filter-btn');
    const propCards = document.querySelectorAll('.prop-card');
    
    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            // Remove active class from all buttons
            filterBtns.forEach(b => b.classList.remove('active'));
            // Add active class to clicked button
            this.classList.add('active');
            
            const filterType = this.textContent.trim();
            
            // Show/hide properties based on filter
            propCards.forEach(card => {
                const propTitle = card.querySelector('.prop-title').textContent;
                
                if (filterType === 'All Properties') {
                    card.style.display = 'block';
                } else {
                    if (propTitle.toLowerCase().includes(filterType.toLowerCase())) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                }
            });
        });
    });

    // Add placeholder input styling
    const searchInputs = document.querySelectorAll('input[name="search"]');
    searchInputs.forEach(input => {
        input.style.setProperty('color', 'white', 'important');
    });
</script>

<?php include 'includes/footer.php'; ?>

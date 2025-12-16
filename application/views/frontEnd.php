<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>RingRx Blog</title>

    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

    <!-- Custom Styles -->

	
	<style>

body {
    font-family: "Inter", Arial, sans-serif;
    background: #f7f9fc;
    color: #1a1a1a;
}

/* NAVBAR ------------------------------------------------------- */
.bg-primary {
    background-color: #0b357a !important;
}

/* FEATURED CARD ------------------------------------------------ */
.featured-card .featured-image {
    width: 100%;
    object-fit: cover;
}

.featured-card .p-4 {
    border-radius: 0 12px 12px 0;
}

/* TAGS --------------------------------------------------------- */
.tag {
    background: #f5f8fe;
    padding: 8px 16px;
    border-radius: 20px;
    font-size: 14px;
    cursor: pointer;
}

.tag.active {
    background: #0b357a;
    color: #fff;
}

/* BLOG CARDS --------------------------------------------------- */
.blog-card {
    background: #fff;
    transition: 0.2s ease;
}

.blog-card:hover {
    transform: translateY(-4px);
}

.blog-img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

/* RESPONSIVE --------------------------------------------------- */
@media (max-width: 992px) {
    .featured-card {
        flex-direction: column;
    }
}
.blog-box {
    padding: 22px 67px 11px 0px;
}

.blog-img {
    width: 100%;
    height: 230px;
    object-fit: cover;
    border-radius: 10px;
    transition: transform 0.3s ease;
}

.blog-box:hover .blog-img {
    transform: scale(1.03);
}

.blog-date {
    margin-top: 10px;
    font-size: 13px;
    color: #9b9b9b;
}

.blog-title {
    font-size: 18px;
    font-weight: 600;
    color: #333;
    margin-top: 5px;
    margin-bottom: 8px;
}

.blog-desc {
    font-size: 14px;
    color: #666;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    margin-bottom: 20px;
}

	
	  .hidden {
    display: none;
  }
	</style>
</head>
<body>

<!-- ================================
     HEADER / NAVIGATION
================================ -->
<header class="navbar navbar-expand-lg navbar-dark bg-primary px-4 py-3">
    <a class="navbar-brand d-flex align-items-center" href="#">
        <span class="fw-bold fs-4 text-white">RING<span class="opacity-75">Rx</span></span>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-between" id="navMenu">
        <ul class="navbar-nav ms-4 mb-2 mb-lg-0 gap-lg-3">
            <li class="nav-item"><a class="nav-link text-white" href="#">Solutions</a></li>
            <li class="nav-item"><a class="nav-link text-white" href="#">Plans & Pricing</a></li>
            <li class="nav-item"><a class="nav-link text-white" href="#">Resources</a></li>
            <li class="nav-item"><a class="nav-link text-white active" href="#">Blog</a></li>
        </ul>

        <div class="d-flex align-items-center gap-3">
            <a href="#" class="text-white small">Customer Portal</a>
            <a href="tel:18056663823" class="text-white fw-bold small">Call Us: 1-805-666-3823</a>
            <a class="btn btn-light fw-bold px-4" href="<?php echo base_url();?>Vishal/index">Admin Login</a>
        </div>
    </div>
</header>

<!-- ================================
     HERO SECTION
================================ -->
<section class="text-center py-5 bg-white">
    <h1 class="fw-bold mb-2">RingRx Blog</h1>
    <p class="text-muted fs-5">
        Educational content and industry insights to help empower healthcare professionals<br/>
        like you and enhance patient care
    </p>
</section>

<!-- ================================
     FEATURED BLOG
================================ -->
<section class="container mb-5">
    <div class="featured-card d-flex flex-column flex-lg-row shadow-sm rounded-4 overflow-hidden">
        <img src="https://picsum.photos/seed/picsum/600/350" alt="Featured" class="featured-image">

        <div class="p-4 bg-primary text-white flex-grow-1">
            <span class="badge bg-light text-primary mb-3">Category</span>
            <h3 class="fw-bold mb-3">Making The Most Of Your RingRx System</h3>
            <p>
                Mauris condimentum faucibus ex libero suscipit rhoncus. In condimentum faucibus turpis,
                ex consectetur faucibus velit. Purus tempus libero. Eget eros malesuada faucibus.
            </p>

            <div class="d-flex gap-4 mt-2 text-white-50 small">
                <span>Healthcare Solutions</span>
                <span>April 23, 2024</span>
            </div>
        </div>
    </div>
</section>

<!-- ================================
     TAG FILTERS
================================ -->
<section class="container mb-5">
    <div class="d-flex flex-wrap gap-2 justify-content-center">
        <span class="tag active">All</span>
        <span class="tag">Business Development</span>
        <span class="tag">Patient Retention</span>
        <span class="tag">Care Technology</span>
        <span class="tag">Guest Post</span>
        <span class="tag">HIPAA</span>
        <span class="tag">Marketing</span>
        <span class="tag">Mobile App</span>
        <span class="tag">On-Call</span>
        <span class="tag">PBX</span>
        <span class="tag">Phone Systems</span>
        <span class="tag">Security & Encryption</span>
        <span class="tag">VOIP</span>
        <span class="tag">Web Portals</span>
    </div>
</section>
<section class="container py-4">

    <h2 class="mb-4">Blogs</h2>
    <hr>

    <div class="row">

        <?php foreach ($posts as $post): ?>
            
        <div class="col-md-6 col-lg-4 blog-item">

            <div class="blog-box position-relative">

                <img src="<?= base_url('uploads/' . ($post['image'] ?? 'default.jpg')) ?>"
                     class="blog-img"
                     alt="<?= $post['title'] ?>">

                <p class="blog-date">
                    <?= date('F Y', strtotime($post['created_at'])) ?>
                </p>

                <h5 class="blog-title"><?= $post['title'] ?></h5>

                <p class="blog-desc"><?= $post['description'] ?></p>

                <a href="<?= base_url('post_view/' . $post['slug'] . '/' . $post['id']) ?>"
                   class="stretched-link"></a>

            </div>

        </div>

        <?php endforeach; ?>

    </div>

    <div class="text-center mt-4">
        <button id="loadMoreBtn" class="btn btn-primary">Load More LP</button>
    </div>

</section>


<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>


<script>
$(document).ready(function () {

  const $gridItems = $(".blog-item");

  // show only first 4
  $gridItems.slice(6).addClass("hidden");

  $("#loadMoreBtn").on("click", function () {
    $gridItems.filter(".hidden").slice(0, 6).removeClass("hidden");

    if ($gridItems.filter(".hidden").length === 0) {
      $(this).hide();
    }
  });


});

</script>



<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $post['title'] ?></title>

    <!-- Bootstrap -->
    <link rel="stylesheet" 
          href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

    <style>
        body {
            font-family: "Inter", sans-serif;
            background: #eef2f7;
        }

        .blog-container {
            background: #fff;
            max-width: 850px;
            margin: 40px auto;
            border-radius: 16px;
            padding: 40px;
            box-shadow: 0px 2px 20px rgba(0,0,0,0.08);
        }

        .blog-title {
            font-size: 30px;
            font-weight: 800;
            line-height: 1.3;
        }

        .blog-meta {
            color: #6c757d;
            font-size: 14px;
        }

        .blog-image {
            width: 100%;
            height: 350px;
            object-fit: cover;
            border-radius: 12px;
            margin: 25px 0;
        }

        .blog-content p {
            font-size: 17px;
            line-height: 1.7;
            margin-bottom: 18px;
        }
    </style>
</head>

<body>

<div class="blog-container">

    <!-- Category -->
    <p class="text-primary fw-semibold small mb-1">
        <?= $post['category'] ?? "Category" ?>
    </p>

    <!-- Title -->
    <h1 class="blog-title"><?= $post['title'] ?></h1>

    <!-- Date -->
    <p class="blog-meta mb-3">
        Admin &nbsp;&nbsp;
        <?= date('d M Y', strtotime($post['created_at'])) ?>
    </p>

    <!-- Featured Image -->
    <img src="<?= base_url('uploads/'.$post['image']) ?>" class="blog-image">

    <!-- Blog Content -->
    <div class="blog-content mb-4">
        <?= nl2br($post['description']) ?>
    </div>

    <!-- Go Back Button -->
    <a href="javascript:history.back()" class="btn btn-secondary mb-4">← Go Back</a>

    <hr>
<!-- Comment Form -->
<h4 class="mt-4 mb-3 fw-bold">Leave a Comment</h4>

<div class="card shadow-sm border-0 mb-4">
    <div class="card-body">
        <form action="<?= base_url('vishal/save_comment') ?>" method="POST">
            <input type="hidden" name="post_id" value="<?= $post['id'] ?>">

            <div class="mb-3">
                <label class="form-label fw-semibold">Your Name</label>
                <input type="text" name="name" class="form-control rounded-3" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Your Comment</label>
                <textarea name="comment" rows="3" class="form-control rounded-3" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary rounded-pill px-4">
                Submit Comment
            </button>
        </form>
    </div>
</div>

<!-- Display Comments -->
<h4 class="fw-bold mb-3">Comments (<?= count($comments) ?>)</h4>

<?php if (!empty($comments)): ?>
    <?php foreach ($comments as $c): ?>
        <div class="d-flex mb-4 p-3 border rounded-3 bg-white shadow-sm">

            <!-- Avatar -->
            <div class="me-3">
                <img src="https://ui-avatars.com/api/?name=<?= urlencode($c['name']) ?>&background=random"
                     class="rounded-circle" width="45" height="45">
            </div>

            <!-- Comment Content -->
            <div class="flex-grow-1">
                <div class="d-flex justify-content-between">
                    <strong><?= htmlspecialchars($c['name']) ?></strong>
                    <small class="text-muted">
                        <?= date('d M Y', strtotime($c['created_at'])) ?>
                    </small>
                </div>

                <p class="mb-1 mt-2" style="white-space: pre-line;">
                    <?= htmlspecialchars($c['comment']) ?>
                </p>

                <!-- Like / Reply (Optional) -->
                <div>
                    <a href="#" class="text-primary small me-3">Like</a>
                    <a href="#" class="text-primary small">Reply</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p class="text-muted">No comments yet. Be the first to comment!</p>
<?php endif; ?>


</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

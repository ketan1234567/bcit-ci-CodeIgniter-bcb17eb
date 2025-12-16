<div class="card mx-auto" style="max-width: 600px;">
    <div class="card-body">
        <h1 class="card-title mb-4">Welcome, <?= html_escape($username) ?>!</h1>
        <p class="lead">Your role is: <strong><?= html_escape($role) ?></strong></p>
        <p>Your user ID is: <strong><?= html_escape($user_id) ?></strong></p>
    </div>
</div>

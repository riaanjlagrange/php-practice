<?php require base_path('views/partials/head.php'); ?>

	<?php require base_path('views/partials/nav.php'); ?>

	<?php require base_path('views/partials/banner.php'); ?>

	  <main>
	    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
		  <ul class="mb-5">
		      <?php foreach ($notes as $note) : ?>
		      <a href="/note?id=<?= $note['id'] ?>" class="text-blue-500 hover:underline">
			  <li><?= htmlspecialchars($note['body']) ?></li>
		      </a>
		      <?php endforeach; ?>
		  </ul>

		  <a href="/notes/create" class="text-white bg-blue-500 px-2 py-1 hover:bg-blue-600 rounded-sm">Create note</a>
	    </div>
	  </main>

<?php require base_path('views/partials/foot.php'); ?>

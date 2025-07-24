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
		  <?php if (!count($notes)) : ?>
		    <p class="italic text-gray-500 mb-5">You have no notes</p>
		  <?php endif; ?>

		  <a href="/notes/create" class="w-200 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-1 px-2 rounded-md transition-colors duration-300">Create new note</a>
	    </div>
	  </main>

<?php require base_path('views/partials/foot.php'); ?>

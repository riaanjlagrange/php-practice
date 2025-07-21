<?php require base_path('views/partials/head.php'); ?>

	<?php require base_path('views/partials/nav.php'); ?>

	<?php require base_path('views/partials/banner.php'); ?>

	  <main>
	    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
	      <a href="/notes" class="text-white bg-blue-500 bold rounded-sm px-5 py-3 hover:bg-blue-600">Back to all notes</a>
	      <p class="mt-5"><?= htmlspecialchars($note['body']); ?></p>
	      <form class="mt-5" method="POST">
		  <input type="hidden" name="id" value="<?= $note['id']; ?>" />
		  <button type="submit" class="text-red-500 hover:underline">Delete</button>
	      </form>
	    </div>
	  </main>

<?php require base_path('views/partials/foot.php'); ?>

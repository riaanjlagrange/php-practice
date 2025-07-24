<?php require base_path('views/partials/head.php'); ?>

	<?php require base_path('views/partials/nav.php'); ?>

	<?php require base_path('views/partials/banner.php'); ?>

	  <main>
	    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
	      <a href="/notes" class="text-blue-500 hover:text-blue-600 hover:underline bold">&larr; Back to all notes</a>
	      <p class="mt-5"><?= htmlspecialchars($note['body']); ?></p>
	      <form class="mt-5" method="POST">
		  <input type="hidden" name="_method" value="DELETE" />
		  <input type="hidden" name="id" value="<?= $note['id']; ?>" />
		  <div class="flex gap-3">
		    <button 
			type="submit" 
			class="w-200 bg-red-600 hover:bg-red-700 text-white font-semibold py-1 px-2 rounded-md transition-colors duration-300"
		    >
			  Delete
		    </button>
		      <a href="/note/edit?id=<?= $note['id'] ?>" class="w-200 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-1 px-2 rounded-md transition-colors duration-300">Edit</a>
		  </div>
	      </form>
	    </div>
	  </main>

<?php require base_path('views/partials/foot.php'); ?>

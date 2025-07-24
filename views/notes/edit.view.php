<?php require base_path('views/partials/head.php'); ?>

<?php require base_path('views/partials/nav.php'); ?>

<?php require base_path('views/partials/banner.php'); ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
	<form method="POST" action="/note" class="bg-white shadow-md rounded-lg p-6 space-y-4 max-w-xl mx-auto">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Edit note</h2>
	    <input type="hidden" name="_method" value="PATCH" />
	    <input type="hidden" name="id" value="<?= $note['id'] ?>" />

            <div>
                <label for="body" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                <textarea 
                    id="body" 
                    name="body" 
                    rows="5"
                    class="w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 p-3 text-gray-800 resize-none"
                    placeholder="Write your thoughts here..."
		><?= $note['body'] ?? '' ?></textarea>
		<?php if (isset($errors['body'])) : ?>
		    <p class="mt-2 text-sm text-red-500 italic"><?= $errors['body'] ?></p>
		<?php endif; ?>
            </div>
            <div class="flex w-full justify-end gap-3">
		<a href="/notes"
                    class="text-center w-200 bg-gray-600 hover:bg-gray-700 text-white font-semibold py-1 px-2 rounded-md transition-colors duration-300"
		    >Cancel</a>
		<button 
		    type="submit" 
		    class="w-200 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-1 px-2 rounded-md transition-colors duration-300"
		>
		    Update
		</button>
            </div>
        </form>
    </div>
</main>

<?php require base_path('views/partials/foot.php'); ?>

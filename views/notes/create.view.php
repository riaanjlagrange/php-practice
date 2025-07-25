<?php require base_path('views/partials/head.php'); ?>

<?php require base_path('views/partials/nav.php'); ?>

<?php require base_path('views/partials/banner.php'); ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <form method="POST" action="/notes" class="bg-white shadow-md rounded-lg p-6 space-y-4 max-w-xl mx-auto">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Create a New Post</h2>

            <div>
                <label for="body" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                <textarea 
                    id="body" 
                    name="body" 
                    rows="5"
                    class="w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 p-3 text-gray-800 resize-none"
                    placeholder="Write your thoughts here..."
		><?= $_POST['body'] ?? '' ?></textarea>
		<?php if (isset($errors['body'])) : ?>
		    <p class="mt-2 text-sm text-red-500 italic"><?= $errors['body'] ?></p>
		<?php endif; ?>
            </div>

            <div>
                <button 
                    type="submit" 
                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 rounded-md transition-colors duration-300"
                >
                    Create
                </button>
            </div>
        </form>
    </div>
</main>

<?php require base_path('views/partials/foot.php'); ?>

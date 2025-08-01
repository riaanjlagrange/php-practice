<?php require base_path('views/partials/head.php'); ?>

<?php require base_path('views/partials/nav.php'); ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <form method="POST" action="/register" class="bg-white shadow-md rounded-lg p-6 space-y-4 max-w-xl mx-auto">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Register</h2>

            <div>
                <label for="username" class="block text-sm font-medium text-gray-700 mb-2">Username</label>
                <input 
                    type="text" 
                    id="username" 
                    name="username"
                    value="<?= $_POST['username'] ?? '' ?>"
                    class="w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 p-3 text-gray-800"
                    placeholder="Your username"
		    required
                >
                <?php if (isset($errors['name'])) : ?>
                    <p class="mt-2 text-sm text-red-500 italic"><?= $errors['name'] ?></p>
                <?php endif; ?>
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email"
                    value="<?= $_POST['email'] ?? '' ?>"
                    class="w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 p-3 text-gray-800"
                    placeholder="you@example.com"
		    required
                >
                <?php if (isset($errors['email'])) : ?>
                    <p class="mt-2 text-sm text-red-500 italic"><?= $errors['email'] ?></p>
                <?php endif; ?>
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password"
                    class="w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 p-3 text-gray-800"
                    placeholder="Choose a strong password"
		    required
                >
                <?php if (isset($errors['password'])) : ?>
                    <p class="mt-2 text-sm text-red-500 italic"><?= $errors['password'] ?></p>
                <?php endif; ?>
            </div>

            <div>
                <label for="confirm_password" class="block text-sm font-medium text-gray-700 mb-2">Confirm Password</label>
                <input 
                    type="password" 
                    id="confirm_password" 
                    name="confirm_password"
                    class="w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 p-3 text-gray-800"
                    placeholder="Re-enter your password"
		    required
                >
                <?php if (isset($errors['confirm_password'])) : ?>
                    <p class="mt-2 text-sm text-red-500 italic"><?= $errors['confirm_password'] ?></p>
                <?php endif; ?>
            </div>

            <div>
                <button 
                    type="submit" 
                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 rounded-md transition-colors duration-300"
                >
                    Register
                </button>
            </div>
        </form>
    </div>
</main>

<?php require base_path('views/partials/foot.php'); ?>

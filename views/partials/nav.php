
	  <nav class="bg-gray-800">
	    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
	      <div class="flex h-16 items-center justify-between">
		<div class="flex items-center">
		  <div class="shrink-0">
		    <img class="size-8" src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company" />
		  </div>
		  <div>
		    <div class="ml-10 flex items-baseline space-x-4">
		      <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
		      <a href="/" class="<?= isUrl("/") ?> rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Home</a>
		      <a href="/about" class="<?= isUrl("/about") ?> rounded-md px-3 py-2 text-sm font-medium">About</a>
		      <?php if ($_SESSION['user'] ?? false) : ?>
			  <a href="/notes" class="<?= isUrl("/notes") ?> rounded-md px-3 py-2 text-sm font-medium">Notes</a>
		      <?php endif; ?>
		      <a href="/contact" class="<?= isUrl("/contact") ?> rounded-md px-3 py-2 text-sm font-medium">Contact</a>
		    </div>
		  </div>
		</div>
		    <div class="flex flex-col md:flex-row md:gap-5 items-center">
		      <?php if (isset($_SESSION['user'])) : ?>
			  <span class="text-md text-white font-bold"><?= $_SESSION['user']['username'] ?></span>
			  <form method="POST" action="/session">
			      <input type="hidden" name="_method" value="DELETE" />
			      <button type="submit" class="text-white font-bold bg-red-400 rounded-sm px-2 py-1">Log Out</button>
			  </form>
		      <?php else : ?>
			  <a href="/register" class="<?= isUrl("/register") ?> rounded-md px-3 py-2 text-sm font-medium">Register</a>
			  <a href="/login" class="<?= isUrl("/login") ?> rounded-md px-3 py-2 text-sm font-medium">Login</a>
		      <?php endif; ?>
		  </div>
	      </div>
	    </div>
	  </nav>


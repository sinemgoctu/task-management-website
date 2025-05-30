<?php require "partials/header.php"; ?>
<?php require "partials/nav.php"; ?>

<section class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800">
    <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Create a New Task</h2>

    <form method="post">
        <div class="grid grid-cols-1 gap-6 mt-4">
            <div>
                <label class="text-gray-700 dark:text-gray-200" for="title">Title</label>
                <input id="title" type="text" name="title"
                       class="mb-5 block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                <label class="text-gray-700 dark:text-gray-200" for="due_date">Due Date</label>
                <input id="due_date" type="text" name="due_date" placeholder="yyyy-mm-dd"
                       class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
            </div>
        </div>

        <div class="flex justify-end mt-6">
            <button type="submit"
                    class="px-8 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-blue-400 rounded-md hover:bg-blue-500">
                Save
            </button>
        </div>
    </form>
</section>

<?php require "partials/footer.php"; ?>



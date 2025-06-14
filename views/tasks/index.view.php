<?php require base_path("views/partials/header.php"); ?>
<?php require base_path("views/partials/nav.php"); ?>

<section class="container px-4 mx-auto">
    <div class="flex items-center justify-between mt-6">
        <div class="flex items-center gap-x-3">
            <h2 class="text-xl font-medium text-gray-800 dark:text-white">
                <?= $user["username"] . " Tasks" ?></h2>
        </div>

        <button class="flex items-center px-2 py-2 font-medium text-white capitalize transform bg-red-400 rounded-lg hover:bg-red-500">
            <a href="/task/create">Create a New Task</a>
        </button>
    </div>

    <div class="flex flex-col mt-6">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                    <table class="table-fixed w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-800">
                        <tr>
                            <th scope="col"
                                class="py-3.5 px-4 text-sm font-medium text-left rtl:text-right text-gray-700">
                                <span>Title</span>
                            </th>

                            <!--
                            <th scope="col"
                                class="px-12 py-3.5 text-sm font-medium text-left rtl:text-right text-gray-700">
                                <span>Status</span>
                            </th>
                            -->

                            <th class="w-24"></th>


                            <th scope="col"
                                class="px-4 py-3.5 text-sm font-medium text-left rtl:text-right text-gray-700">
                                Due Date
                            </th>

                            <th scope="col" class="relative py-3.5 px-4">
                                <span class="sr-only">Edit</span>
                            </th>

                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">

                        <?php if (isset($tasks)) {
                            foreach ($tasks as $task) : ?>
                                <tr>
                                    <td class="px-4 py-4 text-sm text-gray-700 whitespace-nowrap">
                                        <div class="inline-flex items-center gap-x-3">
                                            <div class="flex items-center gap-x-2">
                                                <div>
                                                    <p class="text-sm text-gray-900 dark:text-gray-300 whitespace-nowrap ">
                                                        <?= htmlspecialchars($task["title"]) ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <!--

                                    <td class="px-12 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                        <div class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 bg-emerald-100/60 dark:bg-gray-800">
                                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                                            <h2 class="text-sm font-normal text-emerald-600">Active</h2>
                                        </div>
                                    </td>

                                    -->

                                    <td class="w-24"></td>

                                    <td class="px-4 py-4 text-sm text-gray-900 dark:text-gray-300 whitespace-nowrap">
                                        <?= htmlspecialchars($task["due_date"]) ?>
                                    </td>

                                    <td class="flex justify-end px-4 py-4 text-sm whitespace-nowrap">
                                        <div class="flex items-center gap-x-6">
                                            <form class="mt-1" method="POST">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="id" value="<?= $task["id"] ?>">
                                                <button class="text-gray-500 transition-colors duration-200 dark:hover:text-red-500 dark:text-gray-300 hover:text-red-500 focus:outline-none">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 24 24"
                                                         stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/>
                                                    </svg>
                                                </button>
                                            </form>

                                            <button class="text-gray-500 transition-colors duration-200 dark:hover:text-yellow-500 dark:text-gray-300 hover:text-yellow-500 focus:outline-none">
                                                <a href="/task/edit?id=<?= $task["id"] ?>">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 24 24"
                                                         stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"/>
                                                    </svg>
                                                </a>
                                            </button>
                                            <!--
                                            <button class="px-2 py-2 font-medium text-white capitalize  transform bg-blue-400 rounded-lg hover:bg-blue-500">
                                                Mark as Complete
                                            </button>
                                            -->
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach;
                        } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require base_path("views/partials/footer.php"); ?>

<?php



include_once 'base.view.php';
include_once 'sections/nav.view.php';
?>


<div class="p-4">
    <div class="space-y-2 p-2  min-w-xl bg-white  dark:bg-gray-800 dark:border-gray-700">
        <p class=" text-green-500 font-semibold">Searching for Keywords</p>
        <form action="" method="get">
            <div class="mb-2">
                <div contenteditable="true" class="h-96 p-2 overflow-y-auto rounded-lg border border-gray-200 shadow-md focus:ring-4 focus:outline-none">
                    <span style="color: #aaa;">Simply paste your rich-text content in here or scroll down to learn more</span>
                </div>
                <div class="my-1 text-sm text-left text-gray-500">Only links to actual websites and links to pdf docs will work</div>
            </div>
            <div class="flex justify-end">
                <button name="submit" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Search</button>
            </div>
        </form>
    </div>


</div>

<div class="border-t bg-gray-50 left-50 w-full  bottom-0" style="position: fixed;  left: 50%; transform: translate(-50%, 0);">
    <div class="text-gray-900 text-sm text-center">
        <div class="my-5 text-center">&copy; 2020 - <?= date('Y') ?> All rights reserved | Chungu Developers</div>
    </div>
</div>
</body>

</html>
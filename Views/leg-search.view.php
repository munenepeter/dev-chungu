<?php



include_once 'base.view.php';
include_once 'sections/nav.view.php';
?>


<div class="space-y-2 p-4">
    <p class="md:hidden text-green-500 font-semibold">Searching for Keywords</p>
    <div class="hidden md:flex justify-between">
        <div class="mt-2 mx-auto">
            Searching for the following Keywords: <br><br>
        </div>
    </div>

    <div class="p-6 mx-auto max-w-xl bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
        <h1 class="mb-2 text-2xl font-bold tracking-tight">
        </h1>
        <form action="" method="get">
            <div class="mb-6">
                <div contenteditable="true" class="border h-64">

                </div>
                <div class="my-4 text-sm text-left text-gray-500">Only links to actual websites and links to pdf docs will work</div>
            </div>
           <div class="flex justify-end">
           <button name="submit" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Search</button>
           </div>
               

      
        </form>
    </div>


</div>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    console.log("Here");
</script>

<div class="border-t bg-gray-50 left-50 w-full  bottom-0" style="position: fixed;  left: 50%; transform: translate(-50%, 0);">
    <div class="text-gray-900 text-sm text-center">
        <div class="my-5 text-center">&copy; 2020 - <?= date('Y') ?> All rights reserved | Chungu Developers</div>
    </div>
</div>
</body>

</html>
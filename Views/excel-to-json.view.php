<?php
include_once 'base.view.php';
include_once 'sections/nav.view.php';
?>


<body>
    <nav class="pt-6 pb-2 mb-5 bg-gray-50 border border-gray-100 px-2 sm:px-4 py-2.5 rounded">
        <div class="container flex flex-wrap justify-between items-center mx-auto">
            <div class="m-auto w-full  md:w-auto text-blue-700 text-3xl">
                Convert Excel to JSON
            </div>
        </div>
    </nav>
    <div class="m-auto p-6 max-w-lg bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
        <center>
            <label class="m-auto block mb-2 text-sm font-medium text-gray-900" for="inputfile">Upload
                file</label>
        </center>
        <input class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer focus:outline-none focus:border-transparent" type="file" id="inputfile" accept=".xls,.xlsx">
        <div class="my-4 text-sm text-center text-gray-500" id="inputfile_help">Please make sure you upload an excel
            document</div>
        <center>
            <button name="submit" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2" id="button">Convert</button>
        </center>
        <p class="my-4 text-sm font-medium italic text-center text-green-400" id="response"></p>
    </div>

    <div class="mx-auto p-4 max-w-fit bg-white ">
        <pre id="jsondata"></pre>
    </div>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.2/xlsx.full.min.js"></script>
    <script src="https://unpkg.com/@themesberg/flowbite@1.3.0/dist/flowbite.bundle.js"></script>
    <script src="../static/js/excel.js"></script>
</body>
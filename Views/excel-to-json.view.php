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
    <div
        class="m-auto p-6 max-w-lg bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
        <form method="post" enctype="multipart/form-data">
            <center>
                <label class="m-auto block mb-2 text-sm font-medium text-gray-900" for="inputfile">Upload
                    file</label>
            </center>
            <input
                class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer focus:outline-none focus:border-transparent"
                type="file" id="inputfile" accept=".xls,.xlsx">
            <div class="my-4 text-sm text-center text-gray-500" id="inputfile_help">Please make sure you upload an excel
                document</div>
            <center>
                <button name="submit" type="button"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"
                    id="button">Convert</button>
            </center>
        </form>
        <p class="my-4 text-sm font-medium italic text-center text-green-400" id="response"></p>
    </div>

    <div class="mx-auto p-4 max-w-fit bg-white ">
        <pre id="jsondata"></pre>
    </div>
    <script>
        document.getElementById('button').addEventListener("click", () => {

            var formData = new FormData();
            var Efile = document.querySelector('#inputfile');
            formData.append("excelFile", Efile.files[0]);
            postData(formData)
            //  document.getElementById("jsondata").innerHTML = JSON.stringify(excelData, undefined, 4);
        });

        function postData(formData) {

            axios.post('projects/jwg/excel-to-json', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(function (response) {
                    document.getElementById("response").innerHTML = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
        }
    </script>
   
</body>
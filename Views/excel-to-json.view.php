<?php
include_once 'base.view.php';
include_once 'sections/nav.view.php';
?>


<body>
    <nav class="pt-2 pb-2 mb-2 bg-gray-50 border border-gray-100 px-2 sm:px-4 py-2.5 rounded">
        <div class="container flex flex-wrap justify-between items-center mx-auto">
            <div class="m-auto w-full  md:w-auto text-blue-700 text-3xl">
                Convert Excel to JSON
            </div>
        </div>
    </nav>
    <div class="m-4 md:m-auto p-6 max-w-lg bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
        <form method="post" enctype="multipart/form-data">
            <center>
                <label class="m-auto block mb-2 text-sm font-medium text-gray-900" for="inputfile">Upload
                    file</label>
            </center>
            <input class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer focus:outline-none focus:border-transparent" type="file" id="inputfile" accept=".xls,.xlsx">
            <div class="my-4 text-sm text-center text-gray-500" id="inputfile_help">Please make sure you upload an excel
                document</div>
            <center>
                <button name="submit" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2" id="convert">Convert</button>
           <!-- error buttons -->
                 <button id="loading" disabled type="button"
                    class="hidden text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 inline-flex items-center">
                    <svg role="status" class="inline mr-3 w-4 h-4 text-white animate-spin" viewBox="0 0 100 101"
                        fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                            fill="#E5E7EB" />
                        <path
                            d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                            fill="currentColor" />
                    </svg>
                    Converting...
                </button>
                <button id='success' type="submit"
                    class="hidden text-white inline-flex items-center bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 cursor-not-allowed"
                    disabled>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="mr-1 -ml-1 w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Success
                </button>

                <button id='error' type="submit"
                    class="hidden text-white inline-flex items-center bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800 cursor-not-allowed"
                    disabled>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="mr-1 -ml-1 w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                    </svg>
                    Error&nbsp;-&nbsp; <span id="err"></span>
                </button>
            </center>
        </form>
        <p class="my-4 text-sm font-medium italic text-center text-green-400" id="response"></p>
    </div>




    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <script>
        const convertBtn = document.getElementById("convert");
        const loadBtn = document.getElementById("loading");
        const successBtn = document.getElementById("success");
        const errBtn = document.getElementById("error");




        convertBtn.addEventListener("click", () => {

            //ui stuff
            event.preventDefault();
            convertBtn.classList.add("hidden");
            loadBtn.classList.remove("hidden");


            var formData = new FormData();
            var Efile = document.querySelector('#inputfile');
            formData.append("excelFile", Efile.files[0]);
            postData(formData)
            //  document.getElementById("jsondata").innerHTML = JSON.stringify(excelData, undefined, 4);
        });

        function postData(formData) {

            axios.post('/projects/jwg/excel-to-json', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(function(response) {
                    //console.log(response)


                    document.getElementById("response").innerHTML = response.data.text;

                    download(response.data.file);
                })
                .catch(function(error) {
                    console.log(error);
                });
        }

        function download(file) {
            axios({
                url: '/projects/jwg/excel-to-json/download?file=' + file, //your url
                method: 'GET',
                responseType: 'blob', // important
            }).then((response) => {
                console.log(response)
                // create file link in browser's memory
                const href = URL.createObjectURL(response.data);

                // create "a" HTLM element with href to file & click
                const link = document.createElement('a');
                link.href = href;
                link.setAttribute('download', file + '.json'); //or any other extension
                document.body.appendChild(link);
                link.click();

                // clean up "a" element & remove ObjectURL
                document.body.removeChild(link);
                URL.revokeObjectURL(href);
            });
        }
    </script>
<div class="border-t bg-gray-50 left-50 w-full  bottom-0" style="position: fixed;  left: 50%; transform: translate(-50%, 0);">
    <div class="text-gray-900 text-sm text-center">
        <div class="my-5 text-center">&copy; 2020 - <?= date('Y') ?> All rights reserved | Chungu Developers</div>
    </div>
</div>
</body>

</html>

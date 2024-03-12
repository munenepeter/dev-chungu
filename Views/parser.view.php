<?php
include_once 'base.view.php';
include_once 'sections/nav.view.php';
?>



<style>
    .clearfix::after {
        content: "";
        clear: both;
        display: table;
    }
</style>



<main class="mt-4 pt-20">
    <section class="flex justify-between px-2 mx-auto max-w-screen-2xl ">
        <article class="mx-auto w-full max-w-4xl format format-sm sm:format-base lg:format-lg format-purple dark:format-invert">
            <header class="mb-4 border-b border-gray-200 dark:border-gray-700">
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                    <li class="mr-2" role="presentation"> <button class="inline-block p-4 border-b-2 rounded-t-lg" id="document-tab" data-tabs-target="#document" type="button" role="tab" aria-controls="document" aria-selected="false">Document</button> </li>
                    <li class="mr-2" role="presentation"> <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="text-tab" data-tabs-target="#text" type="button" role="tab" aria-controls="text" aria-selected="false">Text</button> </li>
                    <li class="mr-2" role="presentation"> <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="url-tab" data-tabs-target="#url" type="button" role="tab" aria-controls="url" aria-selected="false">URL</button> </li>
                </ul>
            </header>
            <section id="myTabContent">
                <div class="hidden p-2 rounded-lg bg-purple-100 dark:bg-gray-800" id="document" role="tabpanel" aria-labelledby="document-tab">
                    <p id="doc-label" class="text-lg text-center font-medium text-gray-900 dark:text-white">Welcome
                        to Document Parser</p> <label id="doc-label-guide" class="block mb-2 text-sm text-center text-gray-500 dark:text-gray-400" for="file_input" data-js-label>Select document to parse</label>
                    <form method="post" id="doc-form" enctype="multipart/form-data" class="flex flex-row justify-center items-center">
                        <!-- LI's -->
                        <div style="display:none;" id="lis-found" class="bg-gray-50 rounded-lg p-2">
                            <p id="flis" class="text-sm"></p>
                        </div> <!-- FORM --> <input class="mr-2 block w-3/4 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type='file' name="files" accept=".xlsx,.xls,.doc, .docx,.ppt, .pptx,.txt,.pdf" />

                        <button name="submitpdf" type="submit" id="submitpdf" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">Parse</button>


                        <button disabled style="display:none;" id="upload_load_btn" type="button" class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 inline-flex items-center">
                            <svg class="inline w-4 h-4 mr-3 text-white animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB" />
                                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor" />
                            </svg>
                            Parsing...
                        </button>
                    </form>
                    <center> <img style="display:none;" id="loader" src="<?php asset("imgs/loader.gif") ?>" alt="" width="150" height="150" srcset=""></p>
                    </center>
                    <section id="doc-content" style="display:none;" class="mt-4 p-2 rounded-lg bg-white">
                        <div id="content" class="p-2 overflow-y-auto h-80"></div>
                    </section>
                    <section class="mt-2 flex justify-between">
                        <div class="bg-gray-50 rounded-lg">
                            <p id="keywords_found_txt"></p>
                            <p style="display:none;" class="text-sm" id="theme"></p>
                        </div>
                        <button style="display:none;" id="clear" type="button" class="mt-1 float-right clearfix text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Reset</button>
                    </section>
                </div> <!-- TEXT PARSER -->
                <div class="hidden p-2 rounded-lg bg-gray-100 dark:bg-gray-800" id="text" role="tabpanel" aria-labelledby="text-tab">
                    <p id="text-label" class="text-lg text-center font-medium text-gray-900 dark:text-white">Welcome
                        to Text Parser </p> <label for="doc-txt" id="text-label-guide" class="block mb-2 text-sm text-center text-gray-500 dark:text-gray-400">Paste your content
                        here</label> <!-- LI's -->
                    <div style="display:none;" id="lis-found-txt" class="bg-gray-50 rounded-lg p-2">
                        <p id="flis-txt" class="text-sm"></p>
                    </div>
                    <form method="post" id="txt-form"> <textarea id="doc-txt-textarea" rows="8" class="overflow-y-auto block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-purple-500 focus:border-purple-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500" name="text" placeholder="Paste to parse"></textarea> <button type="submit" id="submittext" class="my-2 focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">Parse</button>
                    </form> <!-- Text content -->
                    <center> <img style="display:none;" id="loader" src="<?php asset("imgs/loader.gif") ?>" alt="" width="150" height="150" srcset=""></p>
                    </center>
                    <section id="txt-content" style="display:none;" class="mt-4 p-2 rounded-lg bg-white">
                        <div id="text-content" class="p-2 overflow-y-auto h-80"></div>
                    </section>
                    <section class="mt-2 flex justify-between">
                        <div class="hidden bg-gray-50 rounded-lg">
                            <p class="text-sm">something will be added here</p>
                        </div> <button style="display:none;" id="clear" type="button" class="mt-1 float-right clearfix text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Reset</button>
                    </section>
                </div>
                <div class="hidden p-4 rounded-lg bg-gray-100 dark:bg-gray-800" id="url" role="tabpanel" aria-labelledby="url-tab">
                    <p id="url-label" class="text-lg text-center font-medium text-gray-900 dark:text-white">Welcome
                        to URL Parser </p> <label id="url-label-guide" class="block mb-2 text-sm text-center text-gray-500 dark:text-gray-400" for="url">Enter a
                        URL to a document</label>
                    <form method="post" id="url-form" class="flex flex-row justify-center items-center">
                        <!-- LI's -->
                        <div style="display:none;" id="lis-found-url" class="bg-gray-50 rounded-lg p-2">
                            <p id="flis-url" class="text-sm"></p>
                        </div> <!-- FORM --> <input name="url" type="url" id="url-input" class="mr-2 block w-3/4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500" placeholder="https://example.com" /> <button type="submit" id="submiturl" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">Parse</button>
                    </form> <!-- URL content -->
                    <center> <img style="display:none;" id="loader-url" src="<?php asset("imgs/loader.gif") ?>" alt="" width="150" height="150" srcset=""></p>
                    </center>
                    <section id="url-content" style="display:none;" class="mt-4 p-2 rounded-lg bg-white">
                        <div id="uri-content" class="p-2 overflow-y-auto h-80"></div>
                    </section>
                    <section class="mt-2 flex justify-between">
                        <div class="hidden bg-gray-50 rounded-lg">
                            <p class="text-sm">something will be added here</p>
                        </div> <button style="display:none;" id="clear" type="button" class="mt-1 float-right clearfix text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Reset</button>
                    </section>
                </div>
            </section>
        </article>
    </section>
</main>
<div class="border-t bg-gray-50 left-50 w-full  bottom-0" style="position: fixed;  left: 50%; transform: translate(-50%, 0);">
    <div class="text-gray-900 text-sm text-center">
        <div class="my-5 text-center">© 2020 - 2023 All rights reserved | <a class="hover:underline" href="https://github.com/munenepeter">Chungu Developers</a> </div>
    </div>
</div>
<!-- <script src="<?php asset("js/parser.js") ?>"></script> -->
<!-- <script src="../../static/js/parser.js"></script> -->
<script>
    function customInput(el) {
        const fileInput = el.querySelector('[type="file"]')
        const label = el.querySelector('[data-js-label]')

        fileInput.onchange =
            fileInput.onmouseout = function() {
                if (!fileInput.value) return

                var value = fileInput.value.replace(/^.*[\\\/]/, '')
                el.className += ' -chosen'
                label.innerText = value
            }
    }
    /**
     * 
     * Handle Doc Upload
     */
    const form = document.querySelector("#doc-form");
    form.addEventListener("submit", (e) => {
        e.preventDefault();
        document.getElementById("submitpdf").style.display = "none";
        document.getElementById("upload_load_btn").style.display = "block";
        document.getElementById("loader").style.display = "block";

        const formData = new FormData(form);
        const url = "/projects/jwg/parser";
        axios
            .post(url, formData, {
                headers: {
                    "Content-Type": "multipart/form-data",
                },
            })
            .then((res) => {

            console.log(res);
                searchRadarTheme();
                document.getElementById("upload_load_btn").style.display = "none";
                document.getElementById("loader").style.display = "none";
                document.getElementById("submitpdf").style.display = "none";
                document.getElementById("file_input").style.display = "none";

                document.getElementById("doc-label").innerText = "The following have been found to be possible LI's within the file";
                document.getElementById("doc-label-guide").innerText = "Confirm and copy them to your clipboard";

                document.getElementById("doc-content").style.display = "block";

                document.getElementById('content').innerHTML = res.data.text;
                document.getElementById('flis').innerHTML = res.data.lis_found;

                document.getElementById("clear").style.display = "block";
                document.getElementById("lis-found").style.display = "block";
            })
            .catch((err) => {
                console.log(err);
            });

    });
    /**
     * 
     * Clear Button
     */
    const clearBtn = document.getElementById('clear');
    clearBtn.addEventListener('click', () => {
        document.getElementById("lis-found").style.display = "none";

        document.getElementById('content').innerHTML = '';

        document.getElementById("doc-label").innerText = "Welcome to Document Parser";
        document.getElementById("doc-label-guide").innerText = "Select document to parse";

        document.getElementById("submitpdf").style.display = "block";
        document.getElementById("file_input").style.display = "block";

        document.querySelector("form").reset();

        document.getElementById("doc-content").style.display = "none";
        document.getElementById("clear").style.display = "none";
    });

    /**
     * 
     * Handle Text inputs
     */

    let textForm = document.querySelector("#txt-form")
    textForm.addEventListener("submit", (e) => {
        e.preventDefault();
        document.getElementById("loader").style.display = "block";

        const formData = new FormData(textForm);
        const url = "/projects/jwg/parser";
        axios
            .post(url, formData)
            .then((res) => {
                console.log(res);
                document.getElementById("loader").style.display = "none";
                document.getElementById("doc-txt-textarea").style.display = "none";
                document.getElementById("submittext").style.display = "none";

                document.getElementById("text-label").innerText = "The following have been found to be possible LI's within the file";
                document.getElementById("text-label-guide").innerText = "Confirm and copy them to your clipboard";

                document.getElementById("txt-content").style.display = "block";

                document.getElementById('text-content').innerHTML = res.data.text;
                document.getElementById('flis-txt').innerHTML = res.data.lis_found;

                document.getElementById("clear").style.display = "block";
                document.getElementById("lis-found-txt").style.display = "block";
            })
            .catch((err) => {
                console.log(err);
            });

    });


    /**
     * 
     * Handle URL inputs
     */

    let urlForm = document.querySelector("#url-form")
    urlForm.addEventListener("submit", (e) => {
        e.preventDefault();
        document.getElementById("loader-url").style.display = "block";

        const formData = new FormData(urlForm);
        const url = "/projects/jwg/parser";
        axios
            .post(url, formData)
            .then((res) => {
                console.log(res);
                document.getElementById("loader-url").style.display = "none";
                document.getElementById("url-input").style.display = "none";
                document.getElementById("submiturl").style.display = "none";

                document.getElementById("url-label").innerText = "The following have been found to be possible LI's within the file";
                document.getElementById("url-label-guide").innerText = "Confirm and copy them to your clipboard";

                document.getElementById("url-content").style.display = "block";

                document.getElementById('uri-content').innerHTML = res.data.text;
                document.getElementById('flis-url').innerHTML = res.data.lis_found;

                document.getElementById("clear").style.display = "block";
                document.getElementById("lis-found-url").style.display = "block";
            })
            .catch((err) => {
                console.log(err);
            });

    });

    function searchRadarTheme() {
        let keywords_found = [];
        document.getElementsByName('keywords_found_in_doc').forEach(data => {
            keywords_found.push(data.innerText.toLowerCase());
        });
        let unique = [...new Set(keywords_found)];

        console.log(unique);

        if (unique.length > 0) {
            axios.post('/projects/jwg/scrapword/theme', {
                    "found_keys": unique
                })
                .then(function(response) {
                    console.log(response);
                    document.getElementById("theme").style.display = "block";
                    document.getElementById('theme').innerText = "Suggested Themes, " + response.data;

                })
                .catch(function(error) {
                    console.log(error);
                });

            document.getElementById('keywords_found_txt').innerText = "Found " + unique.length + " of  keywords:  ";
            document.getElementById('keywords_found').innerText = unique.toString()
        } else {
            document.getElementById('keywords_found_txt').innerText = "Oops, no Keywords were found!"
        }
    }
</script>
</body>

</html>
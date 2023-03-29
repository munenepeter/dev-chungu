<?php
include_once 'base.view.php';
include_once 'sections/nav.view.php';
?>



<main class="mt-4 pt-20">
    <section class="px-2 mx-auto max-w-screen-2xl ">
        <article class="mx-auto w-full max-w-4xl md:p-8 p-4 rounded-lg bg-purple-100">
            <div class="mt-2 max-w-screen-md max-h-screen mx-auto p-4 text-center">
                <h2 class="font-bold text-xl">Case Search</h2>
            </div>
            <main x-data="{ 'isDialogOpen': false }" @keydown.escape="isDialogOpen = false">
                <div class="flex justify-between items-center">
                    <a class="ml-2 text-blue-600 hover:underline hover:text-blue-700" href="index.php">View All Cases</a>
                    <button class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" @click.prevent="isDialogOpen = true" href="upload.php">Upload a case</button>
                </div>
                <section id="modal" class="flex flex-wrap p-2">
                    <!-- overlay -->
                    <div class="overflow-auto" style="background-color: rgba(0,0,0,0.5)" x-show="isDialogOpen" :class="{ 'absolute inset-0 z-10 flex items-start justify-center': isDialogOpen }">
                        <!-- dialog -->
                        <div class="bg-white rounded-lg shadow-2xl m-4 sm:m-8 w-1/2" x-show="isDialogOpen" @click.away="isDialogOpen = false">
                            <div class="mx-auto p-4 w-full">
                                <div class="flex justify-between items-center p-4 rounded-t border-b mb-2">
                                    <h3 class="text-xl capitalize font-medium text-purple-700 dark:text-white">
                                        Upload a new case
                                    </h3>
                                    <button @click="isDialogOpen = false" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-purple-700 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="small-modal">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </div>
                                <div class="p-4 bg-gray-50 border rounded-lg  ">
                                    <form id="metadataForm" method="post" class="container flex flex-col mx-auto w-full">
                                        <div class="mt-2">
                                            <label class="text-sm font-medium text-purple-700" for="case_no" class="text-sm">Case Number</label>
                                            <input id="case_no" name="case_no" type="text" placeholder="Case Number" class="p-3 bg-gray-50 border border-gray-300 text-purple-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full" required="">
                                        </div>
                                        <div class="mt-2">
                                            <label class="text-sm font-medium text-purple-700" for="case_parties" class="text-sm">Case Parties</label>
                                            <input id="case_parties" name="case_parties" type="text" placeholder="Case Parties" class="p-3 bg-gray-50 border border-gray-300 text-purple-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full" required="">
                                        </div>
                                        <div class="mt-2">
                                            <label class="text-sm font-medium text-purple-700" for="date_of_delivery" class="text-sm">Date of Delivery</label>
                                            <input id="date_of_delivery" name="date_of_delivery" type="date" placeholder="Date of Delivery" class="p-3 bg-gray-50 border border-gray-300 text-purple-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full" required="">
                                        </div>
                                        <div class="mt-2">
                                            <label class="text-sm font-medium text-purple-700" for="court" class="text-sm">Court</label>
                                            <input id="court" name="court" type="text" placeholder="Court" class="p-3 bg-gray-50 border border-gray-300 text-purple-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full" required="">
                                        </div>
                                        <div class="mt-2">
                                            <label class="block mb-2 text-sm font-medium text-purple-700 dark:text-gray-300" for="user_avatar">Upload file</label>
                                            <input id="case_doc" name="case_doc" class="block w-full text-sm text-purple-700 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer" type="file" required="">
                                            <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help">Please only upload .doc or .docx </div>
                                        </div>
                                        <!-- https://codepen.io/smashingmag/pen/vYOJaMb?editors=1000 -->
                                        <div class="col-span-full sm:col-span-3 mt-4">
                                            <input type="submit" id="metadata-btn" name="btn" class="bg-blue-500 text-white text-sm font-medium px-6 py-2 rounded capitalize cursor-pointer" value="Upload Case">
                                        </div>
                                    </form>
                                    <div class="mt-1 text-sm text-center text-red-500 dark:text-gray-300" id="flash"> </div>
                                </div>
                            </div>
                        </div><!-- /dialog -->
                    </div><!-- /overlay -->
                </section>
            </main>
            <div class="container h-full bg-purple-100 text-purple-900" x-data="alpineInstance()" x-init="getData()">
                <div class="flex flex-col max-w-screen-md max-h-screen mx-auto p-4">

                    <div class="relative">
                        <input @keyup="searchCase()" x-model="search" class="w-full rounded-lg px-2 py-2 border focus:border-blue-300 ring-blue-300 focus:ring focus:outline-none" type="text" placeholder="Search..." />
                        <button x-show="search.length > 0" @click="search = ''" class="absolute right-0 top-0 w-6 h-full flex justify-center items-center focus:outline-none text-gray-700 focus:text-purple-700">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                                </path>
                            </svg>
                        </button>
                    </div>

                </div>
                <div class="container w-100 lg:w-4/5 mx-auto flex flex-col">
                    <div x-init="await searchCase()" class="">
                        <template x-if="searchResults.length > 0">
                            <p x-text="'Found ' + searchResults + ' results'"></p>
                        </template>
                        <template x-if="search.length > 0" x-for="searchedLaw in searchedLaws" :key="searchedLaw.case_id">
                            <div class="flex flex-col overflow-hidden   bg-white rounded-lg shadow-xl  mt-4 w-100 mx-2">
                                <div class="w-full py-4 px-6 text-gray-800 flex flex-col justify-between">
                                    <div class="flex justify-between">
                                        <h3 class="font-semibold text-blue-600 text-lg leading-tight truncate" x-html="searchedLaw.case_no"> </h3>
                                        <span class="text-sm"><b>Delivery Date :</b> <span x-html="searchedLaw.date_of_delivery"></span></span>
                                    </div>
                                    <p class="mt-2 italic" x-html="searchedLaw.case_parties"></p>
                                    <div class="flex justify-between">
                                        <p class="text-sm text-gray-700 uppercase tracking-wide font-semibold mt-2" x-html="searchedLaw.court"></p>
                                        <a class="ml-2 text-blue-600 hover:underline hover:text-blue-700" x-bind:href="'viewCase.php?case_id=' + searchedLaw.case_id" href="">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>
                    <template x-if="search == ''" x-for="law in laws" :key="law.case_id">
                        <div class="flex flex-col overflow-hidden   bg-white rounded-lg shadow-xl  mt-4 w-100 mx-2">
                            <div class="w-full py-4 px-6 text-gray-800 flex flex-col justify-between">
                                <div class="flex justify-between">
                                    <h3 class="font-semibold text-blue-600 text-lg leading-tight truncate" x-text="law.case_no"> </h3>
                                    <span class="text-sm "><b>Delivery Date :</b> <span x-text="law.date_of_delivery"></span></span>
                                </div>
                                <p class="mt-2 italic" x-html="law.case_parties"></p>
                                <div class="flex justify-between">
                                    <p class="text-sm text-gray-700 uppercase tracking-wide font-semibold mt-2" x-html="law.court"></p>
                                    <a class="ml-2 text-blue-600 hover:underline hover:text-blue-700" x-bind:href="'viewCase.php?case_id=' + law.case_id" href="">Read More</a>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
            </div>
            <script>
                function alpineInstance() {
                    return {
                        laws: [],
                        search: '',
                        searchedLaws: [],
                        searchResults: 0,
                        getData() {
                            fetch('http://localhost:3000/src/api/getAll.php')
                                .then(response => response.json())
                                .then((data) => {
                                    //console.log(data);
                                    this.laws = data;
                                })
                        },
                        searchCase() {
                            fetch('http://localhost:3000/src/api/search.php?search=' + this.search, {
                                    method: 'POST',
                                    body: this.search,
                                })
                                .then(response => response.json())
                                .then(data => {
                                    // console.log(data);
                                    this.searchedLaws = data.search;
                                    this.searchResults = data.total;
                                    this.noresult = data.noresult;
                                })
                                .catch((error) => {
                                    console.error('Error:', error);
                                });
                        }

                    }
                }


                document.getElementById('metadata-btn').addEventListener('click', function(event) {

                    var formElement = document.getElementById('metadataForm');
                    let formData = new FormData(formElement);
                    formData.append("file", case_doc.files[0]);

                    var request = new XMLHttpRequest();

                    request.open("POST", "src/api/create.php", true);

                    request.onload = function(event) {
                        if (request.status == 200) {
                            document.getElementById('modal').style.display = 'none';
                            location.reload();
                            document.getElementById('flash').innerHTML = this.responseText;
                        } else {
                            console.log("error!");
                        }
                    }
                    request.send(formData);
                    event.preventDefault();
                });
            </script>
            </body>

            </html>
<?php
include_once 'base.view.php';
include_once 'sections/nav.view.php';
?>
<style>
       /* For Webkit-based browsers (Chrome, Safari and Opera) */
       .scrollbar-hide::-webkit-scrollbar {
              display: none;
       }

       /* For IE, Edge and Firefox */
       .scrollbar-hide {
              -ms-overflow-style: none;
              /* IE and Edge */
              scrollbar-width: none;
              /* Firefox */
       }
</style>

<div class="grid place-items-center bg-gray-100" id="main">
       <div class="max-w-sm md:max-w-lg bg-gray-100 px-4 md:px-8 py-14">
              <div class="relative bg-white flex-auto border-none rounded-xl ">
                     <input type="search" aria-label="Search all lis" placeholder="Search all Legislative initiatives..." class="block w-full appearance-none border-none  rounded-xl bg-transparent  pr-4 pl-10 text-base text-slate-900 transition placeholder:text-slate-400 focus:outline-none focus:ring-0" v-model="searchString">

                     <svg viewBox="0 0 20 20" aria-hidden="true" class="pointer-events-none absolute inset-y-0 left-0 h-full ml-2 w-5 fill-slate-500 transition">
                            <path d="M16.72 17.78a.75.75 0 1 0 1.06-1.06l-1.06 1.06ZM9 14.5A5.5 5.5 0 0 1 3.5 9H2a7 7 0 0 0 7 7v-1.5ZM3.5 9A5.5 5.5 0 0 1 9 3.5V2a7 7 0 0 0-7 7h1.5ZM9 3.5A5.5 5.5 0 0 1 14.5 9H16a7 7 0 0 0-7-7v1.5Zm3.89 10.45 3.83 3.83 1.06-1.06-3.83-3.83-1.06 1.06ZM14.5 9a5.48 5.48 0 0 1-1.61 3.89l1.06 1.06A6.98 6.98 0 0 0 16 9h-1.5Zm-1.61 3.89A5.48 5.48 0 0 1 9 14.5V16a6.98 6.98 0 0 0 4.95-2.05l-1.06-1.06Z"></path>
                     </svg>
              </div>
              <div class="bg-white shadow-xl pl-4 pb-2 pt-4 rounded-xl mt-10">
                     <div class="flex items-center justify-between font-semibold border-b border-gray-100 space-x-16 md:space-x-64 ">
                            <section>
                                   <button id="defaultModalButton" data-modal-toggle="defaultModal" type="button" class="mb-2 inline-flex justify-center rounded-md px-1 -mr-1 bg-white text-sm leading-5 font-medium text-blue-500 hover:text-gray-600" id="options-menu" aria-haspopup="true" aria-expanded="true">
                                          Add LI
                                   </button>


                                   <!-- Main modal -->
                                   <div id="defaultModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                                          <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                                                 <!-- Modal content -->
                                                 <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                                                        <!-- Modal header -->
                                                        <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                                                               <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                                      Add a new legislative initiative
                                                               </h3>
                                                               <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="defaultModal">
                                                                      <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                                             <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                                                      </svg>
                                                                      <span class="sr-only">Close modal</span>
                                                               </button>
                                                        </div>
                                                        <!-- Modal body -->
                                                        <form id="addLi" action="/projects/jwg/leg-initia" method="POST">
                                                               <div class="grid gap-4 mb-4 sm:grid-cols-2">
                                                                      <div class="sm:col-span-2">
                                                                             <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Name</label>
                                                                             <input type="text" name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-rose-600 focus:border-rose-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-rose-500 dark:focus:border-rose-500" placeholder="Type your name" required="">
                                                                      </div>

                                                                      <div class="sm:col-span-2">
                                                                             <label for="liname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Legislative initiative Name</label>
                                                                             <input type="text" name="name" id="liname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-rose-600 focus:border-rose-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-rose-500 dark:focus:border-rose-500" placeholder="EBA Regulation" required="">
                                                                      </div>

                                                                      <div class="sm:col-span-2">
                                                                             <label for="liabbr" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Legislative initiative Abbrevations</label>
                                                                             <textarea id="liabbr" name="abbr" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-rose-500 focus:border-rose-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-rose-500 dark:focus:border-rose-500" placeholder="Write your LI's pearl terms or abbrevations e.g. 1093/2010 (separated with a comma)"></textarea>
                                                                      </div>
                                                               </div>
                                                               <button id="addLiBtn" type="submit" class="text-white inline-flex items-center bg-rose-700 hover:bg-rose-800 focus:ring-4 focus:outline-none focus:ring-rose-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-rose-600 dark:hover:bg-rose-700 dark:focus:ring-rose-800">
                                                                      <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                                             <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                                                                      </svg>
                                                                      Add legislative initiative
                                                               </button>
                                                               <button id="loading" disabled type="button" class="hidden text-white bg-rose-700 hover:bg-rose-800 focus:ring-4 focus:ring-rose-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 dark:bg-rose-600 dark:hover:bg-rose-700 dark:focus:ring-rose-800 inline-flex items-center">
                                                                      <svg role="status" class="inline mr-3 w-4 h-4 text-white animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                             <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB" />
                                                                             <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor" />
                                                                      </svg>
                                                                      Loading...
                                                               </button>
                                                               <button id='success' type="submit" class="hidden text-white inline-flex items-center bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 cursor-not-allowed" disabled>
                                                                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mr-1 -ml-1 w-6 h-6">
                                                                             <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                                      </svg>
                                                                      Success
                                                               </button>
                                                        </form>
                                                 </div>
                                          </div>
                                   </div>


                            </section>

                            <section>
                                   <button id="readProductButton" data-modal-toggle="readProductModal" class="mb-2 inline-flex justify-center rounded-md px-1 -mr-1 bg-white text-sm leading-5 font-medium text-blue-500 hover:text-gray-600" type="button">
                                          View Log
                                   </button>


                                   <!-- Main modal -->
                                   <div id="readProductModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                                          <div class="relative p-4 w-full max-w-xl h-full md:h-auto">
                                                 <!-- Modal content -->
                                                 <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                                                        <!-- Modal header -->
                                                        <div class="flex justify-between mb-4 rounded-t sm:mb-5">
                                                               <div class="text-lg text-gray-900 md:text-xl dark:text-white">
                                                                      <?php
                                                                      foreach (getLogs() as $log) {
                                                                             echo
                                                                             '<p class="text-sm font-medium text-rose-900">' . $log . '</p>';
                                                                      }
                                                                      ?>
                                                               </div>
                                                               <div>
                                                                      <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 inline-flex dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="readProductModal">
                                                                             <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                                                             </svg>
                                                                             <span class="sr-only">Close modal</span>
                                                                      </button>
                                                               </div>
                                                        </div>


                                                 </div>
                                          </div>
                                   </div>

                            </section>



                     </div>
                     <section id="lis" class="overflow-y-auto h-80 scrollbar-hide">
                            <div v-for="LI in filteredData" :key="LI.id" class="pt-4 border-b border-gray-100 flex justify-between group/item hover:bg-gray-50">
                                   <div id="lidata" class="cursor-pointer">
                                          <p class="text-sm font-medium text-rose-900" v-html="LI.name"></p>
                                          <span class="text-sm text-rose-500" v-html="LI.abbr"></span>
                                          <br>
                                          <span class="text-xs text-rose-300" v-html="timeSince(LI.updated_at) + '  <b>click to copy</b>'"></span>
                                   </div>
                                   <div id="icons" class="invisible group-hover/item:visible flex flex-col justify-center -mt-4 bg-gray-100 rounded-l-full p-4  space-y-4">
                                          <span>
                                                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-green-500 cursor-pointer w-4 h-4 hover:text-green-600 hover:w-5 hover:h-5">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                 </svg>
                                          </span>


                                          <section>
                                                 <svg v-bind:id="'deleteButton-'+LI.id" v-bind:data-modal-toggle="'deleteModal-'+LI.id" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-red-500 cursor-pointer w-4 h-4 hover:text-red-600 hover:w-5 hover:h-5">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                 </svg>
                                                 <div v-bind:id="'deleteModal-'+LI.id" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                                                        <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                                                               <!-- Modal content -->
                                                               <div class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                                                                      <button type="button" class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" v-bind:data-modal-toggle="'deleteModal-'+LI.id">
                                                                             <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                                                             </svg>
                                                                             <span class="sr-only">Close modal</span>
                                                                      </button>
                                                                      <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                                             <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                                                      </svg>
                                                                      <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to delete this item?</p>
                                                                      <div class="flex justify-center items-center space-x-4">
                                                                             <button v-bind:data-modal-toggle="'deleteModal-'+LI.id" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                                                    No, cancel
                                                                             </button>
                                                                             <button type="submit" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                                                                    Yes, I'm sure
                                                                             </button>
                                                                      </div>
                                                               </div>
                                                        </div>
                                                 </div>
                                          </section>
                                   </div>
                            </div>
                     </section>
                     <div class="flex items-center justify-center font-semibold border-t border-gray-100">
                            <span class="text-center">Found a total of {{filteredData.length}} LIs</span>

                     </div>
              </div>
       </div>

</div>
<!-- Modal toggle -->


<div class="border-t bg-gray-50 left-50 w-full  bottom-0" style="position: fixed;  left: 50%; transform: translate(-50%, 0);">
       <div class="text-gray-900 text-sm text-center">
              <div class="my-2 text-center">&copy; 2020 - <?= date('Y') ?> All rights reserved | Chungu Developers</div>
       </div>
</div>




<script>
       new Vue({
              el: '#main',

              data: {
                     searchString: "",
                     name: '',
                     abbr: '',
                     //the array of all the LI's  
                     lis: [],
                     msg: "Your Copied LI will appear here"
              },
              mounted() {
                     this.GetData();

              },
              methods: {
                     GetData() {
                            fetch("/projects/jwg/leg-initia/all")
                                   .then(response => response.json())
                                   .then((data) => {
                                          this.lis = data;
                                   });
                     },
                     timeSince(date) {
                            let intervals = [{
                                          label: 'yr',
                                          seconds: 31536000
                                   },
                                   {
                                          label: 'mo',
                                          seconds: 2592000
                                   },
                                   {
                                          label: 'dy',
                                          seconds: 86400
                                   },
                                   {
                                          label: 'hr',
                                          seconds: 3600
                                   },
                                   {
                                          label: 'min',
                                          seconds: 60
                                   },
                                   {
                                          label: 'sec',
                                          seconds: 1
                                   }
                            ];
                            let adate = new Date(date);
                            const seconds = Math.floor((Date.now() - adate.getTime()) / 1000);
                            const interval = intervals.find(i => i.seconds < seconds);
                            const count = Math.floor(seconds / interval.seconds);
                            return `${count} ${interval.label}${count !== 1 ? 's' : ''} ago`;
                     },
              },
              computed: {
                     // A computed property that holds only those data that match the searchString.

                     filteredData: function() {
                            var search_array = this.lis,
                                   searchString = this.searchString;

                            if (!searchString) {
                                   return search_array;
                            }

                            searchString = searchString.trim().toLowerCase();

                            search_array = search_array.filter(item => {
                                   if (item.abbr.toLowerCase().indexOf(searchString) !== -1 || item.name
                                          .toLowerCase().indexOf(searchString) !== -1) {
                                          //   item.name = '<span class="text-rose-700">'+item.name+'</span>';
                                          return item;

                                   }
                            })

                            // Return an array with the filtered data.
                            return search_array;
                     }
              }
       });


       // Get the form element
       const addBtn = document.getElementById("addLiBtn");
       const loadBtn = document.getElementById("loading");
       const successBtn = document.getElementById("success");

       // Attach an event listener to the form's submit event
       addBtn.addEventListener("click", function(event) {
              addBtn.classList.add("hidden");
              loadBtn.classList.remove("hidden");
              // Prevent the default submit action
              event.preventDefault();
              const form = document.getElementById("addLi");
              // Get the form data
              const formData = new FormData(form);

              // Send a POST request to the server with the form data
              axios.post("/projects/jwg/leg-initia", formData)
                     .then(function(response) {
                            // Handle the successful response from the server
                            console.log(response);
                            loadBtn.classList.add("hidden");
                            successBtn.classList.remove("hidden");
                     })
                     .catch(function(error) {
                            // Handle any errors that occurred during the request
                     });
       });
</script>
</body>

</html>
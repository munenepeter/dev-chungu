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
<script src="https://unpkg.com/htmx.org@1.8.6" integrity="sha384-Bj8qm/6B+71E6FQSySofJOUjA/gq330vEqjFx9LakWybUySyI1IQHwPtbTU7bNwx" crossorigin="anonymous"></script>

<div class="grid place-items-center bg-gray-100" id="main">
       <div class="max-w-sm md:max-w-lg bg-gray-100 px-4 md:px-8 py-14">
              <div class="relative bg-white flex-auto border-none rounded-xl ">
                     <input type="search" aria-label="Search all lis" placeholder="Search all Legislative initiatives..." class="block w-full appearance-none border-none  rounded-xl bg-transparent  pr-4 pl-10 text-base text-slate-900 transition placeholder:text-slate-400 focus:outline-none focus:ring-0" hx-post="/projects/jwg/leg-initia/search" hx-trigger="keyup changed delay:500ms, search" hx-target="#lis" >

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
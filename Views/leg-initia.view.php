<?php
include_once 'base.view.php';
include_once 'sections/nav.view.php';
?>

<div class="grid place-items-center bg-gray-100" id="main">

       <div class="max-w-lg bg-gray-100  px-8 py-14 sm:px-12">
              <div class="relative bg-white flex-auto border-none rounded-xl ">
                     <input type="search" aria-label="Search all icons" placeholder="Search all Legislative initiatives..." class="block w-full appearance-none border-none  rounded-xl bg-transparent  pr-4 pl-10 text-base text-slate-900 transition placeholder:text-slate-400 focus:outline-none focus:ring-0" v-model="searchString">

                     <svg viewBox="0 0 20 20" aria-hidden="true" class="pointer-events-none absolute inset-y-0 left-0 h-full ml-2 w-5 fill-slate-500 transition">
                            <path d="M16.72 17.78a.75.75 0 1 0 1.06-1.06l-1.06 1.06ZM9 14.5A5.5 5.5 0 0 1 3.5 9H2a7 7 0 0 0 7 7v-1.5ZM3.5 9A5.5 5.5 0 0 1 9 3.5V2a7 7 0 0 0-7 7h1.5ZM9 3.5A5.5 5.5 0 0 1 14.5 9H16a7 7 0 0 0-7-7v1.5Zm3.89 10.45 3.83 3.83 1.06-1.06-3.83-3.83-1.06 1.06ZM14.5 9a5.48 5.48 0 0 1-1.61 3.89l1.06 1.06A6.98 6.98 0 0 0 16 9h-1.5Zm-1.61 3.89A5.48 5.48 0 0 1 9 14.5V16a6.98 6.98 0 0 0 4.95-2.05l-1.06-1.06Z"></path>
                     </svg>
              </div>

              <div class="bg-white shadow-xl p-4 rounded-xl mt-10">

                     <div class="flex items-center justify-between font-semibold border-b border-gray-100 space-x-64 ">
                            <span>{{filteredData.length}} LIs</span>
                            <button type="button" class="mb-2 inline-flex justify-center rounded-md px-1 -mr-1 bg-white text-sm leading-5 font-medium text-blue-500 hover:text-gray-600" id="options-menu" aria-haspopup="true" aria-expanded="true">
                                   Log
                            </button>
                     </div>
                     <section id="lis" class="overflow-y-auto h-80"> 
                                   <div v-for="LI in filteredData" class="mt-4 border-b border-gray-100">
                                          <div class="text-sm font-medium text-gray-900">{{LI.name}}</div>
                                          <div class="text-sm text-gray-500">{{ LI.abbr }}</div>
                                   </div> 
                     </section>


              </div>
       </div>

</div>









<div class="border-t bg-gray-50 left-50 w-full  bottom-0" style="position: fixed;  left: 50%; transform: translate(-50%, 0);">
       <div class="text-gray-900 text-sm text-center">
              <div class="my-2 text-center">&copy; 2020 - <?= date('Y') ?> All rights reserved | Chungu Developers</div>
       </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
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
                    fetch("https://munenepeter.github.io/my-file-tracker/data/datas.json")
                        .then(response => response.json())
                        .then((data) => {
                            this.lis = data;
                        });
                },
            },
            computed: {
                // A computed property that holds only those data that match the searchString.

                filteredData: function () {
                    var search_array = this.lis,
                        searchString = this.searchString;

                    if (!searchString) {
                        return search_array;
                    }

                    searchString = searchString.trim().toLowerCase();

                    search_array = search_array.filter(item => {
                        if (item.abbr.toLowerCase().indexOf(searchString) !== -1 || item.name
                            .toLowerCase().indexOf(searchString) !== -1) {
                            return item;
                        }
                    })

                    // Return an array with the filtered data.
                    return search_array;
                }
            }
        });
    </script>
</body>

</html>
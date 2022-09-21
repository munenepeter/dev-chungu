<?php
include_once 'base.view.php';
include_once 'sections/nav.view.php';
?>

<div class="grid place-items-center">


       <section class="text-gray-600 body-font">
              <div class="container px-5 py-24 mx-auto">
                     <div class="flex flex-wrap -m-4">
                            <?php foreach ($projects as $project) : ?>
                                   <div class="p-4 lg:w-1/3">

                                          <div class="h-full bg-gray-100 bg-opacity-75 px-8 pt-16 pb-24 rounded-lg overflow-hidden text-center relative">
                                                 <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1"><?=$project['category']?></h2>
                                                 <h1 class="title-font sm:text-2xl text-xl font-medium text-gray-900 mb-3"><?=$project['name']?></h1>
                                                 <p class="leading-relaxed mb-3"><?=$project['description']?></p>
                                                 <a href="projects/jwg/<?=$project['name']?>" class="text-indigo-500 inline-flex items-center">Learn More
                                                        <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                               <path d="M5 12h14"></path>
                                                               <path d="M12 5l7 7-7 7"></path>
                                                        </svg>
                                                 </a>
                                               
                                          </div>

                                   </div>
                            <?php endforeach; ?>
                     </div>
              </div>
       </section>


       <script src="https://unpkg.com/flowbite@1.5.2/dist/flowbite.js"></script>
       </body>

       </html>
</div>
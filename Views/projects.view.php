<?php
include_once 'base.view.php';
include_once 'sections/nav.view.php';
?>
<main class="py-6 my-8">
       <section class="mx-auto max-w-screen-2xl mt-6 px-2">
              <div class="flex items-center space-x-4 my-4">
                     <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                     </svg>

                     <h2>All Projects</h2>
              </div>
              <div class="mt-6 flex flex-wrap mt-2 gap-2 mx-auto">
                     <?php foreach ($projects as $project) : ?>
                            <div class="md:w-1/6 sm:w-1/2 w-full shadow-sm border border-orange-700 p-4 rounded-md hover:bg-purple-100 hover:shadow-md">
                                   <div class="flex justify-between items-center mb-4">
                                          <div class="flex items-center space-x-2">
                                                 <div class="border border-purple-100 p-1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-orange-700">
                                                               <path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25" />
                                                        </svg>
                                                 </div>
                                                 <div>
                                                        <p class="text-xs"><?= $project['category'] ?></p>
                                                        <p><a href="projects/<?= $project['category'] ?>/<?= $project['name'] ?>"><?= $project['name'] ?></a></p>
                                                 </div>
                                          </div>
                                          <p>...</p>
                                   </div>
                                   <p class="text-xs"><?= $project['description'] ?></p>
                            </div>

                     <?php endforeach; ?>


              </div>
              <h2 class="tracking-widest text-xl text-center title-font font-medium text-purple-900 mt-8">For More projects you can visit my <a class="text-indigo-500" href="https://github.com/munenepeter">Github</a> page</h2>


       </section>
</main>





<?php include_once 'sections/footer.view.php'     ?>
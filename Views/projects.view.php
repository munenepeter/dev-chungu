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
              <div class="mt-6 grid md:grid-cols-4 grid-cols-1 mt-2 gap-2 mx-auto">
                     <?php foreach ($projects as $project) : ?>
                            <div class=" shadow-sm border border-purple-100   p-4 rounded-md hover:bg-purple-100 hover:shadow-md">
                                   <div class="flex justify-between items-center mb-4">
                                          <div class="flex items-center space-x-2">
                                                 <div class="border border-purple-100 p-1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10">
                                                               <path stroke-linecap="round" stroke-linejoin="round" d="M14.25 9.75L16.5 12l-2.25 2.25m-4.5 0L7.5 12l2.25-2.25M6 20.25h12A2.25 2.25 0 0020.25 18V6A2.25 2.25 0 0018 3.75H6A2.25 2.25 0 003.75 6v12A2.25 2.25 0 006 20.25z" />
                                                        </svg>
                                                 </div>
                                                 <div>
                                                        <p class="text-xs text-orange-600"><?= $project['category'] ?></p>
                                                        <p><a class="text-purple-900 hover:underline font-bold" href="projects/<?= $project['category'] ?>/<?= $project['name'] ?>"><?= $project['name'] ?></a></p>
                                                 </div>
                                          </div>
                                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                 <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                          </svg>

                                   </div>
                                   <p class="text-xs text-gray-500"><?= $project['description'] ?></p>
                            </div>

                     <?php endforeach; ?>


              </div>
              <!-- <h2 class=" text-xl text-center title-font font-medium text-purple-900 mt-8">For More projects you can visit my <a class="text-indigo-500" href="https://github.com/munenepeter">Github</a> page</h2> -->


       </section>
</main>





<?php include_once 'sections/footer.view.php'     ?>
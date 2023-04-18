<?php
include_once 'base.view.php';
include_once 'sections/nav.view.php';
?>
<main class="-mt-12 bg-gradient-to-r from-yellow-50 from-2% via-green-100 via-40% to-pink-100 to-90% h-screen ">
       <section class="py-8 mt-12">
              <article class="mx-auto max-w-screen-2xl mt-12 px-4">
                     <div class="flex justify-between">
                            <div class="flex items-center space-x-2 text-orange-800">
                                   <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                          <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                                   </svg>

                                   <h2 class="font-bold text-lg ">All projects</h2>
                            </div>
                            <div class="flex items-center space-x-2 text-orange-800">
                                   <h2 class="font-bold text-lg ">View github</h2>
                                   <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                          <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                   </svg>
                            </div>
                     </div>
                     <div class="mt-6 grid md:grid-cols-4 grid-cols-1 mt-2 gap-2 mx-auto">
                            <?php foreach ($projects as $project) : ?>
                                   <div class="bg-gray-50 shadow-sm border border-rose-100 hover:border-rose-300 p-4 rounded-md hover:bg-purple-50 hover:shadow-md">
                                          <div class="flex justify-between items-center mb-4">
                                                 <div class="flex items-center space-x-2">
                                                        <div class="border border-purple-100 p-1 rounded-md">
                                                               <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-rose-900">
                                                                      <path stroke-linecap="round" stroke-linejoin="round" d="M14.25 9.75L16.5 12l-2.25 2.25m-4.5 0L7.5 12l2.25-2.25M6 20.25h12A2.25 2.25 0 0020.25 18V6A2.25 2.25 0 0018 3.75H6A2.25 2.25 0 003.75 6v12A2.25 2.25 0 006 20.25z" />
                                                               </svg>
                                                        </div>
                                                        <div>
                                                               <p class="text-xs text-orange-600"><?= $project['category'] ?></p>
                                                               <p><a class="text-purple-900 hover:underline font-bold" href="projects/<?= $project['category'] ?>/<?= $project['name'] ?>"><?= $project['name'] ?></a></p>
                                                        </div>
                                                 </div>
                                                 <div class="">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                               <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                                        </svg>
                                                 </div>
                                          </div>
                                          <p class="text-xs text-gray-500"><?= $project['description'] ?></p>
                                   </div>

                            <?php endforeach; ?>


                     </div>
                     <!-- <h2 class=" text-xl text-center title-font font-medium text-purple-900 mt-8">For More projects you can visit my <a class="text-indigo-500" href="https://github.com/munenepeter">Github</a> page</h2> -->


              </article>
       </section>
       <div class="border-t bg-gray-50 left-50 w-full  bottom-0" style="position: fixed;  left: 50%; transform: translate(-50%, 0);">
              <div class="text-gray-900 text-sm text-center">
                     <div class="my-2 text-center">&copy; 2020 - <?= date('Y') ?> All rights reserved | Chungu Developers</div>
              </div>
       </div>
</main>
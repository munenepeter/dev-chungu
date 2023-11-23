<?php
include_once 'base.view.php';
include_once 'sections/nav.view.php';
?>
<main class="-mt-24 bg-gradient-to-r from-yellow-50 from-2% via-green-100 via-40% to-pink-100 to-90%">

       <section class="py-8 mt-20">
              <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
                     <div class="mx-auto max-w-screen-sm text-center lg:mb-8 mb-4">
                            <h2 class="my-4 text-3xl lg:text-4xl tracking-tight font-extrabold text-orange-800 ">Our Projects</h2>
                            <p class="font-light text-gray-500 sm:text-xl ">Chungu Developers helps you achiev your business goals faster</p>
                            <div class="flex justify-center gap-6 mt-2">
                                   <div class="flex items-center space-x-2 text-purple-900">
                                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                 <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                 <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                          </svg>
                                          <a href="https://github.com/munenepeter" class="font-bold text-md ">View all projects</a>
                                   </div>
                                   <div class="flex items-center space-x-2 text-purple-900">
                                          <a href="/#contact" class="font-bold text-md ">Let's work together</a>
                                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                 <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                                          </svg>

                                   </div>
                            </div>
                     </div>
                     <div class="grid gap-8 lg:grid-cols-3">

                            <?php for ($i = 0; $i < 6; $i++) : ?>
                                   <article class="max-w-sm rounded-lg">
                                          <a href="#">
                                                 <img class="rounded-lg h-56 w-full" src="https://flowbite.com/docs/images/blog/image-1.jpg" alt="" />
                                          </a>
                                          <div class="px-2 pt-5 pb-2 bg-gray-50 shadow-sm border border-rose-100 hover:border-rose-300 rounded-md hover:bg-purple-50 hover:shadow-md">
                                                 <a href="#">
                                                        <h5 class="mb-2 text-purple-900 hover:underline font-bold">Project <?= $i ?></h5>
                                                 </a>
                                                 <p class="mb-3 text-sm text-gray-500">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>

                                                 <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-orange-700 rounded-lg hover:bg-orange-800 focus:ring-4 focus:outline-none focus:ring-orange-300 dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-orange-800">
                                                        Live Preview
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 ms-2">
                                                               <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                                                        </svg>
                                                 </a>
                                          </div>
                                   </article>
                            <?php endfor; ?>


                     </div>
              </div>
       </section>

       <div class="border-t bg-gray-50 left-50 w-full  bottom-0" style="position: fixed;  left: 50%; transform: translate(-50%, 0);">
              <div class="text-gray-900 text-sm text-center">
                     <div class="my-2 text-center">&copy; 2020 - <?= date('Y') ?> All rights reserved | Chungu Developers</div>
              </div>
       </div>
</main>
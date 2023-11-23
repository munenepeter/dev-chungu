<?php
include_once 'base.view.php';
include_once 'sections/nav.view.php';
?>
<main class="-mt-24 bg-gradient-to-r from-yellow-50 from-2% via-green-100 via-40% to-pink-100 to-90% h-screen ">

       <section class="py-8 mt-16">
              <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
                     <div class="mx-auto max-w-screen-sm text-center lg:mb-16 mb-8">
                            <h2 class="mb-4 text-3xl lg:text-4xl tracking-tight font-extrabold text-gray-900 ">Our Projects</h2>
                            <p class="font-light text-gray-500 sm:text-xl ">Chungu Developers helps you achiev your business goals faster</p>
                     </div>
                     <div class="grid gap-8 lg:grid-cols-3">

                            <?php for ($i = 0; $i < 6; $i++) : ?>
                                   <article class="max-w-sm bg-white rounded-lg">
                                          <a href="#">
                                                 <img class="rounded-lg" src="https://flowbite.com/docs/images/blog/image-1.jpg" alt="" />
                                          </a>
                                          <div class="px-2 pt-5">
                                                 <a href="#">
                                                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Project 1</h5>
                                                 </a>
                                                 <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>

                                                 <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
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
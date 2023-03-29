<?php
include_once 'base.view.php';
include_once 'sections/nav.view.php';
?>
 <main class="mt-4 pt-16">
        <section class="bg-purple-100 px-2 mx-auto max-w-screen-2xl ">
            <article class="mx-auto w-full max-w-4xl p-6 rounded-lg "></article>
<div class="grid place-items-center">


       <section class="text-gray-600 body-font">
              <h2 class="tracking-widest text-2xl text-center title-font font-medium text-gray-400 mt-4">For More projects you can visit my <a class="text-indigo-500" href="https://github.com/munenepeter">Github</a> profile</h2>

              <div class="container px-5 py-24 mx-auto">

                     <div class="flex flex-wrap -m-4">
                            <?php foreach ($projects as $project) : ?>
                                   <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                                          <div class="border-2 border-rose-600 px-4 py-6 rounded-lg transform transition duration-500 hover:scale-110">
                                          <h2 class="tracking-widest text-xs title-font font-medium text-rose-400 mb-1"><?= $project['category'] ?></h2>
                                                 <h1 class="title-font sm:text-2xl text-xl font-medium text-rose-900 mb-3"><?= $project['name'] ?></h1>
                                          <p class="leading-relaxed mb-3"><?= $project['description'] ?></p>
                                                 <a href="projects/<?= $project['category'] ?>/<?= $project['name'] ?>" class="text-rose-500 inline-flex items-center">view project
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

</div>
<?php include_once 'sections/footer.view.php'     ?>
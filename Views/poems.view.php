<?php
include_once 'base.view.php';
include_once 'sections/nav.view.php';
?>
<script src="https://cdn.tailwindcss.com"></script>
<script>
       tailwind.config = {
              theme: {
                     extend: {
                            colors: {
                                   mahogany: '#da373d',
                            }
                     }
              }
       }
</script>
<div class="grid place-items-center text-center">
       <div class="container mx-auto my-12 px-4 sm:px-0">
              <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                     <?php for ($i = 0; $i < 22; $i++) : ?>
                            <div class="flex justify-center border border-rose-800 rounded-xl p-6 ">
                                   <article>
                                          <h1 class=" text-5xl text-rose-600">Title</h1>
                                          <p class="pt-4 text-md text-rose-300">Lorem ipsum dolor, sit amet consectetur adipisi....</p>
                                   </article>
                            </div>
                     <?php endfor; ?>

              </div>
       </div>
</div>

</div>

<div class="border-t bg-gray-50 left-50 w-full  bottom-0" style="position: fixed;  left: 50%; transform: translate(-50%, 0);">
       <div class="text-gray-900 text-sm text-center">
              <div class="my-2 text-center">&copy; 2020 - <?= date('Y') ?> All rights reserved | Chungu Developers</div>
       </div>
</div>
</body>

</html>
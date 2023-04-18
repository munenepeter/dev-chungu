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




<svg xmlns="http://www.w3.org/2000/svg" style="position:absolute; top:0; left:0; height:100vh; width:100%; z-index:-1;">
       <filter id="filter">
              <feTurbulence type="fractalNoise" baseFrequency=".04" result="n" />
              <feTurbulence baseFrequency=".03" numOctaves="4" />
              <feDisplacementMap in="n" yChannelSelector="B" scale="99" />
              <feColorMatrix values="1  0 0 0 0
                              -1  1 0 0 0
                              -1 -1 0 0 0
                               0  0 0 0 1" />
              <feColorMatrix values="1 .88 0 0 .39
                               1 .66 0 0 .31
                               1 .41 0 0 .07
                               0  0  0 0  1" />
       </filter>
       <rect x="-10%" y="-10%" width="120%" height="100%" filter="url(#filter)" />
</svg>






<div class="relative grid place-items-center text-center my-8">
       <div class="container mx-auto my-12 px-4 sm:px-0">
              <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                     <?php for ($i = 0; $i < 12; $i++) : ?>
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

 

<div class="border-t bg-gray-50 left-50 w-full  bottom-0" style="position: fixed;  left: 50%; transform: translate(-50%, 0);">
       <div class="text-gray-900 text-sm text-center">
              <div class="my-2 text-center">&copy; 2020 - <?= date('Y') ?> All rights reserved | Chungu Developers</div>
       </div>
</div>
</body>

</html>
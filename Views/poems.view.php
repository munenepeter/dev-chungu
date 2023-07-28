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



<div class="relative grid place-items-center text-center my-8">
       <div class="container mx-auto my-12 px-4 sm:px-0">
              <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                  

              </div>
       </div>
</div>



<div class="border-t bg-gray-50 left-50 w-full  bottom-0"
       style="position: fixed;  left: 50%; transform: translate(-50%, 0);">
       <div class="text-gray-900 text-sm text-center">
              <div class="my-2 text-center">&copy; 2020 - <?= date('Y') ?> All rights reserved | Chungu Developers</div>
       </div>
</div>
</body>

</html>
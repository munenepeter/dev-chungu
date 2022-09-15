<?php

use spekulatius\phpscraper;

include_once 'base.view.php';
include_once 'sections/nav.view.php';
?>
<h1 class="mb-2 text-center text-2xl font-bold tracking-tight">Get Links, useful tool to get all the urls of a site</h1>

<div class="mt-4 p-6 mx-auto max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
       <h1 class="mb-2 text-2xl font-bold tracking-tight">
              <?php if (isset($_GET['error'])) : ?>
                     <span class="text-red-500"><?= $_GET['error'] ?>
                     </span>
              <?php endif; ?>
       </h1>
       <form action="" method="get">
              <div class="mb-6">
                     <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Input your URL</label>
                     <input type="url" name="url" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
              </div>
              <button name="submit" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Search</button>
       </form>
</div>


<?php
if (isset($_GET['submit'])) {
       if (empty($_GET['url'])) {
              $error = urlencode("No URL was provided!!");
              header("Location:index.php?error=$error");
       }
       $start = microtime(true);
       $web = new phpscraper();
       $links = [];
       try {
              $web->go($_GET['url']);
              foreach ($web->links as $link) {
                     array_push($links, $link . "\n");
              }
              $links = array_unique($links);
              $host = parse_url($_GET['url'], PHP_URL_HOST);
              $time = round(microtime(true) - $start, 2);
       } catch (\Exception $e) {
              echo "<h1 class='mb-2 text-2xl font-bold tracking-tight text-red-500'>" . $e->getMessage() . "</h1> ";
       }

?>
       <div>
              <div class="flex justify-between items-center p-2">
                     <p class="text-lg"><?= "Done getting " . count($web->links) . " links for <i>$host</i> in <b>$time</b> Seconds"; ?></p>
                     <button onclick="CopyToClipboard('div1')" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center " disabled>Copy Links</button>
              </div>
              <span id="div1" class="hidden"><?= implode("\n", $links); ?></span>
              <div class="border m-4 p-2 rounded-md h-56 overflow-y-auto">
                     <?php $count = 1; ?>
                     <?php foreach ($links as $link) : ?>
                            <p class='font-normal text-gray-700'><a class="text-blue-600 hover:underline" href="<?= $link; ?>"><?= $link; ?></a></p>
                            <?php $count++; ?>
                     <?php endforeach; ?>
              </div>
       </div>


       <script>
              function copyLinks() {
                     var range = document.createRange();
                     range.selectNode(document.getElementById("links"));
                     window.getSelection().removeAllRanges(); // clear current selection
                     window.getSelection().addRange(range); // to select text
                     document.execCommand("copy");
                     window.getSelection().removeAllRanges(); // to deselect
              }

              function CopyToClipboard(containerid) {
                     if (document.selection) {
                            var range = document.body.createTextRange();
                            range.moveToElementText(document.getElementById(containerid));
                            range.select().createTextRange();
                            document.execCommand("copy");
                     } else if (window.getSelection) {
                            var range = document.createRange();
                            range.selectNode(document.getElementById(containerid));
                            window.getSelection().addRange(range);
                            document.execCommand("copy");
                            alert("Text has been copied, now paste in the text-area")
                     }
              }
       </script>

<?php

}
?>
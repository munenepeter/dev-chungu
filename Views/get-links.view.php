<?php

use spekulatius\phpscraper;

include_once 'base.view.php';
include_once 'sections/nav.view.php';
?>
<nav class="pt-2 pb-2 mb-2 bg-gray-50 border border-gray-100 px-2 sm:px-4 py-2.5 rounded">
       <div class="container flex flex-wrap justify-between items-center mx-auto">
              <div class="m-auto w-full text-center md:w-auto text-blue-700 text-3xl">
                     Get all the urls of a Webpage
              </div>
       </div>
</nav>

<div class="m-4 md:m-auto p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
       <h1 class="mb-2 text-2xl font-bold tracking-tight">
              <?php if (isset($_GET['error'])) : ?>
                     <span class="text-red-500"><?= $_GET['error'] ?>
                     </span>
              <?php endif; ?>
       </h1>
       <form action="" method="get">
              <div class="mb-6">
                     <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Enter a URL</label>
                     <input type="url" name="url" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                     <div class="my-4 text-sm text-center text-gray-500">Only links to actual websites and/or webpages will work</div>

              </div>
              <center>
                     <button name="submit" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Search</button>

              </center>
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
                     <button onclick="CopyToClipboard('div1')" class="text-white bg-blue-400 dark:bg-blue-500 cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5 text-center" disabled>Copy Links</button>
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
<div class="border-t bg-gray-50 left-50 w-full  bottom-0" style="position: fixed;  left: 50%; transform: translate(-50%, 0);">
    <div class="text-gray-900 text-sm text-center">
        <div class="my-5 text-center">&copy; 2020 - <?= date('Y') ?> All rights reserved | Chungu Developers</div>
    </div>
</div>
</body>

</html>
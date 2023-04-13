<?php

use spekulatius\phpscraper;

include_once 'base.view.php';
include_once 'sections/nav.view.php';



function getUrls($url) {
       $options = array(
              "http" => array(
                     "method" => "GET",
                     "header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36\r\n"
              )
       );

       // Create a context for the file_get_contents function
       $context = stream_context_create($options);

       // Fetch the content of the webpage
       $html = file_get_contents($url, false, $context);

       // Create a DOMDocument object to parse the HTML
       $dom = new DOMDocument();

       // Disable errors and warnings when parsing HTML
       libxml_use_internal_errors(true);

       // Load the HTML into the DOMDocument object
       if (!$dom->loadHTML($html)) {
              throw new Exception("Failed to parse HTML");
       }

       // Enable errors and warnings again
       libxml_use_internal_errors(false);

       // Get all the links in the HTML
       $links = $dom->getElementsByTagName("a");

       // Print the URLs of the links

       $links = [];
       foreach ($links as $link) {
              $links[] = $link->getAttribute("href") . PHP_EOL;
       }

       return $links;
}
?>



<main class="mt-4 pt-20">
       <section class="flex justify-between px-2 mx-auto max-w-screen-2xl ">
              <article class="mx-auto w-full max-w-4xl format format-sm sm:format-base lg:format-lg format-purple dark:format-invert">
                     <div class=" p-4 rounded-lg bg-gray-100 dark:bg-gray-800"">
                              <p class=" text-lg text-center font-medium text-gray-900 dark:text-white">Get all the urls of a Webpage</p>
                            <label id="url-label-guide" class="block mb-2 text-sm text-center text-gray-500 dark:text-gray-400" for="url">Only links to actual websites and/or webpages will work</label>
                            <form action="" method="get" class="flex flex-row justify-center items-center">
                                   <input name="url" type="url" class="mr-2 block w-3/4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 " placeholder="https://example.com" />
                                   <button name="submit" type="submit" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 ">Search</button>
                            </form>
                            <?php


                            if (isset($_GET['submit'])) {
                                   if (empty($_GET['url'])) {
                                          $error = urlencode("No URL was provided!!");
                                          header("Location:index.php?error=$error");
                                   }
                                   $start = microtime(true);
                                   try {
                                          $links = getUrls($_GET['url']);

                                          $links = array_unique($links);
                                          $host = parse_url($_GET['url'], PHP_URL_HOST);
                                          $time = round(microtime(true) - $start, 2);
                                   } catch (\Exception $e) {
                                          echo "<h1 class='mb-2 text-2xl font-bold tracking-tight text-red-500'>" . $e->getMessage() . "</h1> ";
                                   }

                            ?>
                                   <section class="mt-4 p-2 rounded-lg bg-white">
                                          <?php if (isset($_GET['error'])) : ?>
                                                 <span class="text-red-500"><?= $_GET['error'] ?>
                                                 </span>
                                          <?php endif; ?>
                                          <div class="flex justify-between items-center p-2">
                                                 <p class="text-md"><?= "Done getting " . count($links) . " links for <i>$host</i> in <b>$time</b> Seconds"; ?></p>
                                                 <button onclick="CopyToClipboard('div1')" class="text-white bg-orange-400 cursor-not-allowed font-medium rounded-lg text-sm px-3 py-2 text-center" disabled>Copy Links</button>
                                          </div>

                                          <div class="p-2 overflow-y-auto h-96">
                                                 <?php $count = 1; ?>
                                                 <?php foreach ($links as $link) : ?>
                                                        <p class='font-normal text-gray-700'><a class="text-blue-600 hover:underline" href="<?= $link; ?>"><?= $link; ?></a></p>
                                                        <?php $count++; ?>
                                                 <?php endforeach; ?>

                                          </div>
                                   </section>
                                   <section class="mt-2 flex justify-between">
                                          <div class="hidden bg-gray-50 rounded-lg">
                                          </div>
                                   </section>
                     </div>

              </article>
       </section>
</main>





<div>



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
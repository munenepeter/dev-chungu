<?php

use Smalot\PdfParser\Parser;

include_once 'base.view.php';
include_once 'sections/admin-nav.view.php';
?>


<div class="space-y-4 p-4 mt-6 ">
    <div class="flex justify-between">
        <p class="mt-2 mx-auto">
            Searching for the following Keywords: <br><br>
            <?php foreach ($s_keyWords as $keyWord) : ?>
                <?php $keyWord = json_decode($keyWord); ?>
                <button style="background-color:<?= $keyWord->color; ?>;" type="button" class="text-white focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-2 py-1 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><?= $keyWord->word; ?></button>
            <?php endforeach; ?>
        </p>

        <div x-data="{ open: false }">
            <button @click.prevent="open = true" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add Keyword</button>
            <template x-if="open">
                <div class="absolute top-0 left-0 w-full h-full flex items-center justify-center z-10" style="background-color: rgba(0,0,0,.5);">
                    <div class="text-left bg-green-50 h-auto p-2 md:max-w-xl md:p-2 lg:p-4 shadow-xl rounded mx-2 md:mx-0" @click.away="open = false">
                        <div class="border bg-white p-4 max-w-md rounded-lg">
                            <div class="sm:flex sm:items-start">
                                <div class="text-center sm:text-left mt-2">
                                    <div class="p-2 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                                        <h1 class="mb-2 text-md font-bold tracking-tight">
                                            Add one Keyword at a time
                                        </h1>
                                        <div class="p-2">
                                            <h1 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">
                                                <?php if (isset($_GET['message'])) : ?>
                                                    <span class="text-red-500"><?= $_GET['message'] ?>
                                                    </span>
                                                <?php endif; ?>
                                            </h1>
                                            <form action="projects/jwg/scrapword?back=/<?= request_uri(); ?>" method="post">
                                                <div class="mb-6">
                                                    <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Add one Keyword at a time</label>
                                                    <input type="text" name="keyword" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                                </div>
                                                <div class="px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                                    <button name="submit" type="submit" class="ml-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Save</button>
                                                    <button @click="open = false" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-green-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cancel</button>
                                                </div>
                                            </form>

                                            <?php
                                            if (in_array(strtolower($keyword), $st_keywords)) {
                                                echo "Keyword is already present!";
                                                exit;
                                            }
                                            ?>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </template>
        </div>
    </div>

    <div class="p-6 mx-auto max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
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
            <button name="submit" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Go</button>
        </form>
    </div>
    <?php
    if (isset($_GET['submit'])) {

        if (empty($_GET['url'])) {
            $error = urlencode("No URL was provided!!");
            header("Location:index.php?error=$error");
        }


        function wp_strip_all_tags($string, $remove_breaks = false) {
            $string = preg_replace('@<(script|style)[^>]*?>.*?</\\1>@si', '', $string);
            $string = strip_tags($string);

            if ($remove_breaks) {
                $string = preg_replace('/[\r\n\t ]+/', ' ', $string);
            }

            return trim($string);
        }
        function highlightWords($text, $word) {
            $text = preg_replace(' # ' . preg_quote($word->word) . ' #i ', '<span name="keywords_found" class="underline rounded font-semibold text-white" style="background-color:' . $word->color . ';">\\0</span>', $text);
            return "<p class='font-normal text-gray-700'>$text</p>";
        }

        $html = file_get_contents($_GET['url']);

        $parser = new Parser();

        if (str_contains($_GET['url'], ".pdf")) {
            $text = $parser->parseContent($html)->getText();
        } else {
            $text = wp_strip_all_tags($html);
        }

        foreach ($s_keyWords as $keyWord) {
            $keyWord = json_decode($keyWord);
            $text =  highlightWords($text, $keyWord);
        }
    ?>

        <div>
            <p class="mb-2"><span id="keywords_found" class="text-red-500 hover:underline font-semibold italic"></span></p>
            <div class="border m-4 p-2 rounded-md">
                <?php echo $text ?>
            </div>
        </div>
    <?php
    }
    ?>
</div>
</body>

</html>
<script>
    let keywords_found = [];
    document.getElementsByName('keywords_found').forEach(data => {
        keywords_found.push(data.innerHTML.toLowerCase());
    });
    let unique = [...new Set(keywords_found)];

    if (unique.length > 0) {
        document.getElementById('keywords_found').innerText = "Found the following keywords:  " + unique.toString();
    } else {
        document.getElementById('keywords_found').innerText = "Oops, no Keywords were found!"
    }
</script>
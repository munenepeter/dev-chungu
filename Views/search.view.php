<?php
include_once 'base.view.php';
include_once 'sections/nav.view.php';
?>
<style>
    /* For Webkit-based browsers (Chrome, Safari and Opera) */
    .scrollbar-hide::-webkit-scrollbar {
        display: none;
    }

    /* For IE, Edge and Firefox */
    .scrollbar-hide {
        -ms-overflow-style: none;
        /* IE and Edge */
        scrollbar-width: none;
        /* Firefox */
    }
</style>

<?php

$array = json_decode(json_encode($lis), true);


function search($term, $array) {

    $term = strtolower($term);
    $primary_result = null;
    $suggested_results = array();
    foreach ($array as $item) {
        $word_lower = strtolower($item["name"]);
        $abbr_lower = strtolower($item["abbr"]);
        if (preg_match("/$term/i", $word_lower) || preg_match("/$term/i", $abbr_lower)) {
            if ($primary_result === null) {
                $primary_result = $item;
                yield $primary_result;
            } else {
                $suggested_result = $item;
                $suggested_results[] = $suggested_result;
                yield $suggested_result;
            }
        }
    }
}

?>



<div class="grid place-items-center bg-gray-100" id="main">
    <div class="max-w-sm md:max-w-lg bg-gray-100 px-4 md:px-8 py-14">
        <div class="relative bg-white flex-auto border-none rounded-xl ">
            <input name="search" hx-post="/projects/jwg/leg-initia/search" hx-trigger="keyup changed delay:500ms, search" hx-target="#lis" type="search" aria-label="Search all lis" placeholder="Search all Legislative initiatives..." class="block w-full appearance-none border-none  rounded-xl bg-transparent  pr-4 pl-10 text-base text-slate-900 transition placeholder:text-slate-400 focus:outline-none focus:ring-0">

            <svg viewBox="0 0 20 20" aria-hidden="true" class="pointer-events-none absolute inset-y-0 left-0 h-full ml-2 w-5 fill-slate-500 transition">
                <path d="M16.72 17.78a.75.75 0 1 0 1.06-1.06l-1.06 1.06ZM9 14.5A5.5 5.5 0 0 1 3.5 9H2a7 7 0 0 0 7 7v-1.5ZM3.5 9A5.5 5.5 0 0 1 9 3.5V2a7 7 0 0 0-7 7h1.5ZM9 3.5A5.5 5.5 0 0 1 14.5 9H16a7 7 0 0 0-7-7v1.5Zm3.89 10.45 3.83 3.83 1.06-1.06-3.83-3.83-1.06 1.06ZM14.5 9a5.48 5.48 0 0 1-1.61 3.89l1.06 1.06A6.98 6.98 0 0 0 16 9h-1.5Zm-1.61 3.89A5.48 5.48 0 0 1 9 14.5V16a6.98 6.98 0 0 0 4.95-2.05l-1.06-1.06Z"></path>
            </svg>
        </div>
    </div>
</div>

<div class="my-10">

    <form action="">
        <input type="search" name="q" id="">
        <button type="submit">Search</button>
    </form>

</div>
<?php


if (isset($_GET["q"])) {
    $results = search($_GET["q"], $array);
    $primary_result = null;
    $suggested_results = array();
    foreach ($results as $result) {
        if ($primary_result === null) {
            $primary_result = $result;
        } else {
            $suggested_results[] = $result;
        }
    }
    if ($primary_result !== null) {
        echo "<p>Primary result:</p>";
        echo "<ul>";
        echo "<li>" . $primary_result["name"] . " (" . $primary_result["abbr"] . ")</li>";
        echo "</ul>";
        if (!empty($suggested_results)) {
            echo "<p>Suggested results:</p>";
            echo "<ul>";
            foreach ($suggested_results as $result) {
                echo "<li>" . $result["name"] . " (" . $result["abbr"] . ")</li>";
            }
            echo "</ul>";
        }
    } else {
        echo "No results found.";
    }
}

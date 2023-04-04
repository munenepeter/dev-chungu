<?php include_once 'base.view.php';
include_once 'sections/nav.view.php';
?>


<!-- Hero-->
<div class="md:mt-20 mt-16">
    <div class="container px-2 p-4 lg:p-4 mx-auto bg-purple-100 rounded-md">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-center">
            <div class="hero-text col-span-6">
                <h1 class="font-bold text-2xl md:text-5xl max-w-xl text-purple-900 leading-tight">Modern Web solutions for your business</h1>
                <hr class="w-12 h-1 bg-orange-500 rounded-full mt-4">
                <p class="text-gray-800 text-base leading-relaxed mt-4 font-semibold">We are a team of digital experts equipped with skills to help your dream solution become a reality.</p>
                <button class="mt-6 rounded-lg bg-orange-800 px-6 py-2.5 text-center text-sm font-medium leading-5 text-white hover:bg-orange-700 focus:outline-none lg:mx-0 lg:w-auto">Get
                    a Free Qoute</button>
            </div>
            <div class="col-span-6">
                <img class="" src="<?php asset("imgs/hero.png") ?>" alt="">
            </div>
        </div>
    </div>
</div>
<!-- What We Provide -->
<section class="bg-purple-50 body-font">
    <div class="container px-2 py-6 mx-auto">
        <div class="flex flex-wrap w-full mb-10 flex-col items-center text-center">
            <h1 class="sm:text-3xl text-3xl font-medium title-font mb-4 text-purple-900">
                What We Provide
            </h1>
            <p class="lg:w-1/2 w-full leading-relaxed text-gray-800 text-lg">We are a team of experienced professionals who specialize in creating high-quality websites and web applications for businesses of all sizes. </p>
        </div>

        <div class="grid grid-cols-2 lg:grid-cols-3 items-center gap-1 p-2">
            <?php for ($i = 0; $i < 3; $i++) : ?>
                <div class="p-4 border border-gray-200 p-6 rounded-lg bg-gradient-to-r from-purple-100  to-purple-200 bg-opacity-75">
                    <div class="w-10 h-10 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-4">
                        <img src="https://munenepeter.github.io/gwaladigital/assets/Webdesign.svg" alt="Digital Marketing Icon">
                    </div>
                    <h2 class="text-lg text-gray-900 font-medium title-font mb-2">Web Design</h2>
                    <p class="leading-relaxed text-base">Lorem ipsum dolor sit amet. Alias libero aut, molestias officiis aliquid qui nisi! Distinctio repudiandae non accusantium laudantium amet possimus sint, sit quia deserunt? Quae magni accusantium</p>
                </div>
            <?php endfor; ?>
        </div>
        <button id="to-all-services" class="flex mx-auto mt-10 text-white bg-orange-800 border-0 py-2 px-10 focus:outline-none hover:bg-orange-700 rounded text-lg">Get
            All</button>
    </div>
</section>
<!-- End Our Solutions Section -->



<section class="p-6 bg-purple-50 text-gray-900 shadow-2xl border border-purple-50">
    <div class="py-8 lg:py-16 px-4 mx-auto max-w-screen-md">
        <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-center text-gray-900 dark:text-white">Contact Us</h2>
        <p class="mb-8 lg:mb-16 font-light text-center text-gray-500 dark:text-gray-400 sm:text-xl">Got a technical issue? Want to send feedback about a beta feature? Need details about our Business plan? Let us know.</p>
        <form action="#" class="space-y-8">
            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Your email</label>
                <input type="email" id="email" class="shadow-sm bg-gray-50 border border-purple-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500 dark:shadow-sm-light" placeholder="name@chungu.co.ke" required>
            </div>
            <div>
                <label for="subject" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Subject</label>
                <input type="text" id="subject" class="block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-purple-300 shadow-sm focus:ring-purple-500 focus:border-purple-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500 dark:shadow-sm-light" placeholder="Let us know how we can help you" required>
            </div>
            <div class="sm:col-span-2">
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Your message</label>
                <textarea id="message" rows="6" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-purple-300 focus:ring-purple-500 focus:border-purple-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500" placeholder="Leave a comment..."></textarea>
            </div>
            <button type="submit" class="py-3 px-5 text-sm font-medium text-center text-white rounded-lg bg-purple-700 sm:w-fit hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-blue-800">Send message</button>
        </form>
    </div>
</section>

<?php include_once 'sections/footer.view.php'     ?>
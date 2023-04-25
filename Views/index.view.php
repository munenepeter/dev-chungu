<?php include_once 'base.view.php';
include_once 'sections/nav.view.php';
?>


<!-- Hero-->
<div class="md:mt-20 mt-16">
    <div class="container px-2 p-4 lg:p-4 mx-auto bg-rose-100 rounded-md">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-center">
            <div class="hero-text col-span-6">
                <h1 class="font-bold text-2xl md:text-5xl max-w-xl text-purple-900 leading-tight">Modern Web solutions for your business</h1>
                <hr class="w-12 h-1 bg-orange-500 rounded-full mt-4">
                <p class="text-gray-800 text-base leading-relaxed mt-4 font-semibold">We are a team of digital experts equipped with skills to help your dream solution become a reality.</p>
                <button class="mt-6 rounded-lg bg-orange-800 px-6 py-2.5 text-center text-sm font-medium leading-5 text-white hover:bg-orange-700 focus:outline-none lg:mx-0 lg:w-auto">Get
                    a Free Qoute</button>
            </div>
            <div class="col-span-6">
                <img class="" src="<?php asset("imgs/hero.png") ?>" alt="Hero">
            </div>
        </div>
    </div>
</div>
<!-- What We Provide -->
<section class="bg-purple-50 body-font mt-6">
    <div class="container px-2 py-6 mx-auto">
        <div class="flex flex-wrap w-full mb-10 flex-col items-center text-center">
            <h1 class="sm:text-3xl text-3xl font-medium title-font mb-4 text-orange-800">
                What We Provide
            </h1>
            <p class="lg:w-1/2 w-full leading-relaxed text-gray-800 text-lg">We are a team of experienced professionals who specialize in creating high-quality websites and web applications for businesses of all sizes. </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 items-center md:mx-16 gap-1">

            <div class="p-4 rounded-lg bg-gradient-to-r from-rose-50 to-rose-100 bg-opacity-75 hover:to-white hover:shadow-md hover:border border-rose-200">
                <div class="w-10 h-10 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-full h-full text-rose-900">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.25 9.75L16.5 12l-2.25 2.25m-4.5 0L7.5 12l2.25-2.25M6 20.25h12A2.25 2.25 0 0020.25 18V6A2.25 2.25 0 0018 3.75H6A2.25 2.25 0 003.75 6v12A2.25 2.25 0 006 20.25z" />
                    </svg>
                </div>
                <h2 class="text-lg text-gray-900 font-bold title-font mb-2 text-orange-800">Web Development</h2>
                <p class="leading-relaxed text-base">Our Web Development services are designed to help businesses of all sizes create a powerful online presence. We use the latest technologies and best practices to deliver high-quality, responsive websites that look great on all devices.</p>
            </div>

            <div class="p-4 rounded-lg bg-gradient-to-r from-rose-50 to-rose-100 bg-opacity-75 hover:to-white hover:shadow-md hover:border border-rose-200">
                <div class="w-10 h-10 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-full h-full text-rose-900">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25" />
                    </svg>

                </div>
                <h2 class="text-lg text-gray-900 font-bold title-font mb-2 text-orange-800">System Maintenance</h2>
                <p class="leading-relaxed text-base">Our services include ongoing monitoring, maintenance, and optimization of your IT systems to ensure they are always performing at their best. We proactively identify and resolve issues before they impact your operations, saving you time and money.</p>
            </div>

            <div class="p-4 rounded-lg bg-gradient-to-r from-rose-50 to-rose-100 bg-opacity-75 hover:to-white hover:shadow-md hover:border border-rose-200">
                <div class="w-10 h-10 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-full h-full text-rose-900">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1 3m8.5-3l1 3m0 0l.5 1.5m-.5-1.5h-9.5m0 0l-.5 1.5m.75-9l3-3 2.148 2.148A12.061 12.061 0 0116.5 7.605" />
                    </svg>
                </div>
                <h2 class="text-lg text-gray-900 font-bold title-font mb-2 text-orange-800">IT Consulting</h2>
                <p class="leading-relaxed text-base">Our IT Consulting services provide strategic guidance and support to help you make informed decisions about your technology investments. We work closely with you to understand your business goals and identify areas where technology can drive growth and innovation.</p>

            </div>
        </div>
        <button class="flex mx-auto mt-10 text-white bg-orange-800 border-0 py-2 px-10 focus:outline-none hover:bg-orange-700 rounded text-lg">Get Qoute</button>

</section>
<!-- End Our Solutions Section -->



<section class="p-6 bg-purple-50 text-gray-900 shadow-lg border border-purple-50">
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
<?php include_once 'base.view.php';
include_once 'sections/nav.view.php';
?>

<!-- Hero-->
<div class="md:mt-18 mt-12">
    <div class="container px-2 p-4 lg:p-4 mx-auto bg-rose-100 rounded-md">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-center">
            <div class="hero-text col-span-6">
                <h1 class="font-bold text-2xl md:text-5xl max-w-xl text-purple-900 leading-tight">Modern Web solutions for your business</h1>
                <hr class="w-12 h-1 bg-orange-500 rounded-full mt-4">
                <p class="text-gray-800 text-base leading-relaxed mt-4 font-semibold">We are a team of digital experts equipped with skills to help your dream solution become a reality.</p>

                <!-- Qoute Modal toggle -->
                <button id="getQouteModalButton" data-modal-toggle="getQouteModal" class="mt-6 rounded-lg bg-orange-800 px-6 py-2.5 text-center text-sm font-medium leading-5 text-white hover:bg-orange-700 focus:outline-none lg:mx-0 lg:w-auto" type="button">
                    Get
                    a Free Qoute
                </button>

            </div>
            <div class="col-span-6">
                <img class="" src="<?php asset("imgs/hero.png") ?>" alt="Hero">
            </div>
        </div>
    </div>
</div>



<!-- Get Qoute modal -->
<div id="getQouteModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
            <!-- Modal header -->
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Let's Get Started on Your Project
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="getQouteModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form action="#" method="post">
                <div class="grid gap-4 mb-4 sm:grid-cols-2">
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Type your name" required="">
                    </div>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Your email" required="">
                    </div>
                    <div>
                        <label for="project_title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Project Title</label>
                        <input type="text" name="project_title" id="project_title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Your project name" required="">
                    </div>
                    <div>
                        <label for="project_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Project Type</label>
                        <select id="project_type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected="">Select type of project</option>
                            <option value="web_design">Website Design</option>
                            <option value="web_dev">Website Development</option>
                            <option value="web_main">Website & System Maintenance</option>
                            <option value="data_analysis">Data Analysis (Excel)</option>
                            <option value="it_auto_script">IT Automation (scripting)</option>
                            <option value="it_consult">IT Consulting</option>
                        </select>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Project Description</label>
                        <textarea id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your project description here"></textarea>
                    </div>
                </div>
                <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">

                    Get Your Custom Quote
                    <svg class="-mr-1 ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </form>
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
                <h2 class="text-lg font-bold title-font mb-2 text-orange-800">Web Development</h2>
                <p class="leading-relaxed text-base">Our Web Development services are designed to help businesses of all sizes create a powerful online presence. We use the latest technologies and best practices to deliver high-quality, responsive websites that look great on all devices.</p>
            </div>

            <div class="p-4 rounded-lg bg-gradient-to-r from-rose-50 to-rose-100 bg-opacity-75 hover:to-white hover:shadow-md hover:border border-rose-200">
                <div class="w-10 h-10 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-full h-full text-rose-900">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25" />
                    </svg>

                </div>
                <h2 class="text-lg  font-bold title-font mb-2 text-orange-800">System Maintenance</h2>
                <p class="leading-relaxed text-base">Our services include ongoing monitoring, maintenance, and optimization of your systems to ensure they are always performing at their best. We proactively identify and resolve issues before they impact your operations, saving you time and money.</p>
            </div>

            <div class="p-4 rounded-lg bg-gradient-to-r from-rose-50 to-rose-100 bg-opacity-75 hover:to-white hover:shadow-md hover:border border-rose-200">
                <div class="w-10 h-10 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-full h-full text-rose-900">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1 3m8.5-3l1 3m0 0l.5 1.5m-.5-1.5h-9.5m0 0l-.5 1.5m.75-9l3-3 2.148 2.148A12.061 12.061 0 0116.5 7.605" />
                    </svg>
                </div>
                <h2 class="text-lg  font-bold title-font mb-2 text-orange-800">IT Consulting</h2>
                <p class="leading-relaxed text-base">Our IT Consulting services provide strategic guidance and support to help you make informed decisions about your technology investments. We work closely with you to understand your goals and identify areas where technology can drive growth and innovation.</p>

            </div>
        </div>
        <button class="flex mx-auto mt-10 text-white bg-orange-800 border-0 py-2 px-10 focus:outline-none hover:bg-orange-700 rounded text-lg">Get Qoute</button>

</section>
<!-- End Our Solutions Section -->



<section class="p-6 bg-purple-50 text-gray-900 shadow-md border border-purple-50">
    <div class="py-8 lg:py-16 px-4 mx-auto max-w-screen-md">
        <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-center text-gray-900 dark:text-white">Contact Us</h2>
        <p class="mb-8 lg:mb-16 font-light text-center text-rose-800 dark:text-gray-400 sm:text-xl">Got a technical issue? Want to send feedback about a project? Need details about our operations? Let us know.</p>
        <form action="#" class="space-y-8">
            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Your email</label>
                <input type="email" id="email" class="shadow-sm bg-rose-50 border border-purple-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500 dark:shadow-sm-light" placeholder="name@chungu.co.ke" required>
            </div>
            <div>
                <label for="subject" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Subject</label>
                <input type="text" id="subject" class="block p-3 w-full text-sm text-gray-900 bg-rose-50 rounded-lg border border-purple-300 shadow-sm focus:ring-purple-500 focus:border-purple-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500 dark:shadow-sm-light" placeholder="Let us know how we can help you" required>
            </div>
            <div class="sm:col-span-2">
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Your message</label>
                <textarea id="message" rows="6" class="block p-2.5 w-full text-sm text-gray-900 bg-rose-50 rounded-lg shadow-sm border border-purple-300 focus:ring-purple-500 focus:border-purple-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500" placeholder="Leave a comment..."></textarea>
            </div>
            <button type="submit" class="py-3 px-5 text-sm font-medium text-center text-white rounded-lg bg-purple-700 sm:w-fit hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-blue-800">Send message</button>
        </form>
    </div>
</section>

<?php include_once 'sections/footer.view.php'     ?>
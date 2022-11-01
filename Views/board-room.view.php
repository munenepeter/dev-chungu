<?php
include_once 'base.view.php';
include_once 'sections/nav.view.php';
?>
 <script src="https://cdn.tailwindcss.com"></script>

<body class="bg-gray-100">
    <div class="h-screen w-screen bg-indigo-400 overflow-hidden absolute flex items-center">
        <div class="w-screen h-64 absolute top-0 opacity-50 left-0 -my-40 -mx-64 bg-indigo-300 rounded-full"></div>
        <div class="w-64 h-64 -mx-32 bg-indigo-300 opacity-50 rounded-full"></div>
        <div class="w-64 h-64 ml-auto relative opacity-50 -mr-32 bg-indigo-300 rounded-full"></div>
        <div class="w-screen h-64 absolute opacity-50 bottom-0 right-0 -my-40 -mx-64 bg-indigo-300 rounded-full"></div>
    </div>

    <div class="container mx-auto h-screen py-16 px-8 relative">
        <div class="flex w-full rounded-lg h-full lg:overflow-hidden overflow-auto lg:flex-row flex-col shadow-2xl">
            <div class="lg:w-1/2 bg-white text-white flex flex-col">
                <div class="p-8 shadow-md relative bg-white">
                    <div class="flex items-center">
                        <div id="date" class="text-indigo-600 text-xl font-medium">Tue 18th Oct 2022</div>
                        <button
                            class="bg-indigo-100 text-indigo-400 ml-auto w-8 h-8 flex items-center justify-center rounded">
                            <svg stroke="currentColor" class="w-4 h-4" viewBox="0 0 24 24" stroke-width="2.2"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 8A6 6 0 006 8c0 7-3 9-3 9h18s-3-2-3-9M13.73 21a2 2 0 01-3.46 0" />
                            </svg>
                        </button>
                    </div>
                    <h1 class="font-medium text-indigo-500 text-lg mt-6">Schedule List (in dev)</h1>
                    <p class="text-gray-600 text-sm">Tuesday's board room schedule</p>
                    <div class="mt-6 flex">
                        <button class="bg-indigo-500 text-white py-2 text-sm px-3 rounded focus:outline-none">New
                            Meeting</button>
                        <div class="relative ml-auto flex-1 pl-8 sm:block hidden">
                            <input placeholder="Search" type="text"
                                class="w-full border rounded border-gray-400 h-full focus:outline-none pl-4 pr-8 text-gray-700 text-sm text-gray-500">

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-4 h-4 absolute right-0 top-0 mt-3 mr-2 text-gray-500">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                            </svg>

                        </div>
                    </div>
                </div>
                <div class="overflow-auto flex-grow">
                    <div class="border-b pb-4 border-gray-400 border-dashed p-4">
                        <p class="text-xs font-light leading-3 text-indigo-300">9:00 AM - 10:00AM</p>
                        <a tabindex="0"
                            class="focus:outline-none text-lg font-medium leading-5 text-indigo-500 pt-2">Zoom call with
                            design team</a>
                        <p class="text-xs text-gray-600">Booked by Max</p>
                    </div>
                    <div class="border-b pb-4 border-gray-400 border-dashed p-4">
                        <p class="text-xs font-light leading-3 text-indigo-300">2:00 PM - 4:00 PM</p>
                        <a tabindex="0"
                            class="focus:outline-none text-lg font-medium leading-5 text-indigo-500 pt-2">Orientation
                            session with new hires</a>
                        <p class="text-xs text-gray-600">Booked by Peter</p>
                    </div>

                </div>
            </div>
            <div class="lg:w-1/2 bg-indigo-600 text-white flex flex-col">
                <div class="p-8 bg-indigo-700 flex items-center">
                    <img src="https://ui-avatars.com/api/?name=zoom+call&background=random"
                        class="w-16 h-16 mr-4 object-top object-cover rounded" />
                    <div class="mr-auto">
                        <h1 class="text-xl leading-none mb-1">Zoom call with design team</h1>
                        <h2 class="text-indigo-400 text-sm">Peter, Max, June, Sam, Becky, Lucy, Vlad...</h2>
                    </div>
                    <button class="bg-indigo-600 text-white py-2 text-sm px-3 rounded focus:outline-none">New
                        Meeting</button>
                </div>
                <div class="p-8 flex flex-1 items-start overflow-auto">
                    <div class="flex-shrink-0 text-sm sticky top-0">
                        <div class="flex items-center text-white mb-3">Open <span
                                class="italic text-sm ml-1 text-indigo-300">(10)</span></div>
                        <div class="flex items-center text-indigo-300 mb-3">In Progress <span
                                class="italic text-sm ml-1">(8)</span></div>
                        <div class="flex items-center text-indigo-300">Closed <span
                                class="italic text-sm ml-1">(4)</span></div>
                    </div>
                    <div class="flex-1 pl-10">

                        <div class="mt-4 flex items-center justify-between py-4 overflow-x-auto bg-gray-200 rounded-md">
                            <table class="w-full">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="w-full flex justify-center">
                                                <p
                                                    class="text-base font-medium text-center text-indigo-500 dark:text-gray-100">
                                                    Mo</p>
                                            </div>
                                        </th>
                                        <th>
                                            <div class="w-full flex justify-center">
                                                <p
                                                    class="text-base font-medium text-center text-indigo-500 dark:text-gray-100">
                                                    Tu</p>
                                            </div>
                                        </th>
                                        <th>
                                            <div class="w-full flex justify-center">
                                                <p
                                                    class="text-base font-medium text-center text-indigo-500 dark:text-gray-100">
                                                    We</p>
                                            </div>
                                        </th>
                                        <th>
                                            <div class="w-full flex justify-center">
                                                <p
                                                    class="text-base font-medium text-center text-indigo-500 dark:text-gray-100">
                                                    Th</p>
                                            </div>
                                        </th>
                                        <th>
                                            <div class="w-full flex justify-center">
                                                <p
                                                    class="text-base font-medium text-center text-indigo-500 dark:text-gray-100">
                                                    Fr</p>
                                            </div>
                                        </th>
                                        <th>
                                            <div class="w-full flex justify-center">
                                                <p
                                                    class="text-base font-medium text-center text-indigo-500 dark:text-gray-100">
                                                    Sa</p>
                                            </div>
                                        </th>
                                        <th>
                                            <div class="w-full flex justify-center">
                                                <p
                                                    class="text-base font-medium text-center text-indigo-500 dark:text-gray-100">
                                                    Su</p>
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="pt-6">
                                            <div class="px-2 py-2 cursor-pointer flex w-full justify-center"></div>
                                        </td>
                                        <td class="pt-6">
                                            <div class="px-2 py-2 cursor-pointer flex w-full justify-center"></div>
                                        </td>
                                        <td>
                                            <div class="px-2 py-2 cursor-pointer flex w-full justify-center"></div>
                                        </td>
                                        <td class="pt-6">
                                            <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                <p class="text-base text-gray-500 dark:text-gray-100 font-medium">1</p>
                                            </div>
                                        </td>
                                        <td class="pt-6">
                                            <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                <p class="text-base text-gray-500 dark:text-gray-100 font-medium">2</p>
                                            </div>
                                        </td>
                                        <td class="pt-6">
                                            <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                <p class="text-base text-gray-500 dark:text-gray-100">3</p>
                                            </div>
                                        </td>
                                        <td class="pt-6">
                                            <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                <p class="text-base text-gray-500 dark:text-gray-100">4</p>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                <p class="text-base text-gray-500 dark:text-gray-100 font-medium">5</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                <p class="text-base text-gray-500 dark:text-gray-100 font-medium">6</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                <p class="text-base text-gray-500 dark:text-gray-100 font-medium">7</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="w-full h-full">
                                                <div
                                                    class="flex items-center justify-center w-full rounded-full cursor-pointer">
                                                    <a role="link" tabindex="0"
                                                        class="focus:outline-none  focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 focus:bg-indigo-500 hover:bg-indigo-500 text-base w-8 h-8 flex items-center justify-center font-medium text-white bg-indigo-700 rounded-full">8</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                <p class="text-base text-gray-500 dark:text-gray-100 font-medium">9</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                <p class="text-base text-gray-500 dark:text-gray-100">10</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                <p class="text-base text-gray-500 dark:text-gray-100">11</p>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                <p class="text-base text-gray-500 dark:text-gray-100 font-medium">12</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                <p class="text-base text-gray-500 dark:text-gray-100 font-medium">13</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                <p class="text-base text-gray-500 dark:text-gray-100 font-medium">14</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                <p class="text-base text-gray-500 dark:text-gray-100 font-medium">15</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                <p class="text-base text-gray-500 dark:text-gray-100 font-medium">16</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                <p class="text-base text-gray-500 dark:text-gray-100">17</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                <p class="text-base text-gray-500 dark:text-gray-100">18</p>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                <p class="text-base text-gray-500 dark:text-gray-100 font-medium">19</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                <p class="text-base text-gray-500 dark:text-gray-100 font-medium">20</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                <p class="text-base text-gray-500 dark:text-gray-100 font-medium">21</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                <p class="text-base text-gray-500 dark:text-gray-100 font-medium">22</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                <p class="text-base text-gray-500 dark:text-gray-100 font-medium">23</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                <p class="text-base text-gray-500 dark:text-gray-100">24</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                <p class="text-base text-gray-500 dark:text-gray-100">25</p>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                <p class="text-base text-gray-500 dark:text-gray-100 font-medium">26</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                <p class="text-base text-gray-500 dark:text-gray-100 font-medium">27</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                <p class="text-base text-gray-500 dark:text-gray-100 font-medium">28</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                <p class="text-base text-gray-500 dark:text-gray-100 font-medium">29</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                <p class="text-base text-gray-500 dark:text-gray-100 font-medium">30</p>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="fixed h-screen right-0 top-0 items-center flex">
        <div
            class="p-2 bg-white border-l-4 border-t-4 border-b-4 border-indigo-400 inline-flex items-center rounded-tl-lg shadow-2xl rounded-bl-lg z-10 flex-col">
            <button class="bg-gray-500 w-5 h-5 rounded-full mb-2 outline-none focus:outline-none"
                theme-button="gray"></button>
            <button class="bg-red-500 w-5 h-5 rounded-full mb-2 outline-none focus:outline-none"
                theme-button="red"></button>
            <button class="bg-orange-500 w-5 h-5 rounded-full mb-2 outline-none focus:outline-none"
                theme-button="orange"></button>
            <button class="bg-green-500 w-5 h-5 rounded-full mb-2 outline-none focus:outline-none"
                theme-button="green"></button>
            <button class="bg-teal-500 w-5 h-5 rounded-full mb-2 outline-none focus:outline-none"
                theme-button="teal"></button>
            <button class="bg-blue-500 w-5 h-5 rounded-full mb-2 outline-none focus:outline-none"
                theme-button="blue"></button>
            <button class="bg-indigo-500 w-5 h-5 rounded-full mb-2 outline-none focus:outline-none"
                theme-button="indigo"></button>
            <button class="bg-purple-500 w-5 h-5 rounded-full mb-2 outline-none focus:outline-none"
                theme-button="purple"></button>
            <button class="bg-pink-500 w-5 h-5 rounded-full outline-none focus:outline-none"
                theme-button="pink"></button>
        </div>
    </div>


    <script>
        const allElements = document.querySelectorAll('*:not([theme-button]):not([class*="gray"])');
        const themeButtons = document.querySelectorAll('[theme-button]');
        const escapeRegExp = (string) => string.replace(/[.*+?^${}()|[\]\\]/g, "\\$&");
        const replaceAll = (str, term, replacement) => str.replace(new RegExp(escapeRegExp(term), 'g'), replacement);
        let currTheme = 'indigo';

        const changeTheme = (theme) => {
            allElements.forEach((element) => {
                if (element.getAttribute('class') !== null) {
                    const newClasses = replaceAll(element.getAttribute('class'), currTheme, theme);
                    element.setAttribute('class', newClasses);
                }
            });
            currTheme = theme;
        }

        themeButtons.forEach((button) => {
            button.addEventListener('click', (e) => {
                changeTheme(e.target.getAttribute('theme-button'));
            });
        });


        function getCurrentDate() {
            var objToday = new Date(),
                weekday = ['Sun', 'Mon', 'Tue', 'Wed', 'Thur', 'Fri', 'Sat'],
                dayOfWeek = weekday[objToday.getDay()],
                domEnder = function () { var a = objToday; if (/1/.test(parseInt((a + "").charAt(0)))) return "th"; a = parseInt((a + "").charAt(1)); return 1 == a ? "st" : 2 == a ? "nd" : 3 == a ? "rd" : "th" }(),
                dayOfMonth = today + (objToday.getDate() < 10) ? '0' + objToday.getDate() + domEnder : objToday.getDate() + domEnder,
                months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'],
                curMonth = months[objToday.getMonth()],
                curYear = objToday.getFullYear(),
                curHour = objToday.getHours(),
                curMinute = objToday.getMinutes() < 10 ? "0" + objToday.getMinutes() : objToday.getMinutes(),
                curSeconds = objToday.getSeconds() < 10 ? "0" + objToday.getSeconds() : objToday.getSeconds(),
                curMeridiem = objToday.getHours() > 12 ? "PM" : "AM";
            var today = dayOfWeek + " " + dayOfMonth + " " + curMonth + ", " + curYear + " " + curHour + ":" + curMinute + "." + curSeconds;

            document.getElementById('date').textContent = today;
        }
        setInterval(getCurrentDate, 1000);
    </script>

    

</body>

</html>
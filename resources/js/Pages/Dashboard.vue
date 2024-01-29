<script setup>
import {
    LayoutDashboard,
    Computer,
    UserCog,
    BookOpenCheck,
    Settings,
    LogOut,
    CheckCircle2,
    BellDot,
    Search,
    ChevronLeft,
    ChevronRight,
    Bookmark,
    FileCheck2,
} from "lucide-vue-next";
</script>

<template>
    <div class="flex justify-between bg-gray-300">
        <!-- sidebar -->
        <div class="w-72 h-screen bg-gray-300">
            <div class="py-8 px-8 h-full fixed">
                <div class="flex justify-center items-center">
                    <img
                        class="w-12 h-12 rounded-full"
                        src="https://upload.wikimedia.org/wikipedia/commons/a/ab/Android_O_Preview_Logo.png"
                        alt=""
                    />
                    <div class="p-1">
                        <p class="text-gray-700 font-semibold">CAM Circle</p>
                        <p class="text-gray-500 text-sm">The best app ever</p>
                    </div>
                </div>

                <div
                    class="pt-8 px-4 flex flex-col h-full justify-between relative"
                >
                    <ul class="flex flex-col gap-4">
                        <li
                            class="flex items-center space-x-2 text-gray-700 cursor-pointer font-light"
                        >
                            <LayoutDashboard class="text-gray-500" />
                            <span>Dashboard</span>
                        </li>
                        <li
                            class="flex items-center space-x-2 text-gray-700 cursor-pointer font-light"
                        >
                            <Computer class="text-gray-500" />
                            <span>Room</span>
                        </li>
                        <li
                            class="flex items-center space-x-2 text-gray-700 cursor-pointer font-light"
                        >
                            <UserCog class="text-gray-500" />
                            <span>User</span>
                        </li>
                        <li
                            class="flex items-center space-x-2 text-gray-700 cursor-pointer font-light"
                        >
                            <BookOpenCheck class="text-gray-500" />
                            <span>Report</span>
                        </li>
                        <li
                            class="flex items-center space-x-2 text-gray-700 cursor-pointer font-light"
                        >
                            <Settings class="text-gray-500" />
                            <span>Setting</span>
                        </li>
                    </ul>
                    <ul class="absolute flex flex-col gap-4 mb-8 bottom-0">
                        <li
                            class="flex items-center space-x-2 text-gray-700 cursor-pointer font-light"
                        >
                            <LogOut class="text-gray-500" /><span>Logout</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="bg-gray-200 w-full h-full px-4 py-4">
            <div class="flex flex-col">
                <div
                    class="flex items-center justify-between bg-gray-100 rounded-lg p-4 shadow-md"
                >
                    <div class="flex gap-2 items-center">
                        <img
                            class="w-10 h-10 rounded-full"
                            src="https://img.freepik.com/free-psd/3d-illustration-human-avatar-profile_23-2150671159.jpg"
                            alt="profile"
                        />
                        <p class="text-gray-700 font-semibold">
                            Hello, Admin!👋
                        </p>
                    </div>

                    <div class="flex gap-2 items-center">
                        <div
                            class="bg-purple-500/[.1] rounded-lg p-2 cursor-pointer"
                        >
                            <CheckCircle2 class="text-blue-800 w-6 h-6 font" />
                        </div>
                        <div
                            class="bg-purple-500/[.1] rounded-lg p-2 cursor-pointer"
                        >
                            <BellDot class="text-blue-800 w-6 h-6 font" />
                        </div>
                        <div
                            class="bg-purple-500/[.1] rounded-lg p-2 cursor-pointer"
                        >
                            <Search class="text-blue-800 w-6 h-6 font" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex items-start justify-between gap-4 mt-4">
                <div
                    class="flex flex-col gap-2 w-full bg-gray-100 rounded-lg p-4 shadow-md"
                >
                    <div class="flex justify-between items-center w-full">
                        <p class="text-lg text-gray-700 font-semibold">
                            March 24
                        </p>
                        <div class="flex gap-2">
                            <ChevronLeft class="cursor-pointer text-gray-500" />
                            <ChevronRight
                                class="cursor-pointer text-gray-500"
                            />
                        </div>
                    </div>
                    <div
                        class="flex items-center justify-center w-full px-4 gap-4"
                    >
                        <div
                            class="flex flex-col gap-1 shadow-md bg-gray-100 rounded-2xl p-2 items-center justify-center opacity-50"
                        >
                            <p class="text-gray-700 font-light text-sm">MAR</p>
                            <p class="text-gray-700 font-semibold text-3xl">
                                25
                            </p>
                        </div>
                        <div
                            class="relative flex flex-col gap-1 shadow-md bg-gray-100 rounded-2xl p-2 items-center justify-center"
                        >
                            <p class="text-gray-700 font-light text-sm">MAR</p>
                            <p class="text-gray-700 font-semibold text-3xl">
                                26
                            </p>
                            <div
                                class="absolute bottom-0 border-2 border-red-500 w-1/5 rounded-full"
                            ></div>
                        </div>
                        <div
                            class="flex flex-col gap-1 shadow-md bg-gray-100 rounded-2xl p-2 items-center justify-center opacity-50"
                        >
                            <p class="text-gray-700 font-light text-sm">MAR</p>
                            <p class="text-gray-700 font-semibold text-3xl">
                                27
                            </p>
                        </div>
                        <div
                            class="flex flex-col gap-1 shadow-md bg-gray-100 rounded-2xl p-2 items-center justify-center opacity-50"
                        >
                            <p class="text-gray-700 font-light text-sm">MAR</p>
                            <p class="text-gray-700 font-semibold text-3xl">
                                28
                            </p>
                        </div>
                        <div
                            class="flex flex-col gap-1 shadow-md bg-gray-100 rounded-2xl p-2 items-center justify-center opacity-50"
                        >
                            <p class="text-gray-700 font-light text-sm">MAR</p>
                            <p class="text-gray-700 font-semibold text-3xl">
                                29
                            </p>
                        </div>
                        <div
                            class="flex flex-col gap-1 shadow-md bg-gray-100 rounded-2xl p-2 items-center justify-center opacity-50"
                        >
                            <p class="text-gray-700 font-light text-sm">MAR</p>
                            <p class="text-gray-700 font-semibold text-3xl">
                                30
                            </p>
                        </div>
                        <div
                            class="flex flex-col gap-1 shadow-md bg-gray-100 rounded-2xl p-2 items-center justify-center opacity-50"
                        >
                            <p class="text-gray-700 font-light text-sm">MAR</p>
                            <p class="text-gray-700 font-semibold text-3xl">
                                31
                            </p>
                        </div>
                    </div>
                    <div class="flex flex-col gap-2 w-full mt-4">
                        <p class="text-sm text-gray-700 font-semibold">
                            Notice Board
                        </p>
                        <div class="flex flex-col gap-2 w-full px-4">
                            <div class="flex gap-2 items-center">
                                <div class="bg-green-500/[.5] rounded-lg p-2">
                                    <FileCheck2 class="text-blue-800 w-6 h-6" />
                                </div>

                                <p class="text-gray-700 font-light text-am">
                                    Mid term check exam
                                </p>
                            </div>
                            <div class="flex gap-2 items-center">
                                <div class="bg-red-500/[.5] rounded-lg p-2">
                                    <FileCheck2 class="text-blue-800 w-6 h-6" />
                                </div>

                                <p class="text-gray-700 font-light text-am">
                                    Mid term check exam
                                </p>
                            </div>
                            <div class="flex gap-2 items-center">
                                <div class="bg-yellow-500/[.5] rounded-lg p-2">
                                    <FileCheck2 class="text-blue-800 w-6 h-6" />
                                </div>

                                <p class="text-gray-700 font-light text-am">
                                    Mid term check exam
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="flex flex-col gap-2 w-full bg-gray-100 rounded-lg p-4 shadow-md"
                >
                    <div class="flex justify-between items-center w-full">
                        <p class="text-lg text-gray-700 font-semibold">Event</p>
                        <div class="flex gap-2 items-center">
                            <ChevronLeft class="cursor-pointer text-gray-500" />
                            <p
                                class="text-gray-600 opacity-70 font-light text-sm"
                            >
                                2/3
                            </p>
                            <ChevronRight
                                class="cursor-pointer text-gray-500"
                            />
                        </div>
                    </div>
                    <div class="flex gap-2 w-fit">
                        <div
                            class="flex flex-col gap-2 w-fit bg-gray-100 border shadow-sm p-4"
                        >
                            <div class="w-full">
                                <img
                                    class="object-cover rounded-t-lg w-full"
                                    src="https://www.unicef.org/cambodia/sites/unicef.org.cambodia/files/styles/hero_tablet/public/ED_UNICEF_BK_Dec%2005%2C%202017_0086.jpg.webp?itok=TuYJhpRA"
                                    alt=""
                                />
                            </div>
                            <div class="flex justify-between items-center">
                                <p
                                    class="text-sm text-blue-500 opacity-70 font-light"
                                >
                                    REPORT
                                </p>
                                <p
                                    class="text-sm text-blue-500 opacity-70 font-light"
                                >
                                    March 2024
                                </p>
                            </div>
                            <h1 class="text-lg text-gray-700 font-semibold">
                                Cambodia Children is so Actively
                            </h1>
                            <p
                                class="text-sm text-gray-600 text-justify opacity-70 font-light"
                            >
                                Lorem ipsum, dolor sit amet consectetur
                                adipisicing elit. Distinctio, ad. Doloribus in
                                delectus voluptates hic nihil, unde accusantium
                                molestiae voluptas quod, aut aperiam quaerat!
                                Quis omnis sequi ducimus aspernatur error,
                                itaque adipisci. Lorem ipsum dolor sit amet
                                consectetur adipisicing elit. Tempora cupiditate
                                praesentium possimus culpa soluta sunt error
                                deserunt, eaque, debitis fugit modi officiis. At
                                molestias eligendi voluptates ipsam odio neque
                                sapiente similique dicta! Lorem ipsum, dolor sit
                                amet consectetur adipisicing elit. Distinctio,
                                ad. Doloribus in delectus voluptates hic nihil,
                                unde accusantium molestiae voluptas quod, aut
                                aperiam quaerat! Quis omnis sequi ducimus
                                aspernatur error, itaque adipisci. Lorem ipsum
                                dolor sit amet consectetur adipisicing elit.
                                Tempora cupiditate praesentium possimus culpa
                                soluta sunt error deserunt, eaque, debitis fugit
                                modi officiis. At molestias eligendi voluptates
                                ipsam odio neque sapiente similique dicta! Lorem
                                ipsum, dolor sit amet consectetur adipisicing
                                elit. Distinctio, ad. Doloribus in delectus
                                voluptates hic nihil, unde accusantium molestiae
                                voluptas quod, aut aperiam quaerat! Quis omnis
                                sequi ducimus aspernatur error, itaque adipisci.
                                Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Tempora cupiditate praesentium
                                possimus culpa soluta sunt error deserunt,
                                eaque, debitis fugit modi officiis. At molestias
                                eligendi voluptates ipsam odio neque sapiente
                                similique dicta!
                            </p>

                            <div class="flex justify-between items-center">
                                <div class="flex items-center gap-1">
                                    <div
                                        class="flex bg-gray-700/[.1] rounded-full p-1"
                                    >
                                        <Bookmark
                                            class="text-red-500 w-4 h-4"
                                        />
                                    </div>
                                    <p
                                        class="text-sm text-gray-900 text-center opacity-70 font-light"
                                    >
                                        NU Student
                                    </p>
                                </div>
                                <button
                                    class="hover:bg-blue-800 text-sm text-gray-100 px-4 py-2 rounded-lg font-light bg-blue-700"
                                >
                                    Read More
                                </button>
                            </div>
                        </div>
                        <div
                            class="flex flex-col gap-2 w-fit bg-gray-100 border shadow-sm p-4"
                        >
                            <div class="w-full">
                                <img
                                    class="object-cover rounded-t-lg w-full"
                                    src="https://www.unicef.org/cambodia/sites/unicef.org.cambodia/files/styles/hero_tablet/public/ED_UNICEF_BK_Dec%2005%2C%202017_0086.jpg.webp?itok=TuYJhpRA"
                                    alt=""
                                />
                            </div>
                            <div class="flex justify-between items-center">
                                <p
                                    class="text-sm text-blue-500 opacity-70 font-light"
                                >
                                    REPORT
                                </p>
                                <p
                                    class="text-sm text-blue-500 opacity-70 font-light"
                                >
                                    March 2024
                                </p>
                            </div>
                            <h1 class="text-lg text-gray-700 font-semibold">
                                Cambodia Children is so Actively
                            </h1>
                            <p
                                class="text-sm text-gray-600 text-justify opacity-70 font-light"
                            >
                                Lorem ipsum, dolor sit amet consectetur
                                adipisicing elit. Distinctio, ad. Doloribus in
                                delectus voluptates hic nihil, unde accusantium
                                molestiae voluptas quod, aut aperiam quaerat!
                                Quis omnis sequi ducimus aspernatur error,
                                itaque adipisci. Lorem ipsum dolor sit amet
                                consectetur adipisicing elit. Tempora cupiditate
                                praesentium possimus culpa soluta sunt error
                                deserunt, eaque, debitis fugit modi officiis. At
                                molestias eligendi voluptates ipsam odio neque
                                sapiente similique dicta! Lorem ipsum, dolor sit
                                amet consectetur adipisicing elit. Distinctio,
                                ad. Doloribus in delectus voluptates hic nihil,
                                unde accusantium molestiae voluptas quod, aut
                                aperiam quaerat! Quis omnis sequi ducimus
                                aspernatur error, itaque adipisci. Lorem ipsum
                                dolor sit amet consectetur adipisicing elit.
                                Tempora cupiditate praesentium possimus culpa
                                soluta sunt error deserunt, eaque, debitis fugit
                                modi officiis. At molestias eligendi voluptates
                                ipsam odio neque sapiente similique dicta! Lorem
                                ipsum, dolor sit amet consectetur adipisicing
                                elit. Distinctio, ad. Doloribus in delectus
                                voluptates hic nihil, unde accusantium molestiae
                                voluptas quod, aut aperiam quaerat! Quis omnis
                                sequi ducimus aspernatur error, itaque adipisci.
                                Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Tempora cupiditate praesentium
                                possimus culpa soluta sunt error deserunt,
                                eaque, debitis fugit modi officiis. At molestias
                                eligendi voluptates ipsam odio neque sapiente
                                similique dicta!
                            </p>

                            <div class="flex justify-between items-center">
                                <div class="flex items-center gap-1">
                                    <div
                                        class="flex bg-gray-700/[.1] rounded-full p-1"
                                    >
                                        <Bookmark
                                            class="text-red-500 w-4 h-4"
                                        />
                                    </div>
                                    <p
                                        class="text-sm text-gray-900 text-center opacity-70 font-light"
                                    >
                                        NU Student
                                    </p>
                                </div>
                                <button
                                    class="hover:bg-blue-800 text-sm text-gray-100 px-4 py-2 rounded-lg font-light bg-blue-700"
                                >
                                    Read More
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

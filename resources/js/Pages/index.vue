<script setup lang="ts">
import Layout from "@/Layouts/Layout.vue";
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
    <Layout>
        <div class="bg-gray-200 w-full h-screen px-4 py-4">
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
                                Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Suscipit quam porro nisi
                                tempora.
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
                                Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Porro magnam consectetur
                                atque.
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
    </Layout>
</template>

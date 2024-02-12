<script setup lang="ts">
import { useToggleSidebar } from "@/Stores/useToggleSidebar";
import TheSidebarItems from "@/Components/Layout/TheSidebarItems.vue";

const sidebar = useToggleSidebar();
</script>
<template>
    <div class="flex print:hidden">
        <!-- Backdrop -->
        <div
            :class="sidebar.isOpen ? 'block' : 'hidden'"
            @click="sidebar.isOpen = false"
            class="fixed inset-0 z-40 transition-opacity bg-black opacity-50 lg:hidden"
        ></div>
        <!-- End Backdrop -->
        <div
            :class="
                sidebar.isOpen
                    ? 'translate-x-0 ease-out'
                    : '-translate-x-full ease-in'
            "
            class="fixed inset-y-0 left-0 z-50 overflow-y-auto transition transform bg-blue-700 w-60 dark:bg-blue-900 lg:translate-x-0 lg:static lg:inset-0"
        >
            <div class="flex items-center justify-center mt-8">
                <div class="flex items-center justify-center">
                    <div
                        class="mx-2 text-xl font-semibold text-center text-white"
                    >
                        Admin Dashboard
                    </div>
                </div>
            </div>

            <nav class="mt-8">
                <!-- Side bar -->
                <TheSidebarItems
                    title="Dashboard"
                    :link="route('dashboard')"
                    :isActive="$page.component === 'index'"
                />
                <TheSidebarItems
                    title="Room"
                    :link="route('room.index')"
                    :isActive="$page.component.startsWith('Room/')"
                />

                <TheSidebarItems
                    title="Status"
                    :link="route('status.index')"
                    :isActive="$page.component === 'Status'"
                />

                <TheSidebarItems
                    title="Computer"
                    :link="route('computer.index')"
                    :isActive="$page.component.startsWith('Computer/')"
                />
            </nav>
        </div>
    </div>
</template>

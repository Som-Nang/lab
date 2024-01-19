<script setup>
import Layout from "@/Layouts/Layout.vue";
import { Link } from "@inertiajs/vue3";
defineProps({ rooms: Object });
</script>

<template>
    <Layout>
        <div class="container p-4">
            <div
                class="p-4 text-blue-900 bg-gray-100 rounded-lg dark:bg-gray-700"
            >
                <Link href="/room/create">
                    <button
                        class="bg-blue-600 p-2 rounded-lg text-gray-100 hover:bg-blue-500 mb-2"
                    >
                        Create
                    </button>
                </Link>
                <table
                    class="table table-auto border border-blue-900 border-collapse"
                >
                    <!-- head -->
                    <thead class="text-center bg-gray-500 dark:bg-gray-800">
                        <tr class="text-gray-100">
                            <th class="border border-gray-800">Room</th>
                            <th class="border border-gray-800">Capacity</th>
                            <th class="border border-gray-800">Status</th>
                            <th class="border border-gray-800">Description</th>
                            <th class="border border-gray-800">Register by</th>
                            <th class="border border-gray-800">Action</th>
                        </tr>
                    </thead>
                    <tbody class="dark:text-green-500 font-bold">
                        <tr
                            v-for="room in rooms"
                            class="hover:text-gray-500 dark:hover:text-green-200 cursor-pointer"
                        >
                            <td class="border border-gray-800">
                                {{ room.name }}
                            </td>
                            <td class="border border-gray-800">
                                {{ room.capacity }}
                            </td>
                            <td class="border border-gray-800">
                                {{ room.status }}
                            </td>
                            <td class="border border-gray-800">
                                {{ room.description }}
                            </td>
                            <td class="border border-gray-800">
                                {{ room.user_id }}
                            </td>
                            <td class="space-x-2 border border-gray-800">
                                <button
                                    class="bg-blue-600 p-2 rounded-lg text-gray-100 hover:bg-blue-500"
                                >
                                    Edit
                                </button>
                                <button
                                    class="bg-red-600 p-2 rounded-lg text-gray-100 hover:bg-red-500"
                                >
                                    Delete
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </Layout>
</template>

<script setup>
import Layout from "@/Layouts/Layout.vue";
defineProps({ rooms: Object });
</script>

<template>
    <Layout>
        <div class="container">
            <div class="overflow-x-auto px-12 py-2 text-blue-900">
                <table class="table">
                    <!-- head -->
                    <thead>
                        <tr class="text-gray-900">
                            <th>Room</th>
                            <th>Capacity</th>
                            <th>Status</th>
                            <th>Description</th>
                            <th>Register by</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            v-for="room in rooms"
                            class="hover:text-red-500 cursor-pointer"
                        >
                            <td>{{ room.name }}</td>
                            <td>{{ room.capacity }}</td>
                            <td>{{ room.status }}</td>
                            <td>{{ room.description }}</td>
                            <td>{{ room.user_id }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </Layout>
</template>

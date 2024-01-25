<script setup lang="ts">
import { PropType } from "vue";
import Layout from "@/Layouts/Layout.vue";
import { Link } from "@inertiajs/vue3";
import { ref } from "vue";
import axios from "axios";
import Modal from "@/Components/Modal.vue";

type RoomType = {
    room_id: string;
    name: string;
    description: string;
    status: string;
    capacity: number;
    user_id: number;
};
defineProps({
    rooms: {
        type: Object as PropType<RoomType[]>,
        required: true,
    },
    errors: Object as PropType<Record<string, string>>,
});

const form = ref({
    name: "",
    description: "",
    capacity: 1,
    status: "active",
});
const message = ref();

const update = () => {
    console.log(form.value);
};
const openModal = ref(false);
const roomEdit = ref();
const edit = (roomId: String) => {
    axios
        .get("/room/edit/" + roomId)
        .then((res) => {
            form.value.name = res.data.name;
            form.value.description = res.data.description;
            form.value.capacity = res.data.capacity;
            form.value.status = res.data.status;
            openModal.value = true;
        })
        .catch((err) => {
            console.log(err);
        })
        .finally(() => {
            console.log("finally");
        });
};
</script>

<template>
    <Modal :show="openModal" @close="openModal = false">
        <div class="container mx-auto p-4">
            <h2 class="text-2xl md:text-red-500">Update Room</h2>
            <div class="text-green-600">
                {{ message }}
            </div>
            <form @submit.prevent="update" class="mt-4 flex flex-col gap-4">
                <div class="flex flex-col lg:flex-row gap-2">
                    <div class="flex flex-col w-full">
                        <label for="">Room Name</label>
                        <input
                            class="rounded-md"
                            v-model.trim="form.name"
                            type="text"
                        />
                        <div v-if="errors.name" class="text-red-500">
                            {{ errors.name }}
                        </div>
                    </div>

                    <div class="flex flex-col w-full">
                        <label for="">Description</label>
                        <textarea
                            v-model="form.description"
                            class="rounded-md"
                            name=""
                            id=""
                            cols=""
                            rows="1"
                        ></textarea>
                        <div v-if="errors.description" class="text-red-500">
                            {{ errors.description }}
                        </div>
                    </div>
                </div>

                <div class="flex flex-col lg:flex-row gap-2">
                    <div class="flex flex-col w-full">
                        <label for="">Capacity</label>
                        <input
                            v-model="form.capacity"
                            class="rounded-md"
                            type="number"
                            name=""
                            id=""
                        />
                        <div v-if="errors.capacity" class="text-red-500">
                            {{ errors.capacity }}
                        </div>
                    </div>

                    <div class="flex 0 flex-col w-full">
                        <label for="">Status</label>
                        <select v-model="form.status" class="rounded-md">
                            <option value="">Select a status</option>
                            <option value="active">Active</option>
                            <option value="maintenance">Maintenance</option>
                        </select>
                        <div v-if="errors.status" class="text-red-500">
                            {{ errors.status }}
                        </div>
                    </div>
                </div>

                <div class="flex justify-end space-x-2">
                    <button
                        class="bg-blue-500 active:bg-blue-300 text-white p-2 rounded-lg"
                        type="submit"
                    >
                        Submit
                    </button>
                    <button
                        @click="openModal = false"
                        class="bg-red-500 active:bg-red-300 text-white p-2 rounded-lg"
                    >
                        Close
                    </button>
                </div>
            </form>
        </div>
    </Modal>

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
                                {{ room.status.toUpperCase() }}
                            </td>
                            <td class="border border-gray-800">
                                {{ room.description }}
                            </td>
                            <td class="border border-gray-800">
                                {{ room.user_id }}
                            </td>
                            <td class="space-x-2 border border-gray-800">
                                <button
                                    @click="edit(room.room_id)"
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

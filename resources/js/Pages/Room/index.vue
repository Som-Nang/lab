<script setup lang="ts">
import { PropType } from "vue";
import Layout from "@/Layouts/Layout.vue";
import { useForm, router } from "@inertiajs/vue3";
import { ref } from "vue";
import axios from "axios";
import Modal from "@/Components/Modal.vue";
import Swal from "sweetalert2";
import { AxiosError } from "axios";
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

const form = useForm({
    room_id: "",
    name: "",
    description: "",
    status: "Active",
    capacity: 0,
});
// const message = ref();
const save = () => {
    form.post(route("room.store", form.room_id), {
        onSuccess: () => {
            Swal.fire({
                title: "Success",
                icon: "success",
                toast: true,
                position: "top-end",
                timer: 3000,
                timerProgressBar: true,
                showConfirmButton: false,
            });
            form.reset();
            form.isDirty = false;
            onClose();
        },
    });
};

const destroy = (roomId: string) => {
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            router.delete("/room/delete/" + roomId);
            Swal.fire({
                title: "Deleted!",
                text: "Your file has been deleted.",
                icon: "success",
            });
        }
    });
};

const openModal = ref(false);

const edit = async (roomID: string) => {
    try {
        const { data } = (await axios.get(route("room.edit", roomID))) as {
            data: RoomType;
        };
        form.room_id = data.room_id;
        form.name = data.name;
        form.description = data.description;
        form.capacity = data.capacity;
        form.status = data.status;
        openModal.value = true;
    } catch (error: AxiosError | any) {
        if (error.response.status === 404) {
            Swal.fire({
                title: "Error",
                text: "Room not found",
                icon: "error",
            });
        } else if (error.response.status === 500) {
            Swal.fire({
                title: "Error",
                text: "Internal server error",
                icon: "error",
            });
        } else {
            Swal.fire({
                title: "Error",
                text: error.response.data.message,
                icon: "error",
            });
        }
    }
};

const onClose = () => {
    if (form.isDirty) {
        Swal.fire({
            title: "Are sure to cancel?",
            text: "You will lose your unsaved changes!",
            showDenyButton: true,
            showCancelButton: false,
            confirmButtonText: "Yes",
            denyButtonText: `No`,
        }).then((result) => {
            if (result.isConfirmed) {
                openModal.value = false;
                form.reset();
            }
        });
    } else {
        openModal.value = false;
        form.reset();
    }
};
</script>

<template>
    <Modal :show="openModal" @close="onClose">
        <div class="container mx-auto p-4">
            <form @submit.prevent="save" class="mt-4 flex flex-col gap-4">
                <div class="flex flex-col lg:flex-row gap-2">
                    <div class="flex flex-col w-full">
                        <label for="">Room Name</label>
                        <input
                            class="rounded-md"
                            v-model.trim="form.name"
                            type="text"
                        />
                        <div v-if="form.errors.name" class="text-red-500">
                            {{ form.errors.name }}
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
                        <div
                            v-if="form.errors.description"
                            class="text-red-500"
                        >
                            {{ form.errors.description }}
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
                        <div v-if="form.errors.capacity" class="text-red-500">
                            {{ form.errors.capacity }}
                        </div>
                    </div>

                    <div class="flex 0 flex-col w-full">
                        <label for="">Status</label>
                        <select v-model="form.status" class="rounded-md">
                            <option value="">Select a status</option>
                            <option value="active">Active</option>
                            <option value="maintenance">Maintenance</option>
                        </select>
                        <div v-if="form.errors.status" class="text-red-500">
                            {{ form.errors.status }}
                        </div>
                    </div>
                </div>

                <div class="flex justify-end space-x-2">
                    <button
                        @click="onClose"
                        type="button"
                        class="bg-red-500 active:bg-red-300 text-white p-2 rounded-lg"
                    >
                        Close
                    </button>
                    <button
                        type="submit"
                        class="bg-blue-500 active:bg-blue-300 text-white p-2 rounded-lg"
                    >
                        {{ form.room_id ? "Update" : "Create" }}
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
                <button
                    @click="openModal = true"
                    type="button"
                    class="bg-blue-600 p-2 rounded-lg text-gray-100 hover:bg-blue-500 mb-2"
                >
                    Create
                </button>
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
                                    @click.prevent="destroy(room.room_id)"
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

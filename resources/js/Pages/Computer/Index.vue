<script setup lang="ts">
import { ref, PropType } from "vue";
import Layout from "@/Layouts/Layout.vue";
import { router, useForm } from "@inertiajs/vue3";
import Swal from "sweetalert2";
import Modal from "@/Components/Modal.vue";
import axios from "axios";
import { AxiosError } from "axios";
const openModal = ref(false);

type ComputerType = {
    computer_id: string;
    name: string;
    description: string;
    room_id: string;
    status_name: string;
};
type RoomType = {
    room_id: string;
    name: string;
};
type Status = {
    id: null;
    name: string;
};
defineProps({
    computers: {
        type: Array as PropType<ComputerType[]>,
        required: true,
    },
    rooms: {
        type: Array as PropType<RoomType[]>,
        required: true,
    },
    statuses: {
        type: Array as PropType<Status[]>,
        required: true,
    },
});
const form = useForm({
    computer_id: "",
    name: "",
    description: "",
    room_id: "",
    status_name: "",
});

const onEdit = async (computer_id: string) => {
    try {
        const { data } = (await axios.get(
            route("computer.edit", computer_id)
        )) as {
            data: ComputerType;
        };
        form.computer_id = data.computer_id;
        form.name = data.name;
        form.description = data.description;
        form.room_id = data.room_id;
        form.status_name = data.status_name;
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

const onSave = () => {
    if (form.computer_id) {
        form.put(route("computer.update", form.computer_id), {
            onSuccess: () => {
                Swal.fire({
                    title: "Success",
                    text: "Computer updated successfully",
                    icon: "success",
                });
                openModal.value = false;
                form.reset();
            },
        });
    }
};

const onDelete = (computer_id: string) => {
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
            router.delete(route("computer.destroy", computer_id), {
                onSuccess: () => {
                    Swal.fire({
                        title: "Deleted!",
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 3000,
                        text: "Your file has been deleted.",
                        icon: "success",
                    });
                },
            });
        }
    });
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
        <form
            @submit.prevent="onSave"
            action=""
            class="form flex flex-col gap-4 p-4 rounded-xl"
        >
            <div class="flex flex-col gap-2">
                <div class="flex flex-col w-full">
                    <label class="label" for="">Computer Name</label>
                    <input
                        v-model="form.name"
                        class="input rounded-md"
                        type="text"
                        placeholder="Computer Name"
                    />
                    <div v-if="form.errors.name" class="text-red-500">
                        {{ form.errors.name }}
                    </div>
                </div>

                <div class="flex flex-col w-full">
                    <label class="label" for="">Description</label>
                    <textarea
                        v-model="form.description"
                        class="textarea rounded-md"
                        placeholder="Description"
                        cols="30"
                        rows="5"
                    ></textarea>
                </div>
            </div>
            <div class="flex w-full gap-2">
                <div class="flex-1">
                    <label class="label" for="">Room</label>
                    <select
                        class="select w-full rounded-md"
                        v-model="form.room_id"
                    >
                        <option>{{ form.room_id }}</option>
                        <option
                            :value="item.room_id"
                            v-for="(item, index) in rooms"
                            :key="index"
                        >
                            {{ item.name }}
                        </option>
                    </select>

                    <div v-if="form.errors.room_id" class="text-red-500">
                        {{ form.errors.room_id }}
                    </div>
                </div>
                <div class="flex-1">
                    <label class="label" for="">Status</label>
                    <select
                        v-model="form.status_name"
                        class="select w-full rounded-md"
                    >
                        <option>{{ form.status_name }}</option>
                        <option
                            :value="item.id"
                            v-for="(item, index) in statuses"
                            :key="index"
                        >
                            {{ item.name }}
                        </option>
                    </select>
                    <div v-if="form.errors.status_name" class="text-red-500">
                        {{ form.errors.status_name }}
                    </div>
                </div>
            </div>
            <div class="flex justify-end">
                <button class="btn btn-success rounded-xl">Save</button>
            </div>
        </form>
    </Modal>
    <Layout>
        <div class="p-3">
            <p class="text-2xl font-bold">Manage Computers</p>
            <div class="my-4 bg-base-100 rounded-xl">
                <Link
                    :href="route('computer.create')"
                    class="bg-primary text-white btn rounded-xl"
                    >Create</Link
                >
            </div>

            <div
                class="p-4 text-blue-900 bg-gray-100 rounded-lg dark:bg-gray-700"
            >
                <table class="myTable">
                    <!-- head -->
                    <thead class="">
                        <tr class="">
                            <th class="">No</th>
                            <th class="">Computer</th>
                            <th class="">Room</th>
                            <th class="">Status</th>
                            <th class="">Description</th>
                            <th class="">Action</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        <tr
                            v-for="(computer, index) in computers"
                            :key="index"
                            class="hover:text-gray-500 dark:hover:text-green-200 cursor-pointer"
                        >
                            <td class="border border-gray-800">
                                {{ index + 1 }}
                            </td>
                            <td class="border border-gray-800">
                                {{ computer.name }}
                            </td>
                            <td class="border border-gray-800">
                                {{ computer.room_id }}
                            </td>
                            <td class="border border-gray-800">
                                {{ computer.status_name }}
                            </td>

                            <td class="border border-gray-800">
                                {{ computer.description }}
                            </td>

                            <td class="space-x-2 border border-gray-800">
                                <button
                                    @click="onEdit(computer.computer_id)"
                                    type="button"
                                    class="bg-blue-600 p-2 rounded-lg text-gray-100 hover:bg-blue-500"
                                >
                                    Edit
                                </button>
                                <button
                                    @click="onDelete(computer.computer_id)"
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

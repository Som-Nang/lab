<script setup lang="ts">
import Layout from "@/Layouts/Layout.vue";
import { useForm } from "@inertiajs/vue3";
import Swal from "sweetalert2";
import axios from "axios";
defineProps<{
    status: {
        id: number;
        name: string;
        description: string;
    }[];
}>();
const form = useForm({
    id: "",
    name: "",
    description: "",
});
const onSubmit = () => {
    form.post(route("status.store", form.id), {
        onSuccess: () => {
            form.reset();
            Swal.fire({
                title: "Success",
                icon: "success",
                toast: true,
                position: "top-end",
                timer: 3000,
                timerProgressBar: true,
                showConfirmButton: false,
            });
        },
    });
};
const onEdit = async (id: number) => {
    const { data } = await axios.get(route("status.edit", id));
    form.id = data.id;
    form.name = data.name;
    form.description = data.description;
};
const onDelete = (id: number) => {
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
            form.delete(route("status.destroy", id));
            Swal.fire({
                title: "Deleted!",
                text: "Your file has been deleted.",
                icon: "success",
            });
        }
    });
};
</script>

<template>
    <Layout>
        <div class="container p-4 space-y-4">
            <div class="p-4 dark:bg-gray-700 bg-gray-100 rounded-md">
                <form @submit.prevent="onSubmit" class="flex flex-col">
                    <div class="mt-4 flex gap-4">
                        <div class="flex flex-col w-full">
                            <label class="text-gray-700 dark:text-gray-100"
                                >Status</label
                            >
                            <input
                                v-model="form.name"
                                class="rounded-md text-gray-700"
                                type="text"
                            />
                            <div v-if="form.errors.name" class="text-red-500">
                                {{ form.errors.name }}
                            </div>
                        </div>
                        <div class="flex flex-col w-full">
                            <label class="text-gray-700 dark:text-gray-100"
                                >Description</label
                            >
                            <input
                                v-model="form.description"
                                class="rounded-md text-gray-700"
                                type="text"
                            />
                            <div class="text-red-500"></div>
                        </div>
                    </div>
                    <div class="flex justify-end mt-2">
                        <button
                            type="submit"
                            class="bg-blue-500 active:bg-blue-300 text-white p-2 px-4 rounded-lg"
                        >
                            Save
                        </button>
                    </div>
                </form>
            </div>

            <div
                class="p-4 text-blue-900 bg-gray-100 rounded-lg dark:bg-gray-700"
            >
                <table
                    class="table table-auto border border-blue-900 border-collapse"
                >
                    <!-- head -->
                    <thead class="text-center bg-gray-500 dark:bg-gray-800">
                        <tr class="text-gray-100">
                            <th class="border border-gray-800">No</th>
                            <th class="border border-gray-800">Status</th>
                            <th class="border border-gray-800">Description</th>
                            <th class="border border-gray-800">Action</th>
                        </tr>
                    </thead>
                    <tbody class="dark:text-green-500 font-bold">
                        <tr
                            class="hover:text-gray-500 dark:hover:text-green-200 cursor-pointer"
                            v-for="(item, index) in status"
                            :key="index"
                        >
                            <td class="border border-gray-800">
                                {{ index + 1 }}
                            </td>
                            <td class="border border-gray-800">
                                {{ item.name }}
                            </td>
                            <td class="border border-gray-800">
                                {{ item.description }}
                            </td>

                            <td class="space-x-2 border border-gray-800">
                                <button
                                    @click="onEdit(item.id)"
                                    type="button"
                                    class="bg-blue-600 p-2 rounded-lg text-gray-100 hover:bg-blue-500"
                                >
                                    Edit
                                </button>
                                <button
                                    @click="onDelete(item.id)"
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

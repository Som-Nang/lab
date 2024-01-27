<script setup>
import { ref } from "vue";
import { router } from "@inertiajs/vue3";
import Layout from "@/Layouts/Layout.vue";

const props = defineProps({
    errors: Object,
});

const form = ref({
    name: "",
    description: "",
    capacity: 1,
    status: "active",
});
// const roomName = ref();
// const description = ref();
// const capacity = ref();
// const status = ref();

const message = ref();
const save = () => {
    // const data = {
    //     roomName: roomName.value,
    //     description: description.value,
    //     capacity: capacity.value,
    //     status: status.value,
    // };
    router.post("/room/store", form.value, {
        onSuccess: () => {
            // message.value = "Room created successfully";
            // roomName.value = "";
            // description.value = "";
            // capacity.value = "";
            // status.value = "active";
            message.value = "Room created successfully";
            form.value = {
                name: "",
                description: "",
                capacity: 1,
                status: "active",
            };
        },
    });
};
</script>

<template>
    <Layout>
        <div class="container p-4">
            <div class="mx-auto p-4 bg-gray-100 rounded-lg dark:bg-gray-700">
                <h2 class="text-2xl md:text-red-500">Create Room</h2>
                <div class="text-green-600">
                    {{ message }}
                </div>
                <form @submit.prevent="save" class="mt-4 flex flex-col gap-4">
                    <div class="flex flex-col lg:flex-row gap-2">
                        <div class="flex flex-col w-full">
                            <label for="">Room Name</label>
                            <input
                                class="rounded-md text-gray-700"
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
                                class="rounded-md text-gray-700"
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
                                class="rounded-md text-gray-700"
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
                            <select
                                v-model="form.status"
                                class="rounded-md text-gray-700"
                            >
                                <option value="">Select a status</option>
                                <option value="active">Active</option>
                                <option value="maintenance">Maintenance</option>
                            </select>
                            <div v-if="errors.status" class="text-red-500">
                                {{ errors.status }}
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <button
                            class="bg-blue-500 active:bg-blue-300 text-white p-2 rounded-lg"
                            type="submit"
                        >
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </Layout>
</template>

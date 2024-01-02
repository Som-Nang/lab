<script setup lang="ts">
import Layout from "@/Layouts/Layout.vue";

import { ref } from "vue";
const roomName = ref();
</script>

<template>
    <Layout>
        <div class="container mx-auto p-4">
            <h2 class="text-2xl md:text-red-500">Create Room</h2>
            <div class="mt-4 flex flex-col gap-4">
                <div class="flex flex-col lg:flex-row gap-2">
                    <div class="flex flex-col w-full">
                        <label for="">Room Name</label>
                        <input
                            class="rounded-md"
                            v-model="roomName"
                            type="text"
                        />
                    </div>

                    <div class="flex flex-col w-full">
                        <label for="">Description</label>
                        <textarea
                            class="rounded-md"
                            name=""
                            id=""
                            cols=""
                            rows="1"
                        ></textarea>
                    </div>
                </div>

                <div class="flex flex-col lg:flex-row gap-2">
                    <div class="flex flex-col w-full">
                        <label for="">Capacity</label>
                        <input class="rounded-md" type="number" name="" id="" />
                    </div>

                    <div class="flex 0 flex-col w-full">
                        <label for="">Status</label>
                        <select class="rounded-md">
                            <option value="">Select a status</option>
                            <option value="active">Active</option>
                            <option value="maintenance">Maintenance</option>
                        </select>
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
            </div>
        </div>
    </Layout>
</template>

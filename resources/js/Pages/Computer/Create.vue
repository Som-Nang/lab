<script setup lang="ts">
import Layout from "@/Layouts/Layout.vue";
import { MoveLeftIcon } from "lucide-vue-next";
import { useForm } from "@inertiajs/vue3";
import Swal from "sweetalert2";
const props = defineProps<{
    rooms: {
        room_id: string;
        name: string;
    }[];
    statuses: {
        id: null;
        name: string;
    }[];
}>();

const form = useForm({
    name: "",
    description: "",
    room_id: "",
    status_id: null,
});

const onSave = () => {
    form.post(route("computer.store"), {
        onSuccess: () => {
            Swal.fire({
                title: "Success",
                toast: true,
                timer: 3000,
                timerProgressBar: true,
                position: "top-end",
                text: "success created",
                showConfirmButton: false,
                icon: "success",
                showCancelButton: false,
            });
            form.reset();
        },
    });
};
</script>

<template>
    <Layout>
        <div class="p-3">
            <div class="p-4">
                <Link
                    :href="route('computer.index')"
                    class="btn btn-warning text-white rounded-xl"
                    ><MoveLeftIcon class="w-5 h-5" /> Back</Link
                >
                <p class="text-2xl font-bold">Create Computers</p>
            </div>
            <form
                action=""
                @submit.prevent="onSave"
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
                            <option value="">Select Room</option>
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
                            v-model="form.status_id"
                            class="select w-full rounded-md"
                        >
                            <option :value="null">Select Status</option>
                            <option
                                :value="item.id"
                                v-for="(item, index) in statuses"
                                :key="index"
                            >
                                {{ item.name }}
                            </option>
                        </select>
                        <div v-if="form.errors.status_id" class="text-red-500">
                            {{ form.errors.status_id }}
                        </div>
                    </div>
                </div>
                <div class="flex justify-end">
                    <button class="btn btn-success rounded-xl">Save</button>
                </div>
            </form>
        </div>
    </Layout>
</template>

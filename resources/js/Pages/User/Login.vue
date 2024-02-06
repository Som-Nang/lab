<script setup lang="ts">
import { useForm } from "@inertiajs/vue3";

// const props = defineProps({
//     errors: Object,
// });

// const form = ref({
//     email: "",
//     password: "",
//     remember: false,
// });
// const message = ref();
// function submit(e) {
//     e.preventDefault();
//     router.post("/login", form.value, {
//         onSuccess: () => {
//             message.value = "Login Successful";
//             form.value = {
//                 email: "",
//                 password: "",
//                 remember: false,
//             };
//         },
//     });
// }
const form = useForm({
    email: "",
    password: "",
    remember: false,
});
</script>

<template>
    <div class="flex justify-center items-center w-full h-screen">
        <form
            @submit.prevent="form.post(route('login'))"
            class="bg-white p-4 py-6 flex flex-col justify-center items-center rounded-lg w-3/4 sm:w-4/12"
        >
            <div class="w-full">
                <label for="">Email</label>
                <input v-model="form.email" class="w-full" type="text" />
                <div v-if="form.errors.email" class="text-red-500">
                    {{ form.errors.email }}
                </div>
            </div>
            <div class="mt-2 w-full">
                <label for="">Password</label>
                <input v-model="form.password" class="w-full" type="text" />
                <div v-if="form.errors.password" class="text-red-500">
                    {{ form.errors.password }}
                </div>
            </div>
            <div class="form-control w-full">
                <label
                    class="label cursor-pointer flex justify-start space-x-1"
                >
                    <input
                        v-model="form.remember"
                        type="checkbox"
                        class="checkbox checkbox-primary"
                    />
                    <span class="label-text">Remember me</span>
                </label>
                <div v-if="form.errors.remember" class="text-red-500">
                    {{ form.errors.remember }}
                </div>
            </div>
            <div class="flex justify-end w-full items-center space-x-1">
                <a href="#" class="text-blue-900">Forgot Password?</a>
                <button type="submit" class="btn bg-blue-900">Login</button>
            </div>
        </form>
    </div>
</template>

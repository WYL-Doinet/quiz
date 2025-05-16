<template>
    <div class="bg-gray-50 h-screen flex  justify-center items-center">
        <div class="max-w-2xl flex w-full gap-5 rounded-lg bg-white shadow-md  overflow-hidden">
            <div class="bg-indigo-950 flex justify-center items-center py-20">
                <img :src="logo" alt="logo" class="size-54" />
            </div>
            <form class="flex-1 space-y-3 p-5" @submit.prevent="submit">
                <h1 class="font-bold text-4xl text-indigo-800">Login</h1>
                <div>
                    <label for="email"
                        :class="['block mb-2 text-sm font-medium  dark:text-white', form.errors.email ? 'text-red-600' : 'text-gray-900']">Your
                        Email</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                            <svg :class="['w-4 h-4  dark:text-gray-400', form.errors.email ? 'text-red-600' : 'text-gray-500']"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 20 16">
                                <path
                                    d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z" />
                                <path
                                    d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z" />
                            </svg>
                        </div>
                        <input type="text" id="email" v-model="form.email"
                            :class="['bg-gray-50 border  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500', form.errors.email ? 'border-red-600' : 'border-gray-300']"
                            placeholder="name@flowbite.com">

                    </div>
                    <p v-if="form.errors.email" class="p-1 text-red-600">{{ form.errors.email }}</p>
                </div>
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        :class="['block mb-2 text-sm font-medium  dark:text-white', form.errors.password ? 'text-red-600' : 'text-gray-900']">
                        Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                            <svg :class="['w-4 h-4  dark:text-gray-400', form.errors.password ? 'text-red-600' : 'text-gray-500']"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="size-4">
                                <path fill-rule="evenodd"
                                    d="M12 1.5a5.25 5.25 0 0 0-5.25 5.25v3a3 3 0 0 0-3 3v6.75a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3v-6.75a3 3 0 0 0-3-3v-3c0-2.9-2.35-5.25-5.25-5.25Zm3.75 8.25v-3a3.75 3.75 0 1 0-7.5 0v3h7.5Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <input v-model="form.password" type="password" id="password"
                            :class="['bg-gray-50 border  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500', form.errors.email ? 'border-red-600' : 'border-gray-300']">

                    </div>
                    <p v-if="form.errors.password" class="p-1 text-red-600">{{ form.errors.password }}</p>
                </div>
                <div>
                    <button class="btn-primary w-full">
                        <svg v-if="form.processing" aria-hidden="true" role="status"
                            class="inline w-4 h-4 me-3 text-white animate-spin" viewBox="0 0 100 101" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                fill="#E5E7EB" />
                            <path
                                d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                fill="currentColor" />
                        </svg>
                        <span v-if="form.processing">
                            Logging ☕
                        </span>
                        <span v-else>
                            Login
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script setup lang="ts">
import logo from '@images/lara-quiz.svg'
import { useForm, usePage } from '@inertiajs/vue3';

const page = usePage() as any

const form = useForm({
    _token: page.props.csrf_token,
    email: '',
    password: '',
})

const submit = () => {
    form.post(route('login'))
}
</script>
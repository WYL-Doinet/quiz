<template>
    <div class="bg-indigo-950 h-screen flex justify-center items-center">
        <div
            class="max-w-2xl flex w-full gap-5 rounded-lg p-0.5 bg-white border border-white overflow-hidden"
        >
            <div
                class="bg-indigo-950 flex justify-center items-center py-20 rounded-md overflow-hidden"
            >
                <img src="/images/lara-quiz.svg" alt="logo" class="size-54" loading="lazy" />
            </div>
            <form class="flex-1 space-y-3 p-5" @submit.prevent="submit">
                <h1 class="font-bold text-4xl text-indigo-800">
                    {{ $t("login") }}
                </h1>
                <div>
                    <label
                        for="email"
                        :class="[
                            'block mb-2 text-sm font-medium  dark:text-white',
                            form.errors.email !== undefined
                                ? 'text-red-600'
                                : 'text-gray-900',
                        ]"
                    >
                        {{ $t("email") }}</label
                    >
                    <div class="relative">
                        <div
                            class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none"
                        >
                            <svg
                                :class="[
                                    'w-4 h-4  dark:text-gray-400',
                                    form.errors.email !== undefined
                                        ? 'text-red-600'
                                        : 'text-gray-500',
                                ]"
                                aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor"
                                viewBox="0 0 20 16"
                            >
                                <path
                                    d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z"
                                />
                                <path
                                    d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z"
                                />
                            </svg>
                        </div>
                        <input
                            required
                            type="text"
                            id="email"
                            v-model="form.email"
                            :class="[
                                'bg-gray-50 border  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500',
                                form.errors.email !== undefined
                                    ? 'border-red-600'
                                    : 'border-gray-300',
                            ]"
                        />
                    </div>
                    <p
                        v-if="form.errors.email !== undefined"
                        class="p-1 text-red-600 text-sm"
                    >
                        {{ form.errors.email }}
                    </p>
                </div>
                <div>
                    <label
                        for="password"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        :class="[
                            'block mb-2 text-sm font-medium  dark:text-white',
                            form.errors.password !== undefined
                                ? 'text-red-600'
                                : 'text-gray-900',
                        ]"
                    >
                        {{ $t("password") }}</label
                    >
                    <div class="relative">
                        <div
                            class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none"
                        >
                            <svg
                                :class="[
                                    'w-4 h-4  dark:text-gray-400',
                                    form.errors.password !== undefined
                                        ? 'text-red-600'
                                        : 'text-gray-500',
                                ]"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24"
                                fill="currentColor"
                                class="size-4"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M12 1.5a5.25 5.25 0 0 0-5.25 5.25v3a3 3 0 0 0-3 3v6.75a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3v-6.75a3 3 0 0 0-3-3v-3c0-2.9-2.35-5.25-5.25-5.25Zm3.75 8.25v-3a3.75 3.75 0 1 0-7.5 0v3h7.5Z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                        </div>
                        <input
                            required
                            v-model="form.password"
                            type="password"
                            id="password"
                            :class="[
                                'bg-gray-50 border  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500',
                                form.errors.password !== undefined
                                    ? 'border-red-600'
                                    : 'border-gray-300',
                            ]"
                        />
                    </div>
                    <p
                        v-if="form.errors.password !== undefined"
                        class="p-1 text-red-600 text-sm"
                    >
                        {{ form.errors.password }}
                    </p>
                </div>
                <div>
                    <button
                        class="btn-primary w-full"
                        :disabled="form.processing"
                    >
                        <Loader v-if="form.processing" />
                        {{ $t("login") }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script setup lang="ts">
import { useForm, usePage } from "@inertiajs/vue3";
import { useI18n } from "vue-i18n";
import { useToast } from "vue-toastification";
import Loader from "../../components/Loader.vue";

const page = usePage() as any;
const toast = useToast();
const { t } = useI18n();

const form = useForm({
    _token: page.props.csrf_token,
    email: "",
    password: "",
});

const submit = () => {
    form.post(route("login"), {
        onSuccess: async () => {
            toast.success(t("loginSuccess"), {
                timeout: 2000,
                icon: "fa-solid fa-bell",
            });
        },
    });
};
</script>

<template>
    <form class="space-y-5 w-lg" @submit.prevent="submit">
            <div>
                <label
                    for="name"
                    :class="['block mb-2 text-sm font-medium  dark:text-white']"
                >
                    {{ $t('name') }}</label
                >
                <div class="relative">
                    <div
                        class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none"
                    >
                        <svg
                            :class="[
                                'w-4 h-4  dark:text-gray-400',
                                form.errors.name
                                    ? 'text-red-600'
                                    : 'text-gray-500',
                            ]"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                            fill="currentColor"
                            class="size-5"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z"
                                clip-rule="evenodd"
                            />
                        </svg>
                    </div>
                    <input
                        type="text"
                        id="name"
                        v-model="form.name"
                        :class="[
                            'bg-gray-50 border-gray-300 border  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500',
                        ]"
                        placeholder="name@flowbite.com"
                        required
                    />
                </div>
            </div>
            <div>
                <button class="btn-primary">
                    <svg
                        v-if="form.processing"
                        aria-hidden="true"
                        role="status"
                        class="inline w-4 h-4 me-3 text-white animate-spin"
                        viewBox="0 0 100 101"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                            fill="#E5E7EB"
                        />
                        <path
                            d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                            fill="currentColor"
                        />
                    </svg>
                    <span v-if="form.processing"> {{ $t('save') }} ☕ </span>
                    <span v-else> {{ $t('save') }} </span>
                </button>
            </div>
        </form>
        <h2 class="text-2xl font-bold text-indigo-900">{{ $t('quizzes') }}</h2>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table
                class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400"
            >
                <thead
                    class="text-xs text-indigo-900 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
                >
                    <tr>
                        <th scope="col" class="px-6 py-3">{{ $t('title') }}</th>
                        <th scope="col" class="px-6 py-3">{{ $t('status') }}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="quiz in quizzes.data" :key="quiz.id">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ quiz.title }}
                        </th>
                    </tr>
                    <tr v-if="quizzes.length === 0">
                        <td
                            colspan="100%"
                            class="text-center py-3 font-bold text-indigo-900"
                        >
                            No quizzes
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
</template>

<script setup lang="ts">

import { useForm } from "@inertiajs/vue3";

const props = defineProps<PropsType>();

const form = useForm({
    name: props.category.name,
});

type Quiz = {
    id: number;
    title: string;
};

type Category = {
    id: number;
    name: string;
};

type PropsType = {
    category: Category;
    quizzes: any;
};

const submit = () => {
    // form.post(route("user.store"));
};
</script>

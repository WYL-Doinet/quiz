<template>
  <form class="space-y-5 w-lg" @submit.prevent="submit">
            <div>
                <label
                    for="name"
                    :class="['block mb-2 text-sm font-medium  dark:text-white']"
                >
                    {{ $t("name") }}</label
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
                        required
                    />
                </div>
            </div>
            <div>
                <label
                    for="email"
                    :class="['block mb-2 text-sm font-medium  dark:text-white']"
                    >{{ $t("email") }}</label
                >
                <div class="relative">
                    <div
                        class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none"
                    >
                        <svg
                            :class="[
                                'w-4 h-4  text-gray-500 dark:text-gray-400',
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
                        type="text"
                        id="email"
                        :value="user.email"
                        disabled
                        :class="[
                            'bg-gray-50 border  border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500',
                        ]"
                        required
                    />
                </div>
            </div>
            <div>
                <label
                    for="password"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                    :class="[
                        'block mb-2 text-sm font-medium  dark:text-white',
                        form.errors.password ? 'text-red-600' : 'text-gray-900',
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
                                form.errors.password
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
                        v-model="form.password"
                        type="password"
                        id="password"
                        required
                        :class="[
                            'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500',
                        ]"
                    />
                </div>
                <p v-if="form.errors.password" class="p-1 text-red-600">
                    {{ form.errors.password }}
                </p>
            </div>
            <div class="flex items-center">
                <input
                    id="checked-checkbox"
                    type="checkbox"
                    v-model="form.is_admin"
                    class="w-4 h-4 accent-indigo-800 focus:border-0 focus:outline-none focus:right-0 bg-gray-100 border-gray-300 rounded-sm"
                />
                <label
                    for="checked-checkbox"
                    class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                    >Admin</label
                >
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
                    <span v-if="form.processing"> {{ $t("save") }} ☕ </span>
                    <span v-else> {{ $t("save") }} </span>
                </button>
            </div>
        </form>
        <h2 class="text-2xl font-bold text-indigo-900">
            {{ $t("completedAssigns") }}
        </h2>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table
                class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400"
            >
                <thead
                    class="text-xs text-indigo-900 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
                >
                    <tr>
                        <th scope="col" class="px-6 py-3">{{ $t("title") }}</th>
                        <th scope="col" class="px-6 py-3">
                            {{ $t("action") }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-if="completed_assigns.length === 0">
                        <td
                            colspan="100%"
                            class="text-center py-3 font-bold text-indigo-900"
                        >
                            {{ $t("noCompletedAssigns") }}
                        </td>
                    </tr>
                    <tr
                        v-else
                        v-for="assign in completed_assigns"
                        :key="assign.id"
                    >
                        <th
                            scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                        >
                            {{ assign.quiz.title }}
                        </th>
                        <td class="px-6 py-3 flex">
                            <Link 
                                as="button"
                                :href="
                                    route('user.answer', {
                                        id: user.id,
                                        assignment_id: assign.id,
                                    })
                                "
                                :class="[
                                    'btn-primary flex justify-center items-center gap-2',
                                    {
                                        'pointer-events-none': assign.completed_at === null,
                                    },
                                ]"
                            >
                                <span>{{ $t("detail") }}</span>
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24"
                                    fill="currentColor"
                                    class="size-5"
                                >
                                    <path
                                        d="M11.625 16.5a1.875 1.875 0 1 0 0-3.75 1.875 1.875 0 0 0 0 3.75Z"
                                    />
                                    <path
                                        fill-rule="evenodd"
                                        d="M5.625 1.5H9a3.75 3.75 0 0 1 3.75 3.75v1.875c0 1.036.84 1.875 1.875 1.875H16.5a3.75 3.75 0 0 1 3.75 3.75v7.875c0 1.035-.84 1.875-1.875 1.875H5.625a1.875 1.875 0 0 1-1.875-1.875V3.375c0-1.036.84-1.875 1.875-1.875Zm6 16.5c.66 0 1.277-.19 1.797-.518l1.048 1.048a.75.75 0 0 0 1.06-1.06l-1.047-1.048A3.375 3.375 0 1 0 11.625 18Z"
                                        clip-rule="evenodd"
                                    />
                                    <path
                                        d="M14.25 5.25a5.23 5.23 0 0 0-1.279-3.434 9.768 9.768 0 0 1 6.963 6.963A5.23 5.23 0 0 0 16.5 7.5h-1.875a.375.375 0 0 1-.375-.375V5.25Z"
                                    />
                                </svg>
                            </Link>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
</template>

<script setup lang="ts">
import DashboardLayout from "@components/layout/DashboardLayout.vue";
import { Link, useForm } from "@inertiajs/vue3";

const props = defineProps<PropsType>();

const form = useForm({
    name: props.user.name,
    password: "",
    is_admin: false,
});

type Quiz = {
    id: number;
    title: string;
};

type CompletedAssign = {
    id: number;
    completed_at: string;
    quiz: Quiz;
};

type User = {
    id: number;
    name: string;
    email: string;
};

type PropsType = {
    user: User;
    completed_assigns: Array<CompletedAssign>;
};

const submit = () => {
    // form.post(route("user.store"));
};
</script>

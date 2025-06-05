<template>
    <div class="flex-1 grid grid-cols-4 items-end gap-3">
        <div>
            <label
                for="q"
                class="block mb-2 text-sm font-medium dark:text-white'"
                >{{ $t("filter") }}</label
            >
            <div class="relative">
                <div
                    class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="currentColor"
                        class="size-4 text-gray-500"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M19.5 21a3 3 0 0 0 3-3V9a3 3 0 0 0-3-3h-5.379a.75.75 0 0 1-.53-.22L11.47 3.66A2.25 2.25 0 0 0 9.879 3H4.5a3 3 0 0 0-3 3v12a3 3 0 0 0 3 3h15ZM9 12.75a.75.75 0 0 0 0 1.5h6a.75.75 0 0 0 0-1.5H9Z"
                            clip-rule="evenodd"
                        />
                    </svg>
                </div>
                <input
                    v-model="search.title"
                    type="text"
                    id="q"
                    name="q"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                />
            </div>
        </div>
        <div>
            <label
                for="q"
                class="block mb-2 text-sm font-medium dark:text-white'"
                >{{ $t("category") }}</label
            >
            <select
                v-model="search.category_id"
                id="category_id"
                name="category_id"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            >
                <option value="">{{ $t("selectCategory") }}</option>
                <option
                    v-for="category in categories"
                    :value="category.id"
                    :key="category.id"
                >
                    {{ category.name }}
                </option>
            </select>
        </div>
        <div>
            <button
                class="btn-primary flex items-center gap-2"
                @click="onSearch"
            >
                <span> {{ $t("search") }} </span>
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="size-5"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"
                    />
                </svg>
            </button>
        </div>
        <div class="flex justify-end items-end">
            <Link
                :href="route('quiz.create')"
                prefetch
                class="btn-primary flex items-center justify-center gap-2"
            >
                <span>{{ $t("create") }}</span>
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    fill="currentColor"
                    class="size-5"
                >
                    <path
                        d="M6 3a3 3 0 0 0-3 3v2.25a3 3 0 0 0 3 3h2.25a3 3 0 0 0 3-3V6a3 3 0 0 0-3-3H6ZM15.75 3a3 3 0 0 0-3 3v2.25a3 3 0 0 0 3 3H18a3 3 0 0 0 3-3V6a3 3 0 0 0-3-3h-2.25ZM6 12.75a3 3 0 0 0-3 3V18a3 3 0 0 0 3 3h2.25a3 3 0 0 0 3-3v-2.25a3 3 0 0 0-3-3H6ZM17.625 13.5a.75.75 0 0 0-1.5 0v2.625H13.5a.75.75 0 0 0 0 1.5h2.625v2.625a.75.75 0 0 0 1.5 0v-2.625h2.625a.75.75 0 0 0 0-1.5h-2.625V13.5Z"
                    />
                </svg>
            </Link>
        </div>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table
            class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400"
        >
            <thead
                class="text-xs text-indigo-900 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
            >
                <tr>
                    <th scope="col" class="px-6 py-3 min-w-[200px]">
                        {{ $t("title") }}
                    </th>
                    <th scope="col" class="px-6 py-3 min-w-[200px]">
                        {{ $t("createdBy") }}
                    </th>
                    <th scope="col" class="px-6 py-3 min-w-[200px]">
                        {{ $t("status") }}
                    </th>
                    <th scope="col" class="px-6 py-3 min-w-[200px]">
                        {{ $t("action") }}
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr
                    v-for="quiz in quizzes.data"
                    :key="quiz.id"
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200"
                >
                    <th
                        scope="row"
                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                    >
                        {{ quiz.title }}
                    </th>
                    <td class="px-6 py-4">
                        {{ quiz["created_by"]["name"] }}
                    </td>
                    <td class="px-6 py-4">
                        <span
                            class="bg-indigo-100 text-indigo-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-indigo-900 dark:text-indigo-300"
                        >
                            {{ $t("question") }} :
                            {{ quiz["questions_count"] }}</span
                        >
                    </td>
                    <td class="px-6 py-4 flex gap-2">
                        <Link
                            :href="route('quiz.assign.create', quiz.id)"
                            class="btn-blue flex justify-center items-center gap-2"
                        >
                            <span>{{ $t("assign") }}</span>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24"
                                fill="currentColor"
                                class="size-5"
                            >
                                <path
                                    d="M5.566 4.657A4.505 4.505 0 0 1 6.75 4.5h10.5c.41 0 .806.055 1.183.157A3 3 0 0 0 15.75 3h-7.5a3 3 0 0 0-2.684 1.657ZM2.25 12a3 3 0 0 1 3-3h13.5a3 3 0 0 1 3 3v6a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3v-6ZM5.25 7.5c-.41 0-.806.055-1.184.157A3 3 0 0 1 6.75 6h10.5a3 3 0 0 1 2.683 1.657A4.505 4.505 0 0 0 18.75 7.5H5.25Z"
                                />
                            </svg>
                        </Link>
                        <Link
                            :href="route('quiz.show', quiz.id)"
                            class="btn-primary flex justify-center items-center gap-2"
                        >
                            <span>{{ $t("review") }}</span>
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
                        <Link
                            :href="route('quiz.demo', quiz.id)"
                            cache-for="30m"
                            class="btn-green flex gap-2 items-center"
                        >
                            <span>{{ $t("demoTest") }}</span>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="size-5"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z"
                                />
                            </svg>
                        </Link>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <Pagination
        :links="quizzes.links"
        :prevPageUrl="quizzes['prev_page_url']"
        :nextPageUrl="quizzes['next_page_url']"
    />
</template>

<script setup lang="ts">
import { Link, router } from "@inertiajs/vue3";
import { ref } from "vue";
import { cleanObj } from "../../../lib/utility";
import Pagination from "../../../components/Pagination.vue";

const searchParams = new URLSearchParams(window.location.search);

const search = ref({
    title: searchParams.get("title"),
    category_id: searchParams.get("category_id") || "",
});

const onSearch = () => {
    const cleanParams = cleanObj(search.value);
    const queryString = new URLSearchParams(cleanParams).toString();
    const url = `${
        queryString
            ? route("quiz.index") + "?" + queryString
            : route("quiz.index")
    }`;
    router.visit(url, {
        only: ["quizzes"],
        preserveState: true,
    });
};

defineProps<{ quizzes: any; categories: any }>();

</script>

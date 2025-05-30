<template>
       <div class="space-y-5">
            <div class="grid grid-cols-4 items-end gap-3">
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
                                    d="M5.25 2.25a3 3 0 0 0-3 3v4.318a3 3 0 0 0 .879 2.121l9.58 9.581c.92.92 2.39 1.186 3.548.428a18.849 18.849 0 0 0 5.441-5.44c.758-1.16.492-2.629-.428-3.548l-9.58-9.581a3 3 0 0 0-2.122-.879H5.25ZM6.375 7.5a1.125 1.125 0 1 0 0-2.25 1.125 1.125 0 0 0 0 2.25Z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                        </div>
                        <input
                            v-model="search.q"
                            type="text"
                            id="q"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        />
                    </div>
                </div>
                <div>
                    <button class="btn-primary flex items-center gap-2" @click="onSearch">
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
                <div class="flex justify-end col-span-2">
                    <Link
                        :href="route('category.create')"
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
                            <th scope="col" class="px-6 py-3">
                                {{ $t("name") }}
                            </th>
                            <th scope="col" class="px-6 py-3">
                                {{ $t("action") }}
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            v-for="category in categories"
                            :key="category.id"
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200"
                        >
                            <th
                                scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                            >
                                {{ category.name }}
                            </th>
                            <td class="px-6 py-4 flex">
                                <Link
                                    :href="route('category.show', category.id)"
                                    class="btn-primary flex justify-center items-center gap-2"
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
        </div>
</template>

<script lang="ts" setup>
import { Link, router } from "@inertiajs/vue3";
import { ref } from "vue";
import { cleanObj } from "../../../lib/utility";
defineProps<{ categories: any }>();

const searchParams = new URLSearchParams(window.location.search);

const search = ref({
    q: searchParams.get("q"),
});

const onSearch = () => {
    const queryString = new URLSearchParams(cleanObj(search.value)).toString();
    const url  = `${
            queryString
                ? route("category.index") + "?" + queryString
                : route("category.index")
        }`
    router.visit(url,
        {
            only: ["categories"],
            preserveState: true,
        }
    );
};
</script>

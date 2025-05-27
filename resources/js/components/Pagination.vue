<template>
    <nav aria-label="Page navigation" class="flex justify-end">
        <ul class="flex items-center -space-x-px h-10 text-base">
            <li>
                <Link
                    preserve-scroll
                    :href="prevPageUrl || '#'"
                    :class="{ 'pointer-events-none': prevPageUrl === null }"
                    class="flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                >
                    <span class="sr-only">Previous</span>
                    <svg
                        class="w-3 h-3 rtl:rotate-180"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 6 10"
                    >
                        <path
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M5 1 1 5l4 4"
                        />
                    </svg>
                </Link>
            </li>
            <li v-for="link in links.slice(1, -1)" :key="link.url">
                <Link
                    :href="link.url || '#'"
                    preserve-scroll
                    
                    :class="[
                        link.active
                            ? 'border-indigo-500 bg-blue-900 hover:bg-indigo-800 text-white'
                            : 'bg-white border border-gray-300 hover:bg-gray-100', {'pointer-events-none': link.url === null }
                    ]"
                    class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 border dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                    >{{ link.label }}</Link
                >
            </li>

            <li>
                <Link
                    preserve-scroll
                    :href="nextPageUrl || '#'"
                    :class="{ 'pointer-events-none': prevPageUrl === null }"
                    class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                >
                    <span class="sr-only">Next</span>
                    <svg
                        class="w-3 h-3 rtl:rotate-180"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 6 10"
                    >
                        <path
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="m1 9 4-4-4-4"
                        />
                    </svg>
                </Link>
            </li>
        </ul>
    </nav>
</template>

<script lang="ts" setup>
import { Link } from "@inertiajs/vue3";

type Props = {
    links: any;
    prevPageUrl: any;
    nextPageUrl: any;
};
defineProps<Props>();
</script>

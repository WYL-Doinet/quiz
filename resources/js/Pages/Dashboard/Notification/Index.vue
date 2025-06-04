<template>
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
                        {{ $t("message") }}
                    </th>
                    <th scope="col" class="px-6 py-3">
                        {{ $t("action") }}
                    </th>
                </tr>
            </thead>
            <tbody>
                  <tr v-if="notifications.length === 0">
                    <td
                        colspan="100%"
                        class="text-center py-3 font-bold text-indigo-900"
                    >
                        {{ $t("dataEmpty") }}
                    </td>
                </tr>
                <tr
                    v-for="notification in notifications"
                    :key="notification.id"
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200"
                >
                    <th
                        scope="row"
                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                    >
                        {{ notification.type }}
                    </th>
                    <td class="px-6 py-4">
                        {{ notification.data?.message }}
                    </td>
                    <td class="px-6 py-4 flex">
                        <Link
                            :href="route('notification.show', notification.id)"  
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
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3';

defineProps<{ notifications: any }>();
</script>

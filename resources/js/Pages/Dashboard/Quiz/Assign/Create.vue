<template>
    <DashboardLayout>
        <div class="space-y-5">
            <transition name="fade">
                <AssignUserModal
                    v-if="modal.open"
                    :hideModal="() => (modal.open = false)"
                />
            </transition>
            <div class="grid grid-cols-3 gap-3 items-end">
                <div>
                    <!-- <button
                        class="btn-danger flex gap-2"
                        @click="router.reload({ only: ['assigns'] })"
                    >
                        <span>Reload</span>
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                            fill="currentColor"
                            class="size-5"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M4.755 10.059a7.5 7.5 0 0 1 12.548-3.364l1.903 1.903h-3.183a.75.75 0 1 0 0 1.5h4.992a.75.75 0 0 0 .75-.75V4.356a.75.75 0 0 0-1.5 0v3.18l-1.9-1.9A9 9 0 0 0 3.306 9.67a.75.75 0 1 0 1.45.388Zm15.408 3.352a.75.75 0 0 0-.919.53 7.5 7.5 0 0 1-12.548 3.364l-1.902-1.903h3.183a.75.75 0 0 0 0-1.5H2.984a.75.75 0 0 0-.75.75v4.992a.75.75 0 0 0 1.5 0v-3.18l1.9 1.9a9 9 0 0 0 15.059-4.035.75.75 0 0 0-.53-.918Z"
                                clip-rule="evenodd"
                            />
                        </svg>
                    </button> -->
                </div>
                <div class="col-span-2 flex justify-end gap-2">
                    <a 
                        download
                        :href="route('quiz.export.result', page.props.route.id)"
                        class="btn-green flex gap-2"
                    >
                        <span>{{ $t("exportResult") }}</span>
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
                                d="M3.375 19.5h17.25m-17.25 0a1.125 1.125 0 0 1-1.125-1.125M3.375 19.5h7.5c.621 0 1.125-.504 1.125-1.125m-9.75 0V5.625m0 12.75v-1.5c0-.621.504-1.125 1.125-1.125m18.375 2.625V5.625m0 12.75c0 .621-.504 1.125-1.125 1.125m1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125m0 3.75h-7.5A1.125 1.125 0 0 1 12 18.375m9.75-12.75c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125m19.5 0v1.5c0 .621-.504 1.125-1.125 1.125M2.25 5.625v1.5c0 .621.504 1.125 1.125 1.125m0 0h17.25m-17.25 0h7.5c.621 0 1.125.504 1.125 1.125M3.375 8.25c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125m17.25-3.75h-7.5c-.621 0-1.125.504-1.125 1.125m8.625-1.125c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125M12 10.875v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 10.875c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125M13.125 12h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125M20.625 12c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5M12 14.625v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 14.625c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125m0 1.5v-1.5m0 0c0-.621.504-1.125 1.125-1.125m0 0h7.5"
                            />
                        </svg>
                    </a>
                    <button
                        class="btn-primary flex gap-2"
                        @click="modal.open = true"
                    >
                        <span>{{ $t("create") }}</span>
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
                                d="m15.75 15.75-2.489-2.489m0 0a3.375 3.375 0 1 0-4.773-4.773 3.375 3.375 0 0 0 4.774 4.774ZM21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"
                            />
                        </svg>
                    </button>
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
                                {{ $t("email") }}
                            </th>

                            <th>{{ $t("assignedAt") }}</th>
                            <th scope="col" class="px-6 py-3">
                                {{ $t("status") }}
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            v-for="assign in assigns"
                            :key="assign.id"
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200"
                        >
                            <th
                                scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                            >
                                {{ assign.user.name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ assign.user.email }}
                            </td>
                            <td class="px-6 py-4">
                                {{ assign["assigned_at"] }}
                            </td>

                            <td class="px-6 py-4 flex gap-2">
                                <!-- <span
                                    class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-blue-300"
                                    >Score : {{ assign.score }}</span
                                > -->
                                <span
                                    v-if="assign.completed_at"
                                    class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300"
                                >
                                    {{ $t("complete") }}
                                </span>
                                <span
                                    v-else
                                    class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300"
                                    >{{ $t("pending") }}</span
                                >
                            </td>
                        </tr>
                        <tr v-if="assigns!.length === 0" >
                            <td colspan="100%" class="text-indigo-900 font-bold py-3 text-center">{{ $t('dataEmpty') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </DashboardLayout>
</template>

<script setup lang="ts">
import DashboardLayout from "@components/layout/DashboardLayout.vue";

import { router, usePage } from "@inertiajs/vue3";
import { ref } from "vue";
import AssignUserModal from "../../../../components/AssignUserModal.vue";

const modal = ref({ open: false });

const page = usePage<any>() as any;

const props = defineProps({ assigns: Object });
</script>

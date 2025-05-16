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
                    <button
                        class="btn-primary flex gap-2"
                        @click="modal.open = true"
                    >
                        <span>Assign</span>
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
                        class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
                    >
                        <tr>
                            <th scope="col" class="px-6 py-3">Name</th>
                            <th scope="col" class="px-6 py-3">Email</th>

                            <th>Assign At</th>
                            <th scope="col" class="px-6 py-3">Status</th>
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
                                <span
                                    class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-blue-300"
                                    >Score : {{ assign.score }}</span
                                >
                                <span
                                    v-if="assign.completed_at"
                                    class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300"
                                >
                                    complete
                                </span>
                                <span
                                    v-else
                                    class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300"
                                    >Pending</span
                                >
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </DashboardLayout>
</template>

<script setup lang="ts">
import DashboardLayout from "@components/layout/DashboardLayout.vue";

import { router } from "@inertiajs/vue3";
import { ref } from "vue";
import AssignUserModal from "../../../../components/AssignUserModal.vue";

const modal = ref({ open: false });

defineProps({ assigns: Object });
</script>

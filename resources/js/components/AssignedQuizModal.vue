<template>
    <div
        class="fixed top-0 left-0 w-screen h-screen z-10 flex justify-center items-center bg-black/25"
        @click.self="hideModal()"
    >
        <div class="min-w-xl max-w-2xl rounded-lg p-5 bg-white space-y-5">
            <h2 class="font-bold text-indigo-900 text-3xl text-center ">
                 {{ $t('quizzes') }}
            </h2>
            <div
                class="w-full rounded-lg border-gray-300 p-3 border h-[300px] overflow-y-scroll"
            >
                <ul class="space-y-5">
                    <li
                        v-for="assign in assigns"
                        :key="assign.id"
                        class="gap-2 flex items-center justify-between p-3 rounded-lg bg-gray-50"
                    >
                        <p class="text-md font-semibold">{{ assign.quiz.title }}</p>
                        <div class="space-x-3">
                            <!-- <span
                                class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-blue-300"
                                >{{ $t('score') }} : {{ assign.score }}</span
                            > -->
                            <span
                                v-if="assign.completed_at"
                                class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300"
                            >
                                {{ $t('complete') }}
                            </span>
                            <span
                                v-else
                                class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300"
                                > {{ $t('pending') }}</span
                            >
                        </div>
                    </li>
                </ul>
            </div>
            <div class="flex justify-end gap-2">
                <button class="btn-danger" @click="hideModal()">{{ $t('cancel') }}</button>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
defineProps<{ hideModal: CallableFunction; assigns: any }>();
</script>

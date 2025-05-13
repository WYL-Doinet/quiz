<template>
    <div class="fixed top-0 left-0 w-screen h-screen z-10 flex justify-center items-center bg-black/25"
        @click.self="hideModal()">
        <div class="min-w-xl max-w-2xl rounded-lg p-5 bg-white space-y-5">
            <h2 class="font-bold text-indigo-800 text-3xl text-center">Assigned Quizzes</h2>
            <div class="w-full rounded-lg border-gray-300 p-5 border h-[300px] overflow-y-scroll">
                <ul class="space-y-5">
                    <li v-for="assign in assigns" :key="assign.id" class="gap-2 flex items-center justify-between">
                        <p>{{ assign.quiz.title }}</p>
                        <div class="space-x-3">
                            <span
                                class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-blue-300">Score
                                : {{ assign.score }}</span>
                            <span v-if="assign.completed_at"
                                class="bg-red-100 text-red-800 text-xs font-medium  px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">
                                complete
                            </span>
                            <span v-else
                                class="bg-red-100 text-red-800 text-xs font-medium  px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">Pending</span>
                        </div>
                    </li>
                </ul>
                <p v-if="!assigns.length" class="text-center"> No Quizzes</p>
            </div>
            <div class="flex justify-end">
                <button class="btn-danger" @click="hideModal()">Close</button>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">

defineProps<{ hideModal: CallableFunction, assigns: any }>()


</script>
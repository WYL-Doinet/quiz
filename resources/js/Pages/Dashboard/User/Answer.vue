<template>
       <h2 class="text-3xl font-bold text-center text-indigo-900">
            {{ assign.quiz.title }}
        </h2>
        <div
            class="flex justify-between p-5 border border-gray-300 rounded-lg bg-indigo-900 text-orange-500 text-lg"
        >
            <div>
                <span class="text-white font-semibold">{{
                    $t("totalQuestions")
                }}</span>
                :
                <span class="font-bold">{{
                    assign.quiz.questions.length
                }}</span>
            </div>
            <div>
                <span class="text-white font-semibold">{{
                    $t("score")
                }}</span>
                : <span class="font-bold">{{ assign.score }}</span>
            </div>
        </div>

        <div
            v-for="(question, i) in assign.quiz.questions"
            class="p-5 border-gray-300 rounded-lg border space-y-5"
            :key="question.id"
        >
            <h3 class="text-2xl text-indigo-900 font-bold">
                <span class="text-orange-500">{{ i + 1 }}.</span>
                {{ question["question_text"] }}
            </h3>
            <div class="grid grid-cols-2 gap-5">
                <div v-for="(choice, i) in question.choices" :key="choice.id">
                    <p class="flex items-center gap-2">
                        {{ i + 1 }}.
                        <span :class="['font-semibold', {'text-green-600' : choice['is_correct']}]">
                            {{ choice["choice_text"] }}</span
                        >
                        <span v-if="question['user_choice_id'] === choice.id">
                            <svg
                                v-if="choice['is_correct']"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24"
                                fill="currentColor"
                                class="size-6 text-green-600"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                            <svg
                                v-else
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24"
                                fill="currentColor"
                                class="size-6 text-red-600"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-1.72 6.97a.75.75 0 1 0-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 1 0 1.06 1.06L12 13.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L13.06 12l1.72-1.72a.75.75 0 1 0-1.06-1.06L12 10.94l-1.72-1.72Z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                        </span>
                    </p>
                </div>
            </div>
        </div>
</template>

<script setup lang="ts">
import DashboardLayout from "../../../components/layout/DashboardLayout.vue";

defineProps<{ assign: any }>();
</script>

<template>
    <div class="space-y-5 border-gray-300 border p-5 rounded-lg">
        <h3 class="text-indigo-900 text-2xl font-bold"><span class="text-orange-500">{{ index + 1 }}.</span> {{ question.question_text }}</h3>
        <input type="hidden" :name="`questions[${index}][question_text]`" :value="question.question_text">
        <div class="grid grid-cols-2 gap-5">
            <div class="flex items-center gap-2" v-for="choice, i in question.choices" :key="choice.id">
                <label :for="`choice-${i}-${index}`" class="font-semibold">
                    {{ choice.choice_text }}
                </label>
                <input :id="`choice-${i}-${index}`" required type="radio" :value="choice.choice_text"
                    :name="`questions[${index}][user_answer]`"
                    class="w-4 h-4 accent-indigo-800 bg-gray-100 border-gray-300 focus:outline-none focus:border-0">
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { computed } from 'vue';


type ChoiceType = {
    id: string;
    choice_text: string;
    is_correct: boolean;
};

type QuestionType = {
    id: string;
    question_text: string;
    choices: Array<ChoiceType>;
};

type PropsType = {
    question: QuestionType
    index: number,
}

defineProps<PropsType>();

</script>

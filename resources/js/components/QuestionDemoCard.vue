<template>
    <div class="space-y-5 border-gray-300 border p-5 rounded-lg">
        <h3 class="text-indigo-900 text-2xl font-bold">{{ questionIndex + 1 }}. {{ question.question_text }}</h3>
        <input type="hidden" :name="`questions[${questionIndex}][question_text]`" :value="question.question_text">
        <input type="hidden" :name="`questions[${questionIndex}][correct_answer]`" :value="correctText">
        <div class="grid grid-cols-2 gap-5">
            <div class="flex items-center gap-2" v-for="choice, i in question.choices" :key="choice.id">
                <label :for="`choice-${i}-${questionIndex}`" class="font-semibold">
                    {{ choice.choice_text }}
                </label>
                <input :id="`choice-${i}-${questionIndex}`" required type="radio" :value="choice.choice_text"
                    :name="`questions[${questionIndex}][user_answer]`"
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
    questionIndex: number,
}

const props = defineProps<PropsType>();

const correctText = computed(() => {
    return props.question.choices.find(c => c.is_correct === true)!.choice_text
})



</script>

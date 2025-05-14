<template>
    <div class="w-full space-y-5 p-6 bg-white border border-gray-300 rounded-lg  dark:bg-gray-800 dark:border-gray-700">
        <div class="flex justify-between items-center">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-indigo-800  dark:text-white">Question {{
                questionIndex + 1 }}
            </h5>
            <div class="flex justify-center items-center gap-3">
                <button type="button" disabled @click="addChoice"
                    title="Sorry add choice function is currently not  stable"
                    class="btn-primary flex justify-center items-center gap-2">
                    <span>Add Choice</span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5">
                        <path
                            d="M6 3a3 3 0 0 0-3 3v2.25a3 3 0 0 0 3 3h2.25a3 3 0 0 0 3-3V6a3 3 0 0 0-3-3H6ZM15.75 3a3 3 0 0 0-3 3v2.25a3 3 0 0 0 3 3H18a3 3 0 0 0 3-3V6a3 3 0 0 0-3-3h-2.25ZM6 12.75a3 3 0 0 0-3 3V18a3 3 0 0 0 3 3h2.25a3 3 0 0 0 3-3v-2.25a3 3 0 0 0-3-3H6ZM17.625 13.5a.75.75 0 0 0-1.5 0v2.625H13.5a.75.75 0 0 0 0 1.5h2.625v2.625a.75.75 0 0 0 1.5 0v-2.625h2.625a.75.75 0 0 0 0-1.5h-2.625V13.5Z" />
                    </svg>
                </button>
                <button v-if="questionIndex > 4" type="button" class="btn-danger" @click="removeQuestion()">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5">
                        <path fill-rule="evenodd"
                            d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
        </div>
        <div>
            <label :for="`question-${questionIndex}`"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Question</label>
            <input :id="`question-${questionIndex}`" type="text" :name="`questions[${questionIndex}][question_text]`"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Question text" required />
        </div>
        <div>
            <div class=" col-span-2">
                <label for="first_name"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Answer</label>
            </div>
            <div class="grid grid-cols-2 gap-5">
                <div v-for="choice, i in choices" :key="choice">
                    <div class="flex items-center gap-3">
                        <input type="text" :name="`questions[${questionIndex}][choices][${i}][choice_text]`"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required />
                        <input type="hidden" :value="i === checkedIndex"
                            :name="`questions[${questionIndex}][choices][${i}][is_correct]`">
                        <input :checked="i === checkedIndex" required type="radio" value="true"
                            @change="checkedIndex = i"
                            class="w-4 h-4 text-indigo-800 bg-gray-100 border-gray-300 focus:outline-none focus:border-0">
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>
<script setup lang="ts">
import { ref } from 'vue';
const choices = ref<Array<number>>([1, 2, 3, 4]);
    
withDefaults(defineProps<{
    questionIndex: number
    removeQuestion: CallableFunction
    increase?: number
}>(), {
    increase: 1
})

const addChoice = () => {
    choices.value.push(choices.value.length + 1)
}

const checkedIndex = ref(0)

</script>
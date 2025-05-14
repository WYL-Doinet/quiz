<template>
    <DashboardLayout>

        <form class="space-y-5" @submit.prevent="submit">
            <div></div>
            <div class="space-y-3">
                <div>
                    <label for="category_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select
                        Category</label>
                    <select required id="category_id" name="category_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected value>Choose category</option>
                        <option v-for="category in categories" :value="category.id" :key="category.id">{{
                            category.name }}</option>

                    </select>
                </div>
                <div>
                    <label for="title"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                    <input type="text" id="title" name="title"
                        class="bg-gray-50 border  border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Quiz Title" required />
                </div>
                <div>
                    <label for="message"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                    <textarea id="description" rows="4" name="description"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="About the quiz..."></textarea>
                </div>
            </div>
            <div class="space-y-5">
                <QuestionCard :removeQuestion="() => removeQuestion(question)" v-for="question, i in questions"
                    :key="question" :questionIndex="i" />
                <div class="flex justify-between">
                    <button type="button" @click="addQuestion"
                        class="btn-primary flex justify-center items-center gap-2">
                        <span>Add Question</span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5">
                            <path
                                d="M6 3a3 3 0 0 0-3 3v2.25a3 3 0 0 0 3 3h2.25a3 3 0 0 0 3-3V6a3 3 0 0 0-3-3H6ZM15.75 3a3 3 0 0 0-3 3v2.25a3 3 0 0 0 3 3H18a3 3 0 0 0 3-3V6a3 3 0 0 0-3-3h-2.25ZM6 12.75a3 3 0 0 0-3 3V18a3 3 0 0 0 3 3h2.25a3 3 0 0 0 3-3v-2.25a3 3 0 0 0-3-3H6ZM17.625 13.5a.75.75 0 0 0-1.5 0v2.625H13.5a.75.75 0 0 0 0 1.5h2.625v2.625a.75.75 0 0 0 1.5 0v-2.625h2.625a.75.75 0 0 0 0-1.5h-2.625V13.5Z" />
                        </svg>
                    </button>
                    <button class="btn-primary ">
                        <svg v-if="form.processing" aria-hidden="true" role="status"
                            class="inline w-4 h-4 me-3 text-white animate-spin" viewBox="0 0 100 101" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                fill="#E5E7EB" />
                            <path
                                d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                fill="currentColor" />
                        </svg>
                        <span v-if="form.processing">
                            Submitting
                        </span>
                        <span v-else>
                            Submit
                        </span>
                    </button>
                </div>
            </div>
        </form>
    </DashboardLayout>
</template>

<script setup lang="ts">
import DashboardLayout from '@components/layout/DashboardLayout.vue'
import { ref } from 'vue';
import QuestionCard from '@components/QuestionCard.vue';
import qs from 'qs'
import { useForm } from '@inertiajs/vue3';
const questions = ref<Array<number>>(Array.from(Array(5), (v, k) => new Date().getTime() + k))

const initialFormProps: { [key: string]: any } = {
    'category_id': null,
    'title': null,
    'description': null,
    'questions': [],
}

const form = useForm(initialFormProps);

const addQuestion = () => {
    questions.value.push(new Date().getTime())
}

const removeQuestion = (id: number) => {
    questions.value = questions.value.filter((item) => item !== id)
}

const submit = (e: Event) => {
    const el = e.target as HTMLFormElement
    const formData = new FormData(el);
    const queryString = new URLSearchParams(formData as any).toString();

    const data = qs.parse(queryString)

    for (let key in data) {
        console.log(key)
        form[key] = data[key]
    }

    form.post(route('quiz.store'))

}

defineProps({ categories: Object })
</script>
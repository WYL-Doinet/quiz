<template>
    <form class="space-y-5" @submit.prevent="submit">
        <div class="space-y-3">
            <div>
                <label
                    for="category_id"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                    >{{ $t("category") }}</label
                >
                <select
                    required
                    id="category_id"
                    name="category_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                >
                    <option selected value>
                        {{ $t("selectCategory") }}
                    </option>
                    <option
                        v-for="category in categories"
                        :value="category.id"
                        :key="category.id"
                    >
                        {{ category.name }}
                    </option>
                </select>
            </div>
            <div>
                <label
                    for="title"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                    >{{ $t("title") }}</label
                >
                <input
                    type="text"
                    id="title"
                    name="title"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required
                />
            </div>
            <div>
                <label
                    for="message"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                    >{{ $t("description") }}</label
                >
                <textarea
                    id="description"
                    rows="4"
                    name="description"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    x
                ></textarea>
            </div>
        </div>
        <div class="space-y-5">
            <QuestionCard
                :removeQuestion="() => removeQuestion(question)"
                v-for="(question, i) in questions"
                :key="question"
                :index="i"
            />
            <div class="flex justify-between">
                <button
                    type="button"
                    @click="addQuestion"
                    class="btn-primary flex justify-center items-center gap-2"
                >
                    <span>{{ $t("addQuestion") }}</span>
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="currentColor"
                        class="size-5"
                    >
                        <path
                            d="M6 3a3 3 0 0 0-3 3v2.25a3 3 0 0 0 3 3h2.25a3 3 0 0 0 3-3V6a3 3 0 0 0-3-3H6ZM15.75 3a3 3 0 0 0-3 3v2.25a3 3 0 0 0 3 3H18a3 3 0 0 0 3-3V6a3 3 0 0 0-3-3h-2.25ZM6 12.75a3 3 0 0 0-3 3V18a3 3 0 0 0 3 3h2.25a3 3 0 0 0 3-3v-2.25a3 3 0 0 0-3-3H6ZM17.625 13.5a.75.75 0 0 0-1.5 0v2.625H13.5a.75.75 0 0 0 0 1.5h2.625v2.625a.75.75 0 0 0 1.5 0v-2.625h2.625a.75.75 0 0 0 0-1.5h-2.625V13.5Z"
                        />
                    </svg>
                </button>
                <button class="btn-primary">
                    {{ $t("submit") }}
                    <span v-if="form.processing">☕</span>
                </button>
            </div>
        </div>
    </form>
</template>

<script setup lang="ts">
import { nextTick, ref } from "vue";
import QuestionCard from "@components/QuestionCard.vue";
import qs from "qs";
import { useForm } from "@inertiajs/vue3";
import { useToast } from "vue-toastification";
import { useI18n } from "vue-i18n";
const questions = ref<Array<number>>(
    Array.from(Array(5), (v, k) => new Date().getTime() + k)
);

const initialFormProps: { [key: string]: any } = {
    category_id: null,
    title: null,
    description: null,
    questions: [],
};

const toast = useToast();
const { t } = useI18n();

const form = useForm(initialFormProps);

const addQuestion = async () => {
    questions.value.push(new Date().getTime());
    await nextTick();
    const container = document.querySelector("#scroll-able");
    container?.scrollTo({ top: container.scrollHeight, behavior: "smooth" });
};

const removeQuestion = (id: number) => {
    questions.value = questions.value.filter((item) => item !== id);
};

const submit = (e: Event) => {
    const el = e.target as HTMLFormElement;
    const formData = new FormData(el);
    const queryString = new URLSearchParams(formData as any).toString();

    const data = qs.parse(queryString, { arrayLimit: 1000 });

    for (let key in data) {
        form[key] = data[key];
    }

    form.post(route("quiz.store"), {
        onSuccess: () => {
            toast.success(t("dataCreated"), { timeout: 2000 });
        },
    });
};

defineProps({ categories: Object });
</script>

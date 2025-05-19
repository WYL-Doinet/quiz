<template>
    <form
        @submit.prevent="onQuestionSave"
        class="w-full space-y-5 p-6 bg-white border border-gray-300 rounded-lg dark:bg-gray-800 dark:border-gray-700"
    >
        <div class="flex justify-between items-center">
            <h5
                class="mb-2 text-2xl font-bold tracking-tight text-indigo-800 dark:text-white"
            >
                {{ $t("question") }} {{ index + 1 }}
            </h5>
            <button class="btn-primary">
                {{ form.processing ? $t("save") + " ☕" : $t("save") }}
            </button>
        </div>
        <div>
            <label
                for="first_name"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                >Question</label
            >
            <input
                type="text"
                required
                name="question_text"
                :value="question.question_text"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Question text"
            />
        </div>
        <div>
            <div class="col-span-2">
                <label
                    for="first_name"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                    >Answer</label
                >
            </div>
            <div class="grid grid-cols-2 gap-5">
                <div v-for="(choice, i) in question.choices" :key="choice.id">
                    <div class="flex items-center gap-3">
                        <input
                            type="hidden"
                            :name="`choices[${i}][id]`"
                            :value="choice.id"
                        />
                        <input
                            required
                            type="text"
                            :value="choice.choice_text"
                            :name="`choices[${i}][choice_text]`"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        />
                        <input
                            required
                            :value="checkedIndex === i ? 1 : 0"
                            type="hidden"
                            :name="`choices[${i}][is_correct]`"
                        />
                        <input
                            required
                            type="radio"
                            value="1"
                            :name="`${
                                checkedIndex === undefined
                                    ? 'question-' + index + '-choice'
                                    : ''
                            }`"
                            @change="checkedIndex = i"
                            :checked="checkedIndex === i"
                            class="w-4 h-4 accent-indigo-800 bg-gray-100 border-gray-300 focus:outline-none focus:border-0"
                        />
                    </div>
                </div>
            </div>
        </div>
    </form>
</template>

<script setup lang="ts">
import { useForm } from "@inertiajs/vue3";
import qs from "qs";
import { ref } from "vue";
import { useToast } from "vue-toastification";
const props = defineProps<{ question: any; index: any }>();

const initiAlFormProps = {
    question_text: "",
    choices: [],
};
const form = useForm(initiAlFormProps);

const toast = useToast();

const onQuestionSave = (e: Event) => {
    const el = e.target as HTMLFormElement;

    const formData = new FormData(el);

    const queryString = new URLSearchParams(formData as any).toString();

    const data = qs.parse(queryString);
    form["question_text"] = data["question_text"] as any;
    form["choices"] = data["choices"] as any;

    form.patch(route("question.update", props.question.id), {
        onSuccess: async () => {
            toast.success("データが更新されました", { timeout: 2000 });
        },
    });
};

const checkedIndex = ref<undefined | number>(
    props.question.choices.findIndex((c: any) => c.is_correct)
);
</script>

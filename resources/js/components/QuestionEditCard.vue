<template>
    <form
        @submit.prevent="onQuestionSave"
        class="w-full space-y-5 p-6 bg-white border border-gray-300 rounded-lg dark:bg-gray-800 dark:border-gray-700"
    >
        <div class="flex justify-between items-center">
            <h5
                class="mb-2 text-2xl font-bold tracking-tight text-indigo-800 dark:text-white"
            >
                {{ $t("question") }}
                <span class="text-orange-500 font-extrabold">{{
                    index + 1
                }}</span>
            </h5>
            <button class="btn-primary">
                <Loader v-if="processing"/>
                {{  $t("save") }}
            </button>
        </div>
        <div >
            <label
                for="first_name"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                >{{ $t("question") }}</label
            >
            <input v-one
                type="text"
                required
                name="question_text"
                :value="question.question_text"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            />
        </div>
        <div >
            <label
                for="first_name"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                >{{ $t("explanation") }}</label
            >
            <input v-once
                type="text"
                name="explanation"
                :value="question.explanation"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            />
        </div>
        <div >
            <div class="col-span-2">
                <label
                    for="first_name"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                    >{{ $t("answer") }}</label
                >
            </div>
            <div class="grid grid-cols-2 gap-5" v-memo="[checkedIndex]">
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
import { usePage } from "@inertiajs/vue3";
import qs from "qs";
import { ref } from "vue";
import { useI18n } from "vue-i18n";
import { useToast } from "vue-toastification";
import Loader from "./Loader.vue";
const props = defineProps<{ question: any; index: any }>();
const page = usePage();

const toast = useToast();
const { t } = useI18n();
const processing = ref(false);

const onQuestionSave = async (e: Event) => {
    processing.value = true;

    const el = e.target as HTMLFormElement;

    const formData = new FormData(el);

    const queryString = new URLSearchParams(formData as any).toString();

    const data = qs.parse(queryString);

    const res = await fetch(route("question.update", props.question.id), {
        headers: {
            Accept: "application/json",
            "X-Requested-With": "XMLHttpRequest",
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": page.props["csrf_token"] as string,
        },
        method: "PATCH",
        body: JSON.stringify(data),
    });
    
    processing.value = false;

    if (res.ok) {
        toast.success(t("dataUpdated"), { timeout: 2000 });
    }
};

const checkedIndex = ref<undefined | number>(
    props.question.choices.findIndex((c: any) => c.is_correct)
);
</script>

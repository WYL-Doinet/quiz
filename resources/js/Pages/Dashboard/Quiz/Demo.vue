<template>
    <DashboardLayout>
        <h2 class="text-3xl font-bold text-indigo-900 text-center">
            {{ quiz.title }}
        </h2>
        <form
            :class="['space-y-5', { 'pointer-events-none': results.length }]"
            @submit.prevent="submit"
        >
            <QuestionDemoCard
                :index="i"
                v-for="(question, i) in quiz.questions"
                :id="question.id"
                :key="question.id"
                :question="question"
            />
            <div>
                <button class="btn-primary">{{ $t("submit") }}</button>
            </div>
        </form>
        <transition name="fade">
            <div class="space-y-5" v-if="results.length">
                <h2 class="text-center text-indigo-900 font-bold text-4xl">
                    Your Results
                </h2>
                <div
                    class="flex justify-between p-5 border border-gray-300 rounded-lg bg-indigo-900 text-orange-500 text-lg"
                >
                    <div>
                        <span class="text-white font-semibold">{{
                            $t("totalQuestions")
                        }}</span>
                        : <span class="font-bold">{{ results.length }}</span>
                    </div>
                    <div>
                        <span class="text-white font-semibold">{{
                            $t("yourScore")
                        }}</span>
                        : <span class="font-bold">{{ score }}</span>
                    </div>
                </div>
                <div
                    v-for="(result, i) in results"
                    :key="i"
                    class="space-y-5 p-5 border-gray-300 border rounded-lg"
                >
                    <h3 class="font-bold text-2xl text-indigo-900">
                        <span class="text-orange-500">{{ i + 1 }}.</span>
                        {{ result["question_text"] }}
                    </h3>
                    <div class="grid grid-cols-2 gap-3 text-md">
                        <div>
                            <span class="font-semibold">{{
                                $t("yourAnswer")
                            }}</span>
                            :
                            <span
                                :class="[
                                    result.user_answer !== result.correct_answer
                                        ? 'text-red-600'
                                        : 'text-green-600',
                                    'font-bold',
                                ]"
                                >{{ result.user_answer }}</span
                            >
                        </div>
                        <div>
                            <span class="font-semibold">{{
                                $t("correctAnswer")
                            }}</span>
                            :
                            <span class="text-green-600 font-bold">{{
                                result.correct_answer
                            }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </transition>
    </DashboardLayout>
</template>

<script setup lang="ts">
import { computed, nextTick, ref } from "vue";
import DashboardLayout from "../../../components/layout/DashboardLayout.vue";
import QuestionDemoCard from "../../../components/QuestionDemoCard.vue";
import qs from "qs";

type ResultType = {
    question_text: string;
    correct_answer: string;
    user_answer: string;
};

const props = defineProps<{ quiz: any }>();

const results = ref<Array<ResultType>>([]);
    

const score = computed(
    () => results.value.filter((r) => r.correct_answer === r.user_answer).length
);

const submit = async (e: Event) => {
    const el = e.target as HTMLFormElement;

    const formData = new FormData(el);

    props.quiz.questions.forEach((q: any, i: number) => {
        const choice = q.choices.find((c: any) => c.is_correct);
        formData.append(`questions[${i}][correct_answer]`, choice.choice_text);
    });

    const queryString = new URLSearchParams(formData as any).toString();

    results.value = qs.parse(queryString, { arrayLimit: 1000 })
        .questions as any;
    await nextTick();
    const container = document.querySelector("#scroll-able");
    container?.scrollTo({ top: container.scrollHeight, behavior: "smooth" });
};
</script>

<style scoped>
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.5s ease;
}

.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}
</style>
